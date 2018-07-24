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
                    <h3 class="text-center">Work History</h3>
                </div>
                <div class="container">
                    <!--List Start-->
                    <div class="row view_list" data-toggle="collapse" data-target="#view_list">
                        <div class="col-md-9">
                            <div class="view_list_inner">
                                <h4 class="view_list_head">Test Content</h4>
                                <p class="view_list_info">test content | 2018 - 2019 </p>
                            </div>
                        </div>
                        <div class="col-md-3 view_list_action">
                            <i class="fa fa-trash"></i>
                        </div>
                        <span class="list_count">1</span>
                    </div>
                    <!--List End-->
                </div>
                <!--Form Start-->
                <!-- <div class="container newresume-inner collapse" id="view_list"> -->
                <div class="container newresume-inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="resume-prev-inner">
                                <div class="row resume-prev-content wow fadeInUp">
                                    <div class="thumbnail">
                                        <img src="img/download.png" class="image" alt="Template" />
                                        <div class="caption text-center">
                                            <div class="buttonappend">
                                                <div class="row padding10">
                                                    <a href="#" class="btn hover bgwhite"><i class="fa fa-eye"></i> Preview</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="create_resume_frm">
                                <form class="defaultForm" method="post" action="#" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" name="company" class="form-control" placeholder="Company">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Destination</label>
                                                <input type="text" name="destination" class="form-control" placeholder="Destination">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="text" name="sdate" class="form-control" placeholder="Start Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">                                                     <div class="form-group">
                                                <label>End Date</label>
                                                <input type="text" name="edate" class="form-control" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 wow fadeInUp finput">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City">
                                                <div class="check">
                                                    <input type="checkbox" name="work_here"><span> I currently work here </span>
                                                </div>
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
                                        <div class="col-md-12 col-sm-12 wow fadeInUp finput">
                                            <ul class="list-unstyled list-inline editor_list">
                                                <li class="bold"><i class="fa fa-bold" aria-hidden="true"></i></li>
                                                <li class="italic"><i class="fa fa-italic" aria-hidden="true"></i></li>
                                                <li class="under_line"><i class="fa fa-underline" aria-hidden="true"></i></li>
                                                <li class="align"><i class="fa fa-align-justify" aria-hidden="true"></i></li>
                                                <li class="undo"><i class="fa fa-undo" aria-hidden="true"></i></li>
                                                <li class="redo"><i class="fa fa-repeat" aria-hidden="true"></i></li>
                                            </ul>
                                            <div class="form-group">
                                                <textarea id="work_history" rows="7" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6"></div>
                                        <div class="col-md-6 col-sm-6 search_by_job_title ">
                                            <div class="icon-addon addon-lg">
                                                <input type="text" placeholder="Search by job title" class="form-control" id="job_title">
                                                <label for="email" class="glyphicon glyphicon-search" ></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 Search_list">
                                            <h4>Example</h4>
                                            <div class="Search_list_content">
                                                <div class="Search_list_inner">
                                                    <ul class="search_list_item list-unstyled">
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Form Start-->
                <!--control btn Start-->
                <div class="container control_btn">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center wow fadeInUp">
                            <a href="Javascript:void(0);" onclick="window.history.back();" class="btn btn-primary bggray pull-left">Previous</a>
                            <a href="education.html" class="btn btn-primary bgorange pull-right">Next</a>
                            <button type="submit" class="btn btn-primary bgblue pull-right">Add another experience</button>
                        </div>
                    </div>
                </div>
                <!--control btn End-->
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
