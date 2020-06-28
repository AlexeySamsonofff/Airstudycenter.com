<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>::Air Study Center::</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{asset('front/css/owl-carousel.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Custom font awesome css -->
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/jquery.ui.autocomplete.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/intlTelInput.css')}}" rel="stylesheet">
    <script src="{{asset('front/js/jquery.min.js')}}"></script>
    <script src="{{asset('front/js/highcharts.js')}}"></script>
    <script src="{{asset('front/js/exporting.js')}}"></script>
    <script src="{{asset('front/js/export-data.js')}}"></script>
    <script src="{{asset('front/js/intlTelInput.js')}}"></script>
    {!! NoCaptcha::renderJs() !!}
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /*jssor slider arrow skin 051 css*/
        .jssora051 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora051 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 360;
            stroke-miterlimit: 10;
        }

        .jssora051:hover {
            opacity: .8;
        }

        .jssora051.jssora051dn {
            opacity: .5;
        }

        .jssora051.jssora051ds {
            opacity: .3;
            pointer-events: none;
        }

        /*jssor slider thumbnail skin 111 css*/
        .jssort111 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 100px;
            background-color: #000;
        }

        .jssort111 .p img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .jssort111 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            opacity: .45;
        }

        .jssort111 .p:hover .t {
            opacity: .8;
        }

        .jssort111 .pav .t,
        .jssort111 .pdn .t,
        .jssort111 .p:hover.pdn .t {
            opacity: 1;
        }

        .jssort111 .ti {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 28px;
            line-height: 28px;
            text-align: center;
            font-size: 12px;
            color: #fff;
            background-color: rgba(0, 0, 0, .3)
        }

        .jssort111 .pav .ti,
        .jssort111 .pdn .ti,
        .jssort111 .p:hover.pdn .ti {
            color: #000;
            background-color: rgba(255, 255, 255, .6);
        }
    </style>
</head>

