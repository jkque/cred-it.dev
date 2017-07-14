@extends('layouts.app')
@title('Sign-in')
@body_class('login-body')
@groupblock('app-header', 'layouts.headers.default', 'header')

@cssblock("auth.css.styles", "auth-styles")

@jsblock("auth.js.scripts", "auth-scripts")

@section('content')
<div class="row login  base ">
    <div class="col s12 m12 l10 xl6 container">
        <div class="col s12 m12 l6 form-side ">
            <h5 class="sp-header center-align">SIGN IN</h5>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate">
                        <label for="email">Account Name</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <a class="btn waves-effect btn-large  accent-3">Log In</a>
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
