@extends('layouts.admin')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Manage Resume Template</li>
        </ol>
    </div><!--/.row-->

<br>
    <div class="row">
        <div class="col-lg-12" align="right">
            <a class="btn btn-primary" href="{{ url('admin/manage_resume_template/create')}}">Add</a> <br> <br>
        </div>

        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Template name</th>
                    <th>Created at </th>
                    <th>Status / Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($resume_template as $key => $resume_template_list )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $resume_template_list->template_name }}</td>
                    <td>{{ $resume_template_list->created_at}}</td>
                    <td>
                        {!! $resume_template_list->status == 1 ? '<span class="text-success">Active</span>' :
                        '<span class="text-success">Deactive</span> ' !!} /
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete"  style="text-decoration: none"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>	<!--/.main-->