@extends('layouts.main')

@section('content')
<div class="container-fluid">
  <div class="row-fluid well well-xs">
  <i class="glyphicon glyphicon-plus" style="color:green"></i> Add Students to <span style="color:red;font-weight:bold">{{ Auth::user()->schoolName }}</span>
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
    <strong>{{Session::get('success')}}</strong>
    </div>
    @endif
  <form method="POST" enctype="multipart/form-data" action="{{route('students.store')}}">
    @csrf
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="Student Name" class="label-control">Student Names</label>
                    <input type="text" class="form-control" name="StudentName" placeholder="Enter the Name" autofocus/>
                </div>
                <div class="form-group">
                    <label for="Student Name" class="label-control">School Affiiliate</label>
                    <input type="text" class="form-control" name="SchoolAffiliate" value="{{  Auth::user()->schoolName  }}" readonly />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="Student Name" class="label-control">Student Unique Identifier</label>
                <input type="text" class="form-control" name="UniqueIdentifier" placeholder="Enter the Name" value="{{Str::random(10)}}" readonly autofocus/>
                </div>
                <div class="form-group">
                    <label for="Student Name" class="label-control">Student Passport</label>
                    <input type="file" class="form-control" name="Passport"/>
                </div>
              </div>
          </div>
         <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-send" style="color:yellow"></i>&nbsp;Add Student</button>
      </form>
  </div>
</div>
@stop