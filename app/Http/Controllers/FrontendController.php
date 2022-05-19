<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        return view('frontend.index');
    }

    public function shop()
    {
        $drugs = Drugs::latest()->get();
        return view('frontend.shop', compact('drugs'));
    }

    public function show($slug)
    {
        $drug = Drugs::where('slug', $slug)->firstOrFail();
        return view('frontend.show', compact('drug'));
    }

    public function add_cart(Request $request)
    {
        $drug = Drugs::where('slug', $slug)->firstOrFail();
        return view('frontend.show', compact('drug'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function thanks()
    {
        return view('frontend.thanks');
    }

}
