@extends('front.index1_new_login')
@section('title', 'Login')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
<div class="">
    <div class="container-fluid signing ">
        <div class="row h-100">
            <div class="p-lg-5 p-4 col-xl-4 col-md-5 h-100 left-side-bar">
                <div id="Login" class="dont-show  show-page">
                    <div class="height-effect">
                        <div class="d-md-none d-block w-100" style="height:39px;"></div>
                        <a href="{{App::make('url')->to('/')}}" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 34px;">Student Login</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 25px;">Student Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group labels-div">
                                <label for="loginEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="yourworkemail@domain.com">
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="loginPassword" class="mb-0">Password *</label>
                                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="●●●●●●●●●●">
                            </div>
                            <label class="container-checkbox">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            @if ($errors->has('email'))
                            <label style="color:#ff0000">{{ $errors->first('email') }}</label>
                            @endif
                            @if ($errors->has('password'))
                            <label style="color:#ff0000">{{ $errors->first('password') }}</label>
                            @endif
                            <button type="submit" class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">LOGIN</button>
                            <div class="mt-3 mb-5" style=" color:#374354;">
                                Don’t have an account?<a href="#signup-page" rel="signup-page" id="signup-page-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Create account</u> </a><br>
                                Forgot password? <a href="#recoverPasword" rel="recoverPasword" id="recoverPasword-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Reset</u> </a>
                            </div>

                            <div class="mt-3 mb-4" style=" color:#374354;">
                                     <p class="mb-0" style="font-size:16px;">or continue with</p>
                                <div class="ButtonLogin mt-2 mb-4 ">
                                    <a href="" class="btn fblogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                                    <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
                                </div>
                            </div>
                            <!-- <div class="mt-3 mb-3" style=" color:#374354;">
                                 <p class="mb-0" style="font-size:16px;">or continue with</p>
                                <div class="ButtonLogin mt-3">
                                    <a href="" class="btn fblogin d-inline-block text-white p-0 mr-lg-3 mr-2" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                                    <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <div class="all-bottom " style="height:25px; color:#374354;">
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div>
                <div id="recoverPasword" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <div class="d-md-none d-block w-100" style="height:69px;"></div>
                        <a href="" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 34px;">Recover password</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 25px;">Recover password</h2>
                        <form action="">
                            <div class="form-group labels-div">
                                <label for="emailRecover" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="emailRecover" placeholder="youremail@domain.com">
                                <a href="" class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">LOGIN</a>
                                <br>
                                <a href="#Login" rel="Login" id="login-selector" class="text-primary return returnLgin trsfer-btn"> <i class="fas fa-angle-left pr-2"></i><u>Return to Login</u> </a>
                            </div>
                        </form>
                    </div>
                    <div class="all-bottom " style="height:25px; color:#374354;">
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div>
                <div id="signup-page" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <a href="" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a>
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 31px;">Create new student account</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 22px;">Create new student account</h2>
                        <!-- <p style="color:#374354 !important;" class="mb-4">Use your work email to create a new account.</p> -->
                        <form action="{{ route('register') }}" method="post">
                        	{{ csrf_field() }}

								<input type="hidden" name="role" value="Student">
                                <input type="hidden" name="registerform" value="1">
                                <input type="hidden" name="referid" value="<?php if(isset($_GET['code'])){ $result = $_GET['code']; echo $refercode = substr($result, 0, 2); } ?>">

                            <div class="form-group labels-div">
                                <label for="signupName" class="mb-0">Full Name</label>
                                <input type="text" name="name" class="form-control" id="signupName" placeholder="John Smith">
                            </div>
                            <!-- <div class="form-group labels-div">
                                <label for="signupCompanyName" class="mb-0">Company Name</label>
                                <input type="text" name="company" class="form-control" id="signupCompanyName" placeholder="Company name">
                            </div> -->
                            <div class="form-group labels-div">
                                <label for="signupEmail" class="mb-0">Email</label>
                                <input type="email" name="email" class="form-control" id="signupEmail" placeholder="youremail@domain.com">
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="signupPassword" class="mb-0">Password *</label>
                                <input type="password" name="password" class="form-control" id="signupPassword" placeholder="●●●●●●●●●●">
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

                            <!-- <div class="mt-2 mb-3" style=" color:#374354;">
                                     <p class="mb-0" style="font-size:16px;">Alternatively create your account with</p>
                                <div class="ButtonLogin mt-3">
                                    <a href="" class="btn fblogin d-inline-block text-white p-0 mr-lg-3 mr-2" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                                    <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <div class="all-bottom " style="height:50px; color:#374354;">
                            <p class="mb-0">Have an account?<a href="#Login" rel="Login" id="login-selector" class="text-primary ml-2 trsfer-btn" style="color:#374354 !important;"><u>Login</u></a></p>
                        <!-- <p class="mb-0">Have an account?<a href="" class="text-primary ml-2" style="color:#374354 !important;"><u>Login</u></a></p> -->
                        <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter - 2020 All rights reserved</span>
                        <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:12px;">AirStudyCenter - 2020 All rights reserved</span>
                    </div>
                </div>
            </div>
            <div class="p-2 col-xl-8 col-md-7 right-side-bar text-white h-100 d-md-block d-none" style="background-image:url({{asset('front/dpassets/img/forget-bg.png')}})">
                <div class="all-center">
                    <h1 class="font-weight-bold" style="font-size:50px;">FIND THE BEST DEALS</h1>
                    <h2 class="font-weight-light" style="font-size:36px;">Language Schools and Accommodation <br class="d-none d-lg-block"> Services Abroad</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
