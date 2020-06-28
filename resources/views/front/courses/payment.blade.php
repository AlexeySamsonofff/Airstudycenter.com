@extends('front.index1_new')
@section('title', 'Accommodations')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<style type="text/css">    
    .hide{
        display:none;
    }    
</style>
<section>
    <div class="container p-0 accdin-result">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0">
                <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                    <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent">                            
                        <span class="breadcrumb-item " aria-current="page"><h3 class="font-weight-bold">Your payment is for</h3></span>
                    
                    </p>
                </nav> 
                 <!-- enquirydetail -->
                 <div class="row m-0 mb-5 enquirydetail" style="color:#8398B6;">
                    <div class="col-md-9 pl-md-0 pb-4 pr-0 mark1" >
                        <p class="enquiryname_e">  </p><input type="hidden" class="enquiryname_e">  
                        <p class="mb-2 titlespan"><i class="fas fa-map-marker-alt pr-1"></i>{{$input['course']}}</p>
                        <p class="mb-2 titlespan"><i class="bg-light rounded-circle far fa-calendar-alt"></i> {{$input['from']}}</p>
                        <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-users"></i>{{$input['weeks']}}  weeks</p>  
                    </div>
                    <div class="col-md-3 pr-0 mark2">
                        <img src="{{asset('front/images/en.png')}}" alt="" class="img-owner rounded-circle pricespan" style="float:right">
                        <span class="pricespan">£p/w {{$input['price']}}</sapn></br>
                         <span class="font-bold">Total   £ {{$input['total_price']}} </span>
                    </div>
                
                </div> 
                <!-- enquirydetail -->
              

             
                <!--pay now -->
                <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                    <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent"> 
                    <h3 class="font-weight-bold"  >Pay  Now <img class="img-responsive" style="float:right" src="http://i76.imgup.net/accepted_c22e0.png"></h3>                            
                    </p>
                </nav>   
                <div class="row m-0 mb-5 enquirydetail" > 
                    <div class="col-lg-12">
                        <form method="POST" action="{{url('/stripe_post') }}" id="payment-form" class="require-validation" data-cc-on-file="false"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                          
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">  &nbsp; &nbsp;&nbsp; Name on Card</label>                             
                                    <div class="input-group mb-6">  
                                        <input type="text" class="form-control"  placeholder="Robin Fox">                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">  &nbsp; &nbsp;&nbsp; Card Number</label>                             
                                    <div class="input-group mb-6">  
                                        <input type="text" class="form-control card-number" autocomplete='off'  placeholder="1234 - 4567 - 8910 - 1234">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><img class="payimg" src="https://i.imgur.com/OdxcctP.jpg" /></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-control-label">  &nbsp; &nbsp;&nbsp; Expiration Date</label>                             
                                                             
                                    <div class="input-group mb-3">  
                                        <input type="text" class="form-control card-expiry-month " autocomplete='off' placeholder="MM"> 
                                        <input type="text" class="form-control card-expiry-year" autocomplete='off' placeholder="YYYY"> 
                                                                          
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label"> &nbsp; &nbsp;&nbsp;Security code &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; ZIP/Postal Code</label>                             
                                    <div class="input-group mb-3">  
                                        <input type="text" class="form-control card-cvc" autocomplete='off' placeholder="123">  
                                        <input type="text" class="form-control" placeholder="">  
                                                                          
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'></div>                                        
                                    </div>
                            </div>  
                            <input type="hidden" name="school_id" value="{{$input['school_id']}}">
                            <input type="hidden" name="course_id" value="{{$input['course_id']}}">
                            <input type="hidden" name="total_price" value={{$input['total_price']}}>
                            <input type="hidden" name="weeks" value={{$input['weeks']}}>
                            <input type="hidden" name="course_date" value={{$input['from']}}>
                            <input type="hidden" name="price" value={{$input['price']}}>
                            <input type="hidden" name="transport"   value={{$input['transport']}}>
                            <input type="hidden" name="registration_fee" value={{$input['registration_fee']}}>
                                               
                                <button  class="text-center btn btn-warning btnBlog font-weight-bold btn-hover-trasparent" style="color: white;margin-top: 8px">pay £  {{$input['total_price']}}</button>
                        </form>   
                            
                            

                            
                    </div>                       
                </div>
           

                <!-- pay description (International Payments)-->
                <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                    <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent"> 
                    <h3 class="font-weight-bold"  >International Payments </h3>                            
                    </p>
                </nav> 
                <div class="row m-0 mb-5 paydetail" >            
                <p>Banks charge a lot for overseas transfers. With Transferwise you don’t. Transfer money abroad easily, quickly and secured now with low cost money transfers via Transfer Wise. Simply click on logo below or click here</p>
                </div>
            </div>
            <div class="col-md-4 ">               
                 <!-- Why Section -->
                 <div class="bg-light p-3 text-center d-none d-md-block panel-paydetail">
                        <h6 class="font-weight-bold ft-18 mt-2">Why use Air Study Center?</h6>
                        <div class="feeds">
                            <i class="far fa-piggy-bank usicon"></i>
                            <h6 class="mb-0">Save money</h6>
                            <p>Cheapest course fee guaranteed!</p>
                        </div>
                        <div class="feeds">
                            <i class="far fa-check-circle usicon"></i>
                            <h6 class="mb-0">Simple</h6>
                            <p>Booking online is really easy!</p>
                        </div>
                        <div class="feeds">
                            <i class="far fa-smile-beam usicon"></i>
                            <h6 class="mb-0">Customer Reviews</h6>
                            <p>100% genuine reviews on <br> student’s whole experience</p>
                        </div>
                    </div>
            </div>
        </div>
      
       
    
    
    </div>
</section>
<script>
    var allAccommodationRoute = "{{URL::to('allAccommodation')}}";
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
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
