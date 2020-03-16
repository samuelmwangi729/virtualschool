@extends('layouts.main')

@section('content')
<div class="container-fluid">
<div class="table-responsive">
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <tr>
                <th>Transaction Id</th>
                <th>Phone Number</th>
                <th>Account Name</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->TransactionId}}</td>
                    <td>{{$payment->ClientNumber}}</td>
                    <td>{{$payment->AccountName}}</td>
                    <td>{{$payment->Amount}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pull-right">
    <button class="btn btn-primary" onclick="window.open('/Payments/Print','_parent')">
        <i class="fa fa-print"></i> Print Statement
    </button>
</div>
</div>
@endsection