@extends('front.index1_new_login')
@section('title', 'Accommodation')
@section('content')
<style>
.invalid-feedback {
    display: block !important;
}
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
<div class="">
    <div class="container-fluid signing ">
        <div class="row h-100">
            <div class=" p-lg-5 p-4 col-xl-4 col-md-5 h-100 left-side-bar">
                <div id="hostLogin" class="dont-show  show-page">
                    <div class="height-effect">
                        <div class="d-md-none d-block w-100" style="height:39px;"></div>
                        <a href="{{App::make('url')->to('')}}" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-lg-4 mb-3" style="font-size: 36px;">Host Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group labels-div">
                                <label for="HostloginEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="HostloginEmail" name="email" placeholder="youremail@domain.com">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="HostloginPassword" class="mb-0">Password *</label>
                                <input type="password" class="form-control" id="HostloginPassword" name="password" placeholder="●●●●●●●●●●">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label class="container-checkbox">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <!-- @if ($errors->has('email'))
                            <label style="color:#ff0000">{{ $errors->first('email') }}</label>
                            @endif
                            @if ($errors->has('password'))
                            <label style="color:#ff0000">{{ $errors->first('password') }}</label>
                            @endif -->
                            <button type="submit" class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">LOGIN</button>
                            <div class="mt-3 mb-5" style=" color:#374354;">
                                Don’t have an account?<a href="#host-signup-page" rel="host-signup-page" id="host-signup-page-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Create an account</u> </a><br>
                                forgot password? <a href="#hostRecoverPasword" rel="hostRecoverPasword" id="host-recoverPasword-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Reset</u> </a>
                            </div>
                            <div class="mt-3 mb-4" style=" color:#374354;">
                                     <p class="mb-0" style="font-size:16px;">or continue with</p>
                                <div class="ButtonLogin mt-2 mb-4 ">
                                    <a href="" class="btn fblogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                                    <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="all-bottom " style="height:25px; color:#374354;">
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div>
                <!-- <div id="hostRecoverPasword" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <div class="d-md-none d-block w-100" style="height:69px;"></div>
                        <a href="" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 34px;">Recover password</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 25px;">Recover password</h2>
                        <form action="">
                            <div class="form-group labels-div">
                                <label for="hostEmailRecover" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="hostEmailRecover" placeholder="youremail@domain.com">
                                <a href="" class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">LOGIN</a>
                                <br>
                                <a href="#hostLogin" rel="hostLogin" id="host-login-selector" class="text-primary return returnLgin trsfer-btn"> <i class="fas fa-angle-left pr-2"></i><u>Return to Login</u> </a>
                            </div>
                        </form>
                    </div>
                    <div class="all-bottom " style="height:25px; color:#374354;">
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div> -->
                <div id="host-signup-page" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <a href="" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 31px;">Create new host account</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 27px;">Create new host account</h2>
                        <!-- <p style="color:#374354 !important;" class="mb-4">Use your work email to create a new account.</p> -->
                        <form action="{{ route('register') }}" method="post">
                        	<!-- {{ csrf_field() }}

								<input type="hidden" name="role" value="Student">
                                <input type="hidden" name="registerform" value="1">
                                <input type="hidden" name="referid" value="<?php if(isset($_GET['code'])){ $result = $_GET['code']; echo $refercode = substr($result, 0, 2); } ?>"> -->

                            <div class="form-group labels-div">
                                <label for="hostSignupName" class="mb-0">Full Name</label>
                                <input type="text" name="name" class="form-control" id="hostSignupName" placeholder="John Smith">
                            </div>
                            <!-- <div class="form-group labels-div">
                                <label for="hostSignupCompanyName" class="mb-0">Company Name</label>
                                <input type="text" name="company" class="form-control" id="hostSignupCompanyName" placeholder="Company name">
                            </div> -->
                            <div class="form-group labels-div">
                                <label for="hostSignupEmail" class="mb-0">Email</label>
                                <input type="email" name="email" class="form-control" id="hostSignupEmail" placeholder="youremail@domain.com">
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="hostSignupPassword" class="mb-0">Password *</label>
                                <input type="password" name="password" class="form-control" id="hostSignupPassword" placeholder="●●●●●●●●●●">
                            </div>
                            <label class="container-checkbox">I have read the <a href="{{route('singlepage',['id'=>5])}}" style="color:#374354 !important;"><u>Terms and Conditions</u></a>.
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <button type='submit' class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">CREATE YOUR ACCOUNT</button>
                            <div class="mt-3 mb-4" style=" color:#374354;">
                                     <p class="mb-0" style="font-size:16px;">Alternatively create your account with</p>
                                <div class="ButtonLogin mt-2 mb-4 ">
                                    <a href="" class="btn fblogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                                    <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="all-bottom " style="height:50px; color:#374354;">
                            <p class="mb-0">Have an account?<a href="#hostLogin" rel="hostLogin" id="host-login-selector" class="text-primary ml-2 trsfer-btn" style="color:#374354 !important;"><u>Login</u></a></p>
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div>
            </div>
            <div class="p-2 col-xl-8 col-md-7 right-side-bar text-white h-100 d-md-block d-none" style="background-image:url({{asset('front/dpassets/img/hostLogin.png')}})">
                <div class="all-center">
                    <h1 class="font-weight-bold" style="font-size:50px;">Host Students from <br class="d-lg-block d-none"> Across the World.</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
