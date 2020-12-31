@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <table class="table table-bordered table-stripped">
            <thead>
                <th>Date</th>
                <th>Week</th>
                <th>Subject</th>
                <th>Lesson</th>
                <th>Topic</th>
                <th>References</th>
                <th>Remarks</th>
            </thead>
            <tbody>
              <tr>
                <td>{{$record->Date}}</td>
                <td>{{$record->Week}}</td>
                <td>{{$record->Suject}}</td>
                <td>{{$record->Lesson}}</td>
                <td>{{$record->Topic}}</td>
                <td>{!! $record->Reference !!}</td>
                <td>{!! $record->Remarks !!}</td>
              </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
