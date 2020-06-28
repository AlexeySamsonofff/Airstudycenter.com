<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-light bg-gradient-x-grey-blue">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item"><a href="{{url()->current()}}" class="navbar-brand">
            <img alt="stack admin logo" src="{{asset('schooladmin/app-assets/images/logo/airstudylogo.png')}}"class="brand-logo" style="height: 34px;
    width: 34px;">
            <h2 class="brand-text">SAdmin</h2></a>
        </li>
        <li class="nav-item hidden-md-up float-xs-right">
          <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a>
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
		</style>
      <div class="navbar-container content container-fluid">
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav float-xs-right" style="margin-right: 3%">
            <li class="dropdown dropdown-user nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{asset('schooladmin/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span>
                <span class="user-name">{{ Auth::user()->email}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">             
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"
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