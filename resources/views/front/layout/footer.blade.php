<!-- Footer -->
@php
$posts= App\Blog::join('blogcategories', 'blogs.category_id', '=','blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('blogs.id','desc')->limit(3)->get();
foreach($posts as $post){
$comments = App\Blogreview::where('blog_id', $post->id)->get();
$post->comments = count($comments);
}
$lang = Config::get('app.locale');
@endphp
<footer class="footer">
    <a id="BcTbutton"></a>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4 col-sm-6 col-12">
                <div class="footer_info cus_inner_foot">
                    <h4>@lang('footer.about_us')</h4>
                    <p>@lang('footer.about_us_detail')</p>
                    <div class="foot_address">
                        <ul>
                            <li><img class="add" src="{{asset('front/images/location_marker.png')}}" alt="" />47 Destiny Common, South London</li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:info@airstudycenter.com">info@airstudycenter.com</a></li>
                            <li><img class="add" src="{{asset('front/images/phone.png')}}" alt="" /><a href="tel:+49-233-322-333">+49-233-322-333</a></li>
                            <ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="footer_post cus_inner_foot">
                    <h4>@lang('footer.popular_post')</h4>
                    @foreach($posts as $post)
                    <a href="{{route('blogDetail',['id'=>$post->id])}}">
                        <div class="foot_post">
                            @php
                            $postdate = date('d-M-Y', strtotime($post->created_at));
                            @endphp
                            <div class="popular-thumb"><img src="{{$post->image}}" alt="" /></div>
                            <p> @if($lang == 'en'){{$post->title}}@elseif($lang == 'ar'){{$post->title_ar}}@elseif($lang == 'ru'){{$post->title_ru}}@elseif($lang == 'de'){{$post->title_de}}@elseif($lang == 'it'){{$post->title_it}}@elseif($lang == 'fr'){{$post->title_fr}}@elseif($lang == 'tr'){{$post->title_tr}}@elseif($lang == 'es'){{$post->title_es}}@elseif($lang == 'se'){{$post->title_se}}@elseif($lang == 'jp'){{$post->title_jp}}@elseif($lang == 'fa'){{$post->title_fa}}@elseif($lang == 'pr'){{$post->title_pr}}@endif<span>{{$postdate}}</span></p>
                        </div>
                    </a>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                <div class="footer_link cus_inner_foot">
                    <h4>@lang('footer.quick_link')</h4>
                    @php
                    $pages = App\Page::orderBy('page_order','asc')->get();
                    @endphp
                    <ul>
                        <li><a href="{{route('visaList')}}">@lang('footer.visa')</a></li>
                        <li><a href="{{route('insuranceList')}}">@lang('footer.insurance')</a></li>
                        @foreach($pages as $page)
                        <li><a href="{{route('singlepage',['id'=>$page->id])}}">@if($lang == 'en'){{$page->title}}@elseif($lang == 'ar'){{$page->title_ar}}@elseif($lang == 'ru'){{$page->title_ru}}@elseif($lang == 'de'){{$page->title_de}}@elseif($lang == 'it'){{$page->title_it}}@elseif($lang == 'fr'){{$page->title_fr}}@elseif($lang == 'tr'){{$page->title_tr}}@elseif($lang == 'es'){{$page->title_es}}@elseif($lang == 'se'){{$page->title_se}}@elseif($lang == 'jp'){{$page->title_jp}}@elseif($lang == 'fa'){{$page->title_fa}}@elseif($lang == 'pr'){{$page->title_pr}}@endif</a></li>
                        @endforeach
                        <!--  <li><a href="#">Courses</a></li> -->
                        <ul>
                </div>
            </div>
            <!-- <div class="col-md-4 col-lg-2 col-sm-6 col-12">
                <div class="footer_link cus_inner_foot">
                    <h4>@lang('footer.partner')</h4>
                    <ul>
                        <li><a href="{{route('schoolregistration')}}">@lang('footer.school')</a></li>
                        <li><a href="{{route('accommodationregistration')}}">@lang('footer.accommodation')</a></li>
                        <li><a href="https://admin.airstudycenter.com/">@lang('footer.office')</a></li>
                        <ul>
                </div>
            </div> -->
            <div class="clearfix"></div>
        </div>
        <div class="copyright_footer">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 wd100_xs">
                    <p>@lang('footer.copy_right')</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 wd100_xs pull-right">
                    <ul>
                        <li class="fb_icon"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="insta_icon"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Sign In Modal -->
<div class="modal sign_in_mod fade" id="mainmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="custom_modal loginmodal {{old('loginform') ? ' loginform-is-invalid' : ''}}" id="loginmodal" style="display:none;">
        <div class="modal-dialog signin_dia" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title_m" id="exampleModalLabel">@lang('footer.signin')</h5>
                    <button type="button" class="close cl_wh" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-xs-12 offset-md-1 offset-sm-1  sign_in_form review_form ">
                            <form method="POST" action="{{ route('login') }}" id="login">
                                @csrf
                                <input type="hidden" name="loginform" value="1">
                                <div class="form-group input_email">
                                    <label for="email">@lang('footer.email')</label>
                                    <input type="email" class="form-control{{ $errors->has('email') && old('loginform') ? ' log-is-invalid' : '' }}" name="email" value="{{ old('email') }}" />
                                    @if ($errors->has('email') && old('loginform'))
                                    <label id="name-error" class="error siginerror" for="name">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="form-group pass_input mt_10">
                                    <label for="pwd">@lang('footer.password')</label>
                                    <input type="password" class="form-control{{ $errors->has('password') && old('loginform') ? ' log-is-invalid' : '' }}" name="password" />
                                    @if ($errors->has('password') && old('loginform'))
                                    <label id="name-error" class="error siginerror" for="name">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <div class="form-group form-check check_box">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        @lang('footer.remember_me')
                                    </label>
                                    <label for="forget_pwd" class="for_pwd"><a class="openpop forget" id="forget" data-toggle="modal" href="#">@lang('footer.forgot_password')</a></label>
                                </div>
                                <!--<button type="button" class="btn btn-secondary sign_btn">Sign In</button> -->
                                <button type="submit" class="btn btn-secondary sign_btn">@lang('footer.signin')</button>
                                <div class="sign_up mt_10">
                                    <span>@lang('footer.not_a_member')<a class="register openpop" id="register" href="#"> @lang('footer.sign_up')</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register Modal -->
    <div class="custom_modal registermodal {{ old('registerform') ? 'signform-is-invalid' : ''}}" id="registermodal" style="display:none;">
        <div class="modal-dialog signin_dia" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title_m" id="exampleModalLabel">@lang('footer.register_now')</h5>
                    <button type="button" class="close cl_wh" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-xs-12 offset-md-1 offset-sm-1  sign_in_form review_form ">
                            @if(Session::has('emailerror'))
                            <div class="alert alert-danger google_email_error">
                                {{ Session::get('emailerror') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}" id="signup">
                                @csrf
                                <input type="hidden" name="role" value="Student">
                                <input type="hidden" name="registerform" value="1">
                                <input type="hidden" name="referid" value="<?php if(isset($_GET['code'])){ $result = $_GET['code']; echo $refercode = substr($result, 0, 2); } ?>">
                                <div class="form-group">
                                    <label for="usr">@lang('footer.name')</label>
                                    <input type="text" class="form-control{{ $errors->has('name') && old('registerform') ? ' reg-is-invalid' : '' }}" value="{{ old('name') }}" name="name" pattern="[A-Za-z\s]+" title="Enter only letters" required />
                                    @if ($errors->has('name') && old('registerform'))
                                    <label id="name-error" class="error siguperror" for="name">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                <div class="form-group input_email">
                                    <label for="email">@lang('footer.email')</label>
                                    <input type="email" class="form-control{{ $errors->has('email') && old('registerform') ? ' reg-is-invalid' : '' }}" value="{{ old('email') }}" name="email" required />
                                    @if ($errors->has('email') && old('registerform'))
                                    <label id="name-error" class="error siguperror" for="name">{{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                                <div class="form-group pass_input mt_10">
                                    <label for="pwd">@lang('footer.password')</label>
                                    <input type="password" class="form-control{{ $errors->has('password') && old('registerform') ? ' reg-is-invalid' : '' }}" id="password" name="password" required />
                                    <span id="lengthmsz"></span>
                                    @if ($errors->has('password') && old('registerform'))
                                    <label id="name-error" class="error siguperror" for="name">{{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                                <div class="form-group pass_input mt_10">
                                    <label for="pwd">@lang('footer.c_password')</label>
                                    <input type="password" class="form-control" id="password_again" name="password_confirmation" required />
                                    <span id="message"></span>
                                </div>
                                <div class="form-group pass_input">
                                    <!-- <label for="pwd">Confirm Password</label> -->
                                    <p><span class="tandc"><input type="checkbox" name="term&condition" required /></span>@lang('footer.agree_term_condition')</p>
                                </div>
                                <div class="reg_btn text-center">
                                    <button type="submit" class="btn btn-secondary sign_btn">@lang('footer.register_now')</button>
                                    <!--<input type="submit" value="Register Now" class="btn btn-secondary sign_btn" />-->
                                </div>
                                <div class="row regi_or text-center">
                                    <div class="col-md-4 col-sm-4 col-xs-4 pd_10">
                                        <div class="border-line"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4  ">
                                        <span>@lang('footer.continue_with')</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 pd_10">
                                        <div class=" border-line"></div>
                                    </div>
                                </div>
                                <div class="row socal_btn text-center">
                                    <div class="col-md-6 fb">
                                        <a href="{{route('fblogin')}}"><i class="fa fa-facebook" aria-hidden="true"></i>@lang('footer.facebook')</a>
                                    </div>
                                    <div class="col-md-6 google fb">
                                        <a href="{{ url('auth/google') }}"><i class="fa fa-google" aria-hidden="true"></i>@lang('footer.google')</a>
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-md-12 pdt_30">
                                        <div class="border-line"></div>
                                    </div>
                                </div>
                                <div class="sign_up mt_10 text-center">
                                    <span>@lang('footer.already_member') <a class="login openpop" id="login" href="#"> @lang('footer.sign_in_here')</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Forget Modal -->
    <div class="custom_modal forgetmodal {{ old('forgetform') ? 'forget-is-invalid' : ''}}" id="forgetmodal" style="display:none;">
        <div class="modal-dialog signin_dia" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title_m" id="exampleModalLabel">@lang('footer.forgot_password')</h5>
                    <button type="button" class="close cl_wh" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-xs-12 offset-md-1 offset-sm-1  sign_in_form review_form forget_txt ">
                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}" id="forgetform">
                                    @csrf
                                    <input type="hidden" name="forgetform" value="1">
                                    <h5>@lang('footer.receive_link')</h5>
                                    <div class="form-group input_email">
                                        <label for="email">@lang('footer.email')</label>
                                        <input type="email" class="form-control{{ $errors->has('email') && old('forgetform') ? ' forgetis-invalid' : '' }}" name="email" value="{{ old('email') }}" />
                                        @if ($errors->has('email') && old('forgetform'))
                                        <label id="name-error" class="error siginerror" for="name">{{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                    <div class="reg_btn get_nw_pwd">
                                        <button type="submit" class="btn btn-secondary sign_btn">@lang('footer.get_new_password')</button>
                                    </div>
                                    <div class="row login_reg">
                                        <a class="rgt-bor openpop login" id="login" href="#">@lang('footer.login')</a>
                                        <a class="pl_10 register openpop" id="register" href="#">@lang('footer.register_now')</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Reset Password Modal -->
<!-- Bootstrap core JavaScript -->
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/js/owl-carousel.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('front/js/validator.js')}}"></script>
<!--<script type="text/javascript">
function googleTranslateElementInit() {
 new google.translate.TranslateElement({defaultLanguage: 'en', pageLanguage: 'en', includedLanguages: 'en,ar,ru,de,tr,it,fr', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<script type="text/javascript">
    var btn = $('#BcTbutton');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
  $('.deal_carousel').owlCarousel({
    loop:true,
    margin:15,
  autoplay:false,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
$('.singleschool_carousel').owlCarousel({
    loop:true,
    margin:15,
  autoplay:false,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
  $('.recc_carousel').owlCarousel({
    loop:true,
    margin:15,
  autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
  jQuery(document).ready(function($){
    var code = "<?php if(isset($_GET['code'])){
      echo $_GET['code']; } ?>";
      if (code != ''){
       $(".openpop").trigger("click");
       $(".registermodal").show();
      }
    var text = $('.google_email_error').text().trim();
   // $("#loginModal").modal();
   if($("#signup input").hasClass("reg-is-invalid") || text != ""){
    $(".openpop").trigger("click");
    $(".signform-is-invalid,.registermodal").show();
   }
   if($("#login input").hasClass("log-is-invalid")){
     $(".openpop").trigger("click");
     $(".loginform-is-invalid").show();
   }
   if($("#forgetform input").hasClass("forgetis-invalid")){
     $(".openpop").trigger("click");
     $(".forget-is-invalid").show();
   }
   $('.openpop').on('click', function(){
  var  id = $(this).attr('id');
    $('.custom_modal').hide();
    $('#'+id+'modal').show();
  });
  });
</script>
<script>
    $('#password').on('keyup',function(){
    var passlength =  $('#password').val();
    if(passlength.length < 6 ){
      $('#lengthmsz').html('you have to enter at least 6 digit!').css('color', 'red');
    }
    else{
      $('#lengthmsz').html('').css('color', 'red');
    }
  });
  $('#password_again').on('keyup', function () {

 if ($('#password').val() == $('#password_again').val()) {
    $('#message').html('').css('color', 'red');
  } else {
    $('#message').html('Password Not Matching').css('color', 'red');
  }
});

</script>
<script>
    $('#date').datepicker({
            uiLibrary: 'bootstrap4'
        });

      src = "{{ route('autoSearchSchool') }}";
     $("#autosearchschool").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    if (data.length > 0) {
                            response(data);
                        } else {
                            //If no records found, set the default "No match found" item with value -1.
                            response([{ label: 'No results found.', val: -1}]);
                        }

                }
            });

        },
        minLength: 1,
    select:function(e,ui){
       //$('#autosearchCity').attr('data-id',ui.item.id);
              if (ui.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                $(this).val("");
                    return false;
                }
    }

    });
      coursesrc = "{{ route('autoSearchCourse') }}";
     $("#autosearchcourse").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: coursesrc,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    if (data.length > 0) {
                          response(data);
                        } else {
                            //If no records found, set the default "No match found" item with value -1.
                            response([{ label: 'No results found.', val: -1}]);
                        }

                }
            });

        },
        minLength: 1,
    select:function(e,ui){
       //$('#autosearchCity').attr('data-id',ui.item.id);
              if (ui.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                $(this).val("");
                    return false;
                }
    }

    });
     citysrc = "{{ route('autoSearchCity') }}";
     $("#autosearchcity").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: citysrc,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    if (data.length > 0) {
                          response(data);
                        } else {
                            //If no records found, set the default "No match found" item with value -1.
                            response([{ label: 'No results found.', val: -1}]);
                        }

                }
            });

        },
        minLength: 1,
    select:function(e,ui){
       //$('#autosearchCity').attr('data-id',ui.item.id);
              if (ui.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                $(this).val("");
                    return false;
                }
    }

    });
     acctitlesrc = "{{ route('autoSearchAccTitle') }}";
     $("#autosearchacctitle").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: acctitlesrc,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    if (data.length > 0) {
                          response(data);
                        } else {
                            //If no records found, set the default "No match found" item with value -1.
                            response([{ label: 'No results found.', val: -1}]);
                        }

                }
            });

        },
        minLength: 1,
    select:function(e,ui){
       //$('#autosearchCity').attr('data-id',ui.item.id);
              if (ui.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                $(this).val("");
                    return false;
                }
    }

    });
       blogsrc = "{{ route('autoSearchBlog') }}";
     $("#autosearchblog").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: blogsrc,
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    if (data.length > 0) {
                            response(data);
                        } else {
                            //If no records found, set the default "No match found" item with value -1.
                            response([{ label: 'No results found.', val: -1}]);
                        }
                }
            });
        },
        minLength: 1,
    select:function(e,ui){
       //$('#autosearchCity').attr('data-id',ui.item.id);
              if (ui.item.val == -1) {
                    //Clear the AutoComplete TextBox.
                $(this).val("");
                    return false;
                }
    }

    });

