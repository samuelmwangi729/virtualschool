<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="img/logo/logo.png">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- owl carousel CSS -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- flaticon CSS -->
<link rel="stylesheet" href="{{asset('css/flaticon.cs')}}s">
    <!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- swiper CSS -->
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script data-ad-client="ca-pub-6177716716878978" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e2cf8138e78b86ed8ab1896/1e4lb4oip';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<script data-ad-client="ca-pub-6177716716878978" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
    <div id="app" style="margin-top:-20px">
    <header class="main_menu home_menu" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12" style="height:50px !important">
                    <nav class="navbar navbar-expand-sm navbar-light" style="margin-top:-20px">
                    <a class="navbar-brand" style="color:#f04d0c;font-weight:bold" href="{{route('index')}}">
                    <img src="{{asset('img/logo/logo.png')}}" alt="VirtualSchool" width="50px" height="50px">
                         </a>
                        <button class="navbar-toggler pull-right" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                {{-- <li class="nav-item active">
                                    <a class="nav-link" href="{{route('index')}}"><i class="fa fa-home" style="font-size:20px;color:red"></i></a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#about')}}">Services</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Register
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/register">Individual</a>
                                    <a class="dropdown-item" href="{{route('institution')}}">Institution</a>
                                    </div>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Files
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Schemes Of Work</a>
                                        <a class="dropdown-item" href="#">Past Papers</a>
                                        <a class="dropdown-item" href="#">Others</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#timetable')}}">TimeTable</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#contact')}}">Contact</a>
                                </li>
                                @if(Auth::check())
                                <li class="nav-item">
                                <a href="{{route('home')}}">My Account</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link"  href="/login">Login</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('df2ScuwCrvUmqOPwAAeo5gV4N3NixXRldEkRapmvNEtFEAaUBW/UmqOPwAAeo5gV4N3Ni.pdf')}}">Help</a>
                                </li>
                                <li class="d-none d-lg-block pull-right">
                                <a class="btn_1" href="{{url('/#pricing')}}">View Pricing</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div style="overflow:hidden">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
        <!-- jquery plugins here-->
    <!-- jquery -->
<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
<script src="{{asset('js/swiper.min.js')}}"></script>
    <!-- swiper js -->
<script src="{{asset('js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <!-- swiper js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
    <!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
