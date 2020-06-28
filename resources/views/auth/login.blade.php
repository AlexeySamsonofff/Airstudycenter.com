<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title></title>
  <link rel="apple-touch-icon" href="{{asset('schooladmin/app-assets/images/ico/fav.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('schooladmin/app-assets/images/ico/fav.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/feather/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/extensions/pace.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/extensions/unslider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/meteocons/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/bootstrap-extended.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/app.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/colors.min.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/colors/palette-gradient.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/simple-line-icons/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/colors/palette-gradient.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/pages/timeline.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/forms/validation/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/forms/switch.min.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/assets/css/style.css')}}">
  <!-- END Custom CSS-->
   <!-- BEGIN VENDOR JS-->
  <script src="{{asset('schooladmin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">


@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
@if (session('warning'))
  <div class="alert alert-warning">
    {{ session('warning') }}
  </div>
@endif

<div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
              <div class="card-header no-border">
                <div class="card-title text-xs-center">
                  <div class="p-1">
                    <img src="{{asset('schooladmin/app-assets/images/logo/airstudylogo.png')}}" alt="branding logo">
                  </div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                  <span>Login</span>
                </h6>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <form class="form-horizontal form-simple schooladminlogin"  method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" novalidate>
                      @csrf
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus >
                      
                     
                      <div class="form-control-position">
                        <i class="ft-user"></i>
                      </div>
                    </fieldset>
                    <br>
                     @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    <fieldset class="form-group position-relative has-icon-left">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                       
                      <div class="form-control-position">
                        <i class="fa fa-key"></i>
                      </div>
                    </fieldset>
                    <br>
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <fieldset class="form-group row">
                      <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                        <fieldset>
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="{{ url('/password/reset') }}" class="card-link">Forgot Password?</a></div>
                    </fieldset>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i>Login</button>
                  </form>
                </div>
              </div>
             <!--  <div class="card-footer">
                <div class="">
                  <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
                  <p class="float-sm-right text-xs-center m-0">New to Stack? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                </div>
              </div> -->
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('schooladmin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>

  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset('schooladmin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/forms/validation/form-validation.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('schooladmin/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>
   <script src="{{asset('schooladmin/app-assets/js/schooladmincustom.js')}}" type="text/javascript"></script>

</body>


</html>
