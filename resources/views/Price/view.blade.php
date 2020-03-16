@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-condensed table-bordered table-striped">
            @if($Prices->count()> 0)
                <thead>
                    <tr>
                        <th>Paper Type</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
               @foreach($Prices as $price)
                <tr>
                    <td>{{$price->paperType}}</td>
                    <td>Ksh.{{$price->Amount}}</td>
                    <td><a href="{{route('price.edit',[$price->id])}}" class="fa fa-edit btn btn-primary btn-xs">Edit</a>&nbsp;<a href="" class="fa fa-trash-o btn btn-danger btn-xs">Delete</a></td>
                </tr>
               @endforeach
            </tbody>
            @else
                <div class="alert alert-danger">
                    <strong>Error!!!</strong> No Prices Set
                </div>
            @endif
        <table>
    </div>
</div>

@stop