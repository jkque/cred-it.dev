@extends('layouts.client')
@title('Dashboard')
@body_class('dashboard')
@groupblock('app-header', 'layouts.headers.client-dashboard', 'header', ['user'=>$user])

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
      <li><a class="collapsible-header" href="{{ route('client.requestCollector') }}">Request Collector</a></li>
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
            <li class="pill-tab"><a class="active "  href="#">Overview</a></li>
            <li class="pill-tab"><a href="{{ route('client.dashboard-profile') }}">Profile</a></li>
            <li class="pill-tab"><a href="#">Security</a></li>
            <li class="pill-tab"><a href="#">Notification</a></li>
          </ul>
        </div>
      </div>
      <div id="overview">
        <div class="row border no-border-top no-margin-bottom">
          <div class="col s12 m6 l6">
            <div class="card no-shadow">
              <div class="card-content">
                <div id="welcomeMessage">
                  <h5>Welcome, {{ $user->first_name }} {{ $user->last_name }}</h5>
                </div>
                <div id="loginDetails">
                  <p>Your last sign on was on : <strong>July 13, 2017</strong></p>
                </div>
                <!-- <ul class="inline-infos ">
                  <li class="inline-info"><i class="material-icons dp48 green accent-3">done</i> Status : Verified</li>
                  <li class="inline-info">Account Type : <a href="#">Personal</a></li>
                </ul> -->
              </div>
            </div>
          </div>
          <div class="col s12 m6 l6 ">
            <div class="col s6 m6 l6">
              <div class="card no-shadow">
                <div class="card-content right-align">
                  <p>Current Balance <i class="fa fa-question-circle tooltipped" data-position="top" data-delay="50" data-tooltip="Your outstanding balance to date" aria-hidden="true"></i></p>
                  <h5><span class="currency">₱</span>{{ $dues }}</h5>
                </div>
              </div>
            </div>
            <div class="col s6 m6 l6">
              <div class="card no-shadow">
                <div class="card-content right-align">
                  <p>Available Credit <i class="fa fa-question-circle tooltipped" data-position="top" data-delay="50" data-tooltip="Unused portion of your Relationship Limit or Account Credit Limit, as applicable" aria-hidden="true"></i></p>
                  <h5><span class="currency">₱</span>24,600.81</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row border-right no-border-top no-margin-bottom">
          <div class="col s12 m12 l12 no-padding">
            <ul id="dt-tabs" class="tabs border no-border-top">
                    <li class="tab"><a id="all" class="active"  href="#">Show All</a></li>
                    <li class="tab"><a id="billed" href="#">Billed</a></li>
                    <li class="tab"><a id="unbilled" href="#">Unbilled</a></li>
                    <li class="indicator" style="right: 827px; left: 95px;"></li>
            </ul>
          </div>
        </div> -->
        <div class="row border no-border-top">
          <div class="col s12 l12 no-padding no-margin">
            <table id="dataTable" class="mdl-data-table no-border-left no-border-right responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
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
                @if($transactions)
                  @foreach($transactions as $i)
                    <tr type="billed">
                    <td>{{ $i->trans_timestamp }}</td>
                    <td>{{ $i->name }}, {{ $i->address }}, {{ $i->contact_person }}, {{ $i->contact_no }}</td>
                    <td>{{ (intval($i->amount) + (intval($i->amount) * $coop_meta->interest_rate) + (intval($i->amount) * $coop_meta->credit_interest_rate) ) }}</td>
                  </tr>
                  @endforeach
                @endif
                <!--tr type="billed">
                	<td>10/17/2016</td>
                	<td>consectetuer rhoncus. Nullam velit dui, semper et,</td>
                	<td>$22.35</td>
                </tr>
                <tr type="billed">
                	<td>04/22/2018</td>
                	<td>odio semper cursus.</td>
                	<td>$56.31</td>
                </tr>
                <tr type="unbilled">
                	<td>12/01/2017</td>
                	<td>dolor</td>
                	<td>$14.66</td>
                </tr>
                <tr type="pending">
                	<td>11/15/2017</td>
                	<td>congue a, aliquet vel, vulputate eu, odio. Phasellus at</td>
                	<td>$50.11</td>
                </tr>
                <tr type="billed">
                	<td>01/16/2018</td>
                	<td>vitae diam. Proin</td>
                	<td>$44.34</td>
                </tr>
                <tr type="billed">
                	<td>08/31/2016</td>
                	<td>dolor dolor,</td>
                	<td>$86.19</td>
                </tr>
                <tr type="unbilled">
                	<td>06/16/2018</td>
                	<td>ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra</td>
                	<td>$55.05</td>
                </tr>
                <tr type="pending">
                	<td>11/26/2017</td>
                	<td>non enim. Mauris quis turpis vitae purus gravida sagittis.</td>
                	<td>$81.21</td>
                </tr>
                <tr type="billed">
                	<td>04/03/2018</td>
                	<td>lobortis tellus</td>
                	<td>$2.74</td>
                </tr>
                <tr type="billed">
                	<td>06/24/2018</td>
                	<td>magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed,</td>
                	<td>$56.07</td>
                </tr>
                <tr type="unbilled">
                	<td>02/17/2018</td>
                	<td>pede,</td>
                	<td>$0.17</td>
                </tr>
                <tr type="pending">
                	<td>10/17/2016</td>
                	<td>neque. Sed eget lacus. Mauris non dui nec urna suscipit</td>
                	<td>$37.25</td>
                </tr>
                <tr type="billed">
                	<td>02/05/2017</td>
                	<td>tellus id nunc interdum feugiat. Sed nec</td>
                	<td>$32.94</td>
                </tr>
                <tr type="billed">
                	<td>03/04/2017</td>
                	<td>vulputate, lacus. Cras interdum. Nunc sollicitudin</td>
                	<td>$4.35</td>
                </tr>
                <tr type="unbilled">
                	<td>12/30/2017</td>
                	<td>a feugiat tellus lorem eu metus.</td>
                	<td>$8.74</td>
                </tr>
                <tr type="pending">
                	<td>05/19/2018</td>
                	<td>metus. Vivamus euismod urna.</td>
                	<td>$33.05</td>
                </tr>
                <tr type="billed">
                	<td>03/04/2018</td>
                	<td>ipsum ac mi eleifend</td>
                	<td>$94.97</td>
                </tr>
                <tr type="billed">
                	<td>06/02/2018</td>
                	<td>vitae purus gravida sagittis.</td>
                	<td>$19.41</td>
                </tr>
                <tr type="unbilled">
                	<td>12/11/2017</td>
                	<td>Nulla eu neque pellentesque massa lobortis ultrices. Vivamus</td>
                	<td>$50.12</td>
                </tr-->
              </tbody>
          </table>
          </div>
        </div>
      </div>
  </div>
  <div id="quick-action" class="col s12 l4 xl3 no-padding  hide-on-med-and-down show-on-large">
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
