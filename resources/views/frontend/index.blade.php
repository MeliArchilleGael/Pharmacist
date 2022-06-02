@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
    <div class="site-blocks-cover" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">

                        <h1>Welcome To Online Pharma</h1>
                        <h2 class="sub-title">Your online Pharmacist management system</h2>
                        <p>
                            <a href="#" class="btn btn-primary px-5 py-3">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch justify-content-center section-overlap">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-primary h-100">
                        <a href="#" class="h-100">
                            <h5>Free <br> Shipping</h5>
                            <p>
                                Free delivery of your drugs at all address in the town
                            </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-warning h-100">
                        <a href="#" class="h-100">
                            <h5>Quick <br> Delivery </h5>
                            <p>Order and be supplier in less than 24 hours </p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Popular Products</h2>
                </div>
            </div>

            <div class="row">
                @foreach($drugs as $drug)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <span class="tag">{{ $drug->status }}</span>
                        <a href="{{ route('shop.show', $drug->slug) }}">
                            <img src="{{ asset(''.$drug->image) }}" alt="Image">
                        </a>
                        <h3 class="text-dark">
                            <a href="{{ route('shop.show', $drug->slug) }}">{{ $drug->name }}</a>
                        </h3>
                        <p class="price"><del>{{ number_format($drug->price + ($drug->price/2)) }} XFA </del> &mdash; {{ number_format($drug->price) }} XFA</p>
                    </div>
                @endforeach

            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('shop') }}" class="btn btn-primary px-4 py-3">View All Products</a>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">New Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($newDrugs as $newDrug)
                            <div class="text-center item mb-4">
                                <a href="{{ route('shop.show', $newDrug->slug) }}">
                                    <img src="{{ asset(''.$newDrug->image) }}" alt="Image">
                                </a>
                                <h3 class="text-dark">
                                    <a href="{{ route('shop.show', $newDrug->slug) }}">{{ $newDrug->name }}</a>
                                </h3>
                                <p class="price">{{ number_format($drug->price) }} XFA</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-secondary bg-image" style="background-image: url('frontend/images/bg_2.jpg');">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('frontend/images/bg_1.jpg');">
                        <div class="banner-1-inner align-self-center">
                            <h2>Pharma Products</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
                        <div class="banner-1-inner ml-auto  align-self-center">
                            <h2>Rated by Experts</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
