@extends('front.index1')
@section('title', 'All School')
@section('content')
<!--Accommodation Head  Start-->
<section class="courses_sec city_school">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cus_title acc_head ">
          <h1 class="distance">Why Air Study Center</h1>
          <ul>
            <li>Home</li>
            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
            <li>Why Air Study Center</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Accommodation Head End--> 
<!--Book Accommodation Inner Start-->
<section class="acc_book booking_st">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Air Study is an excellent choice for studying language courses abroad.</h2>
        <p>ir Study is a platform that only works with accredited language schools to make them available for practical online reservation. </p>
      </div>
    </div>
  </div>
</section>
<!--Book Accommodation Inner End--> 
<!--  Accommodation Inner Start-->
<section class="acc_flats">
  <div class="container">
    <div class="row course_inner p_0 flats bg-light p-3 pt-4 pb-4 study-_course">
      <div class="col-md-6">
        <div class="study_Content">
          <div class="left"><img src="{{asset('front/images/maliyet.png')}}"></div>
          <div class="right">
            <h3>Discounts from 5%-30%</h3>
            <p>We make sure to invest our economic resources, gained from online services, towards our students. You can complete your enrolment with us for a minimum 5% discount on most schools.</p>
          </div>
        </div>
      </div>
		
		<div class="col-md-6">
        <div class="study_Content">
          <div class="left"><img src="{{asset('front/images/100.png')}}"></div>
          <div class="right">
            <h3>Money back guarantee</h3>
            <p>In cases of Visa refusal you will receive a full refund within 30 days. For other cases please find the terms & conditions page.</p>
          </div>
        </div>
      </div>
		
		<div class="col-md-6">
        <div class="study_Content">
          <div class="left"><img alt="" src="{{asset('front/images/iade.png')}}"></div>
          <div class="right">
            <h3>Fast Communication</h3>
            <p>Whatsapp is our preferred form of communication since it is fast and free. Students can easily reach out to us. However, customers can also contact us easily via e-mail, our customer support numbers, Skype or through our online support.</p>
          </div>
        </div>
      </div>
		<div class="col-md-6">
        <div class="study_Content">
          <div class="left"><img alt="" src="{{asset('front/images/vize.png')}}"></div>
          <div class="right">
            <h3>Low Costs, Maximum Benefits!</h3>
            <p>We always strictly offer great, affordable prices. Through our support and services such as accommodation, airport transfers, free advice and a free 'welcome' pack, you save greatly in terms of education and living costs.</p>
          </div>
        </div>
      </div>
	  
	  <div class="col-md-6">
        <div class="study_Content">
          <div class="left"><img alt="" src="{{asset('front/images/iletisim.png')}}"></div>
          <div class="right">
            <h3>97% Visa Applications Success rate</h3>
            <p>We have a successful team for Visa applications. We have a success rate of over 97%</p>
          </div>
        </div>
      </div>
	  
	    </div>
  </div>
</section>
<!--  Accommodation Inner End--> 

@endsection
			