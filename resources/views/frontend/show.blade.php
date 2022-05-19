@extends('layouts.frontend')
@section('title', $drug->name)
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('shop') }}">Store</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $drug->name }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="{{ asset(''.$drug->image) }}" alt="Image" class="img-fluid p-5">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $drug->name }}</h2>
                    <p>{{ $drug->description }}</p>

                    <p>
                        <del>{{ number_format($drug->price + ($drug->price/2)) }}</del>
                        <strong class="text-primary h4">{{ number_format($drug->price) }}</strong></p>


                    <form action="{{ route('shop.add_cart') }}" method="post">
                        @csrf
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 220px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input name="quantity" type="text" class="form-control text-center" value="1"
                                       placeholder=""
                                       aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">
                            Add To Cart
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
