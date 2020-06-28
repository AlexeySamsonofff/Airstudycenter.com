<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>::Air Study Center::</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom font awesome css -->
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{asset('front/css/owl-carousel.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.theme.default.min.css')}}" rel="stylesheet">
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
                            <li><a class="register" id="register" href="{{route('userProfile')}}"><i class="fa fa-user-circle"></i> {{Auth::user()->name}} <i class="fa fa-user"></i> <i class="fa fa-angle-down"></i></a></li>
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
    @php
    use App\School;
    $cities = App\Schooladdress::join('schools', 'schools.id','=','schooladdresses.schoolId')->where('schools.status', 1)->select('schooladdresses.cityId')->distinct()->get();
    foreach($cities as $city){
    $data_city = $city->cityId;
    $city_explode = explode('|', $data_city);
    $city_code = $city_explode[1];
    $city->cityname = $city_code;
    }
    @endphp
    <!---slider start-->
    <div id="study_slider" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Indicators -->
        @if(count($sliderImages->toArray()) > 0)
        <ul class="carousel-indicators">
            @foreach($sliderImages->toArray() as $slide)
            <li data-target="#study_slider" data-slide-to="{{$loop->iteration - 1}}" class="@if($loop->iteration == 1) {{'active'}} @endif"></li>
            @endforeach
        </ul>
        @else
        <ul class="carousel-indicators">
            <li data-target="#study_slider" data-slide-to="0" class="active"></li>
            <li data-target="#study_slider" data-slide-to="1"></li>
            <li data-target="#study_slider" data-slide-to="2"></li>
        </ul>
        @endif
        <!-- The slideshow -->
        <div class="container">
            <div class="banner-form">
                <div class="slider-form">
                    <h3 class="w-100 mb-0 float-left text-center">@lang('header.search_title')</h3>
                    <p class="w-100 float-left text-center">@lang('header.search_heading')</p>
                    <form id="homesearch" action="{{route('homeSearch')}}" method="post" novalidate="novalidate" class="float-left w-100">
                        {{ csrf_field()}}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('header.budget')</label>
                                                <input class="form-control" type="text" name="budget" placeholder="@lang('header.enter_budget')" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('header.course_type')</label>
                                                <select class="form-control" name="search_course" id="exampleFormControlSelect1">
                                                    <option value="">@lang('header.search_course')</option>
                                                    @foreach($getallCourseTitles as $titles)
                                                    @if ( Config::get('app.locale') == 'en')
                                                    <option value="{{$titles->name}}">{{$titles->name}}</option>
                                                    @elseif ( Config::get('app.locale') == 'tr' )
                                                    <option value="{{$titles->name_tr}}">{{$titles->name_tr}}</option>
                                                    @elseif ( Config::get('app.locale') == 'ar' )
                                                    <option value="{{$titles->name_ar}}">{{$titles->name_ar}}</option>
                                                    @elseif ( Config::get('app.locale') == 'ru' )
                                                    <option value="{{$titles->name_ru}}">{{$titles->name_ru}}</option>
                                                    @elseif ( Config::get('app.locale') == 'de' )
                                                    <option value="{{$titles->name_de}}">{{$titles->name_de}}</option>
                                                    @elseif ( Config::get('app.locale') == 'it' )
                                                    <option value="{{$titles->name_it}}">{{$titles->name_it}}</option>
                                                    @elseif ( Config::get('app.locale') == 'fr' )
                                                    <option value="{{$titles->name_fr}}">{{$titles->name_fr}}</option>
                                                    @elseif ( Config::get('app.locale') == 'es' )
                                                    <option value="{{$titles->name_es}}">{{$titles->name_es}}</option>
                                                    @elseif ( Config::get('app.locale') == 'se' )
                                                    <option value="{{$titles->name_se}}">{{$titles->name_se}}</option>
                                                    @elseif ( Config::get('app.locale') == 'jp' )
                                                    <option value="{{$titles->name_jp}}">{{$titles->name_jp}}</option>
                                                    @elseif ( Config::get('app.locale') == 'fa' )
                                                    <option value="{{$titles->name_fa}}">{{$titles->name_fa}}</option>
                                                    @elseif ( Config::get('app.locale') == 'pr' )
                                                    <option value="{{$titles->name_pr}}">{{$titles->name_pr}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <!--<input class="form-control search_box" type="text" name="search_course" id="autosearchcourse" placeholder="@lang('header.search_course')"/>-->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('header.course_length')</label>
                                                <select class="form-control" name="search_length" id="exampleFormControlSelect1">
                                                    <option value="">@lang('header.course_length')</option>
                                                    <option value="ppw1">1 @lang('header.week')</option>
                                                    <option value="ppw1">2 @lang('header.week')</option>
                                                    <option value="ppw1">3 @lang('header.week')</option>
                                                    <option value="ppw1">4 @lang('header.week')</option>
                                                    <option value="ppw2">5 @lang('header.week')</option>
                                                    <option value="ppw2">6 @lang('header.week')</option>
                                                    <option value="ppw2">7 @lang('header.week')</option>
                                                    <option value="ppw2">8 @lang('header.week')</option>
                                                    <option value="ppw3">9 @lang('header.week')</option>
                                                    <option value="ppw3">10 @lang('header.week')</option>
                                                    <option value="ppw3">11 @lang('header.week')</option>
                                                    <option value="ppw3">12 @lang('header.week')</option>
                                                    <option value="ppw4">13 @lang('header.week')</option>
                                                    <option value="ppw4">14 @lang('header.week')</option>
                                                    <option value="ppw4">15 @lang('header.week')</option>
                                                    <option value="ppw4">16 @lang('header.week')</option>
                                                    <option value="ppw5">17 @lang('header.week')</option>
                                                    <option value="ppw5">18 @lang('header.week')</option>
                                                    <option value="ppw5">19 @lang('header.week')</option>
                                                    <option value="ppw5">20 @lang('header.week')</option>
                                                    <option value="ppw6">21 @lang('header.week')</option>
                                                    <option value="ppw6">22 @lang('header.week')</option>
                                                    <option value="ppw6">23 @lang('header.week')</option>
                                                    <option value="ppw6">24 @lang('header.week')</option>
                                                    <option value="ppw7">25 @lang('header.week')</option>
                                                    <option value="ppw7">26 @lang('header.week')</option>
                                                    <option value="ppw7">27 @lang('header.week')</option>
                                                    <option value="ppw7">28 @lang('header.week')</option>
                                                    <option value="ppw8">29 @lang('header.week')</option>
                                                    <option value="ppw8">30 @lang('header.week')</option>
                                                    <option value="ppw8">31 @lang('header.week')</option>
                                                    <option value="ppw8">32 @lang('header.week')</option>
                                                    <option value="ppw9">33 @lang('header.week')</option>
                                                    <option value="ppw9">34 @lang('header.week')</option>
                                                    <option value="ppw9">35 @lang('header.week')</option>
                                                    <option value="ppw9">36 @lang('header.week')</option>
                                                    <option value="ppw10">37 @lang('header.week')</option>
                                                    <option value="ppw10">38 @lang('header.week')</option>
                                                    <option value="ppw10">39 @lang('header.week')</option>
                                                    <option value="ppw10">40 @lang('header.week')</option>
                                                    <option value="ppw11">41 @lang('header.week')</option>
                                                    <option value="ppw11">42 @lang('header.week')</option>
                                                    <option value="ppw11">43 @lang('header.week')</option>
                                                    <option value="ppw11">44 @lang('header.week')</option>
                                                    <option value="ppw12">45 @lang('header.week')</option>
                                                    <option value="ppw12">46 @lang('header.week')</option>
                                                    <option value="ppw12">47 @lang('header.week')</option>
                                                    <option value="ppw12">48 @lang('header.week')</option>
                                                    <option value="ppw13">49 @lang('header.week')</option>
                                                    <option value="ppw13">50 @lang('header.week')</option>
                                                    <option value="ppw13">51 @lang('header.week')</option>
                                                    <option value="ppw13">52 @lang('header.week')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">@lang('header.city')</label>
                                                <select class="form-control" name="city" id="exampleFormControlSelect1">
                                                    <option value="">@lang('header.select_city')</option>
                                                    option
                                                    @foreach($cities as $city)
                                                    <option value="{{$city->cityId}}">{{$city->cityname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label class="w-100 float-left" for="exampleFormControlSelect1">&nbsp;</label>
                                            <button type="submit" class="search-btn mt-2">@lang('header.search')</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(count($sliderImages->toArray()) > 0)
        <div class="carousel-inner">
            @foreach($sliderImages->toArray() as $slide)
            <div class="carousel-item @if($loop->iteration == 1) {{'active'}} @endif" style="margin-top:142px">
                @if($slide['slide_type'] == 'image')
                <img src="{{$slide['content']}}" alt="{{$slide['heading']}}" class="img-responsive">
                @else
                <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{$slide['content']}}?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&iv_load_policy=3&rel=0&autohide=1&wmode=opaque&autohide=1" frameborder="0" allowfullscreen></iframe>
                @endif
                <div class="carousel-slogan">
                    <h1>{{$slide['heading']}}</h1><br>
                    <h3>{{$slide['sub_heading']}}</h3>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('front/images/slider10.jpg')}}" alt="slider">
                <div class="carousel-slogan">
                    <h1>FIND THE BEST DEALS</h1><br>
                    <h3>LANGUAGE SCHOOLS & ACCOMMODATION SERVICES ABROAD</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/images/slider2.png')}}" alt="slider">
                <div class="carousel-slogan">
                    <h1>FIND THE BEST DEALS</h1><br>
                    <h3>LANGUAGE SCHOOLS & ACCOMMODATION SERVICES ABROAD</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/images/slider3.png')}}" alt="slider">
                <div class="carousel-slogan">
                    <h1>FIND THE BEST DEALS</h1><br>
                    <h3>LANGUAGE SCHOOLS & ACCOMMODATION SERVICES ABROAD</h3>
                </div>
            </div>
            <!---slider-form start-->
            <!---slider-form end-->
        </div>
        @endif
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#study_slider" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#study_slider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg study_customnav sticky" style="height:unset;" id="study_customnav">
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
        <!-- Modal -->
        <div id="letUsCall" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">
                            <i class="fa fa-phone"></i>@lang('header.let_us_call_instantly')</h2>
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
        @php
        $headertitle = App\Headertitle::where('id', 1)->first();
        @endphp
        @if($headertitle)
        <div class="carousel-slogan">
            <div class="carousl-inner" style="background:{{$headertitle->backgroundColor}}; color: {{$headertitle->textColor}}">
                {{--@if ( Config::get('app.locale') == 'en')
                  {!! $headertitle->title !!}
                @elseif ( Config::get('app.locale') == 'tr' )
                  {!! $headertitle->title_tr !!}
                @elseif ( Config::get('app.locale') == 'ar' )
                  {!! $headertitle->title_ar !!}
                @elseif ( Config::get('app.locale') == 'ru' )
                  {!! $headertitle->title_ru !!}
                @elseif ( Config::get('app.locale') == 'de' )
                  {!! $headertitle->title_de !!}
                @elseif ( Config::get('app.locale') == 'it' )
                  {!! $headertitle->title_it !!}
                @elseif ( Config::get('app.locale') == 'fr' )
                  {!! $headertitle->title_fr !!}
                @elseif ( Config::get('app.locale') == 'es' )
                  {!! $headertitle->title_es !!}
                @elseif ( Config::get('app.locale') == 'se' )
                  {!! $headertitle->title_se !!}
                @elseif ( Config::get('app.locale') == 'jp' )
                  {!! $headertitle->title_jp !!}
                @elseif ( Config::get('app.locale') == 'fa' ) 
                  {!! $headertitle->title_fa !!}          
                @elseif ( Config::get('app.locale') == 'pr' )
                  {!! $headertitle->title_pr !!}
				@endif  --}}
            </div>
        </div>
        @else
        <!-- <div class="carousel-slogan"><div class="carousl-inner"><h1>FIND THE BEST DEALS</h1><br>
              <h3>LANGUAGE SCHOOLS & ACCOMMODATION SERVICES ABROAD</h3></div></div>-->
        @endif
    </div> <!-- slider end -->
    <script type="text/javascript">
        var header = document.getElementById("study_customnav");
var sticky = header.offsetTop;
$( document ).ready(function() {
	//header.style.marginTop = "45px";
});
  
window.onscroll = function() {myFunction()};
 
function myFunction() {
	if (window.pageYOffset > sticky) {
		//header.classList.add("sticky");
		//header.style.marginTop = "0px";
	} else {
		//header.style.marginTop = "45px";
		//header.classList.remove("sticky");
	}
}
    </script>