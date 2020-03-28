@extends('layouts.main')
@section('content')
<div class="container-fluid">
<div class="table-responsive">
<div class="pull-right">
<button class="btn btn-primary" onclick="window.open('/Answers/Bulk/Upload','_parent')">Bulk Answer Sheets Upload</button>
</div>
<form>
<div class="col-sm-5 pull-left">
<div class="form-group">
<label type="label-control">Select Subject</label>
<select class="form-control">
<option>English</option>
<option>Kiswahili</option>
<option>Mathematics</option>
</select>
</div>
</div>
<table class="table table-codensed table-striped">
<tr>
<th>Student's Name</th>
<th>Select File</th>
</tr>
@foreach($students as $student)
<tr>
<td><input type="Sid" name="student[]" value="{{$student->UniqueIdentifier}}" style="border: none; background-color: inherit;" readonly></td>
<td><input type="file" name="file[]"></td>
</tr>
@endforeach
<tr colspan="2">
    {{$students->links()}}
</tr>
</table>
<button type="submit" class="btn btn-success disabled">Upload Files</button>
</form>
</div>
</div>
@stop