@extends('layouts.app')

@section('title', 'Login Page')

@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        <img class="col-12" src="{{asset('images/pages/login.png')}}" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img class="img-fluid pt-2" src="{{asset('images/icons/icon-192x192.png')}}" alt="logo">
                                </div>
                            </div>
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Login</h4>
                                </div>
                            </div>
                            <p class="px-2">Welcome back, please login to your account.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input id="email"
                                                   type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="admin@admin.com"
                                                   required autocomplete="email" autofocus>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="user-name">E-mail Address</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input id="password"
                                                   type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   value="password"
                                                   name="password" required autocomplete="current-password">
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="user-password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">
                                                            {{ __('Remember me') }}
{{--                                                            Remember me--}}
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="text-right">
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
{{--                                                        Forgot Password?--}}
                                                        {{ __('Forgot Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 mb-2">
                                                <button type="submit" class="col-12 btn btn-primary float-right btn-inline">Login</button>
                                            </div>
                                            <div class="col-12">
                                                <a href="{{ route('register') }}" class="col-12 btn btn-outline-primary float-left btn-inline">Register Practice</a>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <a href="{{ route('referrerRegister') }}" class="col-12 btn btn-outline-primary float-left btn-inline">Register as Referrer</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
