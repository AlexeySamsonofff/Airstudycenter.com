<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top" style="background-color:#126470 ">
  <div class="navbar-wrapper">
    <div class="navbar-header" style="width:400px;">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"></a></li>
        <li class="nav-item"><a href="{{url()->current()}}" class="navbar-brand">
            <img alt="stack admin logo" src="{{asset('accommodationadmin/app-assets/images/logo/airstudylogo.png')}}"class="brand-logo" style="height: 34px;    width: 34px;">
            <h2 class="brand-text text-white">AIR STUDY CENTER</h2></a>
        </li>
        <li class="nav-item hidden-md-up float-xs-right">
          <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="text-white ft-menu font-large-1"></i></a>
        </li>
      
        </ul>
      </div>
      
	  <style>
		@media (min-width: 768px){
			.navbar-toggleable-sm {
				display: block!important;
				margin-right: 13%;
			}
    }
    .app-content{
      margin:15px 10%;
    }
    @media (max-width: 768px){
			.brand-logo{
        display:none;        
      }
      .navbar-brand{
        display:block;
        width:400px;
      }
    }
   
		</style>
      <div class="navbar-container content container-fluid" > 
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav float-xs-right" style="margin-right: 3%">         
          
            <li class="dropdown nav-item">
              <a href="{{route('accommodation-dashboard')}}"  class="nav-link">
                  <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span class="user-name">Dashboard</span>
              </a>             
            </li>
            <li class="dropdown nav-item">
              <a href="{{route('addAccommodation')}}"  class="nav-link">
                  <i class="fa fa-hotel" aria-hidden="true"></i>
                <span class="user-name">Accommodation</span>
              </a>             
            </li>
          

            <li class="dropdown dropdown-user nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{asset('accommodationadmin/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span>
                <span class="user-name">{{ Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">             
              <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('inbox')}}" 
                     >
                      <i class="ft-power"></i>inbox
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <i class="ft-power"></i>{{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
  </div>
</nav>