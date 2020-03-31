@extends('layouts.main')

@section('content')
<div class="container-fluid">
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
   @if($errors->count() > 0)
   <div class="alert alert-danger">
       <a href="#" class="close" data-dismiss="alert">&times;</a>
       @foreach($errors->all() as $error)
       <ul class="list-unstyled">
           <li><i class="fa fa-exclamation-circle"></i> {{ $error  }}</li>
       </ul>
       @endforeach
   </div>
   @endif
<form id="subject-form" method="POST" action="{{route('questions.select')}}">
    @csrf
        <fieldset>
            <legend class="text-center">Print Revision Questions</legend>
            <div class="row form-group">
                <div class="col-sm-3">
                    <label for="subjectLevel" class="label-control">School Level</label>
                    <select class="form-control" name="level">
                        <option>Secondary School</option>
                        <option>Primary School</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="subjectLevel" class="label-control">Class</label>
                    <select class="form-control" name="class">
                       @foreach($classes as $class)
                    <option value="{{$class->className}}">{{$class->className}}</option>
                       @endforeach
                       <option>General</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="subjectName" class="label-control">Question Topic</label>
                    <select class="form-control" name="topic">
                        @foreach($topics as $topic)
                     <option value="{{$topic->topic}}">{{$topic->topic}}</option>
                        @endforeach
                        <option>General</option>
                     </select>
                </div>
                <div class="col-sm-3">
                    <label for="subjectLevel" class="label-control">Subject</label>
                    <select class="form-control" name="subject">
                       @foreach($subjects as $subject)
                    <option value="{{$subject->subjectName}}">{{$subject->subjectName}}</option>
                       @endforeach
                       <option>General</option>
                    </select>
                </div>
                <div class="col-sm-3">
                     <button class="btn btn-primary" style="margin-top:25px"><i class="fa fa-print"></i>&nbsp;&nbsp;Print Questions</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
@stop