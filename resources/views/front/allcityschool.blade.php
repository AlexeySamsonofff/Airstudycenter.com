@extends('front.index1')
@section('title', 'All City School')
@section('content')
<!--Search Start-->
<div class="school_sec grey_bg_color">
<section class="courses_sec inner_school">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="cus_title">
						<h1>@lang('cityschool.all_cities')</h1>
						<ul>
							<li><a href="{{route('mainhome')}}">@lang('cityschool.home')</a></li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li><a href="">@lang('cityschool.all_cities')</a></li>
						</ul>
					</div> 
			</div>
		</div> 
		
	</div>
</section>
<!--Search End-->
<!--School Inner Start-->
<section class="school_sec">
        <div class="container">
			<div class="row">
                 @foreach($topcities as $topcity)
                 @if($topcity->schoolcount != 0)
                     
                    <div class="col-lg-3 col-md-6 inner_2 float-left ">
                     <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}"> 
                       <div class="box_outer">
                        @if($topcity->image != null) 
                        <img class="full_img"src="{{asset('small_images/'.$topcity->image)}}">
                        @else
                        <img class="full_img" style="height:135px;width:255px;"  src="{{asset('front/images/image-not-available.png')}}">
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
            </div>
              <!-- /.pagination -->  
        
</section> 
</div> 
<!--School Inner End--> 
@endsection