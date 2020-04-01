@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                Name: <b>{{Auth::user()->name}}</b>
                <br>
                Gender:<b>{{Auth::user()->Gender}}</b>
                <br>
                Email/Phone:<b>{{Auth::user()->email}}</b>
            </div>
            <div class="col-sm-6 col-lg-6">
                Unique Identifier:<b>{{$output[0]}}-{{$output[1]}}</b>
                <br>
                School Level:<b>{{Auth::user()->level}}</b>
                <br>
                School Name:<b>{{Auth::user()->schoolName}}</b>
                <br>
            </div>
        </div>
        <br><br><br><br>
        <div class="container-fluid">
            <div class="well">
                <h2 class="text-center" style="font-weight:bold;">Account Status</h2>
                <br><span style="color:red;font-weight:bold;font-family:courier;font-size:30px"><marquee>Registration Fees Not Paid</marquee></span><br>
            </div>
        </div>
        <div class="container-fluid">
            <div class="well  well-lg">
                <h2 class="text-center" style="font-weight:bold;">Change Your User Password</h2>
                @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            *{{$error}}<br>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        * {{Session::get('error')}}<br>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        Done,{{Session::get('success')}}<br>
                    </div>
                @endif
                <div class="form">
                <form method="post" action="{{route('account.update')}}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="Current Password" class="label-control">New Password</label>
                                    <input type="password" class="form-control" name="NewPassword">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="Current Password" class="label-control">Confirm New Password</label>
                                    <input type="password" class="form-control" name="PasswordConfirmation">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="margin-top:25px">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop