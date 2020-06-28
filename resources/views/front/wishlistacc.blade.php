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
		                            <li class="p-0 m-0"><a href="{{App::make('url')->to('/wishlistcourse')}}" >Courses</a></li>
		                            <li class="p-0 m-0"><a href="#" class="active">Accommodations</a></li>
		                        </ul>
		                    </nav>
		                </div>
		            </div>
		        </div>
            	<div id="tab-3" class="tab active">
                    <div class="row m-0 cards-host" id="all_accommodations_container">
                        @foreach($accommodations as $accommodation)
                        {{-- @php print_r($accommodation); die; @endphp --}}
                        <div class="col-lg-6 col-sm-6 mt-4 mb-4 pl-0">
                            <div class="card productHeight m-auto bg-white">
                                <div class="imgBlock position-relative mb-4">
                                    @if(Auth::check())
                                    <a href="#" onclick="favorite({{$accommodation->id}})"><div class="heart" style="background-color: #D8D8D8; width: 40px; height: 40px; margin-right: 15px; margin-top: 15px;line-height: 40px !important;"><i id="acc{{$accommodation->id}}" class="{{$accommodation->favCss}} fa-heart" aria-hidden="true" style="padding-top: 4px"></i></div></a>
                                    @else
                                    <div class="heart dnt-hover-heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    @endif

                                    <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark">
                                    @if($accommodation->image != null)
                                        <img src="{{asset('thumbnail_images/'.$accommodation->image)}}" class="w-100" alt="General English – Elementary" >
                                    @else
                                        <img src="{{asset('front/images/image-not-available.png')}}" class="w-100" alt="General English – Elementary">
                                    @endif
                                    </a>
                                    <h6 class="font-weight-bold offHeading rounded pl-2 text-white bg-primary">
                                        @if($accommodation->roomtype == 'shared')
                                        @lang('accommodation.shared')
                                        @else
                                        @lang('accommodation.independent')
                                        @endif
                                    </h6>
                                    <img src="{{asset('/normal_images/'.$accommodation->owner_image)}}" alt="" class="rounded-circle crilcle-img-absolute" style="object-fit: scale-down !important">
                                    
                                </div>
                                <div class="headingHeight blogDetails p-2">
                                    <h6 class=" mt-1" style="font-weight:bold;">
                                        {{$accommodation->name}}
                                    </h6>
                                    <p class="text-muted mb-2 small"><i class="far fa-map-marker-alt" aria-hidden="true"></i> {{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</p>
                                    <div class="stars">
                                        @php
                                        $alltotal = $accommodation->review_rate_fcourse + $accommodation->review_rate_fcourse1 + $accommodation->review_rate_fcourse2 + $accommodation->review_rate_fcourse3;
                                        $getaverage = $alltotal/4;
                                        $actReview = getOverallReviewMean($getaverage);
                                        @endphp
                                        <p>
                                            <span class="star">
                                                @if($actReview != 0)
                                                @for($i = 1 ; $i <= $actReview[0] ; $i++) <i class="fas fa-star"></i>
                                                    @endfor
                                                    @if($actReview[1] > 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                    @endif
                                                    @if($actReview[3] > 0)
                                                    @for($j = 0 ; $j < $actReview[3] ; $j++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                                        @else
                                                        @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                            @endfor
                                                            @endif
                                                            <span class="bg-success pl-2 pr-2 ml-3 text-white rounded-pill small d-inline-block text-center pt-0 " >{{ $accommodation->count_total_reviews }}</span>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <p class="font-weight-bold fntb mb-0">£{{ $accommodation->price }} <small class="text-muted">p/w</small></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row m-0">
                    	<div class="col-lg-12">
                        	<nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
			                    {{ $accommodations->links() }}
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