@extends( 'front.index1' )
@section( 'title', 'All School' )
@section( 'content' )
	<section class="courses_sec">
		<div class="container">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
			</div>
		@endif
			<div class="row">
				<div class="col-md-12" style="margin-top : 145px !important">
					<div class="cus_title">
						<h1 class="distance">@if ( Config::get('app.locale') == 'en')
			                 {{$course->schoolName}}
			                @elseif ( Config::get('app.locale') == 'tr' )
			               {{$course->schoolName_tr}}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {{$course->schoolName_ar}}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {{$course->schoolName_ru}}
			                @elseif ( Config::get('app.locale') == 'de' )
			               {{$course->schoolName_de}}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {{$course->schoolName_it}}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {{$course->schoolName_fr}}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {{$course->schoolName_es}}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {{$course->schoolName_se}}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {{$course->schoolName_jp}}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                 {{$course->schoolName_fa}}          
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {{$course->schoolName_pr}}       
                            @endif </h1>
						<ul>
							<li><a href="{{route('mainhome')}}">@lang('courses.home')</a>
							</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i>
							</li>
							<li><a href="{{route('allCourse')}}">@lang('courses.courses')</a>
							</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i>
							</li>
							<li>@if ( Config::get('app.locale') == 'en')
			                 {{$course->name}}
			                @elseif ( Config::get('app.locale') == 'tr' )
			                {{$course->name_tr}}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {{$course->name_ar}}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {{$course->name_ru}}
			                @elseif ( Config::get('app.locale') == 'de' )
			                {{$course->name_de}}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {{$course->name_it}}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {{$course->name_fr}}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {{$course->name_es}}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {{$course->name_se}}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {{$course->name_jp}}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                  {{$course->name_fa}}          
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {{$course->name_pr}}       
                            @endif </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--Courses End-->
<!-- Course-Detail Start -->
<section class="courses_det">
	<div class="container">
		<div class="row">
			<!-- left section starts -->
			<div class="col-md-8">
				<div class="course_inner">
					<div class="text-left english ">
						<h2><img src="{{asset('front/images/ec-icon.png')}}">
							@if ( Config::get('app.locale') == 'en')
			                 {{$course->name}}
			                @elseif ( Config::get('app.locale') == 'tr' )
			                {{$course->name_tr}}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {{$course->name_ar}}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {{$course->name_ru}}
			                @elseif ( Config::get('app.locale') == 'de' )
			                {{$course->name_de}}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {{$course->name_it}}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {{$course->name_fr}}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {{$course->name_es}}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {{$course->name_se}}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {{$course->name_jp}}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                  {{$course->name_fa}}          
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {{$course->name_pr}}       
                            @endif </h2>
					</div>
					<div class="row detail_box pl_0 ">
						<div class="col-md-4 wd33">
							<h5><i class="fa fa-map-marker"></i>{{$course->country}}, {{$course->city}}</h5>
						</div>
						<div class="col-md-3 wd33">
							<p><i class="fa fa-user-o" aria-hidden="true"></i>{{$course->agelimit}} @lang('courses.years')+</p>
						</div>
						<div class="col-md-5 wd33 font_13">
						<?php 
                             $alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3;
					         $getaverage = $alltotal/4;
					         if(is_float($getaverage)){
					          $starNumber = number_format((float)$getaverage, 1, '.', ''); 
					        }else{
                               $starNumber = $getaverage;
					        }
                  		?><div class="school_comment">
							   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
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


							<!-- <div class="detail-banner-rating"> -->

						</div>
					</div>
				</div>
				<div class="course_img">
					<img class="full_img" src="{{asset('normal_images/'.$course->image)}}" alt=""/>
					@if(Auth::check())
					  @if($count_favcourse == 0)
                      <div class="detail-banner-btn heart">
		                <input type="hidden" class="heart_input" value="0">
		                <input type="hidden" class="heart_courseid" value="{{$course->id}}">
 		                <i class="fa fa-heart-o heart_submit"></i> <span data-toggle="@lang('courses.love_it')">@lang('courses.give_heart')</span>
                      </div>
						@else
						 <div class="detail-banner-btn heart marked">
		                <input type="hidden" class="heart_input" value="1">
		                <input type="hidden" class="heart_courseid" value="{{$course->id}}">
 		                <i class="fa fa-heart-o heart_submit"></i> <span data-toggle="@lang('courses.give_heart')">@lang('courses.love_it')</span>
                      </div>
					  @endif
					  @else
					  <div class="detail-banner-btn heart heart_login">
		                <input type="hidden" class="heart_input" value="0">
		                <input type="hidden" class="heart_courseid" value="{{$course->id}}">
 		                <i class="fa fa-heart-o heart_submit"></i> <span data-toggle="@lang('courses.love_it')">@lang('courses.give_heart')</span>
                      </div>
				      @endif
				</div>
				      
				
				<div class="course_inner mt-4">
					<div class="text-left english learn course_detail_txt">
						<h2>@lang('courses.wt_learn')</h2> @if ( Config::get('app.locale') == 'en')
			                 {!! $course->description !!}
			                @elseif ( Config::get('app.locale') == 'tr' )
			               {!! $course->description_tr !!}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {!! $course->description_ar !!}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {!! $course->description_ru !!}
			                @elseif ( Config::get('app.locale') == 'de' )
			                {!!$course->description_de!!}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {!! $course->description_it !!}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {!! $course->description_fr !!}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {!! $course->description_es !!}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {!! $course->description_se !!}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {!! $course->description_jp !!}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                 {!! $course->description_fa !!}        
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {!! $course->description_pr !!}     
                            @endif 
						</ul>
					</div>
				</div>
			
