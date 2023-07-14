@extends('layouts.user_type.guest')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        
            <div class="card mt-8 mx-2 align-center" style="max-width: 400px">
                <div class="card-header">
                    <h4 class="font-weight-bolder text-primary text-gradient"><b>{{ __('Sign Up') }}</b></h4>
                    <hr class="text-light">
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="form-control-label">{{ __('Nama Lengkap') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="npk" class="form-control-label">{{ __('NPK') }}</label>
                            <input id="npk" type="text" class="form-control" name="npk" required>
                        </div>
                        <div class="form-group">
                            <label for="departemen" class="form-control-label">{{ __('Departemen') }}</label>
                            <input id="departemen" type="text" class="form-control" name="departemen" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-control-label">{{ __('Konfirmasi Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms">{{ __('I agree the Terms and Conditions') }}</label>
                        </div>
                        <div class="d-grid gap-2 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Sign Up') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-3 text-center mb-8">
                <small>{{ __("Already have an account?") }}</small>
                <a href="{{ route('login') }}" class="text-warning text-sm font-semibold">{{ __('Login') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
