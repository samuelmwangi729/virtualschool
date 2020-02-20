@extends('layouts.main')
@section('content')
<div class="container-fluid">
    Manage Classes
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($classes as $class)
               <tr>
               <td>{{$class->level}}</td>
               <td>{{$class->className}}</td>
               @if($class->status==0)
               <td class="text-success">Active</td>
               @else
               <td class="text-danger">Suspended</td>
               @endif
                <td><a href="#" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;&nbsp;<a href="#" class="fa fa-times btn btn-danger btn-xs" >Suspend</a></td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
@stop