<div class="course_inner mt-4">
	<div class="school_comment acc_detail">
		<!-- OverAll Comment Starts -->
        <div class="row">
   <div class="col-md-12">
      <h2 class="AirSheading"><a name="evaluation" id="evaluation"></a><span class="titleSep">@lang('courses.reviews')</span></h2>
      <div id="AirMainCommentDiv">
      	     
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
               <div class="Aircolleft">@lang('courses.course_quality')</div>
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
               <div class="Aircolleft">@lang('courses.tutor') </div>
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
         </div>
         <div class="MainB">
            <div class="MultipleChoiceInner">
               <div class="Aircolleft">@lang('courses.budget')</div>
               <div class="AircolRight">
                  <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                     <div class="stars"> 
                        <?php
					        if(is_float($review_rate2)){
					          $starNumber = number_format((float)$review_rate2, 1, '.', ''); 
					        }else{
                               $starNumber = $review_rate2;
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
               <div class="Aircolleft">@lang('courses.other')</div>
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
         </div>
      </div>
   </div>
</div>
<!-- OverAll Comment Ends -->
<!-- User  Comment Strats -->
@if(count($coursereviews)>0)
<div class="col-md-12 city_head">
      <h2>{{count($coursereviews)}} @lang('courses.comments')</h2>
</div>
@foreach($coursereviews as $review)
<div class="row Acco_UserComments">

   <div class="col-md-12 review_views">
      <div class="d-inline float-left">
        <div class="viwers_img viewer_profile_image">
        @php 
      	$userimage = App\User::where('id',$review->user_id)->first();
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
                  <span>@lang('courses.course_quality')</span>
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
                  <span>@lang('courses.tutor')</span>
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
                  <span>@lang('courses.budget')</span>
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
                  <span>@lang('courses.other')</span>
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
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach @else
<div class="row review">
  <div class="col-md-3 col-sm-3 col-xs-3">
		<h5>0 @lang('courses.comment')</h5>
  </div>
</div>
@endif	
<!-- User  Comment Ends -->



					@if(Auth::check())
							<div class="leave_comm">
								<h2>@lang('courses.leave_comment')</h2>
							</div>
						<form method="post" action="{{ route('storeCourseReview') }}">
							{{ csrf_field()}}
                        <div class="row">
                        	<div class="col-md-4">
			                   	<div class='rating-stars'>
			                   		<span>@lang('courses.course_quality')</span>
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
			                   		<span>@lang('courses.tutor')</span>
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
			                   		<span>@lang('courses.budget')</span>
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
			                   		<span>@lang('courses.other')</span>
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
                        </div>
							<input type="hidden" name="school_id" class="form-control" value="{{$course->schoolId}}">
							<input type="hidden" name="user_id" class="form-control" @if(Auth::check()) value="{{Auth::user()->id}}" @endif>
							<input type="hidden" name="course_id" class="form-control" value="{{$course->courseId}}" required>
					<div class="row review_form">
						<div class="col-md-6">
							<input type="text" name="name" placeholder="Name" value="{{Auth::user()->name}}" required readonly="">
						</div>
						<div class="col-md-6 mail">
							<input type="text" name="email" placeholder="Your Email" value="{{Auth::user()->email}}" required="" readonly="">
						</div>
					</div>
					<div class="row review_form">
						<div class="col-md-12">
							<textarea class="form-control rounded-0" name="comment" id="exampleFormControlTextarea2" rows="3" placeholder="Your Comment" required></textarea>
						<!--  <input type="text" name="comment" placeholder="Your Comment" required> -->
						</div>
					</div>
					<div class="post_button subscribe_inner ">
						<input type="submit" value="Post Comment" style="cursor:pointer;">
					</div>
					</form>
					@else
					<div class="row client">

						<span>@lang('courses.logged_msz')</span>

					</div>
					@endif
				</div>
			</div>
</div>
			<!-- left section fisnih -->
			<!-- right section starts -->
			<div class="col-md-4">
				<div class="w-100 float-left course_inner choose_sec">
					<form method="post" action="{{route('schooldetail',['id'=>$course->schoolId,'slug'=>$course->schoolSlug])}}">
						{{ csrf_field()}}
						<!--<h2>School Name</h2>-->
						<input type="hidden" name="single_course_id" class="form-control" value="{{$course->course_id}}">
						<div class="form-group select_dropdown">
							<h5>@if ( Config::get('app.locale') == 'en')
			                 {{$course->schoolName}}
			                @elseif ( Config::get('app.locale') == 'tr' )
			               {{$course->schoolName_tr}}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {{$course->schoolName_ar}}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {{$course->schoolName_ru}}
			                @elseif ( Config::get('app.locale') == 'de' )
			               {{$course->schoolName_de}}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {{$course->schoolName_it}}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {{$course->schoolName_fr}}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {{$course->schoolName_es}}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {{$course->schoolName_se}}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {{$course->schoolName_jp}}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                 {{$course->schoolName_fa}}          
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {{$course->schoolName_pr}}       
                            @endif </h5>
						</div>
						<div class="course_border"></div>
						<!--  <h2 class="price">Course Price</h2> -->
						<!--  <p>Start date<span>Time</span></p> -->
						<!-- <div class="row">
					 <div class="col-md-7 date_sec">
						 <div class="input-field date">
							<input id="Bdate" type="date" class="datepicker formpage rtxt">
						 </div>
					 </div>
					 <div class="col-md-5 time_sec">
						 <div class="input-field time">
							<input type="time" placeholder="14">
						 </div>
					 </div>
				 </div> -->
						<!-- <div class="row fee cus_fee">
					<div class="col-md-8"><h5>Course Fee</h5></div>
					<div class="col-md-4 padr_10 price_value"><h3>£59.98</h3></div>
				 </div> -->
						<div class="row fee cus_fee">
							<div class="col-md-8">
								<h5>@lang('courses.registration_fee')</h5>
							</div>
							<div class="col-md-4 padr_10 price_value">
								<h3>£{{$course->registration_fee}}.00</h3>
							</div>
						</div>
						<div class="order_border"></div>
						<!--   <div class="row total_rate">
					<div class="col-md-8"><h5>Total</h5></div>
					<div class="col-md-4"><h3>£64.98</h3></div>
				 </div> -->
						<div class="row">
							<div class="col-md-12 text-center take_course place_order">
								<input type="submit" id="take_this_course" value="@lang('courses.ttc')" style="cursor:pointer;">
							</div>
						</div>
					</form>
				</div>
				
					
				
				@if(count($schools)>0)
				<div class="w-100 float-left course_inner recommend_sec h450">
				<div class="learn recommend">
					<h2>@lang('courses.recommended_school')</h2>
				</div>
				<div class="owl-carousel owl-theme recc_carousel">
					@foreach($schools as $school)
					<div class="col-md-12">
						<div class="item deal_inner_list">
							@if($school->image != null)
							<img class="full" src="{{asset('thumbnail_images/'.$school->image)}}"> @else
							<img class="full_img" src="{{asset('front/images/image-not-available.png')}}" style="height:136px;"> @endif
							<div class="deal_box dist ">
								<h3><a href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}">
								 @if ( Config::get('app.locale') == 'en')
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
                            @endif </a></h3>
								<div class="review_box ">
									<div class="loc_left eng">
										<h5><i class="fa fa-map-marker"></i>{{$school->country}}, {{$school->city}}</h5>
									</div>
									<div class="review_rgt eng">
										<div class="school_comment AirSmallStar">
									<?php 
			                           $alltotal  = $school->review_rate_school+$school->review_rate_school1+$school->review_rate_school2+$school->review_rate_school3+$school->review_rate_school4+$school->review_rate_school5;
								         $getaverage = $alltotal/6;
								         if(is_float($getaverage)){
								          $starNumber = number_format((float)$getaverage, 1, '.', ''); 
								        }else{
			                               $starNumber = $getaverage;
								        }
                  		            ?>
										   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
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
								<div class="box-bottom del_border txt-lft">
									<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left age eng">
										<p>{{$school->agelimit}} @lang('courses.years') +</p>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 wd50 eng float-right">
										<p>{{$school->courseCount}} @lang('courses.course')</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
					</div>
				</div>
				@endif
			</div>
			
