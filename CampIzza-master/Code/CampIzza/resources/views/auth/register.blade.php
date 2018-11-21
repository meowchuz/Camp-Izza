@extends('layouts.auth')

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>
<script>
var registerForm = $('#register-form');
registerForm.submit(function(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('GOOGLE_RECAPTCHA_KEY') }}', {action: 'register'}).then(function(token) {
            fetch('/api/recaptcha?action=register&token=' + token).then(function(response) {
                response.json().then(function(data) {
                    registerForm.unbind('submit').submit();
                });
            });
        });
    });
});
</script>
@endsection

@section('content')
<h2 class="auth-form__title">SIGN UP</h2>

<form id="register-form" class="form-horizontal col-md-6 offset-md-3 mt-5" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <div class="form-group text-left{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="input-email" class="control-label">Email</label>
        <input type="email" class="form-control" id="input-email" name="email" placeholder="Email" autocomplete="off" spellcheck="false">
        @if ($errors->has('email'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group text-left{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="input-password" class="control-label">Password</label>
        <input type="password" class="form-control" id="input-password" name="password" placeholder="Password" autocomplete="off" spellcheck="false">
        @if ($errors->has('password'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group text-left{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" autocomplete="off" spellcheck="false">
        @if ($errors->has('password_confirmation'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <button id="btn-submit" class="btn btn--brown btn-block btn-lg text-uppercase" type="submit">
        CREATE ACCOUNT
    </button>
</form>
@endsection

@section('navigation')
<h1 class="auth-navigation__title">Camp Izza</h1>
<p class="auth-navigation__description">
    Log into your account & see what’s changed.
</p>
<a role="button" href="{{ url('/login') }}" class="btn btn--green btn-lg border border-white text-uppercase">
    Login
</a>
@endsection
