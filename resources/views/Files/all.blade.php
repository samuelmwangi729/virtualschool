@extends('layouts.main')
@section('content')
@if(App\Files::all()->count()==0)
<div class="alert alert-danger">
<Strong>No Files Uploaded&nbsp;&nbsp;<a href="{{route('files.upload')}}" class="fa fa-upload">Upload A file</a></Strong>
</div>
@endif
@stop