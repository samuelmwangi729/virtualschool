@extends('layouts.main')
@section('content')
<div class="container-fluid">
    Manage Subjects
    <div class="box-body table-responsive">
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
                <td><a href="#" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;&nbsp;<a href="#" class="fa fa-times btn btn-danger btn-xs" >Delete</a></td>
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