</script>
<script>
    //Variables
var overlay = $("#overlay"),
        fab = $(".fab"),
     cancel = $("#cancel"),
     submit = $("#submit");
//fab click
fab.on('click', openFAB);
overlay.on('click', closeFAB);
cancel.on('click', closeFAB);
function openFAB(event) {
  if (event) event.preventDefault();
  fab.addClass('active');
  overlay.addClass('dark-overlay');
}
function closeFAB(event) {
  if (event) {
    event.preventDefault();
    event.stopImmediatePropagation();
  }
  fab.removeClass('active');
  overlay.removeClass('dark-overlay');

}
var $button = document.querySelector('.button');
$button.addEventListener('click', function() {
  var duration = 0.3,
      delay = 0.08;
  TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
  TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
  TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3 });
});
        $('#checkin').datepicker({
            uiLibrary: 'bootstrap4'
        });
    $('#checkout').datepicker({
            uiLibrary: 'bootstrap4'
        });

</script>
<script>
    var input = document.querySelector("#phone"),
    form = document.querySelector("#phoneform"),
    result1 = document.querySelector("#resultphone1");
    result2 = document.querySelector("#resultphone2");
var iti = intlTelInput(input, {
  initialCountry: "us",
  utilsScript: "{{asset('front/js/utils.js')}}",
});
form.addEventListener("submit", function(e) {
  e.preventDefault();
  var num = iti.getNumber(),
      valid = iti.isValidNumber();
      if(valid == true){
         result1.textContent = "Number is Valid";
         $('.valid-feedback.resultphone').show();
         $('#resultphone2').hide();
         $('#resultphone1').show();
         form.submit();
      }else{
        result2.textContent = "Number is Not Valid";
        $('#resultphone2').show();
        $('#resultphone1').hide();
      }
 // result.textContent = "Number: " + num + ", valid: " + valid;
}, false);
input.addEventListener("focus", function() {
  result.textContent = "";
}, false);
</script>
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
