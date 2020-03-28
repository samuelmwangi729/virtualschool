@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <h2 class="text-center">View the timetable</h2>
    @if(Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('error')}}
            </div>
        @endif
    <div class="well pull-left col-lg-9 col-sm-9">
        <h2> Week {{App\CurrentWeek::all()->last()->Week ?? 1}} Subjects</h2>
    <h2 style="font-weight:bold;color:#5f02fd">{{App\TimeTable::where('Week',App\CurrentWeek::all()->last()->Week)->get()->last()->Subject1 ?? 'English'}}</h2>
    <h2 style="font-weight:bold;color:#5f02fd">{{App\TimeTable::where('Week',App\CurrentWeek::all()->last()->Week)->get()->last()->Subject2 ?? 'Kiswahili'}}</h2>
    <h2 style="font-weight:bold;color:#5f02fd">{{App\TimeTable::where('Week',App\CurrentWeek::all()->last()->Week)->get()->last()->Subject3 ?? 'Mathematics'}}</h2>
    </div>
    @if(Auth::user()->isAdm==1)
    <div class="well pull-right">
    <form class="form-horizontal" method="post" action="{{route('settings.currentWeek')}}">
        @csrf
        @if($errors->all())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                @foreach($errors->all() as $error)
                    * {{$error}}
                @endforeach
            </div>
        @endif
            <label for="week" class="label-control">Current Week</label>
            <input type="number" name="Week" placeholder="E.g 19" class="form-control"><br>
            <button class="btn btn-success">Update Current Week</button>
        </form>
    </div>
    <br><br><br><br><br><br><br>
    @endif
    @if(Auth::user()->isAdm==1)
    <div class="jumbotron pull-left">
    <form method="post" action="{{route('timetable.post')}}">
        @csrf
            <fieldset>
                <input type="hidden" name="Week" value="{{App\CurrentWeek::all()->last()->Week ?? 1}}">
                <legend style="font-weight:bold !important">Set This Weeks Subject</legend>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="subject1" class="label-control">Subject 1</label>
                        <select class="form-control" name="Subject1">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="subject1" class="label-control">Subject 2</label>
                        <select class="form-control" name="Subject2">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="subject1" class="label-control">Subject 3</label>
                        <select class="form-control" name="Subject3">
                            @foreach($subjects as $subject)
                        <option>{{$subject->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button style="margin-top:50px" class="btn btn-success">Submit</button>
                    </div>
                </div> 
            </fieldset>           
        </form>
    </div>
@endif
    <div class="well pull-right">
        <h3 style="font-weight:bold">Current Week</h3>
    <h1>Week {{App\CurrentWeek::all()->last()->Week ?? 1}}</h1>
    </div>
</div>
@endsection