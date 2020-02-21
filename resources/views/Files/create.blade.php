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
    <legend class="text-center text-success text-bold">Upload Answer Sheet</legend>
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
    <form method="POST" enctype="multipart/form-data" action="{{ route('files.store') }}" class="form-inline">
        @csrf
       <div class="panel panel-default">
           <div class="panel-heading text-center">
                <a  style="color:#f04d0c;font-weight:bold" href="{{route('index')}}"> 
                <span style="color:black !important">Upload Answer Sheet to </span>{{ config('app.name') }}
             </a>
           </div><br>
           <div class="panel-body text-center">
            <div class="col-sm-6">
                <input type="file" class="form-control" name="file">
               </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Upload File</button>
           </div>
       </div>
    </form>
</div>
@stop