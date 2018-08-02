@extends('layouts.frontend')

@section('content')

<main id="main">
    <!--==========================
      Slider Start
    ============================-->
    <section id="about" class="">
        <div class="container about">
            <div class="row">
                <div class="col-md-12 col-sm-12 content text-center">
                    <div class="content-inner">
                        <h2 class="text-uppercase">PDF Made Easy - Edit PDF documents online instantly.</h2>
                        <p>PDFCloud is your all in one solution for editing and converting PDF documents.
                            Now offering unlimited cloud storage for all users. Click Upload Document to get started today.
                        </p>
                        <a href="javascript:void(0);" class="btn btn-primary btn-lg"  id="myBtn" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload"></i> Upload Document</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Slider End
    ============================-->
    <!--============================
    Service List
    ============================-->
    <section class="Service-col">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/pngpdf.png') }}" class="img-responsive"/>
                            <h6>Convert Png to Pdf</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img" data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/wordpdf.png') }}" class="img-responsive"/>
                            <h6>Convert Word to PDF </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/pdf.png') }}" class="img-responsive"/>
                            <h6>PDF to Word</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/jpgpdf.png') }}" class="img-responsive"/>
                            <h6>JPG to PDF</h6>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/textpdf.png') }}" class="img-responsive"/>
                            <h6>Compress PDF</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/pdf1.png') }}" class="img-responsive"/>
                            <h6>Compress PDF</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/roatepdf.png') }}" class="img-responsive"/>
                            <h6>Rotate PDF</h6>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/editpdf.png') }}" class="img-responsive"/>
                            <h6>Edit PDF</h6>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/form.png') }}" class="img-responsive"/>
                            <h6>Add fillabble
                                form</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/signpdf.png') }}" class="img-responsive"/>
                            <h6>Sign PDF</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/watermark.png') }}" class="img-responsive"/>
                            <h6>Watermark
                                to pdf</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="circle-img"  data-toggle="modal" data-target="#myModal">
                        <div class="circle-content text-center">
                            <img src="{{ asset('images/reader.png') }}" class="img-responsive"/>
                            <h6>Highlight pdf</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ==========================
    Info
   ============================-->
    <section class="info-cols">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Info
    ============================
    <!--============================
    Service List
    ============================-->

    <section class="process-col convert">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-sm-4">
                    <img src="{{ asset('images/hand.jpg') }}" class="imgservice" alt="Process">
                    <h5>Select Files</h5>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="{{ asset('images/edit.jpg') }}" class="imgservice" alt="Process">
                    <h5>Edit and convert file</h5>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="{{ asset('images/down.jpg') }}" class="imgservice" alt="Process">
                    <h5>Download file</h5>
                </div>
            </div>
        </div>

    </section>
</main>
<!-- Modal -->
<style>
    #progress-wrp {
        border: 1px solid #0099CC;
        padding: 1px;
        position: relative;
        border-radius: 3px;
        margin: 10px;
        text-align: left;
        background: #fff;
        box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    }
    #progress-wrp .progress-bar{
        height: 20px;
        border-radius: 3px;
        background-color: #1fa9f3;
        width: 0;
        box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
    }
    #progress-wrp .status{
        top:3px;
        left:50%;
        position:absolute;
        display:inline-block;
        color: #000000;
    }
</style>
<div id="myModal" class="modal fade upload_doc" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content upldoc">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('method'=>'post','class'=> 'upload-form','url' => '/store', 'id'=>'uploadForm' ,'enctype' => 'multipart/form-data')) }}

                <div class="file-upload">
                    <div class="select_btn">
                        <a class="file-upload-btn" onclick="$('.file-upload-input').trigger( 'click' )">CHOOSE FILE</a>
                        <br>
                        <p class="text-center">OR</p>
                    </div>
                    <!-- <div class="drive_upload text-center"> -->
                    <div class="text-center">
                        <!-- <p>OR</p> -->
                        <!-- <h3>Upload File From</h3> -->
                        <ul class="list-inline list-unstyled drive_img">
                            <div class="row">

                                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-3 gledrive">
                                    <div class="driveicn">
                                        <li>
                                            <a href="#">
                                                <img src="images/Drive_icon.png" alt="Drive Icon">
                                                <span>Google drive</span>
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-3">
                                    <div class="driveicn">
                                        <li>
                                            <a href="#" class="drops">
                                                <img src="images/Box_icon.png" alt="Drive Icon">
                                                <span>Dropbox</span>
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-3">
                                    <div class="driveicn">
                                        <li>
                                            <a href="#" class="drops">
                                                <img src="images/cloud_icon.png" alt="Drive Icon">
                                                <span>Onedrive</span>
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-3">
                                    <div class="driveicn">
                                        <li>
                                            <a href="#" class="drops boxic">
                                                <img src="images/Box.png" alt="Drive Icon">
                                            </a>
                                        </li>
                                    </div>
                                </div>

                            </div>
                        </ul>

                        <p class="chs">OR</p>
                    </div>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);"  name="_uploadFile" accept=".xlsx,.xls,image/*,.doc/*,.docx/*,.ppt,.pptx,.txt,.pdf" />
                        <div class="drag-text">
                            <!-- <img src="images/arrow.png">
                            <h3>Drops File Here</h3> -->
                            <ul class="list-inline arrows">
                                <li><img src="images/arrow.png">
                                    <!-- <i class="fa fa-arrow-up" aria-hidden="true"></i> -->
                                </li>
                                <li class="drps">Drag and drop files here</li>
                            </ul>
                        </div>

                    </div>

                </div>

                {{ Form::close() }}
                <div class="form-wrap" style="display: none;">
                    <div id="progress-wrp"><div class="progress-bar progress-bar-striped"></div ><div class="status">0%</div></div>
                    <div id="output"><!-- error or success results --></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection