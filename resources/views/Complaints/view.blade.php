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
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('error') }}
        </div>
        @endif
        <table class="table table-condensed table-striped table-bordered">
            <thead>
                <th>Complaint Title</th>
                <th>Complaint Description</th>
                <th>Complaint Status</th>
                @if(Auth::user()->isAdmin==1)
                <th>Complaint Status</th>
                @endif
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->title }}</td>
                    <td>{{ $complaint->Description }}</td>
                    @if($complaint->status==1)
                        <td class="text-success">Solved</td>
                    @else
                    <td class="text-danger">Issue Pending</td>
                    @endif
                    @if(Auth::user()->isAdmin==1)
                    @if($complaint->status==1)
                    <td><a href="#" class="btn btn-warning btn-xs disabled">Completed</a></td>
                    @else
                    <td><a href="{{ route('complaint.update',['id'=>$complaint->id]) }}" class="btn btn-primary btn-xs">Mark As Complete</a></td>
                    @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop