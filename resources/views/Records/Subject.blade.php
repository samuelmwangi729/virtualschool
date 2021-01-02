@extends('layouts.main')
@section('content')
<div class="container-fluid">
    @if(Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('success') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('error') }}
            </div>
            @endif
            <div class="row">
                <h2 class="text-center">
                    Select Details
                </h2>
                <div class="col-sm-6">
                    <form action="/Print" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="Subject" class="label-control">Subject</label><br>
                        @error('Subject') <span style="color:red">{{$message}}</span>  @enderror
                        <select name="Subject" id="" class="form-control @error('Subject') is-invalid @enderror">
                            <option label="--Select Subject--"></option>
                            @foreach($Subjects as $key)
                            <option value="{{$key->subjectName}}"> {{$key->subjectName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="Subject" class="label-control">Class</label><br>
                    @error('Class') <span style="color:red">{{$message}}</span>  @enderror
                    <select name="Class" id="" class="form-control @error('Class') is-invalid @enderror">
                        <option label="--Select Class--"></option>
                        @foreach($Classes as $key)
                        <option value="{{$key->className}}"> {{$key->className}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    <div class="form-group">
        <button class="btn btn-success fa fa-print ">
            Print Record
        </button>
    </div>
        </form>
    </div>
</div>
@stop
