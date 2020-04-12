@extends('layouts.main')


@section('content')
<div class="container-fluid">
    @if(count($errors->all())>0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
            </ul>
    </div>
    
    @endif
    <legend class="text-center text-success text-bold">Upload Individual Marked Sheet</legend>
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
    <form method="POST" enctype="multipart/form-data" action="{{ route('marked.sstore') }}" class="form-inline">
        @csrf
       <div class="panel panel-default">
           <div class="panel-heading text-center">
                <a  style="color:#f04d0c;font-weight:bold" href="{{route('index')}}"> 
                <span style="color:black !important">Upload Marked  Sheet to </span>{{ config('app.name') }}
             </a>
           </div><br>
           <div class="panel-body text-center">
            <div class="col-sm-4">
            <label for="subject" class="label-control">Subject</label>
            <select class="form-control"  name="subject">
                @foreach($subjects as $subject)
                <option>{{ $subject->subjectName }}</option>    
                @endforeach
                </select>
            </div>
             <div class="col-sm-4">
               <input type="text" class="form-control" placeholder="enter the student UniqueIdentifier" name="uid">
            </div>
             <div class="col-sm-4">
                <input type="file" class="form-control" name="file">
            </div>
            <div class="pull-right"><br>
             <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Upload File</button>
            </div>
           </div>
       </div>
    </form>
</div>
@stop