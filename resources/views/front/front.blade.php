@extends('front.index')

@section('title', 'Home')

@section('content')

<!-- Courses Start -->

 

<div class="container-fluid courses">

	<div class="row course_detail">

		<div class="col-md-2 col-sm-4 col-xs-6  goal inner_couse">

			<img src="{{asset('front/images/goal.png')}}" alt=""/>

			<span>@lang('header.define_course_goal')</span>

		</div>

		<div class="col-md-2 col-sm-4 col-xs-6  market inner_couse">

			<img src="{{asset('front/images/market.png')}}" alt=""/>

			<span>@lang('header.analysis_scope_in_market')</span>

		</div>

		<div class="col-md-2 col-sm-4 col-xs-6  search inner_couse">

			<img src="{{asset('front/images/search.png')}}" alt=""/>

			<span>@lang('header.search')</span>

		</div>

		<div class="col-md-2 col-sm-4 col-xs-6  reg inner_couse">

			<img src="{{asset('front/images/registration.png')}}" alt=""/>

			<span>@lang('header.register')</span>

		</div>

		<div class="col-md-2 col-sm-4 col-xs-6  date_choose inner_couse">

			<img src="{{asset('front/images/date.png')}}" alt=""/>

			<span>@lang('header.choose_a_date')</span>

		</div>

		<div class="col-md-2 col-sm-4 col-xs-6 fly inner_couse">

			<img src="{{asset('front/images/fly.png')}}" alt=""/>

			<span>@lang('header.prepare_fly')</span>

		</div>

		<div class="clearfix"></div>

	</div>

</div>

 

 <!-- Courses End -->

 

   <!-- Top Deals Start -->

  

<section class="deals">

	<div class="container">

		<div class="row inner_deal"> 		

			<div class="col-md-8 col-sm-8 col-xs-12 offset-md-2 offset-sm-2 text-center">		

				<div class="cus_title">

					<h1>@lang('front.discounted') <span>@lang('front.courses')</span></h1>	

				</div>

				<p class="custom_p main-head">@lang('front.discountedtext')</p>

			</div>		

		</div>		

	</div>

</section>

  

   <!-- Top Deals End -->

   

   <!-- SLIDER STARTS-->

    

<div class="container">   

	<div class="row ">

<div class="owl-carousel owl-theme deal_carousel">

<!-- Single Box End -->

@foreach($topdeals as $topdeal)

@if($topdeal->status == 1)	

<div class="col-md-12">

	<div class="box-deal d-flex ">

		<div class="top_deal_img">

			<a href="{{route('singleCourse',['id'=>$topdeal->pricecourseid,'slug'=>$topdeal->slug])}}"><img class="full" src="{{asset('thumbnail_images/'.$topdeal->image)}}" alt="" /></a>

		</div>

		<div class="top_deal_text">

			@if ( Config::get('app.locale') == 'en')

	                  <h5 class="topic">{{$topdeal->name}}</h5>

	                @elseif ( Config::get('app.locale') == 'tr' )

	                  <h5 class="topic">{{$topdeal->name_tr}}</h5>

	                @elseif ( Config::get('app.locale') == 'ar' )

	                  <h5 class="topic">{{$topdeal->name_ar}}</h5>

	                @elseif ( Config::get('app.locale') == 'ru' )

	                  <h5 class="topic">{{$topdeal->name_ru}}</h5>

	                @elseif ( Config::get('app.locale') == 'de' )

	                  <h5 class="topic">{{$topdeal->name_de}}</h5>

	                @elseif ( Config::get('app.locale') == 'it' )

	                  <h5 class="topic">{{$topdeal->name_it}}</h5>

	                @elseif ( Config::get('app.locale') == 'fr' )

	                  <h5 class="topic">{{$topdeal->name_fr}}</h5>

	                @elseif ( Config::get('app.locale') == 'es' )

                      <h5 class="topic">{{$topdeal->name_es}}</h5>

                    @elseif ( Config::get('app.locale') == 'se' )

                      <h5 class="topic">{{$topdeal->name_se}}</h5>

                    @elseif ( Config::get('app.locale') == 'jp' )

                      <h5 class="topic">{{$topdeal->name_jp}}</h5>

                    @elseif ( Config::get('app.locale') == 'fa' ) 

                      <h5 class="topic">{{$topdeal->name_fa}}</h5>

                    @elseif ( Config::get('app.locale') == 'pr' )

                      <h5 class="topic">{{$topdeal->name_pr}}</h5>      

                   @endif

			<div class="d-flex mb-2">

				<div class="deal_left">

					<small><i class="fa fa-map-marker"></i>{{$topdeal->country}}, {{$topdeal->city}}</small>

				</div>

				<div class="deal_review">

					<div class="school_comment AirSmallStar">

					   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">

					   	<?php 

                           $alltotal  = $topdeal->review_rate+$topdeal->review_rate1+$topdeal->review_rate2+$topdeal->review_rate3;

					         $getaverage = $alltotal/4;

					         if(is_float($getaverage)){

					          $starNumber = number_format((float)$getaverage, 1, '.', ''); 

					        }else{

                               $starNumber = $getaverage;

					        }

                  		?>

					      <div class="stars"> 

					         <?php

					         $explode    = explode('.',$starNumber);

							    for($x=1;$x<=$starNumber;$x++) { ?>

							         <span class="star on"></span>

							    <?php } if (strpos($starNumber,'.')) { ?>

							         <span class="star half exp<?php echo $explode[1]; ?>"></span>

							    <?php $x++; }

							    while ($x<=5) { ?>

							         <span class="star"></span>

					         <?php  $x++; }  ?>

					         <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>

					      </div>

					   </div>

                   </div>

				</div>

			</div>

			<div class="d-flex mb-2">

				<div class="deal_left">

					<small> <i class="fa fa-graduation-cap"></i>{{$topdeal->no_of_student}} @lang('header.student') </small>

				</div>

				<div class="deal_right">

					<small> <i class="fa fa-user"></i>{{$topdeal->agelimit}} @lang('front.years') + </small>

				</div>

			</div>

			<div class="deal_price">

				<h5>£{{$topdeal->dealprice}} <del>£{{$topdeal->pricead}}</del> </h5>

				<small>*@lang('header.discount_valid')</small>

			</div>

		</div>

		<div class="deal_discount">

			<h6>{{$topdeal->deal}}%</h6>

		</div>

	</div>

