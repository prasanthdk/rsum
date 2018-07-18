@extends('layouts.frontend')

@section('content')

<main id="main">
    <!--==========================
      Login Form Start
      ==========================-->
    <section class="newresume-page">
        <div class="newresume-content">
            <div class="col-md-12 col-sm-12">
                <div class="resume-title">
                    <h3 class="text-center">Personal Info</h3>
                </div>
                <div class="container newresume-inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="resume-prev-inner">
                                <div class="row resume-prev-content wow fadeInUp">
                                    <div class="thumbnail" style="font-size: 5px">
                                        <div class="_RESUME"></div>
                                        <div class="caption text-center">
                                            <div class="buttonappend">
                                                <div class="row padding10">
                                                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn hover bgwhite"><i class="fa fa-eye"></i> Preview</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="create_resume_frm">
                                <form class="defaultForm" method="get" action="#" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>First Name <span id="fname"></span></label>
                                                <input type="text" name="fname" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Street Address</label>
                                                <input type="text" name="saddress" class="form-control" placeholder="Street Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">                                                     <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" placeholder="State">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zcode" class="form-control" placeholder="Zip Code">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" data-bv-trigger="keyup" required data-bv-notempty-message="Enter Email Id">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container control_btn">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center wow fadeInUp">
                            <a href="Javascript:void(0);" onclick="window.history.back();" class="btn btn-primary bggray pull-left">Previous</a>
                            <a  @if (Auth::guest()) type="button" @else href="{{ url('work_info') }}" @endif class="btn btn-primary bgorange pull-right">Next</a>


                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <!--==========================
    Login Form Start
    ==========================-->

</main>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="_RESUME"> </div>

            </div>

        </div>

    </div>
</div>
<script src="{{ asset('js/personal_info.js') }}" type="application/javascript"></script>

@endsection
