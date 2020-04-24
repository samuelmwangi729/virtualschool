@extends('layouts.main')

@section('content')
<div class="container-fluid">
    @if($errors->all())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&timesbar;</a>
        @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
        @endforeach
    </div>
    @endif
    <div class="form">
        <form method="post" enctype="multipart/form-data" action="{{ route('file.update',[$file->id]) }}">
            @csrf
            <div class="col-sm-6">
                <label class="label-control fa fa-tags">Upload A New File</label>
            <input type="file" name="Answersheet" id="" class="form-control">
            </div>
            <button type="submit" style="margin-top:20px" class="btn btn-success">Upload</button>
        </form>
    </div>
</div>
@stop
