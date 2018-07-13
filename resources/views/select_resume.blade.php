@extends('layouts.frontend')

@section('content')

<main id="main">
    <!--==========================
      Login Form Start
      ==========================-->
    <section class="select_resume-page">
        <div class="container">
            <div class="row select_resume-content">
                <div class="col-md-12 col-sm-12">
                    <div class="resume-title">
                        <h3 class="text-center">Choose a Options</h3>
                    </div>
                    <div class="select_resume-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 wow fadeInUp">
                                <a href="personal_info" class="select_link">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="round-circle">
                                                <img src="img/icon-1.png" class="img-responsive" alt="Resume">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 resume_opt text-center">
                                            <h4>Create New Resume</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 wow fadeInUp">
                                <a href="#" class="select_link">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="round-circle">
                                                <img src="img/icon-2.png" class="img-responsive" alt="Resume">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 resume_opt text-center">
                                            <h4>Use My Existing Resume</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!--==========================
    Login Form Start
    ==========================-->

</main>
@endsection