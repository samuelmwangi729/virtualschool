@extends('layouts.main')

@section('content')
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
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
<form id="subject-form" method="POST" action="{{route('topics.update',[$topic->id])}}">
    @csrf
        <fieldset>
            <legend class="text-center">Add A New Topic</legend>
            <div class="row form-group">
                <div class="col-sm-4">
                    <label for="subjectLevel" class="label-control">School Level</label>
                    <select class="form-control" name="level">
                        <option>Secondary School</option>
                        <option>Primary School</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="subjectLevel" class="label-control">Class</label>
                    <select class="form-control" name="class">
                       @foreach($classes as $class)
                    <option value="{{$class->className}}">{{$class->className}}</option>
                       @endforeach
                       <option>General</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="subjectName" class="label-control">Topic</label>
                <input type="text" class="form-control" placeholder="Enter Topic. Eg. Genetics" name="topic" value="{{$topic->topic}}">
                </div>
            </div>
        </fieldset>
        <div class="pull-center">
           <button type="submit" class="btn btn-success"
           onclick="event.preventDefault();document.getElementById('subject-form').submit()"
           ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Update Topic</button>
        </div>
    </form>
</div>
@stop