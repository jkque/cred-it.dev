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
            @include('flash::message')
            <form id="simulatorform" method="POST" action="{{ route('client.transaction-simulator-add') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="input-field col s12">
                  <select name="cardholder">
                    <option value="" disabled selected>Choose Card Holder</option>
                    @foreach($cardholders as $i)
                    <option value="{{ $i->uid }}">{{ $i->first_name }} {{ $i->last_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <select name="merchant">
                    <option value="" disabled selected>Choose Merchant</option>
                    @foreach($merchants as $i)
                    <option value="{{ $i->uid }}">{{ $i->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input name="transaction_date" type="date" id="date" class="datepicker">
                  <label for="date">Transaction Date</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input name="amount" placeholder="1,000,000" id="amount" type="text" class="validate">
                  <label for="amount">Amount</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="submit" class="waves-effect waves-light btn-large login-button"  value="Submit">
                  
                </div>
              </div>
            </form>

        </div>
        <div class="col s12 l6 sp-side hide-on-med-and-down"></div>
    </div>
</div>
@endsection