<body>
    <div class="header-bg">

        <div class="container">
            <div class="col-md-12 col-sm-12 col-lg-12 login-register">
                <div class="set_TheHeader">
                    <div class="inner_ser_header">
                        <ul>
                            @if(Route::has('login'))
                            @auth
                            <li><a class="register" id="register" href="{{route('userProfile')}}"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}}</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> @lang('header.logout')</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            <!--<li class="friend"><a  class="refer" href="{{route('referFriend')}}">@lang('header.refer_friend')</a></li>-->
                            @else
                            <!--<li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
              <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Register</a></li>-->
                            <li><a class="login openpop" id="login" data-target="#mainmodal" data-toggle="modal" href="#"><i class="fa fa-user"></i>@lang('header.login')</a></li>
                            <li><a class="register openpop" data-target="#mainmodal" id="register" data-toggle="modal" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>@lang('header.register')</a></li>
                            @endauth
                            <!--  <li class="friend"><a  class="refer" href="#">Refer a friend</a></li> -->
                            @endif
                        </ul>
                    </div>
                    <div class="language">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if ( Config::get('app.locale') == 'en')
                                <img src="{{asset('front/images/en.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">English</span>
                                @elseif ( Config::get('app.locale') == 'tr' )
                                <img src="{{asset('front/images/tr.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Turkish</span>
                                @elseif ( Config::get('app.locale') == 'ar' )
                                <img src="{{asset('front/images/ar.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Arabic</span>
                                @elseif ( Config::get('app.locale') == 'ru' )
                                <img src="{{asset('front/images/ru.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Russian</span>
                                @elseif ( Config::get('app.locale') == 'de' )
                                <img src="{{asset('front/images/de.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Germany</span>
                                @elseif ( Config::get('app.locale') == 'it' )
                                <img src="{{asset('front/images/it.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Italian</span>
                                @elseif ( Config::get('app.locale') == 'fr' )
                                <img src="{{asset('front/images/fr.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">French</span>
                                @elseif ( Config::get('app.locale') == 'es' )
                                <img src="{{asset('front/images/es.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Spanish</span>
                                @elseif ( Config::get('app.locale') == 'se' )
                                <img src="{{asset('front/images/se.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Swedish</span>
                                @elseif ( Config::get('app.locale') == 'jp' )
                                <img src="{{asset('front/images/jp.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Japanese</span>
                                @elseif ( Config::get('app.locale') == 'fa' )
                                <img src="{{asset('front/images/fa.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Persian</span>
                                @elseif ( Config::get('app.locale') == 'pr' )
                                <img src="{{asset('front/images/pr.png')}}" class="flag" alt="" /><span style="font-size:0.8rem !important">Portuguese</span>
                                @endif
                            </a>
                            @php
                            $languages = App\Setlang::first();
                            $explodes = explode(',',$languages->lang);
                            @endphp
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($explodes as $exp)
                                <a class="dropdown-item" href="locale/{{$exp}}"><img src="{{asset('front/images/'.$exp.'.png')}}" class="flag" alt="" /><span>
                                        @if($exp == 'en')
                                        English
                                        @elseif($exp == 'tr')
                                        Turkish
                                        @elseif($exp == 'ar')
                                        Arabic
                                        @elseif($exp == 'ru')
                                        Russian
                                        @elseif($exp == 'de')
                                        Germany
                                        @elseif($exp == 'it')
                                        Italian
                                        @elseif($exp == 'fr')
                                        French
                                        @elseif($exp == 'es')
                                        Spanish
                                        @elseif($exp == 'se')
                                        Swedish
                                        @elseif($exp == 'fa')
                                        Japanese
                                        @elseif($exp == 'jp')
                                        Persian
                                        @elseif($exp == 'pr')
                                        Portuguese
                                        @endif
                                    </span></a>
                                @endforeach

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--  <form method="post" action="{{route('setLan')}}" id="lanForm" hidden>
                      {{ csrf_field() }}
                    <input type ="text" id="lan" name="lan">
                    <input type = "submit">
  </form> -->
    <?php 
     
     // $count = Request::segment()->all();
  ?>
    <!-- <input type = "text" name ="route" id ="route" value="{{Request::segment(1)}}">
  <input type = "submit">
 </form> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg study_customnav about_nav sticky" id="about_nav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{route('mainhome')}}"><img src="{{asset('front/images/logo.png')}}" alt="logo"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item {{ Request::path() == 'mainhome' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('mainhome')}}">@lang('header.home_menu')</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'aboutus' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('aboutus')}}">@lang('header.about_menu')</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'allCourse' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('allCourse')}}">@lang('header.course_menu')</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'allAccommodation' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('allaccommodation')}}">@lang('header.accommodation_menu')</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'blog' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('blogList')}}">@lang('header.blog_menu')</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'contactus' ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contactUs')}}">@lang('header.contact_us')</a>
                    </li>
                    <li>
                        <a class="nav-link let-us-call-you" data-toggle="modal" data-target="#letUsCall" href="#">@lang('header.let_us_call')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Navigation end-->
    <div id="letUsCall" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">
                        <i class="fa fa-phone"></i> @lang('header.let_us_call_instantly')</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('callUS')}}" id="phoneform" class="bootstrap-form needs-validation" novalidate>
                        {{ csrf_field()}}
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" id="name" name="fname" placeholder="@lang('header.fname')" autocomplete="off" required>
                                <div class="valid-feedback">
                                    @lang('header.look_good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('header.look_bad')
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" id="name" name="lname" placeholder="@lang('header.lname')" autocomplete="off" required>
                                <div class="valid-feedback">
                                    @lang('header.look_good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('header.look_bad')
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="tel" class="form-control input-text full-width" id="phone" name="phone" autocomplete="off" required>
                                <div class="valid-feedback" id="resultphone1">
                                </div>
                                <div class="invalid-feedback" id="resultphone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox" required>
                                    <label class="form-check-label" for="checkbox">
                                        @lang('header.agree_tac')
                                    </label>
                                    <div class="valid-feedback">
                                        @lang('header.hmm_agreed')
                                    </div>
                                    <div class="invalid-feedback">
                                        @lang('header.you_must_agree')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary" type="submit">@lang('header.submit')</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('header.close')</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //window.onscroll = function() {myFunction()};
var header = document.getElementById("about_nav");
var sticky = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
    </script>