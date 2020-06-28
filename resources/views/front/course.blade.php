@extends('front.index1')
@section('title', 'All Course')
@section('content')

<!--Courses Start-->
<div class="grey_bg_color">
<section class="courses_sec">
	<div class="container"> 
		
		<div class="row" style="margin-top : 145px !important">
			<div class="col-md-12">
					<div class="cus_title">
						<h1>@lang('courses.courses')</h1>
						<ul>
							<li><a href="{{route('mainhome')}}">@lang('courses.home')</a></li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li><a href="{{route('allCourse')}}">@lang('courses.courses')</a></li>
						</ul>
					</div> 
			</div>
		</div>
		
			<div class="row search_course custom_search">
			<div class="col-md-12 col-sm-12 col-xs-12 result pos_rel">
				<input type="text" class="results" placeholder="@lang('courses.showing') {{count($courses)}} @lang('courses.results')" readonly/>
				<form  method="post" action="{{route('allSearchCourses')}}">
			    {{ csrf_field() }}
					<div class="search_filter">
						<input class="r" type="text" name="search_course" id="autosearchcourse" placeholder="@lang('courses.search') @lang('courses.courses')"/>
						<button type="submit" class="r" style="cursor: pointer;" ><i class="fa fa-search"></i>
							<!-- <img class="search_icon" src="{{asset('front/images/search_icon.png')}}" alt=""/> -->
						</button>
					</div>
					</form>
				</div>
			</div>
		
	</div>
</section>
<!--Courses End-->
<!--Courses Inner Start-->
<section class="inner_courses">
	<div class="container">
		<div class="row">
			@foreach($courses as $course)
					<div class="col-lg-12 col-md-12 course_inn  float-left ">
						<table class="Sc_CourseTable">
					  <tr>
					    <td style="width:40%"><h5>
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
                            @endif 
                            </h5> </td>
					    <td style="width:20%"><a href="{{route('singleCourse',['id'=>$course->id,'slug'=>$course->slug])}}"><div class="level_inner AirallCourse">
								<div class="school_comment AirSmallStar">
								   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
						<?php 
                           $alltotal  = $course->review_rate+$course->review_rate1+$course->review_rate2+$course->review_rate3;
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
							</div></a></td>
					    <td style="width:10%"><span>£{{$course->price}}</span></td>
					    <td style="width:15%"><span>{{$course->hours_per_week}} @lang('courses.hours_week')</span></td>
					    <td style="width:15%"><a class="Sc_moreInfo" href="{{route('singleCourse',['id'=>$course->id,'slug'=>$course->slug])}}">More Info</a></td>
					  </tr>
                      </table>
					</div>	
				@endforeach
		</div> 
		<div class="pager mainepager">
			    {{$courses->links()}}
			</div>
	</div>

	
</section>
</div> 
@endsection