@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            @guest
                <div class="row text-center mb-5">
                    <div class="col-md-12">
                        <div class="bg-light rounded p-3">
                            <p class="mb-0">Returning customer?
                                <a href="{{ route('login') }}" class="d-inline-block">Click here</a> to login</p>
                        </div>
                    </div>
                </div>
            @endguest
            <form action="{{ route('thanks') }}" class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        @guest
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="c_address"
                                           placeholder="Street address">
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="c_phone"
                                           placeholder="Phone Number">
                                </div>
                            </div>
                        @endguest

                        <div class="form-group">
                            @guest
                                <label for="c_create_account" class="text-black" data-toggle="collapse"
                                       href="#create_an_account"
                                       role="button" aria-expanded="false"
                                       aria-controls="create_an_account">
                                    <input name="c_create_account"
                                           type="checkbox" value="1"
                                           id="c_create_account"> Create an account?</label>
                            @endguest
                            <div class="collapse" id="create_an_account">
                                <div class="py-2">
                                    <p class="mb-3">Create an account by entering the information below. If you are a
                                        returning customer please login at the top of the page.</p>
                                    <div class="form-group">
                                        <label for="c_account_password" class="text-black">Account Password</label>
                                        <input type="email" class="form-control" id="c_account_password"
                                               name="c_account_password"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="c_ship_different_address" class="text-black" data-toggle="collapse"
                                   href="#ship_different_address" role="button" aria-expanded="false"
                                   aria-controls="ship_different_address">
                                <input type="checkbox" value="1"
                                       name="c_diff"
                                       id="c_ship_different_address">
                                Ship To A Different Address?
                            </label>
                            <div class="collapse" id="ship_different_address">
                                <div class="py-2">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_diff_fname" class="text-black">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_fname"
                                                   name="c_diff_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_lname" class="text-black">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_lname"
                                                   name="c_diff_lname">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="c_diff_address" class="text-black">Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_address"
                                                   name="c_diff_address"
                                                   placeholder="Street address">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-5">
                                        <div class="col-md-6">
                                            <label for="c_diff_email_address" class="text-black">Email Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_email_address"
                                                   name="c_diff_email_address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_phone" class="text-black">Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_phone"
                                                   name="c_diff_phone"
                                                   placeholder="Phone Number">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                      placeholder="Write your notes here..."></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                    </thead>
                                    <tbody>
                                    @if(session()->has('cart'))
                                        <?php $Total_price = 0; ?>

                                        @foreach(session()->get('cart') as $item)
                                            <?php
                                            $Total_price = $Total_price + ($item['quantity'] * $item['drug']->price);
                                            $price = $item['drug']->price * $item['quantity'];
                                            ?>
                                            <tr>
                                                <td>{{ $item['drug']->name }}<strong
                                                        class="mx-2">x</strong>{{ $item['quantity'] }}</td>
                                                <td>{{ $price }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td class="text-black font-weight-bold">
                                            <strong>{{ number_format($Total_price) }}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>

                                {{--<div class="border mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                                                           aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2 px-4">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                                                           aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2 px-4">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border mb-5">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                                                           aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2 px-4">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
--}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Place Order
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <!-- </form> -->
        </div>
    </div>
@endsection
