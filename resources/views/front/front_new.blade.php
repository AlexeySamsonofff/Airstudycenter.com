@extends('front.index_new')
@section('title', 'Home')
@section('content')
<!-- home main start -->
<div class="bg-work">
    <div class="container" style="margin-top: -101px;">
        <div class="w-77 shadow m-auto bg-white p-4">
            <h3 style="font-size: 25px;" class="font-weight-bold text-center">@lang('header.search_title')</h3>
            <h3 style="font-size: 25px;" class="text-secondary text-center">@lang('header.search_heading')</h3>
            <div class="row pt-4 pb-2 m-0">
                <div class="col-md-2 pl-md-1 pr-md-1 mt-1 mb-1">
                    <input class="form-control h-100 text-dark btn pt-2 pb-2 rounded-0  btn-white border w-100 serchDropdown text-left" type="text" name="budget" placeholder="@lang('header.enter_budget')" />
                </div>
                <div class="col-xl-4 col-md-3 mt-1 pl-md-2 pr-md-2 mb-1">
                    <div class=" serchDropdownAfter search1 btn-white border ">
                        <select class="serchDropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " name="search_course">
                            <option value="">@lang('header.search_course')</option>
                            @foreach($courseTitles as $titles)
                            @php $title = getLocalizedString($titles, 'name'); @endphp
                            <option value="{{$title}}">{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 pl-md-1 pr-md-1 mt-1 mb-1">
                    <div class=" serchDropdownAfter search2 btn-white border ">
                        <select class="serchDropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " name="search_length">
                            <option value="">@lang('header.course_length')</option>
                            @for($i = 1 ; $i <= 52 ; $i++) <option value="ppw{{$i}}">{{$i}} @lang('header.week')</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-1 pl-md-2 pr-md-1 mb-1">
                    <div class=" serchDropdownAfter search3 btn-white border ">
                        <select class="serchDropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " name="city" id="exampleFormControlSelect1">
                            <option value="">@lang('header.select_city')</option>
                            @foreach($cities as $city)
                            <option value="{{$city->cityId}}">{{$city->cityname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-1 pl-md-2 pr-md-1 mb-1">
                    <a href="" class="text-center btn  w-100 rounded-0 btn-primary pl-4 pr-4 h-100 btnBlog " style=" padding-top: 10px;">Search </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 pt-5 pb-5">
        <h3 class="headings text-center pb-4 font-weight-bold" style="color: #2a354f;">How it works - simple & reliable</h3>
        <div class="row pb-5">
            <div class="col-md-3 mt-1 mb-1 iconWork text-center">
                <i class="fal fa-search"></i>
                <h5 class="font-weight-bold mt-3">1. Find a course</h5>
                <p>Find the best course tailored
                    for your needs</p>
            </div>
            <div class="col-md-3 mt-1 mb-1 iconWork text-center">
                <i class="fal fa-id-card"></i>
                <h5 class="font-weight-bold mt-3">2. Create an account</h5>
                <p>Find the best course tailored
                    for you in no time</p>
            </div>
            <div class="col-md-3 mt-1 mb-1 iconWork text-center">
                <i class="fal fa-calendar-check"></i>
                <h5 class="font-weight-bold mt-3">3.Select a date</h5>
                <p>Select the dates for your
                    courses and accommodataion</p>
            </div>
            <div class="col-md-3 mt-1 mb-1 iconWork text-center">
                <i class="fal fa-plane-departure" style="padding-bottom: 9px;"></i>
                <h5 class="font-weight-bold mt-2">4.Get Ready & Fly</h5>
                <p>Find the best course tailored
                    for you in no time</p>
            </div>
        </div>
    </div>
</div>
<div class="bg-light pb-4 pt-4">
    <div class="container">
        <h3 class="headings text-center"><span class="font-weight-bold">@lang('front.discounted')</span> @lang('front.courses') </h3>
        <p class="w-78 m-auto pl-md-4 pr-md-5 text-center" style="line-height: 1.3; color: #687aa0;">@lang('front.discountedtext')</p>
        <div class="row m- product pt-4">
            @foreach($topdeals as $topdeal)
            {{-- @php print_r($topdeal->toArray()); @endphp --}}
            @if($topdeal->status == 1)
            @php
            $alltotal = $topdeal->review_rate+$topdeal->review_rate1+$topdeal->review_rate2+$topdeal->review_rate3+$topdeal->review_rate4;
            $getaverage = $alltotal/5;
            // echo $getaverage;
            @endphp
            <div class="col-lg-4 col-sm-6 mt-4 mb-4">
                <div class="card w-77 productHeight m-auto bg-white">
                    <div class="imgBlock position-relative">
                        @if(Auth::check())
                        <a onclick="like({{$topdeal->schoolId}})"><div class="heart"><i id="school{{$topdeal->schoolId}}" class="{{$topdeal->favCss}} fa-heart" aria-hidden="true"></i></div></a>
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
        <button class="text-center btn  m-auto pt-4 d-block"><a href="{{route('allCourse')}}" class="text-center btn rounded-0 btn-primary pl-4 font-weight-bold pb-2 pr-4 pt-2 btnBlog ">Browse all</a></button>
        <div class="text-center">
            <small class="text-muted">{{ count($courseTitles) }} courses in {{ count($cities) }} cities</small>
        </div>
    </div>
</div>

<div class="container pb-5 pt-5">
    <h3 class="headings text-center"><span class="font-weight-bold">Popular</span> Cities </h3>
    <div class="row d-md-flex d-none">
        @foreach($topcities as $topcity)
        @if($topcity->schoolcount != 0)
        <div class="col-lg-4 col-md-6 mt-2 mb-2 mt-md-5 mb-md-5 text-white ">
            <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                <div class="m-auto img-setting" style="background-image: url({{ $topcity->image }})">
                    <div class="bg-shaded btmDetails p-2">
                        <h6 class="font-weight-bold ">{{ $topcity->cityname }}</h6>
                        <h6 class="schoolEducationBuilding" style="height: 52px !important;">
                            <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                                <div class="row m-0">
                                    <div class="col-10 p-0">See all {{$topcity->cityname}} Schools </div>
                                    <div class="col-2 p-0"><i class="ml-2 fa fa-angle-right" aria-hidden="true"></i></div>
                                </div>
                            </a>
                            <div class="line"></div>
                        </h6>
                        <h6><span class="float-left"> {{$topcity->schoolcount}} @lang('front.schools')</span> <span class="float-right">{{$topcity->coursecount}} @lang('front.courses')</span></h6>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    
    <div class="owl-slider d-md-none">
                
        <div id="carouselSchoolFront" class="owl-carousel m-0">
            @foreach($topcities as $topcity)
                @if($topcity->schoolcount != 0)
                <div class="item mt-2 mb-2  pr-0 mt-md-5 mb-md-5 text-white  text-left">
                    <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                        <div class=" img-setting m-auto" style="background-image: url({{ $topcity->image }})">
                            <div class="bg-shaded btmDetails p-2">
                                <h6 class="font-weight-bold ">{{ $topcity->cityname }}</h6>
                                <h6 class="schoolEducationBuilding" style="height: 52px !important;">
                                    <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                                        <div class="row m-0">
                                            <div class="col-10 p-0">See all {{$topcity->cityname}} Schools </div>
                                            <div class="col-2 p-0"><i class="ml-2 fa fa-angle-right" aria-hidden="true"></i></div>
                                        </div>
                                    </a>
                                    <div class="line"></div>
                                </h6>
                                <h6><span class="float-left"> {{$topcity->schoolcount}} @lang('front.schools')</span> <span class="float-right">{{$topcity->coursecount}} @lang('front.courses')</span></h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- <div class="owl-slider">
        <div id="carouselSchool" class="owl-carousel row school-popular m-0">
            @foreach($topcities as $topcity)
                @if($topcity->schoolcount != 0)
                    <div class="item mt-2 mb-2  pr-0 mt-md-5 mb-md-5 text-white ">
                        <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                            <div class="m-auto img-setting" style="background-image: url({{ $topcity->image }})">
                                <div class="bg-shaded btmDetails p-2">
                                    <h6 class="font-weight-bold ">{{ $topcity->cityname }}</h6>
                                    <h6 class="schoolEducationBuilding" style="height: 52px !important;">
                                        <a href="{{route('citySchool',['cityId'=>$topcity->city_name])}}" class="text-white">
                                            <div class="row m-0">
                                                <div class="col-10 p-0">See all {{$topcity->cityname}} Schools </div>
                                                <div class="col-2 p-0"><i class="ml-2 fa fa-angle-right" aria-hidden="true"></i></div>
                                            </div>
                                        </a>
                                        <div class="line"></div>
                                    </h6>
                                    <h6><span class="float-left"> {{$topcity->schoolcount}} @lang('front.schools')</span> <span class="float-right">{{$topcity->coursecount}} @lang('front.courses')</span></h6>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a>
                    </div>  
                @endif
            @endforeach
            
        </div>
    </div> --}}
    <button class="text-center btn  m-auto pt-4 d-block"><a href="{{route('allCitySchool')}}" class="text-center btn  rounded-0 btn-primary pl-4 font-weight-bold pb-2 pr-4 pt-2 btnBlog ">Browse all</a></button>
</div>
<div class="bg-light pb-4 pt-4">
    <div class="container blog">
        <h3 class="headings text-center"><span class="font-weight-bold">Popular</span> Blog Posts </h3>
        <div class="row pt-4 pb-4">
            @foreach($blogs as $blog)
            @php
            $date = date('F d, Y', strtotime($blog->created_at));
            @endphp
            <div class="col-md-4 mt-2 mb-2 mt-md-0 mb-md-0 ">
                <div class="card w-77 m-auto bg-white border-0">
                    @if($blog->image != "")
                    <img src="{{ $blog->image }}" class="w-100" alt="">
                    @else
                    <img src="{{asset('front/dpassets/img/blogIMG1.png')}}" class="w-100" alt="">
                    @endif
                    <div class="blogDetails p-2">
                        <h6 class="text-muted font-weight-light text-capitalize mb-1">{{ $blog->category_name }}</h6>
                        <a href="{{route('blogDetail',['id'=>$blog->id])}}" class="text-dark">
                            <h6 class="font-weight-bold two-lines-heading">
                                {{getLocalizedString($blog, 'title')}}
                            </h6>
                        </a>
                        <p class="text-muted mb-2 small"><i class="fal fa-clock mr-1" aria-hidden="true"></i> {{ $date }}</p>
                        <p class="small text-secondary mb-2 three-lines-text">
                            {{ str_limit(getLocalizedString($blog, 'description', true), 100)}}
                        </p>
                        <a href="{{route('blogDetail',['id'=>$blog->id])}}" class="blogLink font-weight-bold">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="text-center btn  m-auto pt-4 d-block"><a href="{{route('blogList')}}" class="text-center btn  rounded-0 btn-primary pl-4 font-weight-bold pb-2 pr-4 pt-2 btnBlog ">See all posts</a></button>
    </div>
</div>

<div class="testamonial text-center container pt-4 pb-5 mt-4 mb-4">
    <h3 class="headings text-center font-weight-bold mb-5">Testimonials</h3>
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($testimonials as $testimonial)
            <li data-target="#carouselExample" data-slide-to="{{ $loop->iteration - 1 }}" class="@if($loop->iteration == 1) {{ 'active' }} @endif">
                <img class="rounded-circle" src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="First slide">
            </li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach($testimonials as $testimonial)
            <!-- Carousel Item {{ $loop->iteration }} Start -->
            <div class="carousel-item @if($loop->iteration == 1) {{ ' active' }} @endif">
                <div class="w-77 Clints m-auto">
                    <div class="stars text-center mb-3">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>

                    </div>
                    <p>{{ getLocalizedString($testimonial, 'description', true) }}</p>
                    <span>- {{ getLocalizedString($testimonial, 'name') }}</span>
                </div>
            </div>
            <!-- Carousel Item {{ $loop->iteration }} End -->
            @endforeach
        </div>
        <!-- End of Carousel Inner -->
    </div>
</div>

<!-- home main end -->
@endsection
