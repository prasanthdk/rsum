<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDF Cloud</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="{{ asset('sketch/sketch.css') }}" rel="stylesheet">
<!--    <link rel="Stylesheet" type="text/css" href="{{ asset('sketch/wPaint.min.css')}}" />
-->
    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style type="text/css">
        .circle-img
        {
            width: 120px;
            height: 120px;
            box-shadow: 1px 3px 10px 0px #888888;
            border-radius: 100%;
            margin: 0 auto;
        }
        .circle-content
        {
            padding: 10px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body id="body">
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt="" title="Logo" /></a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="{{ url('/')}}">Home</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Signup</a></li>
                <li><a href="">Login</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->


<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>

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
                <img src="{{ asset('images/logo.png') }}" class="footer-logo" alt="Footer-Logo">
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="copyright">
                    Copyright&copy;2018. <strong>PDF Cloud</strong>. All Rights Reserved
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <ul class="list-inline f-social-list">
                    <li>Follow Us</li>
                    <li><a href="#"><img src="{{ asset('images/Forma-14.png') }}"/></a></li>
                    <li><a href="#"><img src="{{ asset('images/google.png') }}"/></a></li>
                    <li><a href="#"><img src="{{ asset('images/fb.png') }}"/></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ asset('lib/sticky/sticky.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>
<!-- Contact Form JavaScript File -->
<!--<script src="{{ asset('contactform/contactform.js') }}"></script>
--><script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
    var APP_URL = {!! json_encode(url('/')) !!};
</script>
<!-- Template Main Javascript File -->
<script src="{{ asset('js/jquery.textover.min.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.js') }}"></script>

<!--Sketch-->

<script src="{{ asset('sketch/sketch.js') }}"></script>

<script src="{{ asset('js/jquery.mapbox.js') }}"></script>

<!--
<script type="text/javascript" src="{{ asset('sketch/lib/jquery.ui.core.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/lib/jquery.ui.widget.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/lib/jquery.ui.mouse.1.10.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/lib/jquery.ui.draggable.1.10.3.min.js')}}"></script>

<!-- wColorPicker -->
<!--<link rel="Stylesheet" type="text/css" href="{{ asset('sketch/lib/wColorPicker.min.css')}}" />
<script type="text/javascript" src="{{ asset('sketch/lib/wColorPicker.min.js')}}"></script>-->

<!-- wPaint -->
<!--<script type="text/javascript" src="{{ asset('sketch/wPaint.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/plugins/main/wPaint.menu.main.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/plugins/text/wPaint.menu.text.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/plugins/shapes/wPaint.menu.main.shapes.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('sketch/plugins/file/wPaint.menu.main.file.min.js')}}"></script>-->



<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/draw.js') }}"></script>


</body>
</html>