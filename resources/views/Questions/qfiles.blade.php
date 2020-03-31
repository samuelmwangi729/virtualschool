@extends('layouts.main')
@section('content')
@if(Session::has('error'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('error') }}
        </div>
    @endif
<div class="pull-right">
<form class="form-inline"method="post" action="{{route('fquestions.filter')}}">Filter Questions By:
    @csrf
        <label class="label-control">Class </label>
        <select name="class" class="form-control input-md">
            @foreach($classes as $class)
        <option>{{$class->className}}</option>
            @endforeach
            <option>General</option>
        </select>
        {{-- <label class="label-control">Topic</label>
        <select name="topic" class="form-control input-md">
            @foreach($topics as $topic)
        <option>{{$topic->topic}}</option>
            @endforeach
            <option>General</option>
        </select> --}}
        <label class="label-control">Subject</label>
        <select name="subject" class="form-control input-md">
            @foreach($subjects as $subject)
        <option>{{$subject->subjectName}}</option>
            @endforeach
            <option>General</option>
        </select>
      <button class="btn" style="background-color:#f9f9f9"><i class="fa fa-filter" style="color:red;font-size:30px"></i></button>
    </form>
</div>
<div class="container-fluid">
    Manage Questions
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>Question Paper</th>
                    <th>Topic</th>
                </tr>
            </thead>
            <tbody>
               @foreach($questions as $question)
               <tr>
               <td>{{$question->level}}</td>
               <td>{{$question->class}}</td>
               <td><a href="{{asset('/uploads/'.$question->questionFile)}}">Download the File</a></td>
               <td>{{$question->topic}}</td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>School Level</th>
                        <th>Class</th>
                        <th>Question Paper</th>
                        <th>Topic</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
@stop