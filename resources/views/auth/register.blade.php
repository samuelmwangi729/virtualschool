@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:80px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <span>In accordance to <a href="http://www.parliament.go.ke/sites/default/files/2017-05/Data_Protection_Bill_2018.pdf">Kenyan Data Protection Bill</a>, feel free to  register using Dummy Details except <b>phone/email</b></span>
                <div class="card-header">
                    <span style="font-size:20px;font-weight:bold">{{ __('Register') }} to  
                        <span style="color:#f04d0c;font-weight:bold">
                             {{ config('app.name') }}
                        </span>
                    </span>
                </div>

                <div class="card-body">
                   @if($errors->count())
                   {{ $errors }}
                   @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                           <div class="col-sm-6">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label><br>

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
                            <label for="name" class="col-md-9 col-form-label text-md-right">{{ __('Parent Name') }}</label>

                            <div class="col">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="pname" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input type="hidden" class="form-control @error('name') is-invalid @enderror" name="isInd" value="1" readonly required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                           <div class="col-sm-6">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Phone Number/Email') }}</label>

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
                             <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
 
                             <div class="col">
                                 <input id="name" type="date" class="form-control @error('name') is-invalid @enderror" name="dob" value="{{ old('name') }}" required autocomplete="name" autofocus>
 
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
                                 <input id="name" type="text" readonly class="form-control @error('name') is-invalid @enderror" name="uid" value="{{ strtoupper(Str::random(10))}}" required autocomplete="name" autofocus>
 
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
                             <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Student Level') }}</label>
 
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
                                <button type="submit" class="btn_1">
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
