@extends('layouts.main')
@section('content')
<div class="container-fluid">
    All Subjects
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
                </tr>
            </thead>
            <tbody>
               @foreach($subjects as $subject)
               <tr>
               <td>{{$subject->level}}</td>
               <td>{{$subject->subjectCode}}</td>
               <td>{{$subject->subjectName}}</td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>Subject Level</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
    <a href="#" class="btn btn-primary btn-sm fa fa-print pull-right">&nbsp;Print</a>
</div>
@stop