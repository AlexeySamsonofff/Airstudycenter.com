@extends('front.index1')
@section('title', 'All School')
@section('content')
<style>
	.nav-link {
		padding: .5rem .5rem !important;
	}

	.nav-tabs .nav-link {
		border: 1px solid #9c9c9c;
	}
	li.nav-item a.nav-link{
		line-height : 1.0 !important;
	}

	@media(max-width: 500px){
		.multi-column{
			list-style-type: none;
			columns: 2;
			-webkit-columns: 2;
			-moz-columns: 2;
		}
		.multi-column li span{
			font-size: 13.5px !important;
		}

		.cus_title h1 {
			font-size: 28px;
			margin: 0 0 10px 0;
			line-height: 1.2;
		}
		.cus_title{
			padding-left: 1.5em !important;
		}
		.navbar.navbar-expand-lg.study_customnav {
			width: 100%;
		}

		.courses_sec ul li {
			font-size: 13px;
		}
	}

</style>
<!--City School Start-->
<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
<section class="courses_sec city_school" style="padding:30px 0 30px">
	<!--<div class="container">-->
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
		@endif
		<div class="row" style="margin-top: 150px;">
			<div class="col-md-10 col-10">
				<div class="cus_title" style="padding-left : 4em">
					<h1 class="distance" style="margin-left:0px"> @if ( Config::get('app.locale') == 'en')
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
                   @endif</h1>
					<ul>
						<li><a href="{{route('mainhome')}}">@lang('school.home')</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li><a href="{{route('mainAllSchool')}}">@lang('school.school')</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li> @if ( Config::get('app.locale') == 'en')
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
                   @endif</li>
					</ul>
				</div>
			</div>
			<div class="col-md-2 col-2" style="padding-right : 4em">
				@if (isset($logo->logo))
				<img class="img-thumbnail pull-right" src="@if(isset($logo->logo)){{asset('logo_images/'.$logo->logo)}} @endif" alt="{{$school->name}}-logo" style="width:100px;">
				@endif
			</div>
		</div>
	<!--</div>-->
</section>
<div class="row">
	<div class="col-md-12" style="padding-right:0px; margin-right: 0px !important; ">
		<!--<div class="school_des s_tabs">
			 <ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item ">
				<a class="nav-link active" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">@lang('school.images')</a>
			  </li>
			</ul>
		</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">-->
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%;">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						@if($school->images == 'noimage')
						@else
						@php
						  $count =0;
						@endphp
					@foreach($school->images as $image)
					@if($loop->iteration == 1)
					<li data-target="#myCarousel" data-slide-to="{{$count}}" class="active"> </li>
					@else
					<li data-target="#myCarousel" data-slide-to="{{$count}}"></li>
					@endif
					@php
						  $count++;
					@endphp
					@endforeach
					@endif
					</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner school-detail" style="">
					@if($school->images == 'noimage')
					<div class="carousel-item active">
						<img src="{{asset('front/images/city-school.png')}}" alt="" style="width:100%;">
					</div>
					@else
					@foreach($school->images as $image)
					@if($loop->iteration == 1)
					<div class="carousel-item active">
						<img src="{{asset('normal_images/'.$image)}}" alt="" style="width:100%;">
					</div>
					@else
					<div class="carousel-item">
						<img src="{{asset('normal_images/'.$image)}}" alt="" style="width:100%;">
					</div>
					@endif
					@endforeach
					@endif
				</div>
				<!-- Left and right controls -->
					<!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left"></span>
					  <span class="sr-only">@lang('school.previous')</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right"></span>
					  <span class="sr-only">@lang('school.next')</span>
					</a>-->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left carousel-control-prev-icon"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right carousel-control-next-icon"></span>
						<span class="sr-only">Next</span>
					  </a>
				@if(Auth::check())
					@if($count_favschool == 0)
					<div class="detail-banner-btn heart">
						<input type="hidden" class="heart_input" value="0">
						<input type="hidden" class="heart_schoolid" value="{{$school->id}}">
						<i class="fa fa-heart-o heart_submit"></i> <span data-toggle=""></span>
					</div>
					@else
					<div class="detail-banner-btn heart marked">
						<input type="hidden" class="heart_input" value="1">
						<input type="hidden" class="heart_schoolid" value="{{$school->id}}">
						<i class="fa fa-heart-o heart_submit"></i> <span data-toggle=""></span>
					</div>
					@endif
				@else
					<div class="detail-banner-btn heart heart_login">
						<input type="hidden" class="heart_input" value="0">
						<input type="hidden" class="heart_schoolid" value="{{$school->id}}">
						<i class="fa fa-heart-o heart_submit"></i> <span data-toggle=""></span>
					</div>
				@endif
				</div>
			<!--</div>
		</div>	-->
	</div>
