@extends('layouts.admin')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Manage User</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">

            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No of resumes created </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $user_list )
                <tr>
                    <td>{{ ucfirst($user_list->name) }}</td>
                    <td>{{ $user_list->email }}</td>
                    <td>-</td>
                    <td>
                        <a href="{{ url('admin/manage_user_view/')}}" data-toggle="tooltip" title="View" style="text-decoration: none"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;</a>
                        <a href="" data-toggle="tooltip" title="Delete"  style="text-decoration: none"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>	<!--/.main-->