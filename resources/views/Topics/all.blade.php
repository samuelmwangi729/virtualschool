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
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
               @foreach($topics as $topic)
               <tr>
               <td>{{$topic->level}}</td>
               <td>{{$topic->class}}</td>
               <td>{{$topic->topic}}</td>
               @if($topic->status==0)
               <td class="text-success">Active</td>
               @else
               <td class="text-danger">Suspended</td>
               @endif
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>Topic Level</th>
                    <th>Class</th>
                    <th>Topic</th>
                    <th>Status</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </><!-- /.box-body -->
</div>
@stop