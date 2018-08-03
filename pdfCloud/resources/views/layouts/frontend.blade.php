<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDF Cloud</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link href="{{ URL::asset('img/favicon.png')}}" rel="icon">
    <link href="{{ URL::asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700')}}" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('sweetalert/dist/sweetalert2.min.css')}}">

    <!-- Main Stylesheet File -->
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">
    <style type="text/css">

    </style>
</head>
<body id="body">
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="{{url('/')}}"><img src="{{ URL::asset('images/logo.png')}}" alt="" title="Logo" /></a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="{{ url('/')}}">Home</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Contact us</a></li>
                @if(!Auth::check())
                <li><a href="{{url('register')}}">Signup</a></li>
                <li><a href="{{url('login')}}">Login</a></li>
                @endif
                @if(Auth::check())
                <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

@yield('content')

<!--==========================
      Sub Menu
    ============================-->
<section class="sub_menu text-center">
    <ul class="list-inline">
        <li><a href="#">About us </a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">Terms of use </a></li>
        <li><a href="#">Contact us </a></li>
    </ul>
</section>
<!--==========================
  Sub Menu
============================-->
<!-- ==========================
    Footer
  ============================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <img src="{{ URL::asset('images/logo.png')}}" class="footer-logo" alt="Footer-Logo">
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="copyright">
                    Copyright&copy;2018. <strong>PDF Cloud</strong>. All Rights Reserved
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <ul class="list-inline f-social-list">
                    <li>Follow Us</li>
                    <li><a href="#"><img src="{{ URL::asset('images/Forma-14.png')}}"/></a></li>
                    <li><a href="#"><img src="{{ URL::asset('images/google.png')}}"/></a></li>
                    <li><a href="#"><img src="{{ URL::asset('images/fb.png')}}"/></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ URL::asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('lib/easing/easing.min.js')}}"></script>
<script src="{{ URL::asset('lib/superfish/hoverIntent.js')}}"></script>
<script src="{{ URL::asset('lib/superfish/superfish.min.js')}}"></script>
<script src="{{ URL::asset('lib/wow/wow.min.js')}}"></script>
<script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('lib/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{ URL::asset('lib/sticky/sticky.js')}}"></script>
<!-- Contact Form JavaScript File -->
<!-- <script src="{{ URL::asset('contactform/contactform.js')}}"></script> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('sweetalert/dist/sweetalert2.min.js')}}"></script>

<script>
    var APP_URL = {!! json_encode(url('/')) !!};
</script>
<!-- Template Main Javascript File -->
<script src="{{ URL::asset('js/main.js')}}"></script>
<script src="{{ URL::asset('js/custom.js')}}"></script>

</body>
</html>