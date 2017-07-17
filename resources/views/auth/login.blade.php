@extends('layouts.app')
@title('Sign-in')
@body_class('login-body')
@groupblock('app-header', 'layouts.headers.default', 'header')

@cssblock("auth.css.styles", "auth-styles")

@js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js')
@js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js')
@jsblock("auth.js.scripts", "auth-scripts")

@section('content')
<div class="row login  base ">
    <div class="col s12 m12 l10 xl6 container">
        <div class="col s12 m12 l6 form-side ">
            <h5 class="sp-header center-align">SIGN IN</h5>
            <form class="col s12" role="form" method="POST" action="{{ route('login') }}">
                @include('flash::message')

                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" class="validate" name="username" required>
                        <label for="username">Username</label>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password" required>
                        <label for="password">Password</label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit"><a class="btn waves-effect btn-large  accent-3 login-button" submit>Log In</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align ">
                        <a href="#"><strong>Having trouble logging in?</strong></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align loginSignUpSeparator">
                        <span class="textInSeparator">or</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align">
                        <a class="btn waves-effect btn-large  grey lighten-1">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col s12 l6 sp-side hide-on-med-and-down"></div>
    </div>
</div>
@endsection
