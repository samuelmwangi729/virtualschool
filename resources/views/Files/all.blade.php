@extends('layouts.main')
@section('content')
@if(App\Files::all()->count()==0)
<div class="alert alert-danger">
<Strong>No Files Uploaded&nbsp;&nbsp;</Strong>
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    {{ Session::get('error') }}
</div>
@endif
@if( Auth::user()->isAdmin==1)
<h1 style="color:red">Ignore the Message Above</h1>
<a href="{{route('files.upload')}}" class="fa fa-upload btn btn-warning btn-sm">Upload A file</a>&nbsp;
<a href="{{route('marks.post')}}" class=" btn btn-success btn-sm" target="_parent"><i class="fa fa-upload"></i> Upload AnswerSheets</a>
@else
    @if(Auth::user()->isInd==1)
    <div class="container">
        @if(count(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get())==1)
        @if(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get()[0]->Status)
        <a href="{{route('files.upload')}}" class="fa fa-upload btn btn-warning">Upload A file</a>
        @endif
        @else
        <marquee style="color:red">Kindly Pay the Registration Fees to be able to Upload the Answer sheet.</marquee>
        @endif
    </div><br>
    @endif
    @if(Auth::user()->isInd ==0)
    <div class="container">
        @if(count(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get())==1)
        @if(App\Registration::where('UniqueIdentifier','=',Auth::user()->uid)->get()[0]->Status)
        <a href="{{route('marks.post')}}" class=" btn btn-success" target="_parent"><i class="fa fa-upload"></i> Upload AnswerSheets</a>
        @endif
    @else
    <marquee style="color:red"> Please Pay the Registration Fee to Be able to upload AnswerSheets</marquee>
    @endif
    </div>
    @endif
@endif
@stop
