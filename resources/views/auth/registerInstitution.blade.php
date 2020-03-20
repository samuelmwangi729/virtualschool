@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:80px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span style="font-size:20px;font-weight:bold">{{ __('Register') }} to </span><a class="navbar-brand" style="color:#f04d0c;font-weight:bold" href="{{route('index')}}"> 
                    {{-- <img src="img/logo.png" alt="logo"> --}}
                    {{ config('app.name') }}
                 </a></div>

                <div class="card-body">
                   @if($errors->count())
                   {{ $errors }}
                   @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                           <div class="col-sm-6">
                            <label for="name" class="col-md-7 col-form-label text-md-right">{{ __('Registered By') }}</label>

                            <div class="col">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-sm-6">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Your Gender') }}</label>

                            <div class="col">
                                <div class="col">           
                                    <input type = "radio"
                                           name = "Gender"
                                           id = "male"
                                           value = "male"
                                           checked = "checked" />
                                    <label for = "male">Male</label>
                                    <input type = "radio"
                                           name = "Gender"
                                           id = "female"
                                           value = "female" />
                                    <label for = "female">Female</label>
    
                                 </div>
                            </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-6">
                            <label for="name" class="col-md-9 col-form-label text-md-right">{{ __('Principal Name') }}</label>

                            <div class="col">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="pname" value="{{ old('name') }}"  placeholder="Optional/">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-sm-6">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('School Phone Number/Email Address') }}</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="email" placeholder="Enter the phone Number or Email" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date Registered') }}</label>
 
                             <div class="col">
                                 <input id="name" type="date" class="form-control @error('name') is-invalid @enderror" name="dob" value="<?php echo date('Y-m-d') ?>" readonly required autocomplete="name" autofocus>
                                 <input type="hidden" class="form-control @error('name') is-invalid @enderror" name="isInd" value="0" readonly required autocomplete="name" autofocus>
                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                            <div class="col-sm-6">
                             <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Unique Identifier') }}</label>
 
                             <div class="col">
                                 <input id="name" type="text" readonly class="form-control @error('name') is-invalid @enderror" name="uid" value="{{ Str::random(10)}}" required autocomplete="name" autofocus>
 
                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                             <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('School Level') }}</label>
 
                             <div class="col">           
                                <input type = "radio"
                                       name = "level"
                                       id = "secondary"
                                       value = "secondary"
                                       checked = "checked" />
                                <label for = "Secondary">Secondary School</label>
                                <input type = "radio"
                                       name = "level"
                                       id = "primary"
                                       value = "primary" />
                                <label for = "Primary">Primary School</label>

                             </div>
                            </div>
                            <div class="col-sm-6">
                             <label for="name" class="col-md-8 col-form-label text-md-right">{{ __('Name of The School') }}</label>
 
                             <div class="col">
                                 <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="schoolName"  required autocomplete="name" autofocus>
 
                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                            </div>
                         </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="password-confirm" class="col-md-10 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
