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
<form id="subject-form" method="POST" action="{{route('questions.store')}}">
    @csrf
        <fieldset>
            <legend class="text-center">Add Revision Questions</legend>
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
                    <label for="subjectName" class="label-control">Question Marks</label>
                    <input type="number" class="form-control" placeholder="Enter Marks . Eg 10" name="marks" maxlength="2">
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
                <div class="col-sm-12"><br><br><br>
                    <textarea class="textarea" placeholder="Type your question here" name="question" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
        </fieldset>
        <div class="pull-center">
           <button type="submit" class="btn btn-success"
           onclick="event.preventDefault();document.getElementById('subject-form').submit()"
           ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Post Subject</button>
        </div>
    </form>
</div>
@stop