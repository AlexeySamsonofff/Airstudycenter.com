@extends('front.index1')
@section('title', 'User Profile')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<div style="background-color: #373f50; color:white;">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h2 style="font-weight: bold;padding-top: 30px">Wishlist</h2>
	                </div>
	            </div>
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h6 style="font-weight: bold;padding: 30px 0px 20px 455px"></h6>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="row">
		@include('front.myaccount_leftside')
		<div class="col-md-1"></div>
		<div class="col-md-7" style="margin-top: 50px; margin-bottom: 100px;">
			<div class="tabs coursesa" style="margin-bottom:1em">
				<div class="d-block mb-4">
					<div class="row m-0">
		                <div class="col-md-6 col-12 pl-0 text-center">
		                    <nav role='navigation' class="tabse p-0 mb-0 transformer-tabs bg-transparent sticky-accordian-top">
		                        <ul class="p-0 m-0 border-0 normal-tabs d-inline-block shadow rounded bg-white">
		                            <li class="p-0 m-0"><a href="#" class="active">Courses</a></li>
		                            <li class="p-0 m-0"><a href="{{App::make('url')->to('/wishlistacc')}}">Accommodations</a></li>
		                        </ul>
		                    </nav>
		                </div>
		            </div>
		        </div>
		        <div id="tab-1" class="tab active">
                	<div class="row m- product pt-4">
			            @foreach($topdeals as $topdeal)
			            {{-- @php print_r($topdeal->toArray()); @endphp --}}
			            @if($topdeal->status == 1)
			            @php
			            $alltotal = $topdeal->review_rate+$topdeal->review_rate1+$topdeal->review_rate2+$topdeal->review_rate3+$topdeal->review_rate4;
			            $getaverage = $alltotal/5;
			            // echo $getaverage;
			            @endphp
			            <div class="col-lg-6 col-sm-6 mt-4 mb-4">
			                <div class="card w-77 productHeight m-auto bg-white">
			                    <div class="imgBlock position-relative">
			                        @if(Auth::check())
			                        <a onclick="like({{$topdeal->schoolId}})"><div class="heart" style="background-color: #D8D8D8; width: 40px; height: 40px; margin-right: 15px; margin-top: 15px;line-height: 40px !important;"><i id="school{{$topdeal->schoolId}}" class="{{$topdeal->favCss}} fa-heart"></i></div></a>
			                        @else
			                        <div class="heart dnt-hover-heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
			                        @endif
			                        <a href="{{route('schooldetail',['id'=>$topdeal->schoolId,'slug'=>$topdeal->schoolSlug])}}" class="text-dark">
			                        {{-- <a href="{{route('singleCourse',['id'=>$topdeal->pricecourseid,'slug'=>$topdeal->slug])}}" class="text-dark"> --}}
			                        @if($topdeal->image == "")
			                        <img src="{{asset('front/dpassets/img/productIMG.png')}}" class="w-100" alt="{{ $topdeal->name }}" >
			                        @else
			                        <img src="{{asset('thumbnail_images/'.$topdeal->image)}}" class="w-100" alt="{{ $topdeal->name }}" style="object-fit: scale-down !important">
			                        @endif
			                        </a>
			                        <h6 class="font-weight-bold offHeading rounded-pill pl-2 -md  text-white bg-primary">{{$topdeal->deal}}% OFF</h6>
			                    </div>
			                        <p class="text-muted mb-0 pl-2 pr-2 pt-2 small text-capitalize font-bold scholName text-truncate">{{$topdeal->schoolName}}</p>
			                    <div class="headingHeight blogDetails  pl-2 pr-2 pb-2 ">
			                        <h6 class="font-weight-bold mt-1">
			                            {{getLocalizedString($topdeal, 'name')}} {{ $topdeal->hpw }}/h
			                        </h6>
			                        <p class="text-muted mb-2 small"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> {{$topdeal->country}}, {{$topdeal->city}}</p>
			                        <div class="stars">
			                            @php $courseReview = getOverallReviewMean($getaverage); @endphp
			                            @if($courseReview != 0)
			                            @for($i = 1 ; $i <= $courseReview[0] ; $i++) <i class="fas fa-star"></i>
			                                @endfor
			                                @if($courseReview[1] > 0)
			                                <i class="fas fa-star-half-alt"></i>
			                                @endif
			                                @if($courseReview[3] > 0)
			                                @for($j = 0 ; $j < $courseReview[3] ; $j++) <i class="far fa-star"></i>
			                                    @endfor
			                                    @endif
			                                    @else
			                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
			                                        @endfor
			                                        @endif
			                                        <span class="bg-success pl-2 pr-2 ml-3 text-white rounded-pill small d-inline-block text-center pt-0">{{ $getaverage }}</span>
			                        </div>
			                    </div>
			                    <div class=" p-2 row m-0">
			                        <div class="col-6 p-0">
			                            <small class="text-muted"><del>£{{$topdeal->pricead}}</del></small>
			                            <p class="font-weight-bold fntb mb-0">£{{$topdeal->dealprice}} <small class="text-muted">p/w</small></p>
			                        </div>
			                        <div class="col-6 p-0">
			                            <small class="text-muted">Age</small>
			                            <p class="font-weight-bold fntb mb-0">{{$topdeal->agelimit}} @lang('front.years') +</p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            @endif
			            @endforeach
			        </div>
			        <div class="row m-0">
                    	<div class="col-lg-12">
                        	<nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
			                    {{ $topdeals->links() }}
			                </nav>
			            </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
	</div>
</div>
@endsection