</section>

<!-- Course-Detail End -->
<!-- Other-Course Start -->
<section class="other_sec">

	@if(count($othercourses)>0)
	<div class="container">
		<div class="row other_course">
			<div class="col-md-12 text-left learn">
				<h2>@lang('courses.other_course')</h2>
			</div>
		</div>
		<div class="row allOtherCourses">
			<div class="owl-carousel owl-theme singleschool_carousel inter_head">
			@foreach($othercourses as $othercourse)
			<div class="inner_language float-left ">
				<div class="box_outer">
					<img class="full_img" src="{{asset('medium_images/'.$othercourse->image)}}">
					<div class="box-1 m-b-40 p20 p-10">
						<h3><a href="{{route('singleCourse',['id'=>$othercourse->id,'slug'=>$othercourse->slug])}}">@if ( Config::get('app.locale') == 'en')
			                {{$othercourse->courseName}}
			                @elseif ( Config::get('app.locale') == 'tr' )
			               {{$othercourse->courseName_tr}}
			                @elseif ( Config::get('app.locale') == 'ar' )
			                {{$othercourse->courseName_ar}}
			                @elseif ( Config::get('app.locale') == 'ru' )
			                {{$othercourse->courseName_ru}}
			                @elseif ( Config::get('app.locale') == 'de' )
			               {{$othercourse->courseName_de}}
			                @elseif ( Config::get('app.locale') == 'it' )
			                 {{$othercourse->courseName_it}}
			                @elseif ( Config::get('app.locale') == 'fr' )
			                {{$othercourse->courseName_fr}}
			                @elseif ( Config::get('app.locale') == 'es' )
			                 {{$othercourse->courseName_es}}
			                @elseif ( Config::get('app.locale') == 'se' )
			                 {{$othercourse->courseName_se}}
			                @elseif ( Config::get('app.locale') == 'jp' )
			                 {{$othercourse->courseName_jp}}
			                @elseif ( Config::get('app.locale') == 'fa' ) 
			                 {{$othercourse->courseName_fa}}          
			                @elseif ( Config::get('app.locale') == 'pr' )
			                 {{$othercourse->courseName_pr}}       
                            @endif </a></h3>
						<div class="marker">
							<div class="school_comment AirSmallStar">
						<div id="AirStudyOverallComments" class="AirStudyMultipleComment">
						<?php 
                           $alltotal  = $othercourse->review_rate+$othercourse->review_rate1+$othercourse->review_rate2+$othercourse->review_rate3;
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
							<div class="box_language p20">
								<p><span class="orange">£{{$othercourse->ppw1}}</span><span style="color: #f9a46f!important;
    margin-left: 11px;">{{$othercourse->hours_per_week}} @lang('courses.hours_week')</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		</div>
	</div>
	@endif
