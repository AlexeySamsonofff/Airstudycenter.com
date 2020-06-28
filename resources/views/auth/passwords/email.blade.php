<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Recover Password</title>
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
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/assets/css/style.css')}}">
  <!-- END Custom CSS-->
    <style>
  .form-group.error .form-control
  {
    border: 1px solid red;
  }
  .form-group.error .help-block ul li
  {
    color:red;
  }
  .form-group.issue .form-control
  {
    border: 1px solid #FFA87D;
  }
  .form-group.issue .help-block ul li
  {
    color:#FFA87D;
  }
  </style>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
              <div class="card-header no-border pb-0">
                <div class="card-title text-xs-center">
                  <img src="{{asset('schooladmin/app-assets/images/logo/airstudylogo.png')}}" >
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                  <span>We will send you a link to reset password.</span>
                </h6>
              </div>
              <div class="card-body collapse in">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                    </div>
                @endif
                <div class="card-block">
                  <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" novalidate>
                    @csrf
                    <fieldset class="form-group position-relative has-icon-left">
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg input-lg" id="user-email" name="email" placeholder="Your Email Address" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                        <span class="is-invalid" role="alert">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                      <div class="form-control-position">
                        <i class="ft-mail"></i>
                      </div>
                    </fieldset>
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
                  </form>
                </div>
              </div>
              <div class="card-footer no-border">
                <p class="float-sm-left text-xs-center"><a href="{{url('login')}}" class="card-link">Login</a></p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('schooladmin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset('schooladmin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>  
  <script src="{{asset('schooladmin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('schooladmin/app-assets/js/scripts/forms/form-login-register.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>