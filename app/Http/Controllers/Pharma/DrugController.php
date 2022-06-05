<?php

namespace App\Http\Controllers\Pharma;

use App\Http\Controllers\Controller;
use App\Models\Drugs;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drugs = Drugs::latest()->get();

        foreach($drugs as $drug){
            if($drug->date_preemption->lte(now())){
                $drug->update(["status"=>"Expired"]);
            }
        }

        $drugs = Drugs::latest()->get();
        return view('Pharma.Drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pharma.Drugs.create');
    }

    public function validation(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
            'date_preemption'=>'required',
            'image'=>'required|image',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //

        $this->validation($request);

        //uploaded the image

        $file = $request->file('image');
        $image_name = Str::slug($request->input('name')) . '-' . uniqid() . '.' . $file->extension();
        $path = 'images/drugs/' . $image_name;

        move_uploaded_file($file, public_path('images/drugs/' . $image_name));

        Drugs::create(array_merge($request->only(['name','description','quantity','price', 'date_preemption']),[
            'slug'=>Str::slug($request->input('name')),
            'image'=> $path,
            'status'=>'Available'
        ]));

        Toastr::success('message', 'Drug create successfully');
        return redirect()->route('pharma.drugs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $drug = Drugs::where('slug', $id)->firstOrFail();
        return view('Pharma.Drugs.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $this->validation($request);

        $drug = Drugs::where('id', $id)->firstOrFail();
        //uploaded the image

        $file = $request->file('image');
        $image_name = Str::slug($request->input('name')) . '-' . uniqid() . '.' . $file->extension();
        $path = 'images/drugs/' . $image_name;

        move_uploaded_file($file, public_path('images/drugs/' . $image_name));

        $drug->update(array_merge($request->only(['name','description','quantity','price','status', 'date_preemption']),[
            'slug'=>Str::slug($request->input('name')),
            'image'=> $path,
        ]));

        Toastr::success('message', 'Drug updated successfully');
        return redirect()->route('pharma.drugs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //

        $drug = Drugs::where('slug', $id)->firstOrFail();
        $drug->delete();
        Toastr::info('message', 'Delete successfully');
        return back();
    }
}
