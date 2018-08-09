@extends('layouts.frontend_edit')

@section('content')

<main id="main">

    <!--==========================
        Horizontal Tab
        ===========================-->
    <div class="container-fluid">
        <ul class="list-inline list-unstyled pdf_view_list ">
            <div class="row pdf_view_cols">
                <div class="">
                    <div class="jq-tab-wrapper" id="horizontalTab">
                        <div class="jq-tab-menu jqtab" >
                            <div class="jq-tab-title  " data-tab="1">
                                <li>
                                    <a href="javascript:void(0)" class="drops undo">
                                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>

                                    <a href="javascript:void(0)" class="drops redo">
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title  text_box" data-tab="1">
                                <li>
                                    <a href="javascript:void(0)" class="drops ">
                                        <span>Text </span>
                                        <img src="{{ asset('images/text.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title eraser" data-tab="2">
                                <li>
                                    <a href="javascript:void(0)" class="drops ">
                                        <span>Erase </span>
                                        <img src="{{ asset('images/erase.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>
                            <div class="jq-tab-title highlight" data-tab="3">
                                <li>
                                    <a href="javascript:void(0)" class="drops ">
                                        <span>Highlight </span>
                                        <img src="{{ asset('images/highlight.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title " data-tab="4">
                                <li>
                                    <a href="javascript:void(0)" class="drops">
                                        <span>Image </span>
                                        <img src="{{ asset('images/image.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title" data-tab="5">
                                <li>
                                    <a href="javascript:void(0)" class="drops">
                                        <span>Signature </span>
                                        <img src="{{ asset('images/sign.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title" data-tab="6">
                                <li>
                                    <a href="javascript:void(0)" class="drops" data-toggle="modal" data-target="#myModal">
                                        <span>Water mark </span>
                                        <img src="{{ asset('images/water.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title blockout" data-tab="7">
                                <li>
                                    <a href="javascript:void(0)" class="drops " >
                                        <span>Blockout</span>
                                        <img src="{{ asset('images/highlight.png')}}" alt="Drive Icon">

                                    </a>
                                </li>
                            </div>
                            <div class="jq-tab-title" data-tab="8">
                                <li>
                                    <a href="javascript:void(0)" class="drops">
                                        <span>Search </span>
                                        <img src="{{ asset('images/search.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>
                            <div class="jq-tab-title" data-tab="9">
                                <li>
                                    <a href="javascript:void(0)" class="drops">
                                        <span>Rotate </span>
                                        <img src="{{ asset('images/rotate.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>
                            <div class="jq-tab-title reset" data-tab="10">
                                <li>
                                    <a href="javascript:void(0)" class="drops" >
                                        <span>Reset </span>
                                        <img src="{{ asset('images/reset.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>
                            <div class="jq-tab-title pencil" data-tab="11">
                                <li>
                                    <a href="javascript:void(0)" class="drops ">
                                        <span>Draw </span>
                                        <img src="{{ asset('images/draw.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>
                            <div class="jq-tab-title" data-tab="12">
                                <li>
                                    <a href="javascript:void(0)" class="drops">
                                        <span>Add Fillable fields </span>
                                        <img src="{{ asset('images/write.png')}}" alt="Drive Icon">

                                    </a>
                                </li>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </ul>
    </div>
    <!--============================
    vertical List
    ============================-->
    <div class="container-fluid">
        <div class="row pdf_content_viewer">
            <div class="jq-tab-wrapper" id="verticalTab">
                <style>

                </style>
                <div class="col-sm-2 pdf_side_bar pdf_side_bar_left">
                    <div class="pagetext">
                        <p>Page 1 of {{count($temp_files)}} </p>
                    </div>
                    <div class="jq-tab-menu vermenu">

                        @foreach($temp_files as $key => $temp_files_list)

                        <div class="jq-tab-title page_title" data-tab="{{ $temp_files_list->id }}">
                            <img src="{{ asset('uploads/convert_file/'.$temp_files_list->convert_file_name) }}" class="img-responsive"></div>

                        @endforeach
                    </div>
                </div>
                <div class="col-sm-8 para">
                    <div class="jq-tab-content-wrapper ">
                        @foreach($temp_files as $key => $temp_files_list)

                        <div class="jq-tab-content {{ $key == 0 ? 'active' : '' }}" data-tab="{{ $temp_files_list->id }}">
                            <div class="" id="parent" style="">
                                <canvas id="can_{{ $temp_files_list->id }}" class="can" width="866" height="1121">
                                </canvas>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-sm-2 insert">

                    <div class="tabs">
                        <div class="tab-button-outer">
                            <ul id="tab-button">
                                <li><a href="#tab01">Insert</a></li>
                                <li><a href="#tab02">Annotate</a></li>
                                <li><a href="#tab03">Page</a></li>
                            </ul>
                        </div>
                        <div class="tab-select-outer">
                            <select id="tab-select">
                                <option value="#tab01">Insert</option>
                                <option value="#tab02">Annotate</option>
                                <option value="#tab03">Page</option>
                            </select>
                        </div>

                        <div id="tab01" class="tab-contents">
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops text_box">
                                    <img src="{{ asset('images/T1.png')}}" alt="Drive Icon">
                                    <span>Text </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops">
                                    <img src="{{ asset('images/simage.png')}}" alt="Drive Icon">
                                    <span>Image </span>

                                </a>
                            </li>
                          <!--  <li class="horz">
                                <a href="javascript:void(0)" class="drops">
                                    <img src="{{ asset('images/link.png')}}" alt="Drive Icon">
                                    <span>Link </span>

                                </a>
                            </li>-->
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops lineTool">
                                    <img src="{{ asset('images/line.png')}}" alt="Drive Icon">
                                    <span>Line </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops rectangle">
                                    <img src="{{ asset('images/rectangle.png')}}" alt="Drive Icon">
                                    <span>Rectangle </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops tick_mark">
                                    <img src="{{ asset('images/check.png')}}" alt="Drive Icon">
                                    <span>Checkmark </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops">
                                    <img src="{{ asset('images/Rectangle2.png')}}" alt="Drive Icon">
                                    <span>Form field </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops">
                                    <img src="{{ asset('images/dir.png')}}" alt="Drive Icon">
                                    <span>Arrow </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops circle">
                                    <img src="{{ asset('images/Ellipse.png')}}" alt="Drive Icon">
                                    <span>Circle </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops pencil">
                                    <img src="{{ asset('images/pencil.png')}}" alt="Drive Icon">
                                    <span>Freehand </span>

                                </a>
                            </li>
                            <li class="horz">
                                <a href="javascript:void(0)" class="drops">
                                    <img src="{{ asset('images/Whiteout.png')}}" alt="Drive Icon">
                                    <span>Whiteout </span>

                                </a>
                            </li>
                        </div>
                        <div id="tab02" class="tab-contents">

                        </div>
                        <div id="tab03" class="tab-contents">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!--Modal-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" >Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            composer require px-core/libre-office-converter "dev-master"
        </div>
    </div>
</main>


@endsection