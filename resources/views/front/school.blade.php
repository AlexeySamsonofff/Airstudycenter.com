@extends('front.index1')
@section('title', 'All School')
@section('content')
<!--Search Start-->
<div class="grey_bg_color">
<section class="courses_sec">
	<div class="container"> 
		
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
					<div class="cus_title">
						<h1>@lang('school.schools')</h1>
						<ul>
							<li><a href="{{route('mainhome')}}">@lang('school.home')</a></li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li><a href="{{route('mainAllSchool')}}">@lang('school.schools')</a></li>
						</ul>
					</div> 
			</div>
		</div> 
		<form  method="post" action="{{route('allsearchschools')}}">
			 {{ csrf_field() }}
			<div class="row search_school custom_search">
				<div class="col-md-12 col-sm-12 col-xs-12 result pos_rel">
					<input type="text"  class="results" placeholder="@lang('courses.showing') {{count($schools) }} @lang('courses.results')"/>
					<div class="search_filter">
						<input class="search_box" id="autosearchschool" type="text" name="search_school" placeholder="@lang('school.search_school').."/>
						<button type="submit" style="cursor: pointer;">
						 <img class="search_icon" src="{{asset('front/images/search_icon.png')}}" alt=""/>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!--Search End-->
<!--School Inner Start-->
<section class="inner_courses">
        <div class="container">
			<div class="row">
                @foreach($schools as $school)
				<div class="col-lg-4 col-md-4 course_inn float-left ">
					<a href="{{route('schooldetail',['slug'=>$school->slug,'id'=>$school->id])}}"> 
					<div class="box_outer">
						 @if($school->image != null) 
                        <img class="full_img"src="{{asset('medium_images/'.$school->image)}}">
                        @else
                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}" style="height:185px;width:350px;">
                        @endif
                        <div class="box-1 m-b-40 box_course">
                        	<h3>
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
                   @endif
                   </h3>


						<div class="marker">
                        <h5><i class="fa fa-map-marker"></i>{{$school->city}}, {{$school->country}}</h5></div>
                        <div class="level_inner AirallSchool">
                         <div class="school_comment">
                        <?php 
                           $alltotal  = $school->review_rate+$school->review_rate1+$school->review_rate2+$school->review_rate3+$school->review_rate4+$school->review_rate5;
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
                       
						<div class="clearfix"></div>
						<div class="box-bottom box_language">
							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-left grey-border age">
								<p>{{$school->agelimit}} @lang('school.years') +</p>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 wd50 float-right">
								<p>{{$school->courseCount}} @lang('school.course')</p>
							</div>
						</div>
						
						</div>
					</div>
					</a>
                </div>
                @endforeach

            </div>

               <div class="pager mainepager">
    {{$schools->links()}}
</div><!-- /.pagination -->  
        
</section> 
</div> 
<!--School Inner End--> 
@endsection