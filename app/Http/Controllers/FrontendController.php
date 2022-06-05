<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Command;
use App\Models\Drugs;
use App\Models\Order;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    //

    public function index()
    {
        $drugs = Drugs::latest()->limit(10)->get();
        $newDrugs = Drugs::latest()->limit(5)->get();
        return view('frontend.index', compact('drugs', 'newDrugs'));
    }

    public function shop()
    {
        $drugs = Drugs::latest()->get();
        return view('frontend.shop', compact('drugs'));
    }

    public function show($slug)
    {
        $drug = Drugs::where('slug', $slug)->firstOrFail();
        return view('frontend.showShop', compact('drug'));
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

    public function thanks(Request $request)
    {
        // dd($request->all());
        $user = null;
        $command = null;
        $cart_items = session('cart');

        if (!session()->has('cart')) {
            Toastr::info('message', 'Empty Cart');
            return redirect()->route('shop');
        }

        if (Auth::check()) {
            $user = Auth::user();
            if ($request->has('c_diff')) {
                $request->validate([
                    'c_diff_fname' => 'required',
                    'c_diff_lname' => 'required',
                    'c_diff_address' => 'required',
                    'c_diff_email_address' => 'required',
                    'c_diff_phone' => 'required',
                ]);

                $user = Address::create([
                    'name' => $request->c_diff_fname . ' ' . $request->c_diff_lname,
                    'email' => $request->c_diff_email_address,
                    'telephone' => $request->c_diff_phone,
                    'address' => $request->c_diff_address,
                    'user_id' => $user->id,
                ]);
            }
            $command = Command::create([
                'status' => 'Pending',
                'name' => $user->name,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'address' => $user->address,
                'user_id' => Auth::user()->id,
                'note' => $request->c_order_notes,
            ]);
        } else {
            $request->validate([
                'c_fname' => 'required',
                'c_lname' => 'required',
                'c_address' => 'required',
                'c_email_address' => 'required',
                'c_phone' => 'required',
            ]);
            if ($request->has('c_create_account')) {
                $user = User::create([
                    'name' => $request->c_fname . $request->c_lname,
                    'email' => $request->c_email_address,
                    'password' => Hash::make($request->c_account_password),
                    'telephone' => $request->c_phone,
                    'address' => $request->c_address,
                    'active' => 1,
                    'role_id' => 2,
                ]);
                Auth::loginUsingId($user->id);
            }

            if ($request->has('c_diff')) {
                $request->validate([
                    'c_diff_fname' => 'required',
                    'c_diff_lname' => 'required',
                    'c_diff_phone' => 'required',
                    'c_diff_address' => 'required',
                    'c_diff_email_address' => 'required',

                ]);
                $user = Address::create([
                    'name' => $request->c_diff_fname . ' ' . $request->c_diff_lname,
                    'email' => $request->c_diff_email_address,
                    'telephone' => $request->c_diff_phone,
                    'address' => $request->c_diff_address,
                    'user_id' => $user->id,
                ]);

                $command = Command::create([
                    'status' => 'Pending',
                    'name' => $user->name,
                    'email' => $user->email,
                    'telephone' => $user->telephone,
                    'address' => $user->address,
                    'note' => $request->c_order_notes,
                ]);
            } else {
                $command = Command::create([
                    'status' => 'Pending',
                    'name' => $request->c_fname . ' ' . $request->c_lname,
                    'email' => $request->c_email_address,
                    'telephone' => $request->c_phone,
                    'address' => $request->c_address,
                    'note' => $request->c_order_notes,
                ]);
            }
        }
        $total_price = 0;
        foreach ($cart_items as $item) {
            $item_price = $item['drug']->price;
            $item_qty = $item['quantity'];
            $price = $item_qty * $item_price;

            $total_price += $price;
            Order::create([
                'drug_id' => $item['drug']->id,
                'quantity' => $item['quantity'],
                'command_id' => $command->id,
                'price' => $price,
            ]);
        }
        $command->update(['price'=>$total_price]);
        session()->pull('cart');
        Toastr::success('message', 'Order post succesfully');
        return view('frontend.thanks');
    }

    /* public function add_to_cart(Request $request, $slug)
    {
        $quantity = $request->input('quantity');
        $drug = Drugs::where('slug', $slug)->firstOrFail();
        return view('frontend.show', compact('drug'));
    } */

    /**
     * add a product to the cart
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function add_to_cart(Request $request, $slug)
    {

        $drug = Drugs::where('slug', '=', $slug)->first();

        if (!$drug) {
            abort(404);
        }
        $cart = session()->get('cart');

        // if cart is empty then this is the first product
        if (!$cart) {
            $cart = [
                $slug => [
                    'drug' => $drug,
                    'quantity' => $request->input('quantity'),
                ]
            ];
            session()->put('cart', $cart);
            Toastr::success('message', 'Drugs added to cart successfully');
            return redirect()->route('shop');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$slug])) {
            $cart[$slug]['quantity'] = $cart[$slug]['quantity'] + $request->input('quantity');
            session()->put('cart', $cart);
            Toastr::success('message', 'Drugs added to cart successfully');
            return redirect()->route('shop');
        }

        // if item not exist in cart add to cart
        $cart[$slug] = [
            'drug' => $drug,
            'quantity' => $request->input('quantity'),
        ];
        session()->put('cart', $cart);
        Toastr::success('message', 'Drugs added to cart successfully');
        return redirect()->route('shop');
    }

    /**
     * remove all products from the cart
     **/
    public function clearCart()
    {
        if (session()->has('cart')) {
            session()->pull('cart');
            Toastr::success('message', 'Cart clear successfully');
            return back();
        } else {
            Toastr::info('message', 'Empty Cart');
            return back();
        }
    }

    /**
     * remove a specific items into the cart
     */
    public function removeFromCart(Request $request, $slug)
    {
        if ($slug) {
            $cart = session()->get('cart');
            if (isset($cart[$slug])) {
                unset($cart[$slug]);
                session()->put('cart', $cart);
            }
        }
        Toastr::info('message', 'Drug remove from the Cart successfully');
        return back();
    }

}
