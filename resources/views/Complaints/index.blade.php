@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="form">
        @if($errors->all())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                @foreach ($errors->all() as  $error)
                    <span>{{ $error }}</span> <br>
                @endforeach
            </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <span>{{ Session::get('success') }}</span>
        </div>
        @endif
    <form method="post" action="{{ route('complaint.post') }}">
        @csrf
            <fieldset>
                <legend class="text-center">Logde A Complaint</legend>
                <div class="col-sm-5 col-sm-offset-3 text-center">
                   <h2> Select Title</h2>
                    <div class="col-sm-12">
                        <select class="form-control" name="title">
                            <option>Invalid Marks</option>
                            <option>Exam Not Marked</option>
                            <option>Wrong Exam Paper</option>
                            <option>Others</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-center">Describe the Problem Here</h4>
                        <textarea class="textarea" placeholder="Describe your problem Here" name="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-5 col-xs-offset-3"><br>
                        <button class="btn btn-success" type="submit">Add Complaint</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@stop