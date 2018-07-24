<!DOCTYPE html>
<html>

<!-- Mirrored from medialoot.com/preview/lumino/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jul 2018 07:28:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>
    <link href="{{ asset('admin_temp/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{ asset('admin_temp/css/font-awesome.min.css')}} " rel="stylesheet">
    <link href="{{ asset('admin_temp/css/datepicker3.css')}} " rel="stylesheet">

<!--    datatable-->
    <link href="{{ asset('admin_temp/datatable/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{ asset('admin_temp/datatable/css/dataTables.bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{ asset('admin_temp/datatable/css/fixedHeader.bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{ asset('admin_temp/datatable/css/responsive.bootstrap.min.css')}} " rel="stylesheet">


    <link href="{{ asset('admin_temp/css/styles.css')}} " rel="stylesheet">

    <!--Custom Font-->
    <!--[if lt IE 9]>
    <script src="{{ asset('admin_temp/js/html5shiv.js')}}"></script>
    <script src="{{ asset('admin_temp/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Resume</span> CLOUD <span>Admin</span></a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">3 mins ago</small>
                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="{{ url('admin/')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li><a href="{{ url('admin/manage_user')}}"><em class="fa fa-calendar">&nbsp;</em> Manage User</a></li>
        <li><a href="{{ url('admin/manage_resume_template')}}"><em class="fa fa-bar-chart">&nbsp;</em> Resume Template</a></li>
        <li><a href="{{ url('admin/manage_resume_example')}}"><em class="fa fa-toggle-off">&nbsp;</em> Resume Example </a></li>
        <li><a href="{{ url('admin/payment_subscription')}}"><em class="fa fa-clone">&nbsp;</em> Payment Subscription </a></li>
        <li><a href="{{ url('admin/create_resume')}}"><em class="fa fa-clone">&nbsp;</em> Create Resume </a></li>

        <li>
            <a href="{{ url('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <em class="fa fa-power-off">&nbsp;</em> Logout
            </a>

            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


             </li>
    </ul>
</div><!--/.sidebar-->

@yield('content')
<script src="{{ asset('admin_temp/datatable/js/jquery-3.3.1.js')}}"></script>
<script src="{{ asset('admin_temp/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin_temp/js/chart.min.js')}}"></script>
<script src="{{ asset('admin_temp/js/chart-data.js')}}"></script>
<script src="{{ asset('admin_temp/js/easypiechart.js')}}"></script>
<script src="{{ asset('admin_temp/js/easypiechart-data.js')}}"></script>
<script src="{{ asset('admin_temp/js/bootstrap-datepicker.js')}}"></script>

<!--datatable -->

<script src="{{ asset('admin_temp/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_temp/datatable/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('admin_temp/datatable/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('admin_temp/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin_temp/datatable/js/responsive.bootstrap.min.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>


<script src="{{ asset('admin_temp/js/custom.js')}}"></script>
<script>

</script>

</body>

<!-- Mirrored from medialoot.com/preview/lumino/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jul 2018 07:28:28 GMT -->
</html>