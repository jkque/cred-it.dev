@extends('layouts.app')
@title('Sign-in')
@body_class('login-body')
@groupblock('app-header', 'layouts.headers.default', 'header')

@cssblock("auth.css.styles", "auth-styles")

@js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js')
@js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js')
@jsblock("client.dashboard.js.simulator", "")

@section('content')
<div class="row login  base ">
    <div class="col s12 m12 l10 xl6 container">
        <div class="col s12 m12 l6 form-side ">
            <h5 class="sp-header center-align">Transaction Simulator</h5>
            <div class="row">
              <div class="input-field col s12">
                <select>
                  <option value="" disabled selected>Choose Card Holder</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select>
                  <option value="" disabled selected>Choose Merchant</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="date" id="date" class="datepicker">
                <label for="date">Transaction Date</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="1,000,000" id="amount" type="text" class="validate">
                <label for="amount">Amount</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="submit" class="waves-effect waves-light btn-large login-button"  value="Submit">
                
              </div>
            </div>

        </div>
        <div class="col s12 l6 sp-side hide-on-med-and-down"></div>
    </div>
</div>
@endsection
