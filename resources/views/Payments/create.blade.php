@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Add Payments</h1>
    @if(Session::has('success'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('success') }}
        </div>
    @endif
    @if($errors->all())
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            @foreach($errors->all() as $error)
                <span>{{ $error }}</span><br>
            @endforeach
        </div>
    @endif
    <form method="post" action="{{route('payments.store')}}">
    @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionId" class="label-control">TransactionId</label>
                    <input type="text" class="form-control input-md" name="TransactionId">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionId" class="label-control">Transaction Amount</label>
                    <input type="text" class="form-control input-md" name="Amount">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionId" class="label-control">Client Phone Number</label>
                    <input type="text" class="form-control input-md" name="ClientNumber">
                </div>
            </div>
             <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionId" class="label-control">Client Account</label>
                    <input type="text" class="form-control input-md" name="AccountName">
                </div>
            </div>
        </div>
        <button class="btn  btn-success" type="submit">Add Payments</button>
    </form>
</div>
@stop