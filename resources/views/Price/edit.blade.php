@extends('layouts.main')

@section('content')
<div class="container-fluid">
 @if(Session::has('success'))
            <div class="alert alert-success">
                 {{ Session::get('success') }}

            </div>
        @endif
     <h1 class="text-center">Update Marking Prices</h1>
             <form method="post" action="{{route('prices.update')}}">
             @csrf
                <div class="row">
                    <div class="col-sm-4">
                    <input type="hidden" name="id" value="{{$Price->id}}">
                        <div class="form-group">
                            <label for="paper" class="label-control">Paper Type</label>
                            <input type="text" name="paperType" class="form-control" value="{{$Price->paperType}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Amount" class="label-control">Amount</label>
                            <input type="number" class="form-control" name="Amount" value="{{$Price->Amount}}" autocomplete>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Amount" class="label-control">&nbsp;</label>
                            <button class="btn btn-success" type="submit" style="margin-top:25px">Update Prices</button>
                        </div>
                    </div>
                </div>
             </form>
</div>
@endsection