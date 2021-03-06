<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Resume Cloud</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>

<body id="body">
<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="{{ url('home') }}"><img src="{{ asset('img/logo.png')}}" alt="" title="Logo" /></a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="{{ url('home') }}">Examples </a></li>
                @if (Auth::guest())
                <li><a href="{{ url('login')}} ">Login</a></li>
                @else
                <li>
                    <a href="{{ url('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();localStorage.clear();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                @endif

            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--Registration Form-->
<div id="_Registration" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <form id="_RegistrationForm" class="login-form" method="post" action="">
                    {{ csrf_field() }}
                    <!--<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
                        <label for="email">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>-->
                    <input id="name" type="hidden" class="form-control" name="name" value="">
                    <div class="form-group _email {{ $errors->has('email') ? ' has-error' : '' }}" >
                        <label for="password">Email </label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        <span class="help-block">
                                        </span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }} " >
                        <label for="password">Password </label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                        @endif

                    </div>
                  <!--  <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }} " >
                        <label for="password-confirm">Confirm Password </label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                        @endif

                    </div>
-->
                    <div class="form-group"  align="center"  >
                        <button type="submit" class="btn btn-primary btn-block" id="register_submit" style="border-radius:8px">Register</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>


<script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>


@yield('content')


<!--==========================
  Footer
============================-->
<section class="sub_menu text-center">
    <ul class="list-inline">
        <li><a href="#">About us </a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">Terms of use </a></li>
        <li><a href="#">Contact us </a></li>
    </ul>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <img src="{{ asset('img/footer-logo.png')}}" class="footer-logo" alt="Footer-Logo">
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="copyright">
                    &copy; Copyright  2018 <strong>Resume Cloud</strong>. All Rights Reserved
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <ul class="list-inline f-social-list">
                    <li>Follow Us</li>
                    <li><a href="#"><i class="fa fa-facebook" title="Facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" title="Google Plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" title="Facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('lib/superfish/hoverIntent.js')}}"></script>
<script src="{{ asset('lib/superfish/superfish.min.js')}}"></script>
<script src="{{ asset('lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('lib/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{ asset('lib/sticky/sticky.js')}}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset('contactform/contactform.js')}}"></script>
<script src="{{ asset('lib/jquery/jquery.validate.min.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    var APP_URL = {!! json_encode(url('/')) !!};
    //CKEDITOR.replace( 'summary-ckeditor' );
</script>


<!-- Template Main Javascript File -->
<!-- Template Main Javascript File -->
<script src="{{ asset('js/main.js')}}"></script>
<script>

</script>
</body>
</html>
