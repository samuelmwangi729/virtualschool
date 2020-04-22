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
             @if(count($requests) == 0)
             <tbody>
                 <tr>
                     <td colspan="6">
                         <div class="alert alert-danger">
                             No Requests Received. Please Check Later
                         </div>
                     </td>
                 </tr>
             @else
             @foreach ($requests as $request)
             <thead>
                <tr>
                    <th>Id</th>
                    <th>TransactionId</th>
                    <th>UniqueIdentifier</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
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
                    <td class="text-center"><a href="{{ route('transaction.edit',[$request->id]) }}" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;<a href="{{ route('transaction.approve',[$request->id]) }}" class=" fa fa-check-circle btn btn-success btn-xs">Approve</a>&nbsp;<a href="{{ route('transaction.reject',[$request->id]) }}" class="fa fa-times-circle btn btn-danger btn-xs">Reject</a>&nbsp;<a href="{{ route('transaction.delete',[$request->id]) }}" class="fa fa-trash-o btn btn-danger btn-xs">Delete</a></td>
                </tr>
            </tbody>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
