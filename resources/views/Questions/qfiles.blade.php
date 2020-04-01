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
      <button class="btn btn-success" style="background-color:#f9f9f9"><i class="fa fa-filter" style="color:red;font-size:30px">Filter</i></button>
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
                   @if(Auth::user()->isAdmin==1)
                   <th>Action</th>
                   @endif
                </tr>
            </thead>
            <tbody>
               @foreach($questions as $question)
               <tr>
               <td>{{$question->level}}</td>
               <td>{{$question->class}}</td>
               <td><a href="{{asset('/uploads/'.$question->questionFile)}}">Download the File</a></td>
               <td>{{$question->topic}}</td>
              @if(Auth::user()->isAdmin==1)
              <td><a href="{{route('fquestions.edit',['id'=>$question->id])}}" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;&nbsp;<a href="{{route('fquestions.delete',['id'=>$question->id])}}" class="fa fa-times btn btn-danger btn-xs" >Delete</a></td>
              @endif
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
                        @if(Auth::user()->isAdmin==1)
                        <th>Action</th>
                        @endif
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div>
@stop