</div> 

@endif

@endforeach	

<!-- Single Box End -->		

	</div></div>

</div>

   <!-- SLIDER ENDS -->

  

 <!-- city Start -->

<section class="city gray_bg">

        <div class="container">

         <div class="row">

			<div class="col"></div>

                <div class="col-md-8">

					<div class="cus_title text-center">

						<h1>@lang('front.popular') <span>@lang('front.cities')</span></h1>	

					</div> 

                    <p class="para text-center">@lang('front.populartext')</p>

				</div> 

			<div class="col"></div>

			</div>





            <div class="row">

                     @foreach($topcities as $topcity)

                     @if($topcity->schoolcount != 0)

                     

                    <div class="col-lg-3 col-md-6 inner_2 float-left ">

                     <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}"> 

                       <div class="box_outer">

                        @if($topcity->image != null) 

                        <img class="full_img" src="{{asset('medium_images/'.$topcity->image)}}">

                        @else

                        <img class="full_img" style="width:255px;height:135px;"  src="{{asset('front/images/image-not-available.png')}}">

                        @endif



                        

                        <div class="deal_box">

                        <h3>{{$topcity->cityname

                        }} Language Schools</h3>



                         <div class="review_box">

						<div class="loc_left">

                        <h5><i class="fa fa-map-marker"></i>{{$topcity->cityname

                        }} </h5>

                         </div>

                         

						<div class="review_rgt">

                        <div class="school_comment AirSmallStar">

						   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">

						      <div class="stars"> 

						         <span class="star on"></span>

						         <span class="star on"></span>

						         <span class="star on"></span>

						         <span class="star on"></span>

						         <span class="star on"></span>

						      </div>

						   </div>

						</div>

					

					 </div>	

					</div>



						<div class="clearfix"></div>

						<div class="box-bottom box_language">

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">

								<p>{{$topcity->schoolcount}} @lang('front.schools')</p>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">

								<p>{{$topcity->coursecount}} @lang('front.courses')</p>

							</div>

						</div>

                      

                    

                  </div>

                    </div>

                      </a>

                    </div>

                    @endif

                  

                    @endforeach



                <div class="clearfix"></div>

                <div class="view_all text-center">

                    <a href="{{route('allCitySchool')}}">@lang('front.allcities')</a>

                </div>

                </div>

            </div>

       

</section>

<!-- school Start -->

<section class="school">

        <div class="container">

            <div class="row">

			<div class="col"></div>

                <div class="col-md-8">

					<div class="cus_title text-center feature">

						<h1>@lang('front.premium') <span>@lang('front.schools')</span></h1>		

					</div>

                    <p class="para text-center feature">@lang('front.premiumtext')</p>

				</div> 

			<div class="col"></div>

			</div>

			<div class="row">

				@foreach($schools as $school)

				

				<div class="col-lg-3 col-md-6 inner_language float-left ">

					<a href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}">

					<div class="box_outer">



                        @if($school->image != null) 

                        <img class="full_img" src="{{asset('medium_images/'.$school->image)}}">

                        @else

                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}" style="height:135px;width:255px;">

                        @endif

                        <div class="deal_box">

                        <h3> @if ( Config::get('app.locale') == 'en')

	                  {{$school->name}}

	                @elseif ( Config::get('app.locale') == 'tr' )

	                  {{$school->name_tr}}

	                @elseif ( Config::get('app.locale') == 'ar' )

	                 {{$school->name_ar}}

	                @elseif ( Config::get('app.locale') == 'ru' )

	                  {{$school->name_ru}}

	                @elseif ( Config::get('app.locale') == 'de' )

	                  {{$school->name_de}}

	                @elseif ( Config::get('app.locale') == 'it' )

	                  {{$school->name_it}}

	                @elseif ( Config::get('app.locale') == 'fr' )

	                 {{$school->name_fr}}

	                @elseif ( Config::get('app.locale') == 'es' )

                     {{$school->name_es}}

                    @elseif ( Config::get('app.locale') == 'se' )

                      {{$school->name_se}}

                    @elseif ( Config::get('app.locale') == 'jp' )

                      {{$school->name_jp}}

                    @elseif ( Config::get('app.locale') == 'fa' ) 

                      {{$school->name_fa}}

                    @elseif ( Config::get('app.locale') == 'pr' )

                      {{$school->name_pr}}  

                   @endif</h3>

						<div class="review_box">

						<div class="loc_left">

                        <h5><i class="fa fa-map-marker"></i>{{$school->city}}, {{$school->country}}</h5>

                         </div>

						<div class="review_rgt">

                         <div class="school_comment AirSmallStar">

						   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">

						   	<?php 

                           $alltotal  = $school->review_rate_fschool+$school->review_rate_fschool1+$school->review_rate_fschool2+$school->review_rate_fschool3+$school->review_rate_fschool4+$school->review_rate_fschool5;

					         $getaverage = $alltotal/6;

					         if(is_float($getaverage)){

					          $starNumber = number_format((float)$getaverage, 1, '.', ''); 

					        }else{

                               $starNumber = $getaverage;

					        }

                  		 ?>

						    <div class="stars"> 

						      <?php

					         $explode    = explode('.',$starNumber);

							    for($x=1;$x<=$starNumber;$x++) { ?>

							         <span class="star on"></span>

							    <?php } if (strpos($starNumber,'.')) { ?>

							         <span class="star half exp<?php echo $explode[1]; ?>"></span>

							    <?php $x++; }

							    while ($x<=5) { ?>

							         <span class="star"></span>

					           <?php  $x++; }  ?>

						         <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>

						      </div>

						   </div>

                         </div>

					    </div>	

					</div>

					

						<div class="clearfix"></div>

						<div class="box-bottom box_language">

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">

								<p>{{$school->agelimit}} @lang('front.years') +</p>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">

								<p>{{$school->courseCount}} @lang('front.courses')</p>

							</div>

						</div>

						</div>

						</div>

					

					    </a>

                </div>



            

                @endforeach



                <div class="clearfix"></div>

                <div class="view text-center">

                   <a href="{{route('mainAllSchool')}}">@lang('front.allschool')</a>

                </div>

            </div>

        

</section>   



