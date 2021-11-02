<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Talino Store | @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" />

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 text-center text-lg-left">
                        <!-- logo -->
                        <a href="#" class="site-logo">
                            <h3 class="fw bold pt-1">Talino Store</h3>
                        </a>
                    </div>
                    <div class="col-xl-5 col-lg-4">
                        <form class="header-search-form">
                            <input type="text" placeholder="Search on talino store ....">
                            <button><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="user-panel">
                            <div class="up-item" id="topNavBar">
                                <ul class="main-menu">
                                    <li>
                                        <a href="#">
                                            <i class="flaticon-profile"></i>
                                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                        </a>
                                        <ul class="sub-menu" style="width: 100px;">
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                            <li><a class="dropdown-item" href="/history">History</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="up-item">
                                @php
                                $notif = \App\Models\Cart::where('user_id', Auth::user()->id)->count();
                                @endphp
                                <div class="shopping-card">
                                    <i class="fa fa-shopping-cart mr-1"></i>
                                    @if (!empty($notif))
                                    <span>{{$notif}}</span>
                                    @endif
                                </div>
                                <a href="/cart">Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout/navbar')
        @yield('content')

        <!-- Footer section -->
        <section class="footer-section">
            <div class="social-links-warp">
                <div class="container">
                    <div class="social-links">
                        <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                        <a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
                        <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
                        <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                        <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                        <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
                        <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
                    </div>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p class="text-white text-center mt-5">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is
                        made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </section>
        <!-- Footer section end -->

        <!--====== Javascripts & Jquery ======-->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
        <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
        @if(session('message'))
            <script>
                Swal.fire("{{ session('message') }}");
            </script>
        @endif
        @stack('scrips')
</body>

</html>