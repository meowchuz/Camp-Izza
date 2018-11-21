@extends('layouts.auth')

@section('content')
<div class="auth-form__title">Reset Password</div>
<form class="form-horizontal col-md-6 offset-md-3 mt-5" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group text-left{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Email</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group text-left{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control" name="password">
        @if ($errors->has('password'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group text-left{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

    <button class="btn btn--brown btn-block btn-lg text-uppercase" type="submit">
        Reset Password
    </button>
</form>
@endsection

@section('navigation')
<h1 class="auth-navigation__title">Camp Izza</h1>
<p class="auth-navigation__description">
    Summer Day Camp 
</p>
<a role="button" href="{{ url('/login') }}" class="btn btn--green btn-lg border border-white text-uppercase">
    Get started
</a>
@endsection
