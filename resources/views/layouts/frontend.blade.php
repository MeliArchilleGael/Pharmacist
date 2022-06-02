<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Online-Pharma') }} | @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>

<div class="site-wrap">


    <div class="site-navbar py-2 sticky-lg-top">

        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                </form>
            </div>
        </div>

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="{{ route('home') }}" class="js-logo-clone">ONLINE Pharma</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block ">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="Str::endsWith(Route::currentRouteName(), 'home') ? 'active':''"><a
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="{{ Str::endsWith(Route::currentRouteName(), 'shop') ? 'active':'' }}"><a
                                    href="{{ route('shop') }}">Store</a></li>
                            <li class=" {{ Str::endsWith(Route::currentRouteName(), 'login') ? 'active':'' }} has-children">
                                <a href="#">Full Access </a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li>
                            <li class="{{ Str::endsWith(Route::currentRouteName(), 'about') ? 'active':'' }}"><a
                                    href="{{ route('about') }}">About</a></li>
                            <li class="{{ Str::endsWith(Route::currentRouteName(), 'contact') ? 'active':'' }}"><a
                                    href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="{{ route('cart') }}" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number">
                            @if(session('cart') !== null)
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif</span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
                        <span class="icon-menu"></span></a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                    <div class="block-7">
                        <h3 class="footer-heading mb-4">About</h3>
                        <p>Online Pharma is the online pharmacist management system</p>
                    </div>

                </div>
                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Contact Info</h3>
                        <ul class="list-unstyled">
                            <li class="address"> North west , Bamenda, CAMEROON</li>
                            <li class="phone"><a href="tel:+237 654 895 125">+237 654 895 125</a></li>
                            <li class="email">onlinepharma@gmail.com</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>
