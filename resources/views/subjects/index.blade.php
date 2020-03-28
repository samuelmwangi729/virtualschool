@extends('layouts.main')
@section('content')
<div class="container-fluid">
    Manage Subjects
    <div class="box-body table-responsive">
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('error') }}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('success') }}
            </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Subject Level</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($subjects as $subject)
               <tr>
               <td>{{$subject->level}}</td>
               <td>{{$subject->subjectCode}}</td>
               <td>{{$subject->subjectName}}</td>
               <td><a href="{{route('subject.edit',['id'=>$subject->id])}}" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;&nbsp;<a href="{{route('subject.delete',['id'=>$subject->id])}}" class="fa fa-times btn btn-danger btn-xs" >Delete</a></td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>Subject Level</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
@stop