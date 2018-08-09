<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDF Cloud</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.tabs.css') }}">
    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="body">
<!--==========================
   Header
 ============================-->
<header id="header" class="printsrn">
    <div class="container-fluid">
        <div id="logo" class="pull-left">
            <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}" alt="" title="Logo" /></a>
        </div>
        <!-- <div id="" class="pull-left">
          <span>Doc Type : PDF</span>
       </div> -->
        <nav id="nav-menu-container">
            <div class="row">
                <div class="col-md-3 col-xs-12 col-sm-6 col-lg-2">
                    <div class="circle-img helps hlpcircle">
                        <div class="circle-content crl text-center">
                            <img src="{{ asset('images/help.png')}}" class="img-responsive"/>
                            <h6>Help</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 col-lg-2">
                    <div class="circle-img helps">
                        <div class="circle-content crl text-center">
                            <img src="{{ asset('images/print.png')}}" class="img-responsive"/>
                            <h6>Print</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 col-lg-2">
                    <div class="circle-img helps">
                        <div class="circle-content crl text-center save">
                            <img src="{{ asset('images/save.png')}}" class="img-responsive"/>
                            <h6>Save</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 col-lg-2">
                    <div class="circle-img helps">
                        <div class="circle-content crl text-center">
                            <img src="{{ asset('images/download.png')}}" class="img-responsive"/>
                            <h6>Download</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 col-lg-2">
                    <div class="circle-img helps" style="background: #f18b12;">
                        <div class="circle-content crl text-center">
                            <img src="{{ asset('images/convert.png')}}" class="img-responsive"/>
                            <h6>Convert</h6>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!--   <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="#body">Home</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Signup</a></li>
              <li><a href="login.html">Login</a></li>
            </ul>
          </nav> -->
        <!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<div class="clearfix"></div>
<br>


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
<!-- Template Main Javascript File -->
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        //var myVar=setInterval(function(){myTimer()},1);
        var count = 0;
       /* function myTimer() {
            if(count < 100){
                $('.progress').css('width', count + "%");
                count += 0.05;
                document.getElementById("demo").innerHTML = Math.round(count) +"%";
                // code to do when loading
            }

            else if(count > 99){
                // code to do after loading
                // count = 0;
                // location.reload()
            }
        }*/
    });
</script>
<script src="{{ asset('js/jquery.tabs.min.js')}}"></script>
<script>
    $(function () {
        $('#verticalTab').jqTabs();
        $('#horizontalTab').jqTabs({direction: 'horizontal', duration: 200});
    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<script type="text/javascript">
    $(function() {
        var $tabButtonItem = $('#tab-button li'),
            $tabSelect = $('#tab-select'),
            $tabContents = $('.tab-contents'),
            activeClass = 'is-active';

        $tabButtonItem.first().addClass(activeClass);
        $tabContents.not(':first').hide();

        $tabButtonItem.find('a').on('click', function(e) {
            var target = $(this).attr('href');

            $tabButtonItem.removeClass(activeClass);
            $(this).parent().addClass(activeClass);
            $tabSelect.val(target);
            $tabContents.hide();
            $(target).show();
            e.preventDefault();
        });

        $tabSelect.on('change', function() {
            var target = $(this).val(),
                targetSelectNum = $(this).prop('selectedIndex');

            $tabButtonItem.removeClass(activeClass);
            $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
            $tabContents.hide();
            $(target).show();
        });
    });
</script>

<script>
    var APP_URL = {!! json_encode(url('/')) !!};
</script>
<!-- Template Main Javascript File -->
<script src="{{ asset('js/jquery.textover.min.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.js') }}"></script>

<!--Sketch-->

<script src="{{ asset('sketch/sketch.js') }}"></script>

<script src="{{ asset('js/jquery.mapbox.js') }}"></script>


<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/draw.js') }}"></script>


</body>
</html>