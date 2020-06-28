
<style>
.footer-static {
    background-color:#126470!important;
  }
  .text{
    color:white;
  }
</style>
<!--footer start-->
<div  class="footer-static text-white">
        <div class="container">
            <div class="row m-0 pb-3">
                <div class="col-xl-3 col-lg-4 col-md-6 p-1 compInfo">
                    <div class="row m-0">
                        <div class="col-1 pr-1 pl-0">
                            <img src="{{asset('front/dpassets/img/logo.png')}}" alt="">
                        </div>
                        <div class="col-11 pl-1 pr-0 mb-2 pb-1 logoName">AIR STUDY CENTER</div>
                    </div>
                    <p class="mr-lg-5 pr-5 text">Air Study Center is a platform that brings language schools and studens together.</p>
                    <div class="d-md-block">
                        <a href="https://twitter.com/AirStudyCenter1"><i class="mr-2 text fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/Air-Study-Center-1016360925238349/"><i class="mr-2 text fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/airstudycenter/"><i class="mr-2 text fa fa-instagram" aria-hidden="true"></i></a>
                        {{-- <a href=""><i class="mr-2 text fa fa-google" aria-hidden="true"></i></a> --}}
                        <div class="mt-3 d-none d-lg-block" style="    border-top: 1.2px solid #ffffff3b;  width: 225px;"></div>
                        <a href="https://goo.gl/maps/cPy7jibrHYZbqQfo9" target="_blank">
                            <p class="mb-2 text mt-4"><i class="mr-3 iconSz fa fa-map-marker" ></i> 29 Westbourne Street, Brighton, United Kingdom</p>
                        </a>
                        <a href="https://wa.me/447367628385" target="_blank">
                            <p class="mb-2 text "><i class="fa fa-phone" ></i> +44-736-762-8385</p>
                        </a>
                        <a href="mailto:info@airstudycenter.com">
                            <p class="mb-2 text "><i class="mr-2 iconSz fa fa-envelope" aria-hidden="true"></i> info@airstudycenter.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-xl-1 d-xl-block d-none"></div>
                <div class="col-lg-2 col-md-6 p-1">
                    <h6 class="pt-2 mb-2 font-weight-bold" style="font-size:18px;">About US</h6>
                    <a href="{{App::make('url')->to('/aboutus')}}">
                        <p class="text ftLink mb-1 pb-1">Who we are</p>
                    </a>
                    <a href="">
                        <p class="text ftLink mb-1 pb-1">Our Story</p>
                    </a>
                    <a href="">
                        <p class="text ftLink mb-1 pb-1">Our Education</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 p-1">
                    <h6 class="pt-2 mb-2 font-weight-bold" style="font-size:18px;">Quick Links</h6>
                    <a href="{{route('faqs')}}">
                        <p class="text ftLink mb-1 pb-1">FAQs</p>
                    </a>
                    <a href="{{App::make('url')->to('/visaList')}}">
                        <p class="text ftLink mb-1 pb-1">Visa information</p>
                    </a>
                    <a href="{{App::make('url')->to('/insuranceList')}}">
                        <p class="text ftLink mb-1 pb-1">Insurance information</p>
                    </a>
                    <a href="{{route('singlepage',['id'=>5])}}">
                        <p class="text ftLink mb-1 pb-1">Terms and conditions</p>
                    </a>
                    <a href="{{route('singlepage',['id'=>6])}}">
                        <p class="text ftLink mb-1 pb-1">Privacy policy</p>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 p-1">
                    <h6 class="pt-2 mb-2 font-weight-bold" style="font-size:18px;">For Partners</h6>
                    <a href="{{route('schoollogin')}}">
                        <p class="text ftLink mb-1 pb-1">School login</p>
                    </a>
                    <a href="{{route('accommodationlogin')}}">
                        <p class="text ftLink mb-1 pb-1">Acc host login</p>
                    </a>
                </div>
            </div>
           
            <!-- <div class="mt-3 d-lg-none d-block mb-2" style="border-top: 1.2px solid #ffffff3b;"></div>          -->
            <div class="text-center copyrightFooter text-white" style="font-weight:bold;">© {{date('Y')}} Air Study Center. All Rights Reserved</div>
        </div>
</div>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('accommodationadmin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('accommodationadmin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"type="text/javascript"></script>
<!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('accommodationadmin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"type="text/javascript"></script>
<!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('accommodationadmin/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('accommodationadmin/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('accommodationadmin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"
  type="text/javascript"></script>
   <!-- <script src="{{asset('accommodationadmin/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script> -->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('accommodationadmin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('accommodationadmin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script> -->
<!-- <script src="{{asset('accommodationadmin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script> -->
<!-- END STACK JS -->


</body>
</html>






