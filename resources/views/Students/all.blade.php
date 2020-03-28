@extends('layouts.main')
@section('content')
<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>
                    Image
                </th>
                <th>
                    Names
                </th>
                <th>
                    School
                </th>
                <th>
                    Unique Identifier
                </th>
                <th>
                    Action
                </th>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                <td><img src="{{asset('uploads/Students/'.$student->Passport)}}" style="height:30px;width:30px"></td>
                    <td>{{$student->studentNames}}</td>
                    <td>{{$student->SchoolAffiliate}}</td>
                    <td>{{$student->UniqueIdentifier}}</td>
                <td><a href="{{route('student.view',['uid'=>$student->UniqueIdentifier])}}"><i class="fa fa-eye" style="color:green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('student.edit',['uid'=>$student->UniqueIdentifier])}}"><i class="fa fa-pencil" style="color:blue"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('student.delete',['uid'=>$student->UniqueIdentifier])}}"><i class="fa fa-trash-o" style="color:red"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="pull-right">
    {{$students->links()}}
</div>
@endsection