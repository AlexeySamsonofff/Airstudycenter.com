@extends('front.index1')
@section('title', 'Accommodation Detail')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
     <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .navbar-brand{
            height:auto
        }
        .form-group input{
            padding:10px 30px;
            height:auto;
        }
        .panel-heading{padding: 7px 20px; font-weight: normal;}
    </style>
<!--bread crumb section starts -->
<section class="courses_sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cus_title acc_head">
          <h1 class="distance">@lang('payment.school')</h1>
          <ul>
            <li><a href="{{route('mainhome')}}">@lang('payment.home')</a></li>
            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
            <li><a href="{{route('mainAllSchool')}}">@lang('payment.schools')</a></li>
            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
            <li>{{$input['school_Name']}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- bread crumb section fisnih -->
<!-- content section starts  -->
<section class="courses_det acc_sec pb-5">
    <div class="container">
        <!-- payment container starts -->
         <div class="col-md-10 offset-md-0 payment-details">
             <div class="row">
                <!-- left section starts -->
                  <aside class="col-md-5 d-xs-none d-sm-none d-md-block p-0">
                      <img src="{{asset('front/images/payment-bg.jpg')}}" class="pmt" > 
                  </aside>
                 <!-- left section finsih -->
                 <!-- right section starts -->
                  <div class="col-md-7 p-5 bg-white payment-card">
                     <h4> @lang('payment.pcd')</h4>
                      
                      <div class="w-100  p-5 float-left">
                      
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
             <form role="form" action="{{route('stripePostCourse')}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        {{ csrf_field()}}
                    <input type="hidden" name="userId"  value="{{$input['userId']}}">
                    <input type="hidden" name="schoolId"  value="{{$input['school_id']}}">
                    <input type="hidden" name="school_Name" @if($input['school_Name'])  value=" {{$input['school_Name']}}" @endif>
                    <input type="hidden" name="courseId"  value="{{$input['courseId']}}">
                    <input type="hidden" name="course_name" @if($input['course_name'])  value=" {{$input['course_name']}}" @endif>
                    <input type="hidden" name="hoursperweek"  value="{{$input['hoursperweek']}}">
                    <input type="hidden" name="no_of_week" value="{{$input['no_of_week']}}">
                    <input type="hidden" name="acctype_name" value="{{$input['acctype_name']}}">
                    <input type="hidden" name="airport_name" @if($input['airport_name']) value="{{$input['airport_name']}}" @endif>
                    <input type="hidden" name="transport_way" @if($input['transport_way'])  value=" {{$input['transport_way']}}" @endif>
                    <input type="hidden" name="insurance_name" @if($input['insurance_name'])  value=" {{$input['insurance_name']}}" @endif>
                    <input type="hidden" name="visa_name" @if($input['visa_name'])  value=" {{$input['visa_name']}}" @endif>
                    <input type="hidden" name="course_date"   @if($input['course_date']) value="{{$input['course_date']}}" @endif>
                    <input type="hidden" name="acc_id"   @if($input['acc_id']) value="{{$input['acc_id']}}" @endif>
                    <input type="hidden" name="transportid"  @if($input['transportid']) value="{{$input['transportid']}}" @endif>
                    <input type="hidden" name="ins_id"  @if($input['ins_id']) value="{{$input['ins_id']}}" @endif>
                    <input type="hidden" name="visa_id"  @if($input['visa_id']) value="{{$input['visa_id']}}" @endif>
                    <input type="hidden" name="creditOptin" value="{{$input['creditoption']}}">
                    <input type="hidden" name="registration_fee"  value="{{$input['registration_fee']}}">
                    <input type="hidden" name="price"  value="{{$input['price']}}">
                    <input type="hidden" name="accomodation"   @if($input['accomodation']) value="{{$input['accomodation']}}" @endif>
                    <input type="hidden" name="transportprice"  @if(array_key_exists('transportprice', $input))
                       value="{{$input['transportprice']}}"
                      @endif>
                    <input type="hidden" name="insprice"   @if($input['insuranceid']) value="{{$input['insuranceid']}}" @endif>
                    <input type="hidden" name="visaprice"   @if($input['visaid']) value="{{$input['visaid']}}" @endif>  
                    <input type="hidden" name="total_course_price"  value="{{$input['total_course_price']}}">
  
  
                        <div class="form-row row">
                            <div class="col-xs-12 form-group required">
                                <label class="control-label">@lang('payment.name_on_card')</label> 
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" size="4" placeholder="">
                                </div>

                            </div>
                        </div>
  
                        <div class="form-row row form-group ">
                            <div class="col-xs-12 card required border-0">
                                <label class="control-label">@lang('payment.card_no')</label>
                                <div class="input-group mb-3">
                                    <input autocomplete="off" type="text" class="form-control card-number" size="20" placeholder="">
                                </div>
                                
                            </div>
                        </div>
  
                        <div class="form-row form-group  row">
                            <div class="col-xs-12 col-md-4 form-group cvc required">
                                <label class="control-label">@lang('payment.cvc')</label> 
                                <div class="input-group mb-3">
                                   <input autocomplete="off" type="text" class="form-control card-cvc" size="20" placeholder="@lang('payment.example')">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">@lang('payment.em')</label> 
                                <div class="input-group mb-3">
                                   <input class="form-control  card-expiry-month" placeholder="@lang('payment.month')" size="20" type="text">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">@lang('payment.ey')</label> 
                                   
                                <div class="input-group mb-3">
                                   <input class="form-control card-expiry-year" placeholder="@lang('payment.year')" size="4" type="text">
                                </div>


                            </div>
                        </div>
  
                        <div class="form-row row">
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">@lang('payment.pcteata')</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-td mt-2 mb-5 w-100 float-left">
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('payment.pay_now') (£{{$input['total_course_price']}})</button>
                            </div>
                        </div>
                          
                    </form>
</div>
                 </div>
                 <!-- right section finsih -->
             </div>
        </div>
        <!-- payment container finsih -->
    </div>
</section>
<!-- content section finsih -->

  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection