@extends('layouts.main')

@section('content')
<div class="container-fluid">
  <div class="row-fluid well well-xs">
  <i class="glyphicon glyphicon-plus" style="color:green"></i> Edit Students In <span style="color:red;font-weight:bold">{{ Auth::user()->schoolName }}</span>
  </div>
  <div class="form-group">
    @if($errors->all())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{Session::get('success')}}</strong>
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{Session::get('error')}}</strong>
    </div>
    @endif
  <form method="POST" enctype="multipart/form-data" action="{{route('students.update',[$student->UniqueIdentifier])}}">
    @csrf
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="Student Name" class="label-control">Student Names</label>
                    <input type="text" class="form-control" name="StudentName" placeholder="Enter the Name" value="{{ $student->studentNames }}"/>
                </div>
                <div class="form-group">
                    <label for="Student Name" class="label-control">School Affiiliate</label>
                    <input type="text" class="form-control" name="SchoolAffiliate" value="{{  Auth::user()->schoolName  }}" readonly />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="Student Name" class="label-control">Student Unique Identifier</label>
                <input type="text" class="form-control" name="UniqueIdentifier" placeholder="Enter the Name" value="{{ $student->UniqueIdentifier }}" readonly autofocus/>
                </div>
              </div>
              <button class="btn btn-success" type="submit" style="margin-top:24px"><i class="glyphicon glyphicon-send" style="color:yellow"></i>&nbsp;Edit Student</button>
          </div>
      </form>
  </div>
</div>
@stop