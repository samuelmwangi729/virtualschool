@extends('layouts.main')
@section('content')
<div class="container-fluid jumbotron">
    <marquee style="color:blueviolet"><u>Students Details</u></marquee>
<div class="row">
    <div class="col-lg-3">
        Students Passport<br>
        <img src="{{asset('uploads/Students/'.$student->Passport)}}" alt="{{$student->UniqueIdentifier}}" width="100px" height="100px" style="border-radius:70px">
    </div>
    <div class="col-lg-3">
        Student Name:<br><br>
       <b> {{ $student->studentNames }}</b>
    </div>
    <div class="col-lg-3">
        Student's School:<br><br>
       <b> {{ $student->SchoolAffiliate }}</b>
    </div>
    <div class="col-lg-3">
         Unique Identifier:<br><br>
       <b> {{ $student->UniqueIdentifier }}</b>
    </div>
</div>
</div>
@endsection