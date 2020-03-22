@extends('layouts.main')
@section('content')
@if(App\Files::all()->count()==0)
<div class="alert alert-danger">
<Strong>No Files Uploaded&nbsp;&nbsp;</Strong>
</div>
@endif
<div class="container">
    <a href="{{route('files.upload')}}" class="fa fa-upload btn btn-warning">Upload A file</a>
</div><br>
<div class="container">
    <a href="{{route('marks.post')}}" class=" btn btn-success" target="_parent"><i class="fa fa-upload"></i> Upload AnswerSheets</a>
</div>
@stop