</div>
<!--City School End-->
<!-- Inner City School Start-->
<section class="city_school" style="padding:20px 0 30px !important">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
			<div class="col-md-12 custome_remove_padding">
				<div class="s_tabs" style="position: sticky;top: 150px; z-index:500; background-color:white; width:100%">
					 <ul class="nav nav-tabs p-10" id="myTab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">@lang('school.general')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">@lang('school.courses')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">@lang('school.review')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="accommodation-tab" data-toggle="tab" href="#accommodation" role="tab" aria-controls="review" aria-selected="false">@lang('school.accommodation')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="false">@lang('school.Visa')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="insurance-tab" data-toggle="tab" href="#insurance" role="tab" aria-controls="insurance" aria-selected="false">@lang('school.insurance')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="profile" aria-selected="false">@lang('school.video')</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="map-tab" data-toggle="tab" href="#map-view" role="tab" aria-controls="contact" aria-selected="false">@lang('school.map')</a>
						  </li>
						</ul>
				</div>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
						<div class="row" style="margin-bottom: 15px">
							<div class="col-md-10 city_head" style="@if(isset($logo->logo)){{'padding-left:15px'}} @endif">
								<h2>@if ( Config::get('app.locale') == 'en')
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
								@endif</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-8 col-md-8 col-sm-7 col-xs-7 add">
								<input id="address" type="hidden" value="{{$school->address}},{{$school->country}},{{$school->state}},{{$school->zipcode}}">
								<h5 class="text-success">
									<i class="fa fa-map-marker"></i>
									<a href="https://maps.google.com/?q={{$school->zipcode}}" class="text-success">
									{{$school->address}} {{$school->country}},{{$school->state}} {{$school->zipcode}}
                                    </a>
								</h5>
							</div>
							<div class="col-4 col-md-3 col-sm-5 col-xs-5 pull-right">
								<div class="school_comment">
									<div id="AirStudyOverallComments" class="AirStudyMultipleComment" style="text-align: right;">
										<?php
										$alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3+$review_rate4+$review_rate5;
										$getaverage = $alltotal/6;
										?>
										<span class="star on" style="font-size:30px"></span><span style="font-size:30px; font-weight:bold">{{$getaverage}}/</span><span style="font-weight:bold; font-size:20px">5</span>
									</div>
								</div>
							</div>
						</div>
						<!--<div class="row mb-2">
							<div class="col-md-4 col-sm-5 col-xs-5 box-1 no-border rev">
								<h6 class="add-rev">@lang('school.review')</h6>
								 <div class="school_comment">
								   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
								   	<?php
		                           $alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3+$review_rate4+$review_rate5;
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
                  		           </div>
								   </div>
								</div>
							</div>
						</div>-->
				<div class="row sch_wb">
					<div class="col-12 mb-2 add user-email">
						<span class="text-success"><i class="fa fa-envelope" aria-hidden="true"></i>
						<a class="text-success"href="mailto:{{$school->email}}?Subject=Air Study Center Inquiry&Body=bodytext">
						    {{$school->email}}
						</a>
						</span>
					</div>
					<div class="col-12 mb-2 add mx-w">
						<span class="text-success"><i class="fa fa-phone" aria-hidden="true"></i>
							<a class="text-success"href="https://wa.me/{{$school->phone}}">{{$school->phone}}</a>
						</span>
					</div>
					<div class="col-12 mb-2 add web_img">
						<span class="text-success"><i class="fa fa-globe" aria-hidden="true"></i>
							<a class="text-success" href="{{$school->weblink}}">
								{{$school->weblink}}
							</a>
						</span>
						<!--<span class="sch_web_weblink">
							<img src="{{asset('front/images/website_icon.png')}}" alt =""/><a class="text-success" href="{{$school->weblink}}">{{$school->weblink}}</a>
						</span>-->
					</div>
				</div>
			<div class="row about_sch school_desc">
				<h2>@lang('school.accreditations')</h2>
			</div>
			<div class="row">
				@foreach($accreditations as $accreditation)
				<div class="col-md-3 col-sm-4 col-4" style="margin-bottom:2em">
					<img style="width:100%" src="{{$accreditation->image}}">
				</div>
				@endforeach
				<!--<div class="course_dur">
					<div class="outer_border">
						<h5>60</h5>
						<span>Course Duration</span>
					</div>
				</div>-->
			</div>
			<style>
				.tab-pane{
					padding-left: 10px;
				}
				.top-box{
					color: black;
					border: 3px solid #28a745;
					padding: 12px;
					border-width: 0px 2px 0px 0px;
				}
				div.top-box-row div.top-box:last-child{
					border-width: 0px 0px 0px 0px;
				}
				.top-box h5{
					font-size:20px;
				}
				.top-box span{
					font-size:15px;
				}
				.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
					color: #ffffff;
					background-color: #9c9c9c;
					border-color: #929292 #797979 #8c8c8c;
				}
				.nav-tabs .nav-link{
					font-size:17px;
				}
				.p-10 {
					padding: 20px 0px 0px 0px;
				}
				.nav-tabs{
					border-bottom: 1px solid #dee2e6 !important;
				}
				.tab-content>.active {
					margin-top: 20px;
				}
			</style>
			<div class="row top-box-row">
				<div class="col-md-4 col-4 text-center top-box">
						<h5>{{$school->no_of_student}}</h5>
						<span>@lang('school.no_of_student')</span>
				</div>
				<div class="col-md-4 col-4 text-center top-box">
						<h5>{{$school->agelimit}}</h5><span>@lang('school.age_limit')</span>
				</div>
				<div class="col-md-4 col-4 text-center top-box">
						<h5>{{$review_rate}}</h5><span>@lang('school.review')</span>
				</div>
				<!--<div class="col-md-3 text-center">
					<div class="top-box">
						@if(!empty(explode(',', $school->accreditations)) && explode(',', $school->accreditations)[0] != "")
							<h5>{{count(explode(',', $school->accreditations))}}</h5>
						@else
							<h5>{{'0'}}</h5>
						@endif
						<span>@lang('school.accreditations')</span>
					</div>
				</div>-->
			</div>
			<style>
				.school_desc div.col-md-12 p{
					text-align:justify !important;
				}
			</style>
			<div class="row about_sch school_desc">
				<h2>@lang('school.about_school')</h2>
				<div class="col-md-12">
					 @if ( Config::get('app.locale') == 'en')
	                  {!! $school->description !!}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                  {!! $school->description_tr !!}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                 {!!$school->description_ar!!}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                  {!! $school->description_ru !!}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {!! $school->description_de !!}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {!! $school->description_it !!}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                 {!! $school->description_fr !!}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {!! $school->description_es !!}
                    @elseif ( Config::get('app.locale') == 'se' )
                      {!! $school->description_se !!}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {!! $school->description_jp !!}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {!! $school->description_fa !!}
                    @elseif ( Config::get('app.locale') == 'pr' )
                      {!! $school->description_pr !!}
                   @endif
				</div>
			</div>
			<div class="row about_sch" style="margin-bottom: 0">
				<h2>@lang('school.facilities')</h2>
			</div>
				<div class="row">
					<div class="col-md-12">
						<div class="student_fac about_sch" style="margin-top :0">
							<ul class="multi-column">
								<!-- @if($school->facilities == 'no facility')
								@else -->

								@foreach($school_facilities as $facilitie)
								<li><span><i class="" aria-hidden="true"><img src="{{$facilitie->facility_icon}}" style="margin: 3px;"></i>@if ( Config::get('app.locale') == 'en')
	                 {{$facilitie->facility_name}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                 {{$facilitie->facility_name_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                 {{$facilitie->facility_name_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                  {{$facilitie->facility_name_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$facilitie->facility_name_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {{$facilitie->facility_name_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                 {{$facilitie->facility_name_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {{$facilitie->facility_name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                      {{$facilitie->facility_name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$facilitie->facility_name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {{$facilitie->facility_name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                      {{$facilitie->facility_name_pr}}
                   @endif</span></li>
								@endforeach
								<!-- @endif -->
							</ul>
						</div>
					</div>
				</div>
				@if($school->history_country == 'no' && $school->history_nos == 'no')
				@else
				<div class="row about_sch">
				<h2>@lang('school.tsn')</h2>
			    </div>
				<div class="row">
					<div class="col-md-12">

						<div class="students_percentage">
							<div id="chart_stu" style="width:100%"></div>
							<!--<div id="student_chart_pie" style="width:100%"></div>-->
							<div class="border-line chart_line"></div>
							<div class="per_stu text-center"><span style="font-weight:500">@lang('school.pos')</span></div>
							<div class="txt_nation"><h2>@lang('school.nationaility')</h2></div>
						</div>

					</div>
				</div>
				@endif
   <!-- SLIDER STARTS-->
			</div>
		 <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
			<div class="sch_course">
				<!-- Strat Course loop to show all courses under this school -->
                @foreach($courses as $course)
				<div class=" out_br deal_box mb_3">
					<div class="row ">
						<div class="col-md-8 cou centers ">
							<div class="proo_head">
								<h2>@if ( Config::get('app.locale') == 'en')
	                 {{$course->course_title}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                 {{$course->course_title_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                 {{$course->course_title_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                 {{$course->course_title_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$course->course_title_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {{$course->course_title_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                {{$course->course_title_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {{$course->course_title_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                     {{$course->course_title_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$course->course_title_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {{$course->course_title_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                     {{$course->course_title_pr}}
                   @endif</h2>
							</div>
						<div class="rating_rev">
                        <div class="school_comment">
							<div id="AirStudyOverallComments" class="AirStudyMultipleComment">
							<?php
							   $alltotal  = $course->review_rate_courses+$course->review_rate_courses1+$course->review_rate_courses2+$course->review_rate_courses3;
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
								<div class="clearfix"></div>
							</div>
							<div class="lesson">
								<h6 class="rgt-bor"><span></span> @lang('school.hpw')</h6>
								<!--<h5 class="f13">Max group size <span class="f13">{{$course->max_group_size}}</span></h5>-->
							</div>
					 </div>
						<div class="col-md-4 rat_form text-right">
							<div class="orange_font">

							</div>
							<!-- drop and input box html -->
							  <div class=" align-items-end">
                                <!-- input box starts -->
                                <div class="choose_sec cou_dur select align-box-drop">
                                	<div class="form-group select_dropdown">
                                		<div class="price_per_week_main float-right ml-2"  style="width:48%;display:none">
                                            <select class="form-control price_per_week">
                                            </select><div class="select_arrow"><i class="fa fa-angle-down"></i></div>
                                           </select>
                                		</div>
                                	</div>
                                </div>
                                <!-- input box finsh -->
                                <!-- slect box starts -->
								 <div class="pr-0 float-right hours_per_week_main" style="width:48%;">
  									<div class="choose_sec cou_dur select">
  										<div class="form-group select_dropdown">
  											<select class="form-control hours_per_week w-100 ml-0">
  												<option value="null">@lang('school.shpw')</option>
  												@foreach($course->course_hours_per_week as $hpw)
  												<option value={{$hpw}}>{{$hpw}} @lang('school.hpw')</option>
  												@endforeach
  											</select>
  											<input type="hidden" name="cp_course_id" data-id="{{$course->id}}" data-slug="{{$course->course_slug}}" class="cp_course_id" value="{{$course->courseId}}">
  											<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
  										</div>
  									</div>
  								</div>
                                <!-- slect box finish -->

							  </div>
							<!-- drop and input box finish -->

							<div class="res">
								<!--<a class="reserv_link" href="javascript:;">Reservation</a>--></div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- End Course loop to show all courses under this school -->
			</div>
		 </div>
		<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="school_comment">
          	<!-- OverAll Comment Starts -->
          	<div class="row">
          		<div class="col-md-12">
                  	<!--<h2 class="AirSheading"><a name="evaluation" id="evaluation"></a><span class="titleSep">@lang('school.reviews')</span></h2>-->
                  	<div id="AirMainCommentDiv">
                  		<?php
                           $alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3+$review_rate4+$review_rate5;
					         $getaverage = $alltotal/6;
					         if(is_float($getaverage)){
					          $starNumber = number_format((float)$getaverage, 1, '.', '');
					        }else{
                               $starNumber = $getaverage;
					        }
                  		?>
                  		<div class="AirStudyNumbers"><span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span></div>
                  		<div id="AirStudyOverallComments">
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
                  		</div>
                  	</div>
                  </div>
                  <!-- overall Rating -->
                  <div id="AirMainMultipleChoiceCommentDiv">
                  	 <div class="MainA">
                  	 <div class="MultipleChoiceInner">
                  	 	<div class="Aircolleft">@lang('school.city') </div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					        <?php
					        if(is_float($review_rate)){
					          $starNumber = number_format((float)$review_rate, 1, '.', '');
					        }else{
                               $starNumber = $review_rate;
					        }
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
                  	<div class="MultipleChoiceInner">
                  		<div class="Aircolleft">Organisation </div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					         	<?php
					         if(is_float($review_rate1)){
					          $starNumber = number_format((float)$review_rate1, 1, '.', '');
					        }else{
                               $starNumber = $review_rate1;
					        }
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
                    <div class="MultipleChoiceInner">
                  		<div class="Aircolleft">@lang('school.facilities') </div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					         	<?php
					        if(is_float($review_rate2)){
					          $starNumber = number_format((float)$review_rate2, 1, '.', '');
					        }else{
                               $starNumber = $review_rate2;
					        }
					         $starNumber = $review_rate2;
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
               <div class="MainB">
                  	 	<div class="MultipleChoiceInner">
                  	 	<div class="Aircolleft">@lang('school.course_quality')</div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					         	<?php
					         if(is_float($review_rate3)){
					          $starNumber = number_format((float)$review_rate3, 1, '.', '');
					        }else{
                               $starNumber = $review_rate3;
					        }
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
                  	<div class="MultipleChoiceInner">
                  		<div class="Aircolleft">@lang('school.accommodation')</div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					         	<?php
					         if(is_float($review_rate4)){
					          $starNumber = number_format((float)$review_rate4, 1, '.', '');
					        }else{
                               $starNumber = $review_rate4;
					        }
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
                    <div class="MultipleChoiceInner">
                  		<div class="Aircolleft">@lang('school.activities') </div>
                  	 	<div class="AircolRight">
                  	 	 <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                  	 		<div class="stars">
					         	<?php
					         if(is_float($review_rate5)){
					          $starNumber = number_format((float)$review_rate5, 1, '.', '');
					        }else{
                               $starNumber = $review_rate5;
					        }
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
             </div>

                </div>
            </div>
            <!-- OverAll Comment Ends -->
            <!-- User  Comment Strats -->
            <div class="row">
						<div class="col-md-12 city_head" style="padding-left:15px !important">
							<h2>{{count($reviews)}} @lang('school.comment')</h2>
						</div>
						@foreach($reviews as $review)
						<div class="col-md-12 review_views">
							<div class="d-inline float-left">

									<div class="viwers_img viewer_profile_image">
								@php $userimage = App\User::where('id',$review->user_id)->first();
								    @endphp
									@if($userimage->image)
							         <img src="{{$userimage->image}}" alt="">
							        @else
							        <img src="{{asset('front/images/man.png')}}" alt="">
                                    @endif
								  </div>

							</div>
							<div class="col-md-10">
								<div class="viwers_txt">
									@php
									$date = date('d-M-Y', strtotime($review->created_at));
									@endphp
									<span>{{$date}}</span>
									<h3>{{$review->user_name}}</h3>
									<p>{{$review->comment}}</p>
									<div class="row viewer_rating no-gutter">
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.city')</span>
											<ul class="star_check">
												@if($review->rate)
												@for($i=1;$i<=($review->rate);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.organisation') </span>
											<ul class="star_check">
												@if($review->rate1)
												@for($i=1;$i<=($review->rate1);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.facilities')</span>
											<ul class="star_check">
												@if($review->rate2)
												@for($i=1;$i<=($review->rate2);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.course_quality')</span>
											<ul class="star_check">
												@if($review->rate3)
												@for($i=1;$i<=($review->rate3);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.accommodation')</span>
											<ul class="star_check">
												@if($review->rate4)
												@for($i=1;$i<=($review->rate4);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<span>@lang('school.activities')</span>
											<ul class="star_check">
												@if($review->rate5)
												@for($i=1;$i<=($review->rate5);$i++)
							                    <i class="fa fa-star" style="color:#f7a238;"></i>
							                    @endfor
							                    @else
							                    @for($i=1;$i<=5;$i++)
							                    <i class="fa fa-star" style="color:grey;"></i>
							                    @endfor
							                    @endif
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>

								</div>
							</div>
						</div>
						@endforeach
					</div>
            <!-- User  Comment Ends -->
            <!-- User LeaveComment Starts	-->
                 @if(Auth::check())
				<div class="row AirLeaveSchoolComment">
								<div class="leave_comm">
									<h2>@lang('school.leave_comment')</h2>
								</div>
				<form  method="post" action="{{ route('storeReview') }}">
                   {{ csrf_field()}}
                   <div class="row">
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.city')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate" class="form-control rateddata">
							</div>
                   </div>
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.organisation')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate1" class="form-control rateddata">
							</div>
                   </div>
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.facilities')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate2" class="form-control rateddata">
							</div>
                   </div>
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.course_quality')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate3" class="form-control rateddata">
							</div>
                   </div>
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.accommodation')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate4" class="form-control rateddata">
							</div>
                   </div>
                   <div class="col-md-4">
                   	<div class='rating-stars'>
                   		<span>@lang('school.activities')</span>
								<ul id='stars'>
								  <li class='star' title='Poor' data-value='1'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Fair' data-value='2'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Good' data-value='3'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='Excellent' data-value='4'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								  <li class='star' title='WOW!!!' data-value='5'>
								    <i class='fa fa-star fa-fw'></i>
								  </li>
								</ul>
						<input type="hidden" name="rate5" class="form-control rateddata">
							</div>
                   </div>
                  </div>
					<input type="hidden" name="user_id" class="form-control" @if(Auth::check()) value="{{Auth::user()->id}}" @endif>
					<input type="hidden" name="school_id" class="form-control" value="{{$school->id}}" required>
					<div class="row review_form">
								<div class="col-md-6">
									<input type="text" name="name" placeholder="@lang('school.name')" value="{{Auth::user()->name}}" required readonly="">
								</div>
								<div class="col-md-6 mail">
									<input type="text" name="email" placeholder="@lang('school.your_email')" value="{{Auth::user()->email}}" required="" readonly="">
								</div>
					</div>
					<div class="row review_form">
								<div class="col-md-12">
									<textarea class="form-control rounded-0" name="comment" rows="3" placeholder="@lang('school.your_comment')" required></textarea>
								</div>
					</div>
					<div class="post_button subscribe_inner ">
					<input type="submit" value="@lang('school.p_comment')" style="cursor:pointer;">
					</div>
					</form>
					</div>
					@else
						<div class="row client">
						<span>@lang('school.must_logged_in')</span>
						</div>
						@endif

            <!-- User LeaveComment Ends	-->
          </div>
		</div>
		<div class="tab-pane fade" id="accommodation" role="tabpanel" aria-labelledby="accommodation-tab">
		<!-- accommodations -->
		</div>
		<div class="tab-pane fade" id="visa" role="tabpanel" aria-labelledby="visa-tab">
		<!-- visa -->
		</div>
		<div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
		<!-- insurance -->
		</div>
		<div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
		<!-- images -->
		</div>
		<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
			<div class="row">
				<div class="col-md-12 school-video">
					<iframe width="100%" class="school-video" src="{{$school->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="map-view" role="tabpanel" aria-labelledby="map-tab">
			<br />
			<div class="row">
				<div class="col-md-12">
					<div id="map" style="width:100%;"></div>
				</div>
			</div></br>
			<div class="row">
				<div class="col-md-12">
					<div id="mappano" style="width:100%;"></div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
   <!-- SLIDER ENDS -->
			<div class="col-md-3 course_inner choose_sec bg-yel cal" style="position: sticky; top: 150px;">
				<form action="{{route('bookCourse')}}" method="post">
					{{ csrf_field() }}
				<h2>@lang('school.calculator')</h2>
				 <input type="hidden" name="userId" id="userId"  @if(Route::has('login'))
			            @auth value="{{Auth::user()->id}}" @endauth
			          @endif>
				<input type="hidden" name="school_id" id="mainschool_ID" class="form-control" value="{{$school->id}}">
				<input type="hidden" name="course_name" id="course_name" class="form-control" value="">
				<input type="hidden" name="no_of_week" id="no_of_week" class="form-control" value="">
				<input type="hidden" name="acctype_name" id="acctype_name" class="form-control" value="">
				<input type="hidden" name="airport_name" id="airport_name" class="form-control" value="">
				<input type="hidden" name="transport_way" id="transport_way" class="form-control" value="">
				<input type="hidden" name="insurance_name" id="insurance_name" class="form-control" value="">
				<input type="hidden" name="visa_name" id="visa_name" class="form-control" value="">
				<input type="hidden" name="school_Name" id="mainschool_Name" class="form-control" value="@if ( Config::get('app.locale') == 'en')
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
                   @endif">
				<input type="hidden" id="registration_fee" name="registration_fee" value="{{number_format((float)$school->registration_fee, 2, '.', '')}}">
					<div class="form-group select_dropdown ">
						<select class="form-control" id="sl_course" name="courseId">
							<option value="0">@lang('school.select_course')</option>
							@foreach($courses as $course)
							  <option value="{{$course->courseId}}">@if ( Config::get('app.locale') == 'en')
	                 {{$course->course_title}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                 {{$course->course_title_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                 {{$course->course_title_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                 {{$course->course_title_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$course->course_title_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {{$course->course_title_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                {{$course->course_title_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {{$course->course_title_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                     {{$course->course_title_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$course->course_title_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {{$course->course_title_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                     {{$course->course_title_pr}}
                   @endif</option>
							@endforeach
						</select>
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group select_dropdown ">
						<select class="form-control" id="sl_hourse_per_week" name="hoursperweek">
							  <option>@lang('school.shpw')</option>
						</select>
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group select_dropdown ">
						<select class="form-control" id="sl_price_per_week" name="price">
							  <option>@lang('school.spw')</option>
						</select>
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group cal-form">
						 <div class="input-field date  datepicker" id="Bdate">
							<!--<input  name="course_date" type="date" class="datepicker formpage rtxt"><span>Course available</span><i class="fa fa-calendar" aria-hidden="true"></i>-->
                            <input id="txtdate" type="text" name="course_date" required="" placeholder="@lang('school.course_available')">
						 </div>
					 </div>
					 <div class="form-group select_dropdown ">
						<select class="form-control" id="sl_accomodation" name="accomodation" disabled="disabled">
							<option value="0.00">@lang('school.dyna')</option>
							<option value="-1">@lang('school.notu')</option>
							@foreach($accomodations as $accomodation)
                               @if ($accomodation->price != 0.00)
							  <option data-aid="{{$accomodation->accommodation_id}}" value="{{number_format((float)$accomodation->price, 2, '.', '')}}">
							  @if ( Config::get('app.locale') == 'en')
	                {{$accomodation->typeName}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                 {{$accomodation->typeName_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                {{$accomodation->typeName_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                 {{$accomodation->typeName_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$accomodation->typeName_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {{$accomodation->typeName_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                {{$accomodation->typeName_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {{$accomodation->typeName_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                     {{$accomodation->typeName_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$accomodation->typeName_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {{$accomodation->typeName_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                     {{$accomodation->typeName_pr}}
                   @endif</option>
							   @endif
							 @endforeach
						</select>
						<input type="hidden" name="acc_id" value="" id="selected_acc_id">
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group select_dropdown">
						<div class="getselect_acctype"></div>
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group select_dropdown ">
						<select class="form-control" id="sl_transport" name="transportid" disabled="disabled">
							<option value="0">@lang('school.dunt')</option>
							<option value="0.00">@lang('school.notu')</option>
							@foreach($transports as $transport)
							<option value="{{$transport->id}}">@if ( Config::get('app.locale') == 'en')
	                {{$transport->airport_name}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                 {{$transport->airport_name_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                {{$transport->airport_name_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                 {{$transport->airport_name_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$transport->airport_name_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                  {{$transport->airport_name_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                {{$transport->airport_name_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                     {{$transport->airport_name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                     {{$transport->airport_name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                      {{$transport->airport_name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' )
                      {{$transport->airport_name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                     {{$transport->airport_name_pr}}
                   @endif</option>
							@endforeach
						</select>
						<div class="select_arrow"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="form-group select_dropdown ">
						<select class="form-control" name="transportprice" id="sl_transportprice" style="display:none">


						</select>

					</div>
                 <div class="form-group select_dropdown">
				<select class="form-control" id="sl_insurance" name="insuranceid" disabled="disabled">
					<option value="0.00">@lang('school.duni')</option>
					<option value="-1">@lang('school.notu')</option>
					@foreach($scinsurances as $insurance)
					@if ($insurance->price != 0.00)
					<option data-insid="{{$insurance->id}}" value="{{number_format((float)$insurance->price, 2, '.', '')}}">
						{{$insurance->insName}}
					</option>
					@endif
					@endforeach
			    </select>
			    <input type="hidden" name="ins_id" value="" id="selected_ins_id">
					    <div class="select_arrow"><i class="fa fa-angle-down"></i></div>
			     </div>
			     <div class="form-group select_dropdown">
						<select class="form-control" id="sl_visa" name="visaid" disabled="disabled">
							<option value="0.00">@lang('school.dunv')</option>
							<option value="-1">@lang('school.notu')</option>
							@foreach($scvisas as $visa)
							@if ($visa->price != 0.00)
							<option data-visaid="{{$visa->id}}" value="{{number_format((float)$visa->price, 2, '.', '')}}">
								{{$visa->visaName}}
							</option>
							@endif
							@endforeach
					    </select>
					  <input type="hidden" name="visa_id" value="" id="selected_visa_id">
					    <div class="select_arrow"><i class="fa fa-angle-down"></i></div>
			     </div>
			     <!--<div class="row fee cus_fee cus_discount"></div>-->
				 <div class="row fee cus_fee">
					<div class="col-md-8"><h5>@lang('school.registration_fee')</h5></div>
					<div class="col-md-4 padr_10 price_value"><h3>£{{number_format((float)$school->registration_fee, 2, '.', '')}}</h3></div>
				 </div>
				 <div class="row fee cus_fee">
						<div class="col-md-8"><h5>@lang('school.course_fee')</h5></div>
						<div class="col-md-4 padr_10 price_value pv_course"><h3>£0.00</h3> </div>
				 </div>
				 <div class="row fee cus_fee cus_discounted_price" style="display:none;">
						<div class="col-md-8"><h5>@lang('school.course_discount') <span class="cus_dis_percentage"></span>%</h5></div>
						<div class="col-md-4 padr_10 price_value pv_discount_course"><h3>£0.00</h3> </div>
				 </div>
				 <div class="row fee cus_fee cus_saved_price" style="display:none;">
						<div class="col-md-8"><h5>@lang('school.you_save')</h5></div>
						<div class="col-md-4 padr_10 price_value pv_discount_save"><h3>£0.00</h3></div>
				 </div>
				  <div class="row fee cus_fee">
						<div class="col-md-8"><h5>@lang('school.accommodation_fee')</h5></div>
						<div class="col-md-4 padr_10 price_value pv_acco"><h3>£0.00</h3> </div>
				 </div>
				 <div class="row fee cus_fee">
					<div class="col-md-8"><h5>@lang('school.apf')</h5></div>
					<div class="col-md-4 padr_10 price_value pv_transport"><h3>£0.00</h3></div>
				 </div>
				 <div class="row fee cus_fee">
					<div class="col-md-8"><h5>@lang('school.insurance')</h5></div>
					<div class="col-md-4 padr_10 price_value pv_insurance"><h3>£0.00</h3></div>
				 </div>
				 <div class="row fee cus_fee">
					<div class="col-md-8"><h5>@lang('school.Visa')</h5></div>
					<div class="col-md-4 padr_10 price_value pv_visa"><h3>£0.00</h3></div>
				 </div>
				 <div class="order_border"></div>
				 <div class="row total_rate">
					<div class="col-md-7"><h5>@lang('school.total')</h5></div>
					<div class="col-md-5"><h3 class="total_cp_price">£{{number_format((float)$school->registration_fee, 2, '.', '')}}</h3></div>
					<input type="hidden" class="total_course_price" name="total_course_price" value="{{number_format((float)$school->registration_fee, 2, '.', '')}}">
				 </div>
				 <div class="row">
					<div class="col-md-12 text-center place_order book_now">
							<!--<a href="#">Book Now </a>-->
							<input type="submit" name="submit" id="book_now_course" value="@lang('school.book_now')" disabled>
					</div>
				 </div>
				 <div class="row">
					<div class="col-md-12 UserCredits" style="display:none;">
							<!--<a href="#">Book Now </a>-->
							<input type="hidden" name="creditoption" id="creditoption" value="0">
							<input type="checkbox" name="credit" id="credit_course" value="{{$final_credit}}">
							<span>@lang('school.credits') : £{{$final_credit}}</span>
					</div>
				 </div>
				 </form>
				 <div class="row">
			<p id="showloginmsz"></p>
		</div>
     </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row interst_sch">
				<div class="cus_title about_sch">
					<h2>@lang('school.ints')</h2>
					<div class="border-line"></div>
				</div>
			</div>
			<div class="school_slider">
				<div class="owl-carousel owl-theme deal_carousel inter_head">
					@foreach($schoollists as $schoollist)
					<div class="item deal_inner_list ">
						@if($schoollist->image != null)
						<img class="full "src="{{asset('thumbnail_images/'.$schoollist->image)}}">
						@else
						<img class="full"  src="{{asset('front/images/image-not-available.png')}}" style="height:200px;">
						@endif
						<div class="school_in text-center centers">
							<h2 class="stu"><a class="text-success" href="{{route('schooldetail',['id'=>$schoollist->id,'slug'=>$schoollist->slug])}}">
								@if ( Config::get('app.locale') == 'en')
								 {{$schoollist->name}}
								@elseif ( Config::get('app.locale') == 'tr' )
								 {{$schoollist->name_tr}}
								@elseif ( Config::get('app.locale') == 'ar' )
								 {{$schoollist->name_ar}}
								@elseif ( Config::get('app.locale') == 'ru' )
								  {{$schoollist->name_ru}}
								@elseif ( Config::get('app.locale') == 'de' )
								  {{$schoollist->name_de}}
								@elseif ( Config::get('app.locale') == 'it' )
								  {{$schoollist->name_it}}
								@elseif ( Config::get('app.locale') == 'fr' )
								 {{$schoollist->name_fr}}
								@elseif ( Config::get('app.locale') == 'es' )
								 {{$schoollist->name_es}}
								@elseif ( Config::get('app.locale') == 'se' )
								  {{$schoollist->name_se}}
								@elseif ( Config::get('app.locale') == 'jp' )
								  {{$schoollist->name_jp}}
								@elseif ( Config::get('app.locale') == 'fa' )
								  {{$schoollist->name_fa}}
								@elseif ( Config::get('app.locale') == 'pr' )
								  {{$schoollist->name_pr}}
							   @endif</a>
							</h2>
							<div class="clearfix"></div>
						</div>
					</div>
					@endforeach
									<!-- <div class="item deal_inner_list">
										<img class="full" src="{{asset('front/images/interst_2.png')}}" alt="" />
										<div class="school_in text-center centers">
											<h2><a href="#"> EC English Language Centers</a></h2>
											<div class="clearfix"></div>
										</div>
									</div>
								<div class="item deal_inner_list">
									<img class="full" src="{{asset('front/images/interst_3.png')}}" alt="" />
										<div class=" school_in text-center centers">
											<h2><a href="#">Eurocenters Bournemouth</a></h2>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="item deal_inner_list">
										<img class="full" src="{{asset('front/images/interst_4.png')}}" alt="" />
										<div class="school_in text-center centers">
											<h2><a href="#">Wimbledon School of English</a></h2>
											<div class="clearfix"></div>
										</div>
									</div> -->
				</div>
			</div>
		</div>
	</div>
	</div>
<!-- Inner City School End-->
</section>
<script>
$(window).on('load', function() {
    var courseid_singlepage = '<?php echo $courseid_singlepage; ?>';
    if (courseid_singlepage) {
        $('#sl_course').val(courseid_singlepage).change();
    }
});
$(document).ready(function() {
    $('.detail-banner-btn').click(function() {
        $(this).toggleClass('marked');
        var schoolid = $('.heart_schoolid').val();
        $('.marked .heart_input').val(1);
        var data_toggle = $(this).find('span').attr('data-toggle');
        var data_text   = $(this).find('span').text();
        var heart_input = $('.marked .heart_input').val();
        $.ajax({
            url: "{{route('favschool')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "heart_input": heart_input,
                "schoolid": schoolid,
                "data_toggle":data_toggle,
                "data_text":data_text
            },
            success: function(response) {
               var myJSON = JSON.parse(response);
            	 $('.heart span').text(myJSON[0]);
            	 $('.heart span').attr('data-toggle', myJSON[1]);

            },
        });
    });
    $('.heart_login').click(function()
	{
		$( "#login" ).trigger( "click" );
	});
    $('#sl_course').on('change', function() {
        var courseid = this.value;
        if(courseid != 0){
          var course_name  = $('#sl_course').find('option:selected').text();
          $('#course_name').val(course_name);
        }else{
          $('#course_name').val('');
        }
        var mainschool_ID = $("#mainschool_ID").val();
        $('.pv_course h3').text('£0.00');
        $('.pv_acco h3').text('£0.00');
        $('.pv_insurance h3').text('£0.00');
        $('.pv_visa h3').text('£0.00');
        var registration_fee = $("#registration_fee").val();
        $(".total_cp_price").text('£' + parseFloat(Math.round(registration_fee * 100) / 100).toFixed(2));
        $(".total_course_price").val(registration_fee);
        $('.pv_transport h3').text('£0.00');
        $('#sl_accomodation option[value="0.00"]').prop("selected", true);
        $('#sl_accomodation').prop('disabled', 'disabled');
        $('#sl_insurance option[value="0.00"]').prop("selected", true);
        $('#sl_insurance').prop('disabled', 'disabled');
        $('#sl_visa option[value="0.00"]').prop("selected", true);
        $('#sl_visa').prop('disabled', 'disabled');
        $('#sl_transport option[value="0"]').prop("selected", true);
        $('#sl_transport').prop('disabled', 'disabled');
        $('#sl_transportprice').empty();
        $('#sl_transportprice').hide();
        $('.cus_discounted_price').hide();
        $('.cus_saved_price').hide();
        $('#selected_acc_id').val('');
        $('#book_now_course').prop('disabled', 'disabled');
        $('#book_now_course').removeClass('allow');
        $('.UserCredits').hide();
        $('#no_of_week').val('');
        $('#acctype_name').val('');
        $('#airport_name').val('');
        $('#transport_way').val('');
        $('#insurance_name').val('');
        $('#visa_name').val('');
        $.ajax({
            url: "{{route('getweekajax')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "courseid": courseid,
                'mainschool_ID': mainschool_ID
            },
            success: function(response) {
                $('#sl_hourse_per_week').html(response);
                $('#sl_price_per_week').html('<option>@lang('school.spw')</option>');
            },
        });
    });
    $('#sl_hourse_per_week').on('change', function() {
        var mainschool_ID = $("#mainschool_ID").val();
        var courseid = $('#sl_course').val();
        var hours_per_week = this.value;
        $('.pv_course h3').text('£0.00');
        $('.pv_acco h3').text('£0.00');
        $('.pv_insurance h3').text('£0.00');
        $('.pv_visa h3').text('£0.00');
        var registration_fee = $("#registration_fee").val();
        $(".total_cp_price").text('£' + parseFloat(Math.round(registration_fee * 100) / 100).toFixed(2));
        $(".total_course_price").val(registration_fee);
        $('.pv_transport h3').text('£0.00');
        $('#sl_price_per_week').html('<option>@lang('school.shpw')</option>');
        $('#sl_accomodation option[value="0.00"]').prop("selected", true);
        $('#sl_accomodation').prop('disabled', 'disabled');
        $('#sl_insurance option[value="0.00"]').prop("selected", true);
        $('#sl_insurance').prop('disabled', 'disabled');
        $('#sl_visa option[value="0.00"]').prop("selected", true);
        $('#sl_visa').prop('disabled', 'disabled');
        $('#sl_transport option[value="0"]').prop("selected", true);
        $('#sl_transport').prop('disabled', 'disabled');
        $('#sl_transportprice').empty();
        $('#sl_transportprice').hide();
        $('.cus_discounted_price').hide();
        $('.cus_saved_price').hide();
        $('#selected_acc_id').val('');
        $('#book_now_course').prop('disabled', 'disabled');
        $('#book_now_course').removeClass('allow');
        $('.UserCredits').hide();
        $('#no_of_week').val('');
        $('#acctype_name').val('');
        $('#airport_name').val('');
        $('#transport_way').val('');
        $('#insurance_name').val('');
        $('#visa_name').val('');
        $.ajax({
            url: "{{route('getcoursepriceajax')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "courseid": courseid,
                "hours_per_week": hours_per_week,
                'mainschool_ID': mainschool_ID
            },
            success: function(response) {
				console.log(response);
                var myObject = JSON.parse(response);
                $('.cus_dis_percentage').html(myObject[0]);
                $('#sl_price_per_week').html(myObject[1]);
            },
        });
    });
    $('#sl_price_per_week').on('change', function() {
        var price_per_week = this.value;
        var no_of_week = $(this).find('option:selected').text();
        $("#no_of_week").val(no_of_week);
        var registration_fee = $("#registration_fee").val();
        var acco_price = $('#sl_accomodation').val();
        if (price_per_week == 0.00) {
            $('#sl_accomodation option[value="0.00"]').prop("selected", true);
            $('#sl_accomodation').prop('disabled', 'disabled');
            $('#sl_insurance option[value="0.00"]').prop("selected", true);
            $('#sl_insurance').prop('disabled', 'disabled');
            $('#sl_visa option[value="0.00"]').prop("selected", true);
            $('#sl_visa').prop('disabled', 'disabled');
            $('#selected_acc_id').val('');
            $('#sl_transport option[value="0"]').prop("selected", true);
            $('#sl_transport').prop('disabled', 'disabled');
            $('#sl_transportprice').empty();
            $('#sl_transportprice').hide();
            $('.pv_course h3').text('£0.00');
            $('.pv_acco h3').text('£0.00');
            $('.pv_transport h3').text('£0.00');
            $('.pv_insurance h3').text('£0.00');
            $('.pv_visa h3').text('£0.00');
            $('.cus_discounted_price').hide();
            $('.cus_saved_price').hide();
            var total = parseFloat(registration_fee);
            $(".total_cp_price").text('£' + parseFloat(Math.round(total * 100) / 100).toFixed(2));
            $(".total_course_price").val(total);
            $('#book_now_course').prop('disabled', 'disabled');
            $('#book_now_course').removeClass('allow');
            $('.UserCredits').hide();
        } else {
            if (price_per_week.indexOf("@") >= 0) {
                var result = $(price_per_week.split('@'));
				console.log(result);
                if (result[2] == 0) {
                    var pv_course = $('.pv_course h3').text('£' + result[1]);
                    $('.cus_discounted_price').hide();
                    $('.cus_saved_price').hide();
                    var total = parseFloat(registration_fee) + parseFloat(price_per_week);
                    $(".total_cp_price").text('£' + parseFloat(Math.round(total * 100) / 100).toFixed(2));
                    $(".total_course_price").val(total);
                    $('.UserCredits').hide();
                    $('#sl_transportprice').hide();
                    $('#book_now_course').prop('disabled', 'disabled');
                    $('#book_now_course').removeClass('allow');
                    $('#sl_accomodation option[value="0.00"]').prop("selected", true);
                    $('#sl_accomodation').prop('disabled', 'disabled');
                    $('#sl_insurance option[value="0.00"]').prop("selected", true);
                    $('#sl_insurance').prop('disabled', 'disabled');
                    $('#sl_visa option[value="0.00"]').prop("selected", true);
                    $('#sl_visa').prop('disabled', 'disabled');
                    $('#sl_transport option[value="0"]').prop("selected", true);
                    $('#sl_transport').prop('disabled', 'disabled');
                    $('.pv_acco h3').text('£0.00');
                    $('.pv_transport h3').text('£0.00');
                } else {
                	var userId = $('#userId').val();
                	var locale = "<?php echo app()->getLocale(); ?>"

            	if(locale == 'en'){

            	 var logged_msz = 'You must be logged in to Book this course';
            	}else if(locale == 'ar'){

                    var logged_msz = 'يجب عليك تسجيل الدخول لحجز هذا المقرر';
            	}else if(locale == 'ru'){

                    var logged_msz = 'Вы должны войти в систему, чтобы забронировать этот курс';
            	}else if(locale == 'es'){

                    var logged_msz = 'Debes estar registrado para reservar este curso';
            	}else if(locale == 'se'){

                    var logged_msz = 'Du måste vara inloggad för att boka den här kursen';
            	}else if(locale == 'de'){

                    var logged_msz = 'Sie müssen angemeldet sein, um diesen Kurs zu buchen';
            	}else if(locale == 'fr'){

                    var logged_msz = 'Vous devez être connecté pour réserver ce cours';
            	}else if(locale == 'tr'){

                    var logged_msz = 'Bu kursa kaydolmak için oturum açmış olmalısınız';
            	}else if(locale == 'fa'){

                    var logged_msz = 'شما باید وارد این درس شوید';
            	}else if(locale == 'pr'){

                    var logged_msz = 'Você precisa fazer o login para reservar este curso';
            	}else if(locale == 'it'){

                    var logged_msz = "Devi effettuare l'accesso per prenotare questo corso";
            	}else if(locale == 'jp'){

                    var logged_msz = 'このコースを予約するにはログインしてください';
            	}
                    if (userId != '') {
                        $('#book_now_course').prop("disabled", false);
                        $('#book_now_course').addClass('allow');
                        var credit = jQuery("#credit_course").val();
                        if(credit > 0){
                             $('.UserCredits').show();
                        }
                    } else {
                        $('#showloginmsz').text(logged_msz);
                    }
                    if(result[0]!=0 && result[1]!=0){
                    //alert("both have values");
                    var pv_course = $('.pv_course h3').text('£' + result[1]);
                    var new_week_price = result[0];
                    var pv_discount_course = $('.pv_discount_course h3').text('£' + result[0]);
                    var decimal_saved = parseFloat(result[1]) - parseFloat(result[0]);
                    var saved         = parseFloat(Math.round(decimal_saved * 100) / 100).toFixed(2);
                    var pv_discount_save = $('.pv_discount_save h3').text('£' + saved);
                    $('.cus_discounted_price').show();
                    $('.cus_saved_price').show();
                    }else if(result[0]==0 && result[1]==0){
                    //alert("both have no values");
                    var pv_course = $('.pv_course h3').text('£' + result[2]);
                    var new_week_price = result[2];
                    }else if(result[0]==0 && result[1]!=0){
                    //alert("discount have values");
                    var pv_course = $('.pv_course h3').text('£' + result[1]);
                    var new_week_price = result[1];
                    }else{
                    //alert("deal have values");
                    var pv_course = $('.pv_course h3').text('£' + result[0]);
                    var new_week_price = result[0];
                    }
                    $('#sl_accomodation').prop('disabled', false);
                    $('#sl_insurance').prop('disabled', false);
                    $('#sl_visa').prop('disabled', false);
                    $('#sl_transport').prop('disabled', false);
                    var transport_fee      = $("#sl_transportprice").val();
                    var insurance_value    = $("#sl_insurance").val();
                    var visa_value         = $("#sl_visa").val();
                    var credit = $("#credit_course").val();
                    var creditoption = $("#creditoption").val();
                    var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);

                    $(".total_cp_price").text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
                    $(".total_course_price").val(getTotal);
                }
            }
        }
    });
function getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption){
	if (transport_fee == null || acco_price == 0.00 || insurance_value == 0.00 || visa_value == 0.00) {
                    	if(transport_fee == null) {var transport_fee = 0.00;}
                      if (creditoption == 0) {
                            var newtotal = parseFloat(registration_fee) + parseFloat(new_week_price) + parseFloat(acco_price) + parseFloat(transport_fee) + parseFloat(insurance_value) + parseFloat(visa_value);
                        } else {
                            var newtotal = parseFloat(registration_fee) + parseFloat(new_week_price) + parseFloat(acco_price) + parseFloat(transport_fee) + parseFloat(insurance_value) + parseFloat(visa_value) - parseFloat(credit);
                        }
                    }else {
                        if (creditoption == 0) {
                            var newtotal = parseFloat(registration_fee) + parseFloat(new_week_price) + parseFloat(acco_price) + parseFloat(transport_fee) + parseFloat(insurance_value) + parseFloat(visa_value);
                        } else {
                            var newtotal = parseFloat(registration_fee) + parseFloat(new_week_price) + parseFloat(acco_price) + parseFloat(transport_fee) + parseFloat(insurance_value) + parseFloat(visa_value) - parseFloat(credit);
                        }
                    }
                    return newtotal;
}
    $('body').on('click', '#credit_course', function() {
        var credit = $(this).val();
        var creditoption = $(this).prev().val();
        if (creditoption == 0) {
            $('#creditoption').val(1);
            var total = $('.total_course_price').val();
            var newtotal = parseFloat(total) - parseFloat(credit);
            $('.total_course_price').val(newtotal);
            $(".total_cp_price").text('£' + parseFloat(Math.round(newtotal * 100) / 100).toFixed(2));
        } else {
            $('#creditoption').val(0);
            var total = $('.total_course_price').val();
            var newtotal = parseFloat(total) + parseFloat(credit);
            $('.total_course_price').val(newtotal);
            $(".total_cp_price").text('£' + parseFloat(Math.round(newtotal * 100) / 100).toFixed(2));
        }
        //alert(newtotal);
        //$(".total_course_price").val(total);
    });
    $('body').on('change', '#sl_insurance', function() {
        var insurance_value = this.value;
        if(insurance_value != 0.00 && insurance_value != -1){
          var insurance_name  = $('#sl_insurance').find('option:selected').text();
          $('#insurance_name').val(insurance_name);
        }else{
          $('#insurance_name').val('');
		  insurance_value = "0.00";
        }
        var element = $(this).find('option:selected');
        var selected_ins_id = element.attr("data-insid");
        $('#selected_ins_id').val(selected_ins_id);
        var acco_price = $('#sl_accomodation').val();
        var price_per_week = $('#sl_price_per_week').val();
        var result = $(price_per_week.split('@'));
        var registration_fee = $("#registration_fee").val();
        var transport_fee = $("#sl_transportprice").val();
        //var insurance_value    = $("#sl_insurance").val();
        var visa_value         = $("#sl_visa").val();
        var credit = $("#credit_course").val();
        var creditoption = $("#creditoption").val();
        var new_week_price = getTheWeekPrice(result);
        var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);
        $('.pv_insurance h3').text('£' + insurance_value);
        $('.total_cp_price').text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
        $(".total_course_price").val(getTotal);
    });
    $('body').on('change', '#sl_visa', function() {
        var visa_value = this.value;
        if(visa_value != 0.00 && visa_value != -1){
          var visa_name  = $('#sl_visa').find('option:selected').text();
          $('#visa_name').val(visa_name);
        }else{
          $('#visa_name').val('');
		  visa_value = "0.00";
        }
        var element = $(this).find('option:selected');
        var selected_visa_id = element.attr("data-visaid");
        $('#selected_visa_id').val(selected_visa_id);
        var acco_price = $('#sl_accomodation').val();
        var price_per_week = $('#sl_price_per_week').val();
        var result = $(price_per_week.split('@'));
        var registration_fee = $("#registration_fee").val();
        var transport_fee = $("#sl_transportprice").val();
        var insurance_value    = $("#sl_insurance").val();
        var credit = $("#credit_course").val();
        var creditoption = $("#creditoption").val();
        var new_week_price = getTheWeekPrice(result);
        var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);
        $('.pv_visa h3').text('£' + visa_value);
        $('.total_cp_price').text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
        $(".total_course_price").val(getTotal);
    });
    $('body').on('change', '#sl_accomodation', function() {
        var acco_price = this.value;
        if(acco_price != 0.00 && acco_price != -1){
         var acctype_name = $('#sl_accomodation').find('option:selected').text();
         $('#acctype_name').val(acctype_name);
        }else{
         $('#acctype_name').val('');
		 acco_price = "0.00";
        }
        var element = $(this).find('option:selected');
        var selected_acc_id = element.attr("data-aid");
        $('#selected_acc_id').val(selected_acc_id);
        var price_per_week = $('#sl_price_per_week').val();
        var result = $(price_per_week.split('@'));
        var registration_fee = $("#registration_fee").val();
        var transport_fee = $("#sl_transportprice").val();
        var insurance_value    = $("#sl_insurance").val();
        var visa_value         = $("#sl_visa").val();
        var credit = $("#credit_course").val();
        var creditoption = $("#creditoption").val();
        var new_week_price = getTheWeekPrice(result);
        var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);
        $('.pv_acco h3').text('£' + acco_price);
        $('.total_cp_price').text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
        $(".total_course_price").val(getTotal);
    });
    function getTheWeekPrice(result){
    	if(result[0]!=0 && result[1]!=0){
                    //alert("both have values");
                    var new_week_price = result[0];
                    }else if(result[0]==0 && result[1]==0){
                    //alert("both have no values");
                    var new_week_price = result[2];
                    }else if(result[0]==0 && result[1]!=0){
                    //alert("discount have values");
                    var new_week_price = result[1];
                    }else{
                    //alert("deal have values");
                    var new_week_price = result[0];
                    }
               return new_week_price;
    }
    $('body').on('change', '#sl_accomodationtype', function() {
        var type_id = this.value;
        var accomodation_id = $('#sl_accomodation').val();
        $.ajax({
            url: "{{route('getaccomodationpriceajax')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "accomodation_id": accomodation_id,
                "type_id": type_id
            },
            success: function(response) {
                $('#cou_acco').val(response);
                $('.pv_acco h3').text('£' + response);
                var registration = $("#cou_reg_price").val();
                var cou_price = $("#cou_price").val();
                var cou_acco = $("#cou_acco").val();
                var total = parseFloat(registration) + parseFloat(cou_price) + parseFloat(cou_acco);
                $(".total_cp_price").text('£' + parseFloat(Math.round(total * 100) / 100).toFixed(2));
                $(".total_course_price").val(total);
            },
        });
    });
    $('body').on('change', '#sl_transportprice', function() {
        var transport_price    = this.value;
        if(transport_price != 0.00){
          var transport_price_name  = $('#sl_transportprice').find('option:selected').text();
          $('#transport_way').val(transport_price_name);
        }else{
          $('#transport_way').val('');
        }
        var registration_fee   = $("#registration_fee").val();
        var price_per_week     = $('#sl_price_per_week').val();
        var result             = $(price_per_week.split('@'));
        var acco_price         = $('#sl_accomodation').val();
        var transport_fee      = $("#sl_transportprice").val();
        var insurance_value    = $("#sl_insurance").val();
        var visa_value        = $("#sl_visa").val();
        var accomodation_value = $("#sl_accomodation").val();
        var credit             = $("#credit_course").val();
        var creditoption = $("#creditoption").val();
        var new_week_price = getTheWeekPrice(result);
        var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);
        $(".total_cp_price").text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
        $(".total_course_price").val(getTotal);
        var pv_transport = $('.pv_transport h3').text('£' + transport_price);
    });
    /* Get Hourse per week on Course page */
    $('body').on('change', '.hours_per_week', function() {
        var $this = $(this);
        var mainschool_ID = $("#mainschool_ID").val();
        var hours_per_week = this.value;
        $this.parents('.out_br.deal_box').find('.lesson .rgt-bor span').text(hours_per_week);
        $this.parents('.rat_form').find('.orange_font span').text('0.00');
        var cp_course_id = $(this).next(".cp_course_id").val();
        $.ajax({
            url: "{{route('getcoursepriceajax')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "hours_per_week": hours_per_week,
                "courseid": cp_course_id,
                "mainschool_ID": mainschool_ID
            },
            success: function(response) {
                var myObject = JSON.parse(response);
                $this.parents('.hours_per_week_main').prev().find('.price_per_week').html(myObject[1]);
                $this.parents('.hours_per_week_main').prev().find('.price_per_week_main').show();
            },
        });
    });
    /* Get price per week on Course page */
    $('body').on('change', '.price_per_week', function() {
        var $this = $(this);
        var cslug = $this.parents('.choose_sec').next().find('.cp_course_id').attr("data-slug");
        var maincourse_id = $this.parents('.choose_sec').next().find('.cp_course_id').attr('data-id');
        var hours_per_week = $this.parents('.choose_sec').next().find('.hours_per_week').val();
        var price_per_week = this.value;
        var result = $(price_per_week.split('@'));
        var new_week_price = getTheWeekPrice(result);
        $this.parents('.rat_form').find('.orange_font').html("Price: £<span>" + new_week_price + "</span>");
        /*var reservation_link = "<?php echo URL::to('coursedetail'); ?>/" + cslug + "/" + maincourse_id + "/" + hours_per_week + "/" + price_per_week;
        $this.parents('.rat_form').find('.res .reserv_link').attr("href", reservation_link);
        $this.parents('.rat_form').find('.orange_font').html("£<span>" + result[0] + "</span>");*/
    });
    $('#sl_transport').on('change', function() {
        var transport_id = this.value;
        if(transport_id != 0 ){
         var airport_name = $('#sl_transport').find('option:selected').text();
         $('#airport_name').val(airport_name);
         $('#transport_way').val('');
        }else{
         $('#airport_name').val('');
         $('#transport_way').val('');
        }
        var pv_transport = $('.pv_transport h3').text('£0.00');
        var registration_fee = $("#registration_fee").val();
        var price_per_week = $('#sl_price_per_week').val();
        var result = $(price_per_week.split('@'));
        var acco_price = $('#sl_accomodation').val();
        var transport_fee = 0.00;
        //var transport_fee      = $("#sl_transportprice").val();
        var insurance_value    = $("#sl_insurance").val();
        var visa_value        = $("#sl_visa").val();
        var credit             = $("#credit_course").val();
        var creditoption = $("#creditoption").val();
        var new_week_price = getTheWeekPrice(result);
        var getTotal    = getTheTotal(registration_fee,new_week_price,acco_price,transport_fee,insurance_value,visa_value,credit,creditoption);
        $(".total_cp_price").text('£' + parseFloat(Math.round(getTotal * 100) / 100).toFixed(2));
        $(".total_course_price").val(getTotal);
        $.ajax({
            url: "{{route('gettransportpriceajax')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "transport_id": transport_id
            },
            success: function(response) {
                if (response.trim() == '') {
                    $('#sl_transportprice').empty();
                    $('#sl_transportprice').hide();
                } else {
                    $('#sl_transportprice').show();
                    $('#sl_transportprice').html(response);
                }
            },
        });
    });
});
</script>
@php
	$countriesNames = array();
	if($school->history_country != 'no' && $school->history_nos != 'no'){
		$countriesNames = $school->history_country;
	}
	if($school->history_country != 'no' && $school->history_nos != 'no'){
		$studentsNumber = $school->history_nos;
		$totalStudents = array_sum($school->history_nos);
	}
	$pieChartData = array();
	for($count = 0 ; $count < count($countriesNames) ; $count++){
		$dat = array(
				'name' => $countriesNames[$count],
				'y'	=> (float)$studentsNumber[$count]
			);
		if($count == 0){
			$dat[] = array(
				'selected' => true,
			);
		}
		$pieChartData[] = $dat;
	}
@endphp
<script type="text/javascript">
	var history_country = JSON.parse('<?php if($school->history_country != 'no' && $school->history_nos != 'no'){ echo json_encode($school->history_country); }?>');
	var history_percent = <?php if($school->history_country != 'no' && $school->history_nos != 'no'){ echo json_encode($school->history_nos,JSON_NUMERIC_CHECK);} ?>;
	//var pieChartData = <?php echo json_encode($pieChartData) ?>;
	//console.log(pieChartData);
	Highcharts.chart('chart_stu', {
		chart: {
			height : 325,

			type: 'bar'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: history_country,
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' percentage'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			floating: true,
			borderWidth: 1,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'student-percentage',
			data: history_percent
		}]
	});
Highcharts.chart('student_chart_pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
		height : 150,
		width: 600,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Students Percent',
        colorByPoint: true,
		data: pieChartData,
    }]
});
	</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;"></script>
<script type="text/javascript">
function initialize() {
	var geocoder = new google.maps.Geocoder();
	var address = "<?php echo $school->address.",".$school->country.",".$school->state ?>";
	var lat;
	var lng;

geocoder.geocode( { 'address': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    var lat = results[0].geometry.location.lat();
    var lng = results[0].geometry.location.lng();
  }
   var latlng = new google.maps.LatLng(lat,lng);
    panorama = new google.maps.StreetViewPanorama(
            document.getElementById('mappano'),
            {
              position: {lat: lat, lng: lng},
              pov: {heading: 165, pitch: 0},
              zoom: 1
            });
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
    });
   // var address = $('#address').val();
   // var geocoder = new google.maps.Geocoder();
   //  panorama = new google.maps.StreetViewPanorama(
   //          document.getElementById('mappano'),
   //          {
   //            position: {lat: lat, lng: long},
   //            pov: {heading: 165, pitch: 0},
   //            zoom: 1
   //          });
   // var fenway = {lat: lat, lng: long};

   // var latlng = new google.maps.LatLng(lat,long);
   //  var map = new google.maps.Map(document.getElementById('map'), {
   //    center: latlng,
   //    zoom: 13
   //  });
   //  var marker = new google.maps.Marker({
   //    map: map,
   //    position: latlng,
   //    draggable: false,
   //    anchorPoint: new google.maps.Point(0, -29)
   // });
   //  var infowindow = new google.maps.InfoWindow();
   //  google.maps.event.addListener(marker, 'click', function() {
   //    var iwContent = '<div id="iw_container">' +
   //    '<div class="iw_title"><b>Location</b> : Noida</div></div>';
   //    // including content to the infowindow
   //    infowindow.setContent(iwContent);
   //    // opening the infowindow in the current map and at the current marker location
   //    infowindow.open(map, marker);
   //  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>

	$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var ratevalue = "";
    if (ratingValue > 1) {
        ratevalue = ratingValue;
    }
    else {
       ratevalue = ratingValue;
    }
    $(this).parent().next('.rateddata').val(ratevalue);

  });


});
</script>
    <script language="javascript">
        $(document).ready(function () {
			function EnableMonday(date) {

  var day = date.getDay();
 if (day == 1) {

 return [true] ;

 } else {

 return [false] ;
 }

}

 $(function() {
 $( "#txtdate" ).datepicker({
 minDate: 0,
beforeShowDay: EnableMonday
 });
 });
        });
    </script>
@endsection
