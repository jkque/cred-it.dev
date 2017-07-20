<header>
    <div class="navbar-fixed">
  <nav role="navigation">
     <div class="nav-wrapper" id="nav">

       <!-- <a id="logo-container" href="#" class="center brand-logo">Logo</a> -->

       <!-- <ul class="left  hide-on-med-and-down">
        <li class="active"><a href="#">Summary</a></li>
        <li><a href="#">Activity</a></li>
        <li><a href="#">Send & Request Payments</a></li>
        <li><a href="#">Wallet</a></li>
        <li><a href="#">Help</a></li>
      </ul> -->

      <a href="#" data-activates="slide-out" class="button-collapse  hide-on-large-only  accent-3 left"><i class="material-icons">menu</i></a>

      <ul class="right" id="nav-profile">
         <li>
           <a class="dropdown-button" href="#!" data-activates="dropdown1">
             <img src="{{ URL::to('/') }}/img/avatar1.jpg" alt="" >
              <span class="profile-info hide-on-small-and-down" >
                {{ $user->first_name }} {{ $user->last_name }}
                <small>{{ $user->user_type_name }}</small>
              </span>
             <i class="material-icons right">arrow_drop_down</i>
           </a>
           <ul id="dropdown1" class="dropdown-content ">
             <!-- <li class="dropdown-header">Config</li>
             <li><a href="#!">Account</a></li>
             <li><a href="#!">Security</a></li>
             <li><a href="#!">Payments</a></li>
             <li class="divider"></li> -->
             <li><a href="#!"><i class="material-icons dp48 hide-on-small-and-down">lock</i>Lock</a></li>
             <li>
                <a href="{{ route('auth.logout') }}"><i class="material-icons dp48 hide-on-small-and-down">settings_power</i>Logout</a></li>
           </ul>
         </li>
      </ul>

      <ul class="right nav-options">
        <!-- <li><a href="#"><i class="material-icons">search</i></a></li> -->
        <li><a href="#"><span class="new badge">4</span></a></li>
      </ul>


     </div>
   </nav>
 </div>
 </header>
