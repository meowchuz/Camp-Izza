@extends('layouts.auth')

@section('content')
<div class="auth-form__title">Forgot Password?</div>
<div class="auth-form__description">
    Enter your email below and we’ll send you the reset link
</div>
<form class="form-horizontal col-md-6 offset-md-3 mt-5" role="form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="form-group text-left{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" spellcheck="false">
        @if ($errors->has('email'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn--brown btn-block btn-lg text-uppercase" type="submit">
        Send Password Reset Link
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
