@extends('layouts.main')
@section('content')
<div class="container-fluid">
<div class="table-responsive">
 @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
@if(Session::has('error'))
    <div class="alert alert-danger">
    {!! Session::get('error') !!}
    </div>
@endif
@if($errors->all())
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <span>{{$error}}</span><br>
    @endforeach
    </div>
@endif
<form id="form" method="post" action="{{route('bulk.store')}}" enctype="multipart/form-data">
@csrf
<div class="col-sm-3">
<div class="form-group">
<label type="label-control">Select School</label>
<select class="form-control" name="school">
@foreach($schools as $school)
<option>{{ $school->schoolName }}</option>    
@endforeach
</select>
</div>
</div><div class="col-sm-3">
<div class="form-group">
<label type="label-control">Select Subject</label>
<select class="form-control"  name="subject">
@foreach($subjects as $subject)
<option>{{ $subject->subjectName }}</option>    
@endforeach
</select>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label type="label-control">files</label>
<input type="file" name="files[]" required multiple>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<button type="submit" class="btn btn-success pull-left" style="margin-top:20px">Upload Files</button>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="progress progress-success">
    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    
    <div>
    <div class="success" id="success">
    </div>
</div>
<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#form').ajaxForm({
        beforeSend: function(){
            $('#success').empty();
            $('.progress-bar').text('0% complete');
            $('.progress-bar').css('width','0%');
        },
        uploadProgress:function(event,position,total,percentComplete){
            $('.progress-bar').text(percentComplete + '0%');
            $('.progress-bar').css('width', percentComplete + '0%');
        },
        success: function(data){
            if(data.success){
            $('#success').html('
            <div class="alert alert-success">"'+data.success+'"</div>'); 
            }
        }
    });
});
</script>
@stop