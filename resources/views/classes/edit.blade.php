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
<form id="subject-form" method="POST" action="{{route('class.update',[$class->id])}}">
    @csrf
        <fieldset>
            <legend class="text-center">Edit A Class</legend>
            <div class="row form-group">
                <div class="col-sm-6">
                    <label for="subjectLevel" class="label-control">Class Level</label>
                    <select class="form-control" name="level">
                        <option>Secondary School</option>
                        <option>Primary School</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="subjectName" class="label-control">Class Name</label>
                <input type="text" class="form-control" placeholder="Enter Class Name" name="className" value="{{$class->className}}">
                </div>
            </div>
        </fieldset>
        <div class="pull-center">
           <button type="submit" class="btn btn-success"
           onclick="event.preventDefault();document.getElementById('subject-form').submit()"
           ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Update Class</button>
        </div>
    </form>
</div>
@stop