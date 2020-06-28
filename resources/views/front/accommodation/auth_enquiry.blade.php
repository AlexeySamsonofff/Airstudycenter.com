<form method="POST" action="{{ url('accommodetaionenquiry_send') }}">
        @csrf
        <input type="hidden" id="acco_id"  name="accommodationId">
        <input type="hidden" id="type_id" name="typeId">
        <!--enquiry detail -->                   
        <div class="row m-0 mb-5 enquirydetail" >
            <div class="col-9 pl-0 pr-1">
                <p class="enquiryname_e">  </p>
                <!-- <input type="hidden" class="enquiryname_e" name="reciver_name">   -->
                <p class="mb-2 titlespan " ><i class="fas fa-map-marker-alt pr-1"></i><span class="address"></span><input type="hidden" name="address" class="address"></p>
                <p class="mb-2 titlespan " ><i class="bg-light rounded-circle fas fa-utensils"></i><span class="sel_type"></span><input type="hidden" name="sel_type" id="sel_type"></p>   
                <input type="hidden" name="accFood"  id ="accFood">          
                <p class="mb-2 titlespan "><i class="bg-light rounded-circle far fa-calendar-alt"></i><span class="date"></span><input type="hidden" name="from" id="date"></p>
                <p class="mb-2 titlespan "><i class="bg-light rounded-circle fas fa-users"></i> <span class="duration"></span> weeks<input type="hidden" name="duration" id="duration"></p>                            
            
            </div>
            <div class="col-3 pl-1 pr-0 mark2">
                <img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle ">
            <h5 >£<span class="price"></span> p/w </h5><input type="hidden" class="price" name="price">
            <h4 >Total £<span class="total_price"></span>  </h4><input type="hidden" class="total_price" name="total_price">
            </div>
        </div>                     
        <!-- end enquiry detail -->
        <div id="block1">
            <!-- send message -->	
            <div class="media d-block d-md-flex mt-3 shadow-textarea">
                <div class="media-body text-center text-md-left">
                    <h5 class="mt-0 font-weight-bold blue-text mb-3">Send  a Message</h5>
                    <div class="form-group basic-textarea rounded-corners mb-md-0 mb-4">
                        <textarea class="form-control z-depth-1"  rows="3"  name="message" placeholder="your message"></textarea>
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
                    <button type="submit"  class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4  btn-hover-trasparent">Continue with email</button>
                    <p class="mb-0">Alreay have an account?<a href="#hostLogin" rel="hostLogin" id="host-login-selector" class="text-primary ml-2 trsfer-btn" style="color:#374354 !important;"><u>Login</u></a></p>
                </div>
            </div>
        </div>                 
    <form>