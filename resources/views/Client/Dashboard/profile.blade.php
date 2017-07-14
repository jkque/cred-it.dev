@extends('layouts.client')
@title('Dashboard - Profile')
@body_class('dashboard')
@groupblock('app-header', 'layouts.headers.client-dashboard', 'header')

@cssblock("Client.Dashboard.css.styles", "dashboard-styles")

@jsblock("Client.Dashboard.js.scripts", "dashboard-scripts")

@section('content')
<div class="row" id="main">
  <aside>
    <ul id="slide-out" class="side-nav fixed collapsible collapsible-accordion">
      <li class="active"><a href="#" class="collapsible-header active ">My Account</a>
        <div class="collapsible-body hide-on-med-and-up">
                  <ul>
                    <li><a href="#">Overview</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Notification</a></li>
                  </ul>
                </div>
      </li>
      <li><a class="collapsible-header" href="#">Pay Online</a></li>
      <li><a class="collapsible-header" href="#">Request Collector</a></li>
      <li><a class="collapsible-header" href="#">Savings</a></li>
      <li><a class="collapsible-header" href="#">Enroll Supplementary Card</a></li>
    </ul>
  </aside>
  <div class="content col s12 l12">


      <!-- <ul class="pill-tabs">
        <li class="pill-tab"><a class="active"  href="#">Overview</a></li>
        <li class="pill-tab"><a href="#">Add Funds</a></li>
        <li class="pill-tab"><a href="#">Withdraw</a></li>
        <li class="pill-tab"><a href="#">History</a></li>
        <li class="pill-tab"><a href="#">Resolution Center</a></li>
        <li class="pill-tab"><a href="#">Profile</a></li>
      </ul> -->
      <div class="row no-margin-bottom">
        <div class="col s12 m12 l12 no-padding">
          <!-- <ul id="#swipable-tabs" class="tabs border">
                  <li class="tab"><a class="active"  href="#overview">Overview</a>
                  </li>
                  <li class="tab"><a href="#test-swipe-2">Profile</a></li>
                  <li class="tab"><a href="#">Security</a></li>
                  <li class="tab"><a href="#">Notification</a></li>
                  <li class="indicator" style="right: 827px; left: 95px;"></li>
          </ul> -->
          <ul class="pill-tabs border hide-on-med-and-down">
            <li class="pill-tab"><a   href="#">Overview</a></li>
            <li class="pill-tab"><a class="active " href="#">Profile</a></li>
            <li class="pill-tab"><a href="#">Security</a></li>
            <li class="pill-tab"><a href="#">Notification</a></li>
          </ul>
        </div>
      </div>






  </div>
</div>
@endsection