<div class="gray_bg testmonial_course_sec">

	<div class="container">

		<div class="row"> 

			<div class="col-md-6 col-md-6 col-xs-12">

				<div class="testmonial_sec">

					<!--<h4>Review</h4>-->

					<h2>@lang('front.ourtestimonials')</h2>

					<div id="testimonial_slider" class="carousel slide testimonial_slider" data-ride="carousel">

						<div class="carousel-inner">

							<div class="carousel-item active">

								@foreach($testi1 as $row1)

				                  <div class="test_inner">

									<img src="{{$row1['image']}}" alt=""/>

									 @if ( Config::get('app.locale') == 'en')

						             <div class="testmonial_name">

										<h3>{{$row1['name']}}</h3>

										<span>{{$row1['designation']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description']!!}</p>

						                @elseif ( Config::get('app.locale') == 'tr' )

						             <div class="testmonial_name">

										<h3>{{$row1['name_tr']}}</h3>

										<span>{{$row1['designation_tr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_tr']!!}</p>

						                @elseif ( Config::get('app.locale') == 'ar' )

						             <div class="testmonial_name">

										<h3>{{$row1['name_ar']}}</h3>

										<span>{{$row1['designation_ar']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_ar']!!}</p>

						                @elseif ( Config::get('app.locale') == 'ru' )

						             <div class="testmonial_name">

										<h3>{{$row1['name_ru']}}</h3>

										<span>{{$row1['designation_ru']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_ru']!!}</p>

						                @elseif ( Config::get('app.locale') == 'de' )

						            <div class="testmonial_name">

										<h3>{{$row1['name_de']}}</h3>

										<span>{{$row1['designation_de']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_de']!!}</p>

						                @elseif ( Config::get('app.locale') == 'it' )

						            <div class="testmonial_name">

										<h3>{{$row1['name_it']}}</h3>

										<span>{{$row1['designation_it']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_it']!!}</p>

						                @elseif ( Config::get('app.locale') == 'fr' )

						             <div class="testmonial_name">

										<h3>{{$row1['name_fr']}}</h3>

										<span>{{$row1['designation_fr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_fr']!!}</p>

									@elseif ( Config::get('app.locale') == 'es' )

									<div class="testmonial_name">

										<h3>{{$row1['name_es']}}</h3>

										<span>{{$row1['designation_es']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_es']!!}</p>

									@elseif ( Config::get('app.locale') == 'se' )

									<div class="testmonial_name">

										<h3>{{$row1['name_se']}}</h3>

										<span>{{$row1['designation_se']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_se']!!}</p>         

									@elseif ( Config::get('app.locale') == 'jp' )

									<div class="testmonial_name">

										<h3>{{$row1['name_jp']}}</h3>

										<span>{{$row1['designation_jp']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_jp']!!}</p>

									@elseif ( Config::get('app.locale') == 'fa' )

									<div class="testmonial_name">

										<h3>{{$row1['name_fa']}}</h3>

										<span>{{$row1['designation_fa']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_fa']!!}</p>

									@elseif ( Config::get('app.locale') == 'pr' )

									<div class="testmonial_name">

										<h3>{{$row1['name_pr']}}</h3>

										<span>{{$row1['designation_pr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row1['description_pr']!!}</p>

                                        @endif

								</div>

								@endforeach

								

							</div>	

								@if(!empty($testi2))				

							

							<div class="carousel-item">							

									@foreach($testi2 as $row2)

								<div class="test_inner">

									<img src="{{$row2['image']}}" alt=""/>

									 @if ( Config::get('app.locale') == 'en')

					                  <div class="testmonial_name">

										<h3>{{$row2['name']}}</h3>

										<span>{{$row2['designation']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description']!!}</p>

					                @elseif ( Config::get('app.locale') == 'tr' )

					                  <div class="testmonial_name">

										<h3>{{$row2['name_tr']}}</h3>

										<span>{{$row2['designation_tr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_tr']!!}</p>

					                @elseif ( Config::get('app.locale') == 'ar' )

					                  <div class="testmonial_name">

										<h3>{{$row2['name_ar']}}</h3>

										<span>{{$row2['designation_ar']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_ar']!!}</p>

					                @elseif ( Config::get('app.locale') == 'ru' )

					                <div class="testmonial_name">

										<h3>{{$row2['name_ru']}}</h3>

										<span>{{$row2['designation_ru']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_ru']!!}</p>

					                @elseif ( Config::get('app.locale') == 'de' )

					                <div class="testmonial_name">

										<h3>{{$row2['name_de']}}</h3>

										<span>{{$row2['designation_de']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_de']!!}</p>

					                @elseif ( Config::get('app.locale') == 'it' )

					                <div class="testmonial_name">

										<h3>{{$row2['name_it']}}</h3>

										<span>{{$row2['designation_it']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_it']!!}</p>

					                @elseif ( Config::get('app.locale') == 'fr' )

					                 <div class="testmonial_name">

										<h3>{{$row2['name_fr']}}</h3>

										<span>{{$row2['designation_fr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_fr']!!}</p>

									@elseif ( Config::get('app.locale') == 'es' )

									<div class="testmonial_name">

										<h3>{{$row2['name_es']}}</h3>

										<span>{{$row2['designation_es']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_es']!!}</p>

									@elseif ( Config::get('app.locale') == 'se' )

									<div class="testmonial_name">

										<h3>{{$row2['name_se']}}</h3>

										<span>{{$row2['designation_se']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_se']!!}</p>

									@elseif ( Config::get('app.locale') == 'jp' )

									<div class="testmonial_name">

										<h3>{{$row2['name_jp']}}</h3>

										<span>{{$row2['designation_jp']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_jp']!!}</p>

									@elseif ( Config::get('app.locale') == 'fa' )

									<div class="testmonial_name">

										<h3>{{$row2['name_fa']}}</h3>

										<span>{{$row2['designation_fa']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_fa']!!}</p>

									@elseif ( Config::get('app.locale') == 'pr' )

									<div class="testmonial_name">

										<h3>{{$row2['name_pr']}}</h3>

										<span>{{$row2['designation_pr']}}</span>

									</div>

									<div class="clearfix"></div>

									<p>{!!$row2['description_pr']!!}</p>          

                                    @endif

								</div>

								@endforeach

								

							</div>

							@endif

							

						</div>			  		

						  <ol class="carousel-indicators">

							<li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>

							@if(!empty($testi2))	

							<li data-target="#testimonial_slider" data-slide-to="1"></li>

							@endif

							<!-- <li data-target="#testimonial_slider" data-slide-to="2"></li> -->

						  </ol>

					</div>

				</div>	  				

			</div>

			<div class="col-md-6 col-md-6 col-xs-12">

				<div class="top_course">

					<h2>@lang('front.topcourses')</h2>

					<div style="margin-top:20px;" class="">

						<div class="row">

							@foreach($courses as $course)

							<div class="col-md-6 course_col">

								<a href="{{route('singleCourse',['id'=>$course->id,'slug'=>$course->slug])}}">

							

								<div class="box_outer">

                       @if($course->image != null) 

                        <img class="full_img" src="{{asset('medium_images/'.$course->image)}}" alt=""/>	

                        @else

                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}" style="height:135px;width:240px;">

                        @endif

								 <div class="deal_box">

                        @if ( Config::get('app.locale') == 'en')

		                  <h3>{{$course->name}}</h3>

		                @elseif ( Config::get('app.locale') == 'tr' )

		                  <h3>{{$course->name_tr}}</h3>

		                @elseif ( Config::get('app.locale') == 'ar' )

		                  <h3>{{$course->name_ar}}</h3>

		                @elseif ( Config::get('app.locale') == 'ru' )

		                  <h3>{{$course->name_ru}}</h3>

		                @elseif ( Config::get('app.locale') == 'de' )

		                  <h3>{{$course->name_de}}</h3>

		                @elseif ( Config::get('app.locale') == 'it' )

		                  <h3>{{$course->name_it}}</h3>

		                @elseif ( Config::get('app.locale') == 'fr' )

		                  <h3>{{$course->name_fr}}</h3>

		                @elseif ( Config::get('app.locale') == 'es' )

		                <h3>{{$course->name_es}}</h3>

		                @elseif ( Config::get('app.locale') == 'se' )

		                <h3>{{$course->name_se}}</h3>

		                @elseif ( Config::get('app.locale') == 'jp' )

		                <h3>{{$course->name_jp}}</h3>

		                @elseif ( Config::get('app.locale') == 'fa' )

		                <h3>{{$course->name_fa}}</h3>

		                @elseif ( Config::get('app.locale') == 'pr' )

		                <h3>{{$course->name_pr}}</h3>         

                        @endif 



						<div class="review_box">

						<div class="loc_left">

                        <h5><i class="fa fa-map-marker"></i>{{$course->city}},{{$course->country}}</h5>

                         </div>

						<div class="review_rgt">

							<div class="school_comment AirSmallStar">

						   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">

						   	<?php 

                           $alltotal  = $course->review_rate_fcourse+$course->review_rate_fcourse1+$course->review_rate_fcourse2+$course->review_rate_fcourse3;

                           $getaverage = $alltotal/4;

					         if(is_float($getaverage)){

					          $starNumber = number_format((float)$getaverage, 1, '.', ''); 

					        }else{

                               $starNumber = $getaverage;

					        }

                  		?>

						      <div class="stars"> 

						        <?php

					         $explode    = explode('.',$starNumber);

							    for($x=1;$x<=$starNumber;$x++) { ?>

							         <span class="star on"></span>

							    <?php } if (strpos($starNumber,'.')) { ?>

							         <span class="star half exp<?php echo $explode[1]; ?>"></span>

							    <?php $x++; }

							    while ($x<=5) { ?>

							         <span class="star"></span>

					         <?php  $x++; }  ?>

						         <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>

						      </div>

						   </div>

						</div>

                         

					 </div>	

					</div>

					

						<div class="clearfix"></div>

						<div class="box-bottom box_language">

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">

								<p>{{$course->age}} @lang('front.years') +</p>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">

								<p>£{{$course->ppw1}}</p>

							</div>

						</div>

						</div>							

								

							</div>

							</a>

							</div> 						

							@endforeach



							<div class="clearfix"></div>

							<div class="cus_btn btn_round btn_full">

								<a href="{{route('allCourse')}}">@lang('front.allcourses')</a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

@endsection

