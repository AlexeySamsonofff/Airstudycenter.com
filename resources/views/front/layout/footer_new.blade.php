<!--footer start-->
<div id="footer">
    <div class="footer pt-5 pb-2">
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
                    <div class="d-md-block d-none">
                        <a href="https://twitter.com/AirStudyCenter1"><i class="mr-2 fab fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/Air-Study-Center-1016360925238349/"><i class="mr-2 fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/airstudycenter/"><i class="mr-2 fab fa-instagram" aria-hidden="true"></i></a>
                        {{-- <a href=""><i class="mr-2 fab fa-google" aria-hidden="true"></i></a> --}}
                        <div class="mt-3 d-none d-lg-block" style="    border-top: 1.2px solid #ffffff3b;  width: 225px;"></div>
                        <a href="https://goo.gl/maps/cPy7jibrHYZbqQfo9" target="_blank">
                            <p class="mb-2 text mt-4"><i class="mr-3 iconSz fas fa-map-marker" aria-hidden="true"></i> 29 Westbourne Street, Brighton, United Kingdom</p>
                        </a>
                        <a href="https://wa.me/447367628385" target="_blank">
                            <p class="mb-2 text "><i class="mr-2 iconSz fas fa-phone" aria-hidden="true"></i> +44-736-762-8385</p>
                        </a>
                        <a href="mailto:info@airstudycenter.com">
                            <p class="mb-2 text "><i class="mr-2 iconSz fas fa-envelope" aria-hidden="true"></i> info@airstudycenter.com</p>
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
            <div class="d-md-none d-block">
                <a href="https://twitter.com/AirStudyCenter1"><i class="mr-2 fab fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/Air-Study-Center-1016360925238349/"><i class="mr-2 fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/airstudycenter/"><i class="mr-2 fab fa-instagram" aria-hidden="true"></i></a>
                {{-- <a href=""><i class="mr-2 fab fa-google" aria-hidden="true"></i></a> --}}
                <a href="https://goo.gl/maps/cPy7jibrHYZbqQfo9" target="_blank">
                    <p class="mb-2 text mt-4"><i class="mr-3 iconSz fas fa-map-marker" aria-hidden="true"></i> 29 Westbourne Street, Brighton, United Kingdom</p>
                </a>
                <a href="https://wa.me/447367628385" target="_blank">
                    <p class="mb-2 text "><i class="mr-2 iconSz fas fa-phone" aria-hidden="true"></i> +44-736-762-8385</p>
                </a>
                <a href="mailto:info@airstudycenter.com">
                    <p class="mb-2 text "><i class="mr-2 iconSz fas fa-envelope" aria-hidden="true"></i> info@airstudycenter.com</p>
                </a>
            </div>
            <div class="mt-3 d-lg-none d-block mb-2" style="    border-top: 1.2px solid #ffffff3b;"></div>
            <div class="text-center copyrightFooter text-white" style="font-weight:bold;">© 2020 Air Study Center. All Rights Reserved</div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog requestaCall" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #2A354F !important; font-size: 35px !important; opacity: 1;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rqstBody pl-4 pr-4 pb-3">
                <h2 class="font-weight-bold HeadingS1 mb-2" style="font-size: 36px;">Let us call you !</h2>
                <p style="color:#374354 !important;" class="mb-4">Use your work email to create a new account.</p>
                <form action="" method="post">
                    <div class="form-group labels-div">
                        <label for="CallerName" class="mb-0">Name</label>
                        <input type="text" name="name" class="form-control" id="CallerName" placeholder="John">
                    </div>
                    <div class="form-group labels-div">
                        <label for="CallerSurname" class="mb-0">Surname</label>
                        <input type="text" name="Surname" class="form-control" id="CallerSurname" placeholder="Smith">
                    </div>
                    <div class="form-group labels-div mb-3">
                        <label for="CallerPhone" class="mb-0 d-block">Phone</label>
                        <input type="tel" name="Phone" class="form-control" id="CallerPhone" placeholder="">
                    </div>
                    <label class="container-checkbox">I have read the <a href="{{route('singlepage',['id'=>5])}}" style="color:#374354 !important;"><u>Terms and Conditions</u></a>.
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <button type='submit' class="text-center pt-2 btn btn-primary btnBlog w-100 mt-4 mb-4 btn-hover-trasparent">SUBMIT</button>
                </form>
            </div>
            <div class="modal-footer border-top-0 pb-4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #374354 !important; font-size: 16px !important; opacity: 1;">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<a href="#" id="scroll" style="display: none;"><span><i class="fa fa-angle-up"></i></span></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha256-AAhU14J4Gv8bFupUUcHaPQfvrdNauRHMt+S4UVcaJb0=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/29e8dab5b5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3561/jquery.magnific-popup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@15.0.2/build/js/intlTelInput.js"></script>
<script src="https://sandbox.vciwork.com/codepenstuff/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('front/dpassets/js/main.js')}}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

    (function(){

    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];

    s1.async=true;

    s1.src='https://embed.tawk.to/5cd8d9e82846b90c57ae26f3/default';

    s1.charset='UTF-8';

    s1.setAttribute('crossorigin','*');

    s0.parentNode.insertBefore(s1,s0);

    })();

</script>

<!--End of Tawk.to Script-->
</body>

</html>
<!--footer end-->
