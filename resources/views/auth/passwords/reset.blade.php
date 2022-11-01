{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.frontend_master')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <ul class="nav register_tabnav ul_li_center" role="tablist">
                <li role="presentation">
                    <button  data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Reset Password</button>
                </li>

            </ul>

            <div class="register_wrap tab-content">


                <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">
                    @if (session('status'))
                        <div class="alert alert-success">
                           {{session('status')}}
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="form_item_wrap">
                            <h3 class="input_title">E-mail*</h3>
                            <div class="form_item">
                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                <input class="@error('email') is-invalid @enderror" id="username_input2" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form_item_wrap">
                            <h3 class="input_title">New Password*</h3>
                            <div class="form_item">
                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                <input class="@error('password') is-invalid @enderror" id="username_input2" type="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form_item_wrap">
                            <h3 class="input_title">Confirm Password*</h3>
                            <div class="form_item">
                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                <input class="@error('password_confirmation') is-invalid @enderror" id="username_input2" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <button type="submit" class="btn btn_secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
