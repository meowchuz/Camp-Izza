@extends('layouts.dashboard')

@section('pageTitle')
Change Password
@endsection

@section('header')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center bg--green">
    &nbsp;
</div>
@endsection

@section('content')
<div class="container mt--7">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <img class="w-100" src="{{ asset('img/undraw_security.svg') }}" alt="Security">
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="text-left control-label">Current Password</label>
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="text-left control-label">New Password</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm" class="text-left control-label">Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn--brown btn-block">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection