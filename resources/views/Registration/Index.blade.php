@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <b>To register Your Account, Please deposit the members registration fees into our KCB  account number <u>1272937798</u><br>
    To deposit from Mpesa,
    <ul>
        <li><b>Go to Your M-PESA Menu, Select Lipa na Mpesa</b></li>
        <li><b>Enter Paybill Number 522522 </b></li>
        <li><b>And Enter The KCB bank Account  1272937798</b></li>
        <li><b>Enter the Amount Using the Rates Shown below, Then Enter your M-PESA pin and Send</b></li>
    </ul>
    <h4 class="text-bold">You can also deposit to any KCB BANK Agent or Any KCB Bank Branch nearest to You</h4>
    </b>
       <!-- learning part end-->
       <div class="container-fluid">
        <section class="feature_part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xl-4 small-box bg-red">
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="fa fa-user"></i></span>
                                <h4>For Individuals</h4>
                                <h4>Ksh .1200 per Month </h4>
                                <p>Renewable Monthly</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 small-box bg-black">
                        <div class="single_feature" id="pricing">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="fa fa-users"></i></span>
                                <h4>Institutions</h4>
                                <h4>Ksh .2500  </h4>
                                <p>Renewable Yearly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        <b>
            After Sending, You will get a unique  transaction code in which you will, send it to  us via the  form below. We will process your details within 24 hours or Less.
        </b>
        <hr>
        <br>
        <div class="container-fluid">
            <div class="form-group">
                @if($errors->all())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span><br>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('success') }}
                </div>
                @endif
                <form method="POST" action="{{ route('registration.register') }}">
                    @csrf
                    <fieldset>
                        <legend>
                            Enter your Registration Code
                        </legend>
                        <div class="form-group col-sm-6">
                            <label for="TransactionCode" class="label-control"><i class="fa fa-code"></i></label>
                            <input type="text" name="TransactionId"  class="form-control">
                            <input type="hidden" name="UniqueIdentifier"  class="form-control" value="{{ Auth::user()->uid }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-success btn-sm" style="margin-top:25px" >Submit Transaction Code</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
</div>
@stop
