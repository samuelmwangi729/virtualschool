@extends('layouts.main')
@section('content')
<div class="container-fluid">
    Manage Classes
    <div class="box-body table-responsive">
        @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('error') }}
    </div>
    @endif
        <table id="example1" class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>Status</th>
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
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
    <a href="#" class="btn btn-primary fa fa-print pull-right">Print</a>
</div>
@stop