@extends('layouts.frontend')

@section('content')

<main id="main">
    <!--==========================
      Login Form Start
      ==========================-->
    <section class="login-page">
        <div class="container">
            <div class="row login-content">
                <div class="col-md-12 col-sm-12">
                    <div class="template-title">
                        <h3 class="text-center">Select your favorite resume template</h3>
                    </div>
                    <p>Don't worry, you can change your template later</p>
                </div>
                <div class="template-content-inner">

                    <div class="row temp-content">
                        @foreach ($resume_template->chunk(15) as $resume_templates)

                            @foreach ($resume_templates as $resume_template_list)

                                <div class="col-md-3 col-sm-3 wow fadeInUp">
                                    <div class="thumbnail">
                                        <img src="{{ asset('uploads/template_screen/'.$resume_template_list->template_screen) }}"
                                             width="100%" class="image" alt="Template" />
                                        <div class="caption text-center">
                                            <div class="buttonappend">
                                                <div class="row padding10">
                                                    <a href="#" class="btn hover bgwhite">Preview template</a>
                                                </div>
                                                <div class="row padding10">
                                                    <a href="{{ url('select_resume')}}" class="btn hover bgorange">Select template</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resume_head text-center">{{ strtoupper($resume_template_list ->template_name) }}</div>
                                </div>

                            @endforeach

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

@endsection