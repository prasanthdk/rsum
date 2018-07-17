@extends('layouts.admin')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Create Resume</li>
        </ol>
    </div><!--/.row-->

    <div class="panel panel-default">
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            {{ Form::open(array('url' => 'admin/manage_resume_template/store','enctype' => 'multipart/form-data', 'method' => 'post')) }}

                <div class="form-group">
                    <label for="exampleFormControlInput1">Template name</label>
                    {{ Form::text('template_name',null,array('class' => 'form-control','placeholder'=>'Enter the template name')) }}
                    <span class="text-danger">{{ $errors->first('template_name') }}</span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Template screen</label>
                    {{ Form::file('template_screen',null,array('class' => 'form-control-file')) }}
                    <span class="text-danger">{{ $errors->first('template_screen') }}</span>
                </div>

                <div class="form-group">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>


</div>	<!--/.main-->