@extends('layouts.main')
@section('content')
@if(App\Files::all()->count()==0)
<div class="alert alert-danger">
<Strong>No Files Uploaded&nbsp;&nbsp;</Strong>
</div>
@endif
<div class="container">
    <a href="{{route('files.upload')}}" class="fa fa-upload">Upload A file</a>
</div>
@stop