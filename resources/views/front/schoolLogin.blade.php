@extends('front.index1_new_login')
@section('title', 'School')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
<div class="">
    <div class="container-fluid school p-0">
            <a href="{{App::make('url')->to('')}}" class="back pt-3 d-block " style="color:#8398B6; position: absolute; z-index: 100; top: 0; left: 10px;"><i class="fas fa-arrow-left"></i> BACK</a>
        <div class="row pt-4 m-0">
            <div class="pl-lg-5 pl-4 pr-lg-5 pr-4 pb-0 pt-0 col-xl-4 col-md-5 m-auto left-side-bar">
                <div id="schoolLogin" class="dont-show  show-page">
                    <div class="height-effect">
                        <div class="text-center">
                            <i class="fas fa-school bg-primary rounded-school p-2 text-white "></i>
                        </div>
                        <h2 class="font-weight-bold HeadingS1 mb-lg-4 mb-3" style="font-size: 36px;">School Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group labels-div">
                                <label for="schoolloginEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="schoolloginEmail" name="email" placeholder="youremail@domain.com">
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="schoolloginPassword" class="mb-0">Password *</label>
                                <input type="password" class="form-control" id="schoolloginPassword" name="password" placeholder="●●●●●●●●●●">
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
                                Don’t have an account?<a href="#school-signup-page" rel="school-signup-page" id="school-signup-page-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Create an account</u> </a><br>
                                forgot password? <a href="#schoolRecoverPasword" rel="schoolRecoverPasword" id="school-recoverPasword-selector" class="text-primary ml-2 trsfer-btn " style="color:#374354 !important;"><u>Reset</u> </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="schoolRecoverPasword" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <div class="text-center">
                            <i class="fas fa-school bg-primary rounded-school p-2 text-white "></i>
                        </div>
                        <!-- <a href="" class="back mb-3 d-inline-block" style="color:#8398B6;"><i class="fas fa-arrow-left"></i> BACK</a> -->
                        <h2 class="font-weight-bold HeadingS1 mb-4 d-none d-lg-block" style="font-size: 34px;">Recover password</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-3 pb-1 d-block d-lg-none" style="font-size: 25px;">Recover password</h2>
                        <form action="">
                            <div class="form-group labels-div">
                                <label for="schoolEmailRecover" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="schoolEmailRecover" placeholder="youremail@domain.com">
                                <a href="" class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">LOGIN</a>
                                <br>
                                <a href="#schoolLogin" rel="schoolLogin" id="school-login-selector" class="text-primary return returnLgin trsfer-btn"> <i class="fas fa-angle-left pr-2"></i><u>Return to Login</u> </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="school-signup-page" class="dont-show" style="display:none;">
                    <div class="height-effect">
                        <div class="text-center">
                            <i class="fas fa-school bg-primary rounded-school p-2 text-white "></i>
                        </div>
                        <h2 class="font-weight-bold HeadingS1 mb-2 d-none d-lg-block" style="font-size: 31px;">Create new school account</h2>
                        <h2 class="font-weight-bold HeadingS1 mb-2 pb-1 d-block d-lg-none" style="font-size: 27px;">Create new account</h2>
                        <p style="color:#374354 !important;" class="mb-4">Use your work email to create a new account.</p>
                        <form action="{{ route('register') }}" method="post">
                        	{{ csrf_field() }}

								<input type="hidden" name="role" value="School Admin">
                                <input type="hidden" name="registerform" value="1">
                                <input type="hidden" name="referid" value="<?php if(isset($_GET['code'])){ $result = $_GET['code']; echo $refercode = substr($result, 0, 2); } ?>">

                            <div class="form-group labels-div">
                                <label for="schoolSignupName" class="mb-0">Full Name</label>
                                <input type="text" name="name" class="form-control" id="schoolSignupName" placeholder="John Smith">
                            </div>
                            <!-- <div class="form-group labels-div">
                                <label for="schoolSignupCompanyName" class="mb-0">Company Name</label>
                                <input type="text" name="company" class="form-control" id="schoolSignupCompanyName" placeholder="Company name">
                            </div> -->
                            <div class="form-group labels-div">
                                <label for="schoolSignupEmail" class="mb-0">Business email</label>
                                <input type="email" name="email" class="form-control" id="schoolSignupEmail" placeholder="yourworkemail@domain.com">
                            </div>
                            <div class="form-group labels-div mb-4 pb-2">
                                <label for="schoolSignupPassword" class="mb-0">Password *</label>
                                <input type="password" name="password" class="form-control" id="schoolSignupPassword" placeholder="●●●●●●●●●●">
                            </div>
                            <label class="container-checkbox">I have read the <a href="{{route('singlepage',['id'=>5])}}" style="color:#374354 !important;"><u>Terms and Conditions</u></a>.
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <button type='submit' class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 font-weight-bold btn-hover-trasparent">CREATE YOUR ACCOUNT</button>
                            <p class="mb-0">Have an account?<a href="#schoolLogin" rel="schoolLogin" id="school-login-selector" class="text-primary ml-2 trsfer-btn" style="color:#374354 !important;"><u>Login</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <a href="" class=" pt-3 d-block" style="color:#8398B6;"></a>
        <div class="all-bottom text-white pt-2 pb-2 text-center bg-primary">
            <span class="d-none d-lg-block d-md-none d-sm-block">AirStudyCenter Schools Login Portal - 2020 All rights reserved</span>
            <span class="d-block d-lg-none d-md-block d-sm-none" style="font-size:11px;">AirStudyCenter Schools Login Portal - 2020 All rights reserved</span>
        </div>
    </div>
</div>
@endsection