</section>
<script>
	$( document ).ready( function () {

	$('.detail-banner-btn').click(function() {
	$(this).toggleClass('marked');
	var courseid = $('.heart_courseid').val();
	var data_toggle = $(this).find('span').attr('data-toggle');
    var data_text   = $(this).find('span').text();
      $('.marked .heart_input').val(1);
      var heart_input = $('.marked .heart_input').val();
       $.ajax
        ({
            url: "{{route('favcourse')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","heart_input":heart_input,"courseid":courseid,'data_toggle':data_toggle,'data_text':data_text},
            success: function (response) 
            { 
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
		/* 1. Visualizing things on Hover - See next part for action on click */
		$( '#stars li' ).on( 'mouseover', function () {
			var onStar = parseInt( $( this ).data( 'value' ), 10 ); // The star currently mouse on

			// Now highlight all the stars that's not after the current hovered star
			$( this ).parent().children( 'li.star' ).each( function ( e ) {
				if ( e < onStar ) {
					$( this ).addClass( 'hover' );
				} else {
					$( this ).removeClass( 'hover' );
				}
			} );

		} ).on( 'mouseout', function () {
			$( this ).parent().children( 'li.star' ).each( function ( e ) {
				$( this ).removeClass( 'hover' );
			} );
		} );


		/* 2. Action to perform on click */
		$( '#stars li' ).on( 'click', function () {
			var onStar = parseInt( $( this ).data( 'value' ), 10 ); // The star currently selected
			var stars = $( this ).parent().children( 'li.star' );

			for ( i = 0; i < stars.length; i++ ) {
				$( stars[ i ] ).removeClass( 'selected' );
			}

			for ( i = 0; i < onStar; i++ ) {
				$( stars[ i ] ).addClass( 'selected' );
			}

			// JUST RESPONSE (Not needed)
			var ratingValue = parseInt( $( '#stars li.selected' ).last().data( 'value' ), 10 );
			var ratevalue = "";
			if ( ratingValue > 1 ) {
				ratevalue = ratingValue;
			} else {
				ratevalue = ratingValue;
			}
			$(this).parent().next('.rateddata').val(ratevalue);

		} );


	} );
</script>
@endsection