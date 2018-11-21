@extends('layouts.auth')

@section('content')
<h2 class="auth-form__title">LOGIN</h2>
<p class="auth-form__description">
    Welcome back! Log into your account & see what’s changed.
</p>
<form class="form-horizontal col-md-6 offset-md-3 mt-5" role="form" method="POST" action="{{ url('/login') }}">
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
    <div class="form-group text-right">
        <a class="btn btn-link auth-form__link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>
    <button class="btn btn--brown btn-block btn-lg text-uppercase" id="btn-submit" type="submit">
        Log In
    </button>
    <div class="text-center mt-4 d-xl-none d-lg-none">
        Don't have an account? <a href="{{ url('/register') }}">Register</a>
    </div>
</form>
@endsection

@section('navigation')
<h1 class="auth-navigation__title">Camp Izza</h1>
<p class="auth-navigation__description">
    I DO NOT have an account
</p>
<a role="button" href="{{ url('/register') }}" class="btn btn--green btn-lg border border-white text-uppercase">
    Register an account
</a>
@endsection
