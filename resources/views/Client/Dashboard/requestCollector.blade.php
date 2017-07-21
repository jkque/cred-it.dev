
@extends('layouts.client')
@title('Dashboard')
@body_class('dashboard')
@groupblock('app-header', 'layouts.headers.client-dashboard', 'header')

@cssblock("Client.Dashboard.css.styles", "dashboard-styles")

@jsblock("Client.Dashboard.js.scripts", "dashboard-scripts")

@section('content')
<div class="row" id="main">
  <aside>
    <ul id="slide-out" class="side-nav fixed collapsible collapsible-accordion">
      <li class="active"><a href="{{ route('client.dashboard') }}" class="collapsible-header active ">My Account</a>
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
      <li><a class="collapsible-header" href="#">Enroll Supplementary Card</a></li>
    </ul>
  </aside>
  <div id="content" class="col s12 l8 xl9 no-padding">


      <!-- <ul class="pill-tabs">
        <li class="pill-tab"><a class="active"  href="#">Overview</a></li>
        <li class="pill-tab"><a href="#">Add Funds</a></li>
        <li class="pill-tab"><a href="#">Withdraw</a></li>
        <li class="pill-tab"><a href="#">History</a></li>
        <li class="pill-tab"><a href="#">Resolution Center</a></li>
        <li class="pill-tab"><a href="#">Profile</a></li>
      </ul> -->
      <div class="row no-margin-bottom">
        <div class="col s12 m12 l12 no-padding border">
          <h6 class="page-title">Request Collector</h6>
        </div>
      </div>

        <div class="row border no-border-top no-margin-bottom">
          <div class="col s12 ">


                <div class="input-field col l5">
                  <input type="date" id="date" class="datepicker">
                  <label for="date">Date</label>
                </div>
                <div class="input-field col l5">
                  <input id="address" type="text" class="validate">
                  <label for="address">Address</label>
                </div>
                <div class="input-field col l2 right-align">
                  <button class="btn waves-effect waves-light btn-large " type="submit" name="action">Submit
                   <i class="material-icons right">send</i>
                  </button>
                </div>


          </div>
        </div>
        <div class="row no-margin-bottom">
          <div class="col s12 m12 l12 no-padding border-right">
            <h6 class="page-title">History</h6>
          </div>
        </div>

        <div class="row border no-border-top">
          <div class="col s12 l12 no-padding no-margin">
            <table id="dataTable" class="mdl-data-table no-border-left no-border-right responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Address</th>
                  <th>Status</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </tfoot> -->
              <tbody>
                <tr>
                	<td>May 2, 2018</td>
                	<td>Srinagar</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Nov 4, 2016</td>
                	<td>Wekweti</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Mar 7, 2017</td>
                	<td>Salles</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Oct 16, 2016</td>
                	<td>Hualaihué</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Mar 24, 2018</td>
                	<td>Stevenage</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Mar 19, 2018</td>
                	<td>Beypazarı</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Apr 8, 2018</td>
                	<td>Cumberland County</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Mar 23, 2018</td>
                	<td>Moerkerke</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Dec 7, 2016</td>
                	<td>Dipignano</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>May 14, 2017</td>
                	<td>Iseyin</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Dec 5, 2017</td>
                	<td>Sioux City</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Dec 17, 2017</td>
                	<td>Bellefontaine</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Dec 9, 2017</td>
                	<td>Minderhout</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Jun 7, 2017</td>
                	<td>Lambersart</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Feb 13, 2017</td>
                	<td>Cannalonga</td>
                	<td>Successful </td>
                </tr>
                <tr>
                	<td>Jan 20, 2018</td>
                	<td>Spaniard's Bay</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Feb 22, 2017</td>
                	<td>Elmshorn</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Nov 18, 2017</td>
                	<td>Canela</td>
                	<td> Pending</td>
                </tr>
                <tr>
                	<td>Apr 1, 2018</td>
                	<td>Ergani</td>
                	<td> Pending</td>
                </tr>
              </tbody>
          </table>
          </div>
        </div>

  </div>
  <div id="quick-action" class="col s12 l4 xl3 no-padding  hide">
    <div class="row no-margin-bottom border no-border-left">
      <div class="col s12 m12 l12 ">
        <p class="header">Quick Action</p>
      </div>
    </div>
    <div class="row">
        <form class="col s12 m12 l12 no-padding">
          <div class="input-field col s12 choices no-margin-top">
           <select>
             <option selected>Choose your option</option>
             <option value="1">Pay Online</option>
             <option value="2">Request Collector</option>
           </select>
         </div>
          <div class="input-field col s12">
            <label class="" for="date">Date</label>
            <input id="date" type="date" class="datepicker">
          </div>
          <div class="input-field col s12">
            <input id="address" type="text" class="validate">
            <label for="address">Address</label>
          </div>
          <div class="input-field col s12 center-align">
            <button class="btn waves-effect waves-light btn-large " type="submit" name="action">Submit
             <i class="material-icons right">send</i>
           </button>
          </div>
        </form>

    </div>
  </div>
</div>
@endsection
