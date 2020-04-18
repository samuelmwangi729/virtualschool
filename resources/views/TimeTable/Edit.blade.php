@extends('layouts.main')
@section('content')
<div class="container-fluid">
@if($errors->all())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                @foreach($errors->all() as $error)
                    * {{$error}}
                @endforeach
            </div>
        @endif
<div class="jumbotron pull-left">
    <form method="post" action="{{route('timetable.update',$timetable->id)}}">
        @csrf
            <fieldset>
                <input type="hidden" name="Week" value="{{App\CurrentWeek::all()->last()->Week ?? 1}}">
                <legend style="font-weight:bold !important">Set This Weeks Subject</legend>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="Day" class="label-control">Day</label>
                        <select class="form-control" name="Day">
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursaday">Thursday</option>
                           <option value="Friday">Friday</option>
                           <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="Date" class="label-control">Date</label>
                        <input type="date" name="Date"  class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="subject1" class="label-control">Subject 1</label>
                        <select class="form-control" name="Subject1">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="subject1" class="label-control">Subject 2</label>
                        <select class="form-control" name="Subject2">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="subject1" class="label-control">Subject 3</label>
                        <select class="form-control" name="Subject3">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button style="margin-top:50px" class="btn btn-success btn-block btn-sm">Update TimeTable</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
