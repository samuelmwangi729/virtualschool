@extends('layouts.main')
@section('content')
<div class="pull-right">
    <form class="form-inline">
        <label class="label-control">Filter By Class</label>
        <select name="class" class="form-control input-md">
            @foreach($classes as $class)
        <option>{{$class->className}}</option>
            @endforeach
            <option>General</option>
        </select>
      <button class="btn" style="background-color:#f9f9f9"><i class="fa fa-filter" style="color:red;font-size:30px"></i></button>
    </form>
</div>
<div class="container-fluid">
    Manage Questions
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School Level</th>
                    <th>Class</th>
                    <th>question</th>
                    <th>Topic</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
               @foreach($questions as $question)
               <tr>
               <td>{{$question->level}}</td>
               <td>{{$question->class}}</td>
               <td>{{$question->question}}</td>
               <td>{{$question->topic}}</td>
               <td>{{$question->marks}}</td>
            </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <th>School Level</th>
                        <th>Class</th>
                        <th>question</th>
                        <th>Topic</th>
                        <th>Marks</th>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
    <div class="pull-right">
    <button class="btn btn-primary" onclick="window.open('/Questions/Files','_parent');">&nbsp;<i class="fa fa-eye"></i>&nbsp;Question Papers</button>
    </div>
</div>
@stop