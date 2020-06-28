<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" href="{{asset('schooladmin/app-assets/images/ico/apple-icon-120.ico')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('schooladmin/app-assets/images/ico/apple-icon-120.ico')}}">
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
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/forms/validation/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/extensions/toastr.min.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/pickers/daterange/daterange.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/bootstrap-extended.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/app.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/colors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/vendors/css/forms/selects/select2.min.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/core/colors/palette-gradient.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/fonts/simple-line-icons/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/pages/timeline.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/forms/switch.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/app-assets/css/plugins/forms/wizard.min.css')}}">

  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/fileinput/css/fileinput.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('schooladmin/assets/css/bootstrap-multiselect.css')}}">
  <!-- END Custom CSS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{asset('vendor/mask/js/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/fileinput/js/plugins/sortable.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/fileinput/js/fileinput.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/fileinput/themes/explorer-fa/theme.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/fileinput/themes/fa/theme.js')}}" type="text/javascript"></script>
  
  <!-- Search in select-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
