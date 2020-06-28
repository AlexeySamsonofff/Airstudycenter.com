@extends('front.index1')
@section('title', 'All City School')
@section('content')
<!--Courses Start-->
<section class="courses_sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cus_title">
					<h1 class="distance mt_0">{{$city_code}} @lang('cityschool.london_high_school') </h1>
					<ul>
						<li> @lang('cityschool.home') </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li> @lang('cityschool.city') </li>
					</ul>
				</div> 
			</div>
		</div>	
	</div>
</section>
<!--Courses End-->
<section class="school_details">
<div class="container">
	@foreach($schools as $school)
	<div class="single_school_detail">	
		<div class="row">	
			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
				<div class="school_img w-100">	
					@if($school->image != null) 
                        <a href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}"><img class="img-fluid" src="{{asset('thumbnail_images/'.$school->image)}}"></a>
                        @else
                        <img class="img-flui"  src="{{asset('front/images/image-not-available.png')}}">
                        @endif
				</div>
			</div>
			<div class="col-sm-12 col-md-7 col-lg-7 col-xl-8">
				<div class="school_dtl_body">
				  	<a href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}"><h2>{{$school->name}}</h2></a>
				  	<div>
				  		<ul> 
				  			<li> <i class="fa fa-map-marker-alt" style="color: #8bca48"></i>{{$school->city}}, {{$school->country}}</li>
				  			<li> <i class="fa fa-user" style="color: #8bca48"></i> {{$school->agelimit}} @lang('cityschool.years')+ </li>
				  			<li>
                             <div class="school_comment AirallCityschool">
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
				  			</li>
				  		</ul>
				  	</div>
				  	<div class="school_discription">
				  		@php $small = substr($school->description, 0, 350); 
				  		$lang = Config::get('app.locale');
				  		 @endphp
				  		{!! $small  !!} ...
				  	</div>
				</div>
			</div>
			<div class="col-12 mt-5 school_table">
				<div class="table-responsive">
				  <table class="table table-hover">
				    <thead>
				      <tr>
				        <th>@lang('cityschool.course_name')</th>
				        <th>@lang('cityschool.length_of_course')</th>
				        <th>@lang('cityschool.ppw')</th>
				        <th>@lang('cityschool.Book')</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach($school->coursesdata as $data)
				    	@if(empty(!$data->ppw1))
				      <tr>
				        <td>@if($lang == 'en'){{$data->name}}@elseif($lang == 'ar'){{$data->name_ar}}@elseif($lang == 'ru'){{$data->name_ru}}@elseif($lang == 'de'){{$data->name_de}}@elseif($lang == 'it'){{$data->name_it}}@elseif($lang == 'fr'){{$data->name_fr}}@elseif($lang == 'tr'){{$data->name_tr}}@elseif($lang == 'es'){{$data->name_es}}@elseif($lang == 'se'){{$data->name_se}}@elseif($lang == 'jp'){{$data->name_jp}}@elseif($lang == 'fa'){{$data->name_fa}}@elseif($lang == 'pr'){{$data->name_pr}}@endif</td>
				        <td> {{$data->hours_per_week}} @lang('cityschool.hpw')</td>
				        <td> £{{$data->ppw1}} </td>
				        <td><a class="book_now" href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}">@lang('cityschool.book')</a></td>
				      </tr>
				      @endif
				        @endforeach
				      </tbody>
				  </table>
				</div>
			</div>
		</div>		
	</div> <!--Single School Detail End -->
	@endforeach
	<div class="pager mainepager">
    {{$schools->links()}}
</div><!-- /.pagination --> 
</div> 
</section>
@endsection