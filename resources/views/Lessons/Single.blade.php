@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <h2 class="text-center">
        Update Lesson Plan
    </h2>
    <div class="text-right">
        <a href="{{route('lessons.index')}}" class="btn btn-success fa fa-plus-circle">Add Lesson Plans</a>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    @if(count($errors->all())>0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
            </ul>
    </div>
    @endif
    <div class="form">
        <form action="{{route('lessons.updates',[$Lesson->id])}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Class" class="label-control">
                        Select Class
                    </label>
                    <br>
                    @error('Class')
                    <span style="color:red"> {{$message}}</span>
                    @enderror
                    <select name="Class" id="" class="form-control @error('Class') @enderror">
                        <option label="--Select Class--"></option>
                        @foreach($Classes as $key => $value)
                        <option value="{{$value->className}}" @if($value->className == $Lesson->Class) selected @endif>{{$value->className}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
               <div class="col-sm-6">
                <label for="UsualNUmber" class="label-control">
                    Students Usual Number
                </label>
                <br>
                @error('UsualNumber')
                <span style="color:red"> {{$message}}</span>
                @enderror
                <input type="number" name="UsualNumber" id="" class="form-control @error('UsualNumber')
                is-invalid
                @enderror" value="{{$Lesson->UsualNumber}}">
               </div>
               <div class="col-sm-6">
                <label for="PresentNumber" class="label-control">
                    Students Present
                </label>
                <br>
            @error('PresentNumber')
            <span style="color:red"> {{$message}}</span>
            @enderror
                <input type="number" name="PresentNumber" id="" class="form-control @error('PresentNumber')
                is-invalid
                @enderror" value="{{$Lesson->PresentNumber}}">
               </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="Class" class="label-control">
                        Select Subject
                    </label>
                    <br>
                    @error('Subject')
                    <span style="color:red"> {{$message}}</span>
                    @enderror
                    <select name="Subject" id="" class="form-control @error('Subject')
                    is-invalid
                    @enderror">
                        <option label="--Select SUbject--"></option>
                        @foreach($Subjects as $key => $value)
                        <option value="{{$value->subjectName}}"@if($value->subjectName== $Lesson->Subject) selected @endif >{{$value->subjectName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-6">
                 <label for="TimeIn" class="label-control">
                     Time In
                 </label>
                 <br>
                 @error('TimeIn')
                 <span style="color:red"> {{$message}}</span>
                 @enderror
                 <input type="time" name="TimeIn" id="" class="form-control @error('TimeIn')
                 is-invalid
                 @enderror" value="{{$Lesson->TimeIn}}">
                </div>
                <div class="col-sm-6">
                 <label for="TimeOut" class="label-control">
                     Time Out
                 </label>
                <br>
                @error('TimeOut')
                <span style="color:red"> {{$message}}</span>
                @enderror
                 <input type="time" name="TimeOut" id="" class="form-control @error('TimeOut')
                 is-invalid
                 @enderror" value="{{$Lesson->TimeOut}}">
                </div>
             </div>
             <div class="col-sm-4">
                <div class="col-sm-12">
                 <label for="Date" class="label-control">
                     Date
                 </label>
                 <br>
                 @error('Date')
                 <span style="color:red"> {{$message}}</span>
                 @enderror
                 <input type="Date" name="Date" id="" class="form-control @error('Date')
                 is-invalid
                 @enderror" value="{{$Lesson->Date}}">
                </div>
             </div>
             <div class="col-sm-4">
                <label for="TimeOut" class="label-control">
                    Lesson Topic
                </label>
                <br>
                @error('Topic')
                <span style="color:red"> {{$message}}</span>
                @enderror
                <select name="Topic" id="" class="form-control @error('Topic')
                is-invalid
                @enderror">
                    <option label="--Select Topic--"></option>
                    @foreach($Topics as $key => $value)
                    <option value="{{$value->topic}}" @if($value->topic==$Lesson->Topic) selected @endif> {{$value->class}} - {{$value->topic}}</option>
                    @endforeach
                </select>
               </div>
        </div>
        <div class="col-sm-12">
            <label for="Objectives" class="label-control">
                Lesson Objectives/ Learning Aids/References/Assessment/Lesson Development(In stages)
            </label>
            <br>
            @error('Ojectives')
            <span style="color:red"> {{$message}}</span>
            @enderror
            <textarea name="Objectives" id="summernote" cols="30" rows="10" class="form-control @error('Objectives')
            is-invalid
            @enderror">
            {{$Lesson->Objectives}}
        </textarea>
        </div>
        <div class="col-sm-12">
            <label for="Objectives" class="label-control">
                Self Evaluation
            </label>
            <br>
            @error('Evaluation')
            <span style="color:red"> {{$message}}</span>
            @enderror
            <textarea name="Evaluation" id="summernote1" cols="30" rows="10" class="form-control @error('Evaluation') is-invalid @enderror">
                {{$Lesson->Evaluation}}
            </textarea>
        </div>
        <div class="container mt-3">
            <div class="text-center">
                <button class="btn btn-success mt-5" type="submit">
                    Update Lesson Plan
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
