@extends('layouts.frontend')
@section('title', 'Shop')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

          {{--  <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                </div>
                <div class="col-lg-6 d-flex justify-content-end" >
                    <div>
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
                        <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
                                data-toggle="dropdown">Reference</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="#">Relevance</a>
                            <a class="dropdown-item" href="#">Name, A to Z</a>
                            <a class="dropdown-item" href="#">Name, Z to A</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Price, low to high</a>
                            <a class="dropdown-item" href="#">Price, high to low</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-5 justify-content-center">
                @foreach($drugs as $drug)
                    <div class="col-sm-6 col-lg-4 h-25 text-center item mb-4">
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
                {{--<div class="col-md-12 text-center">
                    <div class="site-block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
