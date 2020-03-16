@extends('layouts.main')

@section('content')


<div class="container-fluid">
    <div class="container-fluid">
        @if($Prices->count()==0)
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Empty!!</strong>No Prices Set
            </div>
        @endif
    </div>
    <div class="container-fluid">
     @if(Session::has('success'))
            <div class="alert alert-success">
                 {{ Session::get('success') }}

            </div>
        @endif
     @if($errors->all())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <span>{{$error}}</span><br>
                    @endforeach
                </div>
            @endif
             <h1 class="text-center">Set Marking Prices</h1>
             <form method="post" action="{{route('prices.store')}}">
             @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="paper" class="label-control">Paper Type</label>
                            <select class="form-control" name="paperType">
                                <option>Single Paper</option>
                                <option>Bulk Papers</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Amount" class="label-control">Amount</label>
                            <input type="number" class="form-control" name="Amount" autocomplete>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Amount" class="label-control">&nbsp;</label>
                            <button class="btn btn-success" type="submit" style="margin-top:25px">Add Prices</button>
                        </div>
                    </div>
                </div>
             </form>
    </div>
</div>
@stop