<!-- <form method="POST" action="{{ url('/register') }}">
    @csrf
    <input type="hidden" id="acco_id" name="acco_id"> -->
    <!--enquiry detail -->                   
    <div class="row m-0 mb-5 enquirydetail" >
        <div class="col-9 pl-0 pr-1">
            <p class="enquiryname_e">  </p><input type="hidden" class="enquiryname_e" name="reciver_name">  
            <p class="mb-2 titlespan"><i class="fas fa-map-marker-alt pr-1"></i><span class="address"></span><input type="hidden" name="address" class="address"></p>
            <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-utensils"></i><span class="sel_type"></span><input type="hidden" name="sel_type" id="sel_type"></p>   
            <input type="hidden" name="accFood" id="accFood">   
            <p class="mb-2 titlespan"><i class="bg-light rounded-circle far fa-calendar-alt"></i><span class="date"></span><input type="hidden" name="from" id="date"></p>
            <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-users"></i><span class="duration"></span> weeks<input type="hidden" name="duration" id="duration"></p>                            
        
        </div>
        <div class="col-3 pl-1 pr-0 mark2">
        <img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle ">
        <h5 >£<span class="price"></span> p/w </h5><input type="hidden" class="price" name="price">
        <h4 >Total £<span class="total_price"></span> p/w </h4><input type="hidden" class="total_price" name="total_price">
        </div>
    </div>                     
    <!-- end enquiry detail -->
    <div id="block1">
        <!-- send message -->	
        <div class="media d-block d-md-flex mt-3 shadow-textarea">
            <div class="media-body text-center text-md-left">
                <h5 class="mt-0 font-weight-bold blue-text mb-3">Send  a Message</h5>
                <div class="form-group basic-textarea rounded-corners mb-md-0 mb-4">
                    <textarea class="form-control z-depth-1"  rows="3" id="message" name="message" placeholder="your message"></textarea>
                </div>
            </div>
        </div>
        <!--end send message -->
        <div class="block2" >                        
            <h3>continue with</h3>
            <div class="ButtonLogin mt-2 mb-4 ">
                <a href="" class="btn fblogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-facebook-square"></i><span>FACEBOOK</span></a>
                <a href="" class="btn glogin d-inline-block text-white p-0" style="font-weight:bold;"><i class="fab fa-google"></i><span>GOOGLE</span> </a>
            </div>
            or
            <div class="ButtonLogin mt-2 mb-4" >                        
                <span  class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4  btn-hover-trasparent" id="checkbtn">Continue with email</span>
                <p class="mb-0">Alreay have an account?<a href="#hostLogin" rel="hostLogin" id="host-login-selector" class="text-primary ml-2 trsfer-btn" style="color:#374354 !important;"><u>Login</u></a></p>
            </div>
        </div>
    </div> 
    <div id="block2" class="block2" style="display:none;">                        
        <div class="height-effect" >  

            <div class="d-md-none d-block w-100" style="height:39px;"></div>
            <span class="back mb-3 d-inline-block" style="color:#8398B6;" onclick="showback()"><i class="fas fa-arrow-left"></i> BACK</span>
                <form action="{{ route('register') }}" method="post">
                        	{{ csrf_field() }}
								<input type="hidden" name="role" value="Student">
                                <input type="hidden" name="registerform" value="1">
                                <input type="hidden" name="referid" value="<?php if(isset($_GET['code'])){ $result = $_GET['code']; echo $refercode = substr($result, 0, 2); } ?>">

                            <div class="form-group labels-div">
                                <label for="signupName" class="mb-0">Full Name</label>
                                <input type="text" name="name" class="form-control" id="signupName" placeholder="John Smith">
                            </div>
                            
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
                        </form>
        </div>
    </div>    
<!-- <form> -->