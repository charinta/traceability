@extends('layouts.user_type.guest')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="text-center" style="margin-right: auto">
                <img src="{{ asset('assets/img/login.jpg') }}" class="img-fluid" alt="Login Image" width="500">
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mt-5" style="max-width: 400px; margin-left:10">
                <div class="card-header">
                    <h4 class="font-weight-bolder text-primary text-gradient"><b>{{ __('Login') }}</b></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 margin-left:10">
                <small>{{ __("Don't have an account?") }}</small>
                <a href="{{ route('dashboard') }}" class="text-warning text-sm font-semibold">{{ __('Sign up') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
