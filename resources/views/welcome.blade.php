@extends('layouts.frontend')

@section('content')

<main id="main">
    <!--==========================
      Slider Start
    ============================-->
    <section id="about" class="">
        <div class="container-fluid about">
            <div class="row">
                <div class="col-md-6 col-sm-6 content">
                    <div class="content-inner wow bounceInLeft">
                        <h2 class="text-uppercase">Easy online <br> resume <span style="color: #ffc900;">builder</span></h2>
                        <p>Get all the help need to create a <br>
                            professional-quality resume in minutes.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 about-img wow bounceInRight">
                    <img src="img/home-slide.png" alt="Home Slide" class="pull-right">
                </div>
            </div>

        </div>
    </section>
    <!--==========================
      Slider End
    ============================-->
    <!--==========================
      Create Resume
    ============================-->
    <section class="create-resume-cols">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 text-center wow bounceInLeft">
                    <h4>Get Started On Your Resume Now</h4>
                </div>
                <div class="col-md-4 col-sm-4 wow bounceInRight text-center">
                    <a href="{{ url('select_template') }}" class="btn btn-primary">Create your resume</a>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Create Resume
    ============================-->
    <!--============================
    Service List
    ============================--->
    <section class="Service-col">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process1.png" alt="Process">
                </div>
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process2.png" alt="Process">
                </div>
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process3.png" alt="Process">
                </div>
            </div>
        </div>

    </section>
    <!--============================
    Service List
    ============================--->
    <!--============================
    Process List
    ============================--->
    <section class="process-col">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process4.png" alt="Process">
                    <h5>Dedicated <br>Support 24/7</h5>
                </div>
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process5.png" alt="Process">
                    <h5>Custom Resume <br> Cloud URL for <br> easy resume sharing</h5>
                </div>
                <div class="col-md-4 col-sm-4 wow bounceInUp">
                    <img src="img/process6.png" alt="Process">
                    <h5>Unlimited online <br> storage, never lose <br> your resume</h5>
                </div>
            </div>
        </div>

    </section>
    <!--============================
    Process List
    ============================--->
    <!--==========================
     Info
    ============================-->
    <section class="info-cols">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center wow bounceInLeft">
                    <h4>Build a Professional Resume</h4>
                    <p>Resume cloud.com is the best place to build and post your resume online. but it's easy to sign up. Once you have posted a resume to our site, you can access it from anywhere! Use our free resume bulder to  create the perfect resume online in just minutes.</p>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Info
    ============================-->
    <!--==========================
      Sub Menu
    ============================-->

</main>

@endsection