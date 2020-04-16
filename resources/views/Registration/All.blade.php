@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        @if(Session::has("success"))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">
                &times;
            </a>
            {{ Session::get("success") }}
        </div>
        @endif
        @if(Session::has("error"))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">
                &times;
            </a>
            {{ Session::get("error") }}
        </div>
        @endif
        <table class="table table-hover table-striped table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>TransactionId</th>
                    <th>UniqueIdentifier</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->TransactionId }}</td>
                    <td>{{ $request->UniqueIdentifier }}</td>
                    <td>
                        @if(App\User::where('uid','=',$request->UniqueIdentifier)->get()->take(1)[0]->isInd==0)
                        Institution
                        @else
                        Individual
                        @endif
                    </td>
                    <td>
                        @if($request->Status==1)
                        Approved
                        @else
                        Pending
                        @endif
                    </td>
                    <td><a href="{{ route('transaction.edit',[$request->id]) }}" class="btn btn-primary btn-xs">Edit</a>&nbsp;<a href="{{ route('transaction.approve',[$request->id]) }}" class="btn btn-success btn-xs">Approve</a>&nbsp;<a href="{{ route('transaction.reject',[$request->id]) }}" class="btn btn-danger btn-xs">Reject</a></td>
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop