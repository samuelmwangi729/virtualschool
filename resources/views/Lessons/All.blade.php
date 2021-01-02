@extends('layouts.main')
@section('content')
<div class="container">
    <h2 class="text-center">
        Available Lesson Plans
    </h2>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>S/No</th>
                <th>Date</th>
                <th>Time</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Self Assessment</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($Lessons as $key => $value)
                <tr>
                    <?php $count=1;?>
                    <td>{{$count}}</td>
                    <td>{{$value->Date}}</td>
                    <td>{{$value->TimeIn}}- {{$value->TimeOut}}</td>
                    <td>{{$value->Class}}</td>
                    <td>{{$value->Subject}}</td>
                    <td>{!! $value->Evaluation !!}</td>
                    <td>
                        <a href="{{route('lessons.delete',[$value->id])}}" class="fa fa-trash-o text-danger"></a>
                        <a href="{{route('lessons.edit',[$value->id])}}" class="fa fa-edit text-primary"></a>
                        <a href="{{route('lessons.show',[$value->id])}}" class="fa fa-eye text-success"></a>
                    </td>
                    <?php $count = $count+1;?>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
