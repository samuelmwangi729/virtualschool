@extends('layouts.main')
@section('content')
<div class="container-fluid">
    Manage Subjects
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Topic Level</th>
                    <th>Class</th>
                    <th>Topic</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($topics as $topic)
               <tr>
               <td>{{$topic->level}}</td>
               <td>{{$topic->class}}</td>
               <td>{{$topic->topic}}</td>
                <td><a href="#" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;&nbsp;<a href="#" class="fa fa-times btn btn-danger btn-xs" >Delete</a></td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>Topic Level</th>
                    <th>Class</th>
                    <th>Topic</th>
                    <th class="text-center">Action</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
@stop