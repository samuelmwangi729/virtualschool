@extends('layouts.main')
@section('content')
@if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('error') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
@endif
<div class="container-fluid">
    Manage Users
    <div class="table-responsive">
        <table class="table table-hover ttable-striped table-condensed table-sm table-primary">
            <thead>
                <tr>
                    <th>User Names</th>
                    <th>Email</th>
                    <th>Unique Identifier</th>
                    <th>School Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->uid}}</td>
                    <td>{{$user->schoolName}}</td>
                    @if(App\Suspend::where('id',$user->id)->get()->count()==1)
                        <td><button class="btn btn-danger btn-xs disabled">Suspended</button></td>
                    @endif
                    @if(App\Suspend::where('id',$user->id)->get()->count()==0)
                        <td><button class="btn btn-success btn-xs disabled">Active</button></td>
                    @endif
                    @if(App\Suspend::where('id',$user->id)->get()->count()==0)
                    <td><a href="{{route('user.suspend',['uid'=>$user->id])}}" class="btn btn-danger btn-xs">Suspend Account</a></td>
                    @endif
                    @if(App\Suspend::where('id',$user->id)->get()->count()==1)
                    <td><a href="{{route('user.restore',['uid'=>$user->id])}}" class="btn btn-primary btn-xs">Restore Account</a></td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection