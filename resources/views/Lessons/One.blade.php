@extends('layouts.main')
@section('content')
<div class="container">
    <div class="text-right">
        <a href="{{route('lesson.print',[$Lesson->id])}}" class="fa fa-print text-success">Print</a>
    </div>
<h2 class="text-center">
  <b>  {{Auth::user()->schoolName}}</b>
</h2>
<h2 class="text-center">
    <b>  {{'Lesson Plan'}}</b>
  </h2>
  <div class="text-left">
    <strong>  Name of the Teacher : Mr</strong> {{strtoupper(Auth::user()->name)}}
  </div>
  <div class="text-right">
    <strong>  TSC NUMBER</strong> {{strtoupper(Auth::user()->name)}}
  </div>
  <div class="table-responsive">
      <table class="table table-hover table-striped table-bordered" style="border:1px solid black">
          <thead>
              <th class="text-center">Class</th>
              <th class="text-center" colspan="2">Roll</th>
              <th class="text-center">Subject</th>
              <th class="text-center">Time</th>
              <th class="text-center">Date</th>
          </thead>
          <tbody>
              <tr>
                  <td>{{$Lesson->Class}}</td>
                  <td>Usual Number: {{$Lesson->UsualNumber}}</td>
                  <td>Present Number: {{$Lesson->PresentNumber}}</td>
                  <td>{{$Lesson->Subject}}</td>
                  <td>{{$Lesson->TimeIn}} To  {{$Lesson->TimeOut}} Hrs </td>
                  <td>{{$Lesson->Date}}</td>
              </tr>
          </tbody>
      </table>

      <strong>Topic/Lesson Topic</strong>: {{$Lesson->Topic}}
      {!! $Lesson->Objectives!!}

      <strong>Self-Evaluation</strong>
      {!! $Lesson->Evaluation!!}
  </div>
</div>
@endsection
