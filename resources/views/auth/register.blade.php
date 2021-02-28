@extends('layouts.app')

@section('title', 'Register Page')

@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-9 col-10 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-5 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                        <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
                    </div>
                    <div class="col-lg-7 col-12 p-0">
                        <div class="card rounded-0 mb-0 p-2">
                            <div class="card-header pt-50 pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Create Account</h4>
                                </div>
                            </div>
                            <p class="px-2">Fill the below form to create a new account.</p>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name"
                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{ old('name') }}" required
                                                       autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email"
                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required
                                                       autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password"
                                                       required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required
                                                       autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="office_id"
                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('Office ID') }}</label>

                                            <div class="col-md-8">
                                                <select id="office_id" class="form-control @error('office_id') is-invalid @enderror" name="office_id"
                                                        required autocomplete="office_id" autofocus>
                                                    <option value="">Select Office...</option>
                                                    <option value="001">001</option>
                                                    <option value="002">002</option>
                                                </select>
                                                @error('office_id')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="type"--}}
{{--                                                   class="col-md-4 d-flex align-items-center text-md-right">{{ __('Type') }}</label>--}}

{{--                                            <div class="col-md-8">--}}
{{--                                                <select id="type" class="form-control @error('type') is-invalid @enderror" name="type"--}}
{{--                                                        required autocomplete="type" autofocus>--}}
{{--                                                    <option value="">Select type...</option>--}}
{{--                                                    <option value="admin">Admin</option>--}}
{{--                                                    <option value="member">Team Member</option>--}}
{{--                                                </select>--}}
{{--                                                @error('type')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                        <strong>{{ $message }}</strong>--}}
{{--                                                    </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group row mb-0 ">
                                            <div class="col-md-6 justify-content-center d-flex">
                                                <a class="btn btn-primary" href="{{url('login')}}">
                                                    {{ __('Login') }}
                                                </a>
                                            </div>
                                            <div class="col-md-6 justify-content-center d-flex mt-lg-0 mt-2">
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
            </div>
        </div>
    </section>
@endsection
