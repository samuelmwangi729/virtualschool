@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1>Edit Transaction Code</h1>
    @if($errors->all())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        @foreach ($errors->all()  as $error)
        <span>{{ $error }}</span>            
        @endforeach
    </div>
    @endif
    <div class="form">
        <form method="POST" action="{{ route('transaction.update',[$transaction->id]) }}">
            @csrf
            <fieldset>
                <legend>
                   Edit Transaction Code
                </legend>
                <div class="form-group col-sm-6">
                    <label for="TransactionCode" class="label-control"><i class="fa fa-code"></i></label>
                    <input type="text" name="TransactionId"  class="form-control" value="{{ $transaction->TransactionId }}">
                </div>
                <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-success btn-sm" style="margin-top:25px" >Submit Transaction Code</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@stop