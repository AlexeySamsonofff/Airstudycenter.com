<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AIR STUDY CENTER</title>
    <link rel="shortcut icon" href="{{asset('front/dpassets/img/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front/dpassets/css/style.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <!-- <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3561/magnific-popup.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@15.0.2/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div id="Header">
            <header>
                <div style="padding-top: 1px;"></div>
                <nav class="navbar  navbar-expand-xl  navbar-dark top-navbar bg-transparent p-0 pt-2 pb-2" data-toggle="sticky-onscroll" style="    transition: background-color 1s ease-out;">
                    <a class="navbar-brand pl-3" href="{{App::make('url')->to('/')}}" style="font-size: 20px;"><img src="{{asset('front/dpassets/img/logo.png')}}" width="20" class='align-baseline' alt=""> AIR STUDY CENTER</a>
                    <button class="navbar-toggler mr-4 mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navH navbar-collapse justify-content-end pb-lg-0 pb-3 pr-4 pl-2 " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{App::make('url')->to('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{App::make('url')->to('/allCourse')}}">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{App::make('url')->to('/allAccommodation')}}">Accommodation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{App::make('url')->to('/aboutus')}}">About Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @if(Auth::check())
                            <li class="nav-item pl-xl-2 dropdown dropdown-user">
                                <a class="nav-link dropdown-toggle dropdown-user-link" href="{{ route('login') }}" onclick="return false;" data-toggle="dropdown" ><i class="fa fa-user"></i> {{ Auth::user()->name }} 
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{App::make('url')->to('/inbox')}}">
                                        Inbox
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{App::make('url')->to('/userprofile')}}">
                                        User Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{App::make('url')->to('/wishlistcourse')}}">
                                        Wishlist
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{App::make('url')->to('/payment')}}">
                                        Payment history
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{App::make('url')->to('/credit')}}">
                                        My credit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{App::make('url')->to('/invitefriend')}}">
                                        Invite friend
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item pl-xl-2">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                <a class="nav-link bg-primary d-inline-block p-1 pl-2 pr-2 mt-1 regBorder" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            @else
                            <li class="nav-item pl-xl-2 ">
                                <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item pl-xl-2">
                                <a class="nav-link bg-primary d-inline-block p-1 pl-2 pr-2 mt-1 regBorder" href="{{ route('login') }}?page=register">Register</a>
                            </li>
                            @endif
                            <li class="nav-item pl-xl-2 dropdown">
                                <a class="nav-link dropdown-toggle enTogle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    EN
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">UR</a>
                                    <a class="dropdown-item" href="#">ARB</a>
                                </div>
                            </li>
                            <li class="nav-item pl-xl-2">
                                <a class="nav-link border  d-inline-block border-white pl-2 pr-2 mt-1 requestCall" style="padding-top: 3px;  padding-bottom: 3px !important;" data-toggle="modal" data-target="#exampleModal">Request call<i class="ml-2 iconSz fal fa-phone" aria-hidden="true"></i></a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </header>
            <!-- End top header-->
        </div>
        <h1 class="text-center text-white font-weight-normal pt-5" style="font-size: 45px;">
            Find the <strong>Best</strong> Deals
        </h1>
    </div>
