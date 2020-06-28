@extends('front.index1_new')
@section('title', getLocalizedString($school, 'name'))
@section('content')
<div class="container-fluid bg-school p-0 text-white" style="background-image:url({{ asset('front/dpassets/img/school.png') }})">
    @include('front.layout.navigation')
    <div class="container  pl-md-0">
        <div class="col-md-8 p-0">
            @if($logo)
            <img src="{{url('/logo_images/'.$logo->logo)}}" class="mt-5 pt-5" alt="" style="height:110px">
            @else
            <div class="mt-5 pt-5"></div>
            @endif
            <h3 class="font-weight-bold mt-3">
                {{ getLocalizedString($school, 'name') }}
            </h3>
            <p class="mb-2"><i class="far fa-map-marker-alt"></i> <span id="address">{{$school->address}}, {{$school->state}}, {{$school->country}}, {{$school->zipcode}}</address>
            </p>
            <p class=" pr-3 star  m-0 pb-3"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> {{ $count_total_reviews }} @lang('school.reviews')
            </p>
        </div>
    </div>
</div>
<section>
    <div class="container p-0">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0 ">
                <div class="w-85">
                    <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                        <p class="breadcrumb text-break d-inline-block pl-0 bg-transparent">
                            <span class="breadcrumb-item"><a href="#">@lang('school.home')</a></span>
                            <span class="breadcrumb-item"><a href="#">@lang('school.schools')</a></span>
                            <span class="breadcrumb-item" aria-current="page">{{$school->name}}</span>
                        </p>
                    </nav>
                    <div class="tabs coursesa" style="margin-bottom:1em">
                        <nav role='navigation' class=" d-lg-block d-none tabse p-0  mb-3 transformer-tabs bg-transparent sticky-accordian-top">
                            <ul class="p-0 m-0 border-0 normal-tabs  shadow rounded bg-white">
                                <li class="p-0 m-0"><a href="#tab-3" class="active"><i class="far fa-info"></i>@lang('school.general')</a></li>
                                <li class="p-0 m-0"><a href="#tab-2"><i class="far fa-book"></i>@lang('school.courses')</a></li>
                                <li class="p-0 m-0"><a href="#tab-1"><i class="far fa-star"></i>@lang('school.reviews')</a></li>
                                <li class="p-0 m-0"><a href="#tab-4"><i class="far fa-bed"></i>@lang('school.accommodation')</a></li>
                                <li class="p-0 m-0"><a href="#tab-5"><i class="far fa-map-marker-alt"></i>@lang('school.map')</a></li>
                                <li class="p-0 m-0"><a href="#tab-6"><i class="far fa-passport"></i>@lang('school.other')</a></li>
                            </ul>

                        </nav>
                        <div class="mbl-tab shadow mb-3 d-lg-none d-block">
                            <select class="tabs_dd">
                                <option value="general" data="#tab-3">@lang('school.general')</option>
                                <option value="courses" data="#tab-2">@lang('school.courses')</option>
                                <option value="reviews" data="#tab-1">@lang('school.reviews')</option>
                                <option value="accomudation" data="#tab-4">@lang('school.accommodation')</option>
                                <option value="map" data="#tab-5">@lang('school.map')</option>
                                <option value="other" data="#tab-6">@lang('school.other')</option>
                            </select>
                        </div>
                        <div id="tab-3" class="tab active">
                            {{-- @php print_r($school) @endphp --}}
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('school.about_school')</h3>
                            <p class="AboutclampHiden mb-2 aboutstyling " id="hereAdd">{{ getLocalizedString($school, 'description', true) }}</p>
                            <p class="clr-primry" id="addingclip"><span class="show-more">Read more</span><span class="show-less">Read less</span></p>
                            <div class="bg-light pt-3 pb-3 row m-0 aboutIcon">
                                <div class="col-4 text-center">
                                    <i class="far mb-2 clr-primry fa-calendar-alt"></i>
                                    <p class="font-weight-bold mb-1">2 @lang('school.weeks')</p>
                                    <p style="font-size:14px; color:#687AA0;" class="mb-0">@lang('school.minimum_term')</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas mb-2 clr-primry fa-users"></i>
                                    <p class="font-weight-bold mb-1">{{$school->no_of_student}}</p>
                                    <p style="font-size:14px; color:#687AA0;" class="mb-0">@lang('school.students_in_class')</p>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas mb-2 clr-primry fa-info-circle"></i>
                                    <p class="font-weight-bold mb-1">{{$school->agelimit}}</p>
                                    <p style="font-size:14px; color:#687AA0;" class="mb-0">@lang('school.min_age')</p>
                                </div>
                            </div>
                            <div class="mt-5 mb-5 w-100" style="border-top:1px solid #D7E8EB;"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('school.facilities') </h3>
                            <div class="row m-0 mt-3">
                                @if(count($school_facilities) > 0)
                                @foreach($school_facilities as $facility)
                                <div class="col-6 mb-3 col-lg-3 pl-0">
                                    <div class="iconFac row m-0 position-relative">
                                        <div class="col-2 col-lg-3 p-0">
                                            <i class="bg-light rounded-circle {{$facility->facility_icon}}"></i>
                                        </div>
                                        <div class="col-10 col-lg-9  sir-dard pl-2 pr-0" style="font-size: 14px; color: #687AA0;">
                                            {{ $facility->facility_name }}
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="col-sm-6 mb-3 col-lg-3 pl-0">
                                    <div class="iconFac">
                                        No facilities found!
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="mt-5 mb-5 w-100" style="border-top:1px solid #D7E8EB;"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-1">Gallery </h3>
                            <div class="container gallery p-0">
                                <div class="row popup-gallery">
                                    @php
                                    // print_r($school->images);
                                    // die;
                                    @endphp
                                    @if(!empty($school->images))
                                    @foreach($school->images as $image)
                                    <div class="col-lg-4 col-6 {{ $loop->iteration > 5 ? "d-none" : "" }}">
                                        <a class="image photo-zoom" href="{{asset('thumbnail_images/'.$image)}}">
                                            <img src="{{asset('normal_images/'.$image)}}" alt="" />
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                    @if($school->video)
                                    <div class="col-lg-4 col-6 ">
                                        <a href="{{ $school->video }}" data-type="video" class="video photo-zoom" title="This is a video">
                                            {{-- <iframe width="100%" height="auto" src="{{ $school->video }}">
                                            </iframe> --}}
                                            <img src="{{asset('normal_images/'.$image)}}" alt="" />
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-5 mb-5 w-100" style="border-top:1px solid #D7E8EB;"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('school.accreditations')<i class="far acd fa-info-circle position-relative"><span>@lang('school.accreditation_info')</span></i></h3>
                            <div class="w-100 mb-3">
                                @if(count($accreditations) > 0)
                                <div class="row">
                                    @foreach($accreditations as $accreditation)
                                    <div class="col-2 pr-0">
                                        <img style="width:100%; height:auto; margin-top:1em;" title="{{ $accreditation->title }}" src="{{ $accreditation->image }}" class="" alt="{{ $accreditation->title }}">
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                No Accredidations found
                                @endif
                            </div>

                            <!-- Why Section -->
                            <div class="bg-light p-3 text-center d-md-none d-block">
                                <h6 class="font-weight-bold ft-18 mt-2">@lang('school.why_use_air_study_center')</h6>
                                <div class="feeds">
                                    <i class="far fa-piggy-bank usicon"></i>
                                    <h6 class="mb-0">@lang('school.save_money')</h6>
                                    <p>@lang('school.cheapest_course_fee_guaranteed')</p>
                                </div>
                                <div class="feeds">
                                    <i class="far fa-check-circle usicon"></i>
                                    <h6 class="mb-0">@lang('school.simple')</h6>
                                    <p>@lang('school.booking_online_is_really_easy')</p>
                                </div>
                                <div class="feeds">
                                    <i class="far fa-smile-beam usicon"></i>
                                    <h6 class="mb-0">@lang('school.customer_reviews')</h6>
                                    <p>@lang('school.100_percent_genuine_reviews')</p>
                                </div>
                            </div>
                            <div class="mt-5 mb-5 w-100" style="border-top:1px solid #D7E8EB;"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('school.top_nationalities')</h3>
                            <div id="bar-chart"></div>
                        </div>
                        <div id="tab-2" class="tab">
                            <small style="color:#243B6B;">Showing {{count($courses)}} of {{count($courses)}} </small>
                            <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">
                                @foreach($courses as $course)
                                <div class="check pt-1 mt-3 mb-3">
                                    <div class="panel panel-default ">
                                        <div class="panel-heading" role="tab" id="headingCrs1">
                                            <h4 class="panel-title">
                                                <a class="collapsed pl-3 pr-3 pb-0 pt-2 bg-white" role="button">
                                                    <div class="row m-0 position-relative">
                                                        <div class="col-9 p-0">
                                                            <p class="cmntName m-0"><span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{ $course->course_title }}</span>
                                                                <br class="d-lg-none d-block"> <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">from £{{ $course->ppw1 }}
                                                                    p/w</span></p>
                                                        </div>
                                                        <div class="col-3 p-0  text-right">
                                                            <button class=" btn text-white rounded-0 btn-primary position-absolute btnBlog d-inline-block take_this_course courseSeclection" data-course-name="{{ $course->course_title }}" style="top: 0;right: 0;">
                                                                <i class="fas fa-check-circle d-none"></i> @lang('school.take_this_course')
                                                            </button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseCrs{{$loop->iteration}}" class="panel-collapse collapse cmnt mb-3" role="tabpanel" aria-labelledby="headingCrs1">
                                            <div class="panel-body CourseBody cmntBody pl-3 pr-3 pb-0" style="margin-top: -5px;">
                                                <p><span style="font-weight:bold;">Start dates:</span> Every Monday </p>
                                                <p><span style="font-weight:bold;"> Locations:</span> All schools except
                                                    the Executive and Junior centres in Cambridge.
                                                </p>
                                                <p><span style="font-weight:bold;"> Levels: </span>Beginner to advanced
                                                </p>
                                                <p><span style="font-weight:bold;"> Weekly tuition: </span>17 hours and
                                                    20 minutes</p>
                                                <p> <span style="font-weight:bold;"> Duration: </span>2 weeks +</p>
                                                <p><span style="font-weight:bold;"> Price:</span> From £990 for 2 weeks
                                                    (accommodation included, varies by location). See school pages for
                                                    details.</p>
                                            </div>
                                        </div>
                                        <div class=" after mb-3 ml-3" style="margin-top: -10px;">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseCrs{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseCrs{{$loop->iteration}}">
                                                <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                            </a>
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseCrs{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseCrs{{$loop->iteration}}">
                                                <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{-- <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  activepage" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">2</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">3</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">...</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">6</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                        <div id="tab-1" class="tab">
                            <h3 class="font-weight-bold d-none d-md-block HeadingS1 mt-4">@lang('school.overall_reviews')</h3>
                            <div class="d-none d-md-flex row m-0 reviws-top font-weight-bold mt-3">
                                <div class="col-lg-6 p-0">
                                    <p>
                                        <span class="float-left">@lang('school.city')</span> <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 85px;"></span>
                                            @php $cityReview = getOverallReviewMean($review_rate); @endphp
                                            @if($cityReview != 0)
                                            @for($i = 1 ; $i <= $cityReview[0] ; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if($cityReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($cityReview[3] > 0)
                                                @for($j = 0 ; $j < $cityReview[3] ; $j++) <i class="far fa-star"></i>
                                                    @endfor
                                                    @endif
                                                    @else
                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                    <p>
                                        <span class="float-left">@lang('school.organisation')</span>
                                        <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 15px;"></span>
                                            @php $orgReview = getOverallReviewMean($review_rate1); @endphp
                                            @if($orgReview != 0)
                                            @for($i = 1 ; $i <= $orgReview[0] ; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if($orgReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($orgReview[3] > 0)
                                                @for($j = 0 ; $j < $orgReview[3] ; $j++) <i class="far fa-star"></i>
                                                    @endfor
                                                    @endif
                                                    @else
                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                    <p>
                                        <span class="float-left">@lang('school.activities')</span>
                                        <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 45px;"></span>
                                            @php $actReview = getOverallReviewMean($review_rate5); @endphp
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
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                </div>
                                <div class="col-lg-6 p-0">
                                    <p>
                                        <span class="float-left">@lang('school.course_quality')</span>
                                        <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 28px;"></span>
                                            @php $corQualityReview = getOverallReviewMean($review_rate3); @endphp
                                            @if($corQualityReview != 0)
                                            @for($i = 1 ; $i <= $corQualityReview[0] ; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if($corQualityReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($corQualityReview[3] > 0)
                                                @for($j = 0 ; $j < $corQualityReview[3] ; $j++) <i class="far fa-star"></i>
                                                    @endfor
                                                    @endif
                                                    @else
                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                    <p>
                                        <span class="float-left">@lang('school.accommodation')</span>
                                        <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 16px;"></span>
                                            @php $accReview = getOverallReviewMean($review_rate4); @endphp
                                            @if($accReview != 0)
                                            @for($i = 1 ; $i <= $accReview[0] ; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if($accReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($accReview[3] > 0)
                                                @for($j = 0 ; $j < $accReview[3] ; $j++) <i class="far fa-star"></i>
                                                    @endfor
                                                    @endif
                                                    @else
                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                    <p>
                                        <span class="float-left">@lang('school.facilities')</span>
                                        <span class="float-lg-left float-right">
                                            <span class="d-none d-md-inline" style="padding-left: 77px;"></span>
                                            @php $facReview = getOverallReviewMean($review_rate2); @endphp
                                            @if($facReview != 0)
                                            @for($i = 1 ; $i <= $facReview[0] ; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if($facReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($facReview[3] > 0)
                                                @for($j = 0 ; $j < $facReview[3] ; $j++) <i class="far fa-star"></i>
                                                    @endfor
                                                    @endif
                                                    @else
                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                        @endfor
                                                        @endif
                                        </span>
                                        <div class="clearfix"></div>
                                    </p>
                                </div>
                                <div class="mt-4  w-100" style="border-top:1px solid #D7E8EB;"></div>
                            </div>
                            <h3 class="font-weight-bold HeadingS1 mt-4">@lang('school.comments')</h3>
                            <small style="color:#243B6B;">Showing {{count($reviews)}} of {{count($reviews)}} </small>
                            <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">
                                @foreach($reviews as $review)
                                @php $reviewMean = getReviewMean($review->toArray()); @endphp
                                <div class="check pt-1 mt-3 mb-3">
                                    <div class="panel panel-default ">
                                        <div class="panel-heading" role="tab" id="review_{{ $loop->iteration }}">
                                            <h4 class="panel-title">
                                                <a class="collapsed review" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#rev_{{ $loop->iteration }}" aria-expanded="false" aria-controls="rev_{{ $loop->iteration }}">
                                                    <div class="row">
                                                        <div class="col-lg-1 col-sm-2 col-3 p-0 text-center">
                                                            @php $userimage = App\User::where('id',$review->user_id)->first(); @endphp
                                                            @if($userimage->image)
                                                            <img src="{{$userimage->image}}" class="rounded-circle border border-light text-center" style="width:35px; height:35px;" alt="">
                                                            @else
                                                            <img src="{{asset('front/images/man.png')}}" class="rounded-circle border border-light text-center" style="width:35px; height:35px;" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-11 col-sm-10 col-9 p-0 pr-2 widthing">
                                                            <div class="row m-0 mb-2">
                                                                <div class="col-6 p-0">
                                                                    <p class="cmntName"><span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{$review->user_name}}</span> <br class="d-lg-none d-block">
                                                                        <span class="font-weight-normal ml-lg-3" style="color:#687AA0; font-size: 12px;">{{ $review->updated_at->diffForHumans() }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-6 p-0 pr-3 star text-right">
                                                                    @if($reviewMean != 0)
                                                                    @for($i = 1 ; $i <= $reviewMean[0] ; $i++) <i class="fas fa-star"></i>
                                                                        @endfor
                                                                        @if($reviewMean[1] > 0)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        @endif
                                                                        @if($reviewMean[3] > 0)
                                                                        @for($j = 0 ; $j < $reviewMean[3] ; $j++) <i class="far fa-star"></i>
                                                                            @endfor
                                                                            @endif
                                                                            @else
                                                                            @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @endif
                                                                </div>
                                                            </div>
                                                            <p class="cmntdetails mb-0 mr-2" style="color:#687AA0; ">{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="rev_{{ $loop->iteration }}" class="panel-collapse collapse cmnt mb-3" role="tabpanel" aria-labelledby="review_{{ $loop->iteration }}">
                                            <div class="panel-body cmntBody">
                                                <div class="row m-0">
                                                    <div class="col-lg-1 col-sm-2 col-3 p-0"></div>
                                                    <div class=" col-lg-11 col-sm-10 col-9 p-0 pr-3">
                                                        <div class=" row m-0 reviws-top font-weight-bold mt-3">
                                                            <div class="col-lg-6 p-0">
                                                                <p>
                                                                    <span class="float-left">@lang('school.city')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 85px;"></span>
                                                                        @if($review->rate5)
                                                                        @for($i=1;$i<=($review->rate);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                                <p>
                                                                    <span class="float-left">@lang('school.organisation')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 15px;"></span>
                                                                        @if($review->rate1)
                                                                        @for($i=1;$i<=($review->rate1);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate1;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                                <p>
                                                                    <span class="float-left">@lang('school.activities')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 45px;"></span>
                                                                        @if($review->rate5)
                                                                        @for($i=1;$i<=($review->rate5);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate5;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-6 p-0">
                                                                <p>
                                                                    <span class="float-left">@lang('school.course_quality')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 27px;"></span>
                                                                        @if($review->rate3)
                                                                        @for($i=1;$i<=($review->rate3);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate3;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                                <p> <span class="float-left">@lang('school.accommodation')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 16px;"></span>
                                                                        @if($review->rate4)
                                                                        @for($i=1;$i<=($review->rate4);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate4;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                                <p>
                                                                    <span class="float-left">@lang('school.facilities')</span>
                                                                    <span class="float-lg-left float-right">
                                                                        <span class="d-none d-md-inline" style="padding-left: 77px;"></span>
                                                                        @if($review->rate5)
                                                                        @for($i=1;$i<=($review->rate2);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate2;$i<5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @else
                                                                                @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                    @endfor
                                                                                    @endif
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0 after">
                                            <div class="col-lg-1 col-sm-2 col-3 p-0"></div>
                                            <div class="col-lg-11 col-sm-10 col-9 p-0 p-0  mb-3">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#rev_{{ $loop->iteration }}" aria-expanded="false" aria-controls="rev_{{ $loop->iteration }}">
                                                    <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                                </a>
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#rev_{{ $loop->iteration }}" aria-expanded="false" aria-controls="rev_{{ $loop->iteration }}">
                                                    <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{-- <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  activepage" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">2</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">3</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">...</a></li>
                                    <li class="page-item"><a class="page-link border-0 text-primary rounded-0  " href="#">6</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                        <div id="tab-4" class="tab">
                            <h3 class="font-weight-bold ">@lang('school.accommodation_options')</h3>
                            @if($accomodations && count($accomodations)>0)
                            @foreach($accomodations as $accommodation)
                            <div class="check pt-1 mt-3 mb-3 cart-exchange">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <div class="collapsed pl-3 pr-3 pb-0 pt-2 bg-white" role="button">
                                                <div class="row m-0 position-relative">
                                                    <div class="col-9 p-0">
                                                        <p class="cmntName m-0">
                                                            <span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{ $accommodation->typeName }}</span>
                                                            <br class="d-lg-none d-block">
                                                            <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">£{{ $accommodation->price }} p/w</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3 p-0  text-right">
                                                        <a href="javascript:;" onclick="return false;" data-accommodation="{{ $accommodation->typeName }}" class="table_accommodation addingCart">
                                                            <span class="withoutActive">
                                                                <i class="fas fa-cart-plus nothover"></i> <i class="far fa-cart-plus forhover "></i>
                                                            </span>
                                                            <i class="far fa-check ForActive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapseAccommodation{{$loop->iteration}}" class="panel-collapse collapse cmnt mb-3" role="tabpanel">
                                        <div class="panel-body CourseBody cmntBody pl-3 pr-3 pb-0" style="margin-top: -5px;">
                                            <p>{{ $accommodation->description }}</p>
                                        </div>
                                    </div>
                                    <div class=" after mb-3 ml-3" style="margin-top: -10px;">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseAccommodation{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseAccommodation{{$loop->iteration}}">
                                            <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                        </a>
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseAccommodation{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseAccommodation{{$loop->iteration}}">
                                            <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <small style="color:#4A4A4A;">*There might be an extra charge for accommodation during summer periods</small>
                            @else
                            <span class="clampHiden" style="font-size: 11px;">
                                No accommodation found
                            </span>
                            @endif
                        </div>

                        <div id="tab-5" class="tab">
                            <h3 class="font-weight-bold HeadingS1 mb-4">@lang('school.birds_eye_view')</h3>
                            <div id="schoolmap" class="w-100" style="height:450px"></div>
                            <div class="mt-3 mb-5  w-100" style="border-top:1px solid #D7E8EB;"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-4 ">@lang('school.street_view')</h3>
                            <div id="schoolpano" class="w-100" style="height:450px"></div>
                        </div>
                        <div id="tab-6" class="tab">
                            <h3 class="font-weight-bold HeadingS1 mt-4">@lang('school.visa')</h3>
                            @if(count($scvisas) > 0)
                            @foreach($scvisas as $visa)
                            <div class="check pt-1 mt-3 mb-3 cart-exchange">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <div class="collapsed pl-3 pr-3 pb-0 pt-2 bg-white" role="button">
                                                <div class="row m-0 position-relative">
                                                    <div class="col-9 p-0">
                                                        <p class="cmntName m-0">
                                                            <span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{ getLocalizedString($visa, 'name') }}</span>
                                                            <br class="d-lg-none d-block">
                                                            <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">£{{ $visa->price }} p/w</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3 p-0  text-right">
                                                        <a href="javascript:;" onclick="return false;" data-visa-type="{{ $visa->name }}" class="table_visa addingCartOthers">
                                                            <span class="withoutActive">
                                                                <i class="fas fa-cart-plus nothover"></i> <i class="far fa-cart-plus forhover "></i>
                                                            </span>
                                                            <i class="far fa-check ForActive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapseVisa{{$loop->iteration}}" class="panel-collapse collapse cmnt mb-3" role="tabpanel">
                                        <div class="panel-body CourseBody cliping-p-2 text-justify cmntBody pl-3 pr-3 pb-0" style="margin-top: -5px;">
                                            <p>{{ getLocalizedString($visa, 'description', true) }}</p>
                                            <a href="" class="font-weight-bold d-block text-right" style="font-size:13px;">Read more</a>
                                        </div>
                                    </div>
                                    <div class=" after mb-3 ml-3" style="margin-top: -10px;">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseVisa{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseVisa{{$loop->iteration}}">
                                            <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                        </a>
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseVisa{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseVisa{{$loop->iteration}}">
                                            <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <small style="color:#4A4A4A;">*Compulsory text if needed</small>
                            @else
                            <span class="clampHiden" style="font-size: 11px;">
                                @lang('school.no_visa_available')
                            </span>
                            @endif

                            <h3 class="font-weight-bold HeadingS1 mt-4">@lang('school.insurance')</h3>
                            @if(count($scinsurances) > 0)
                            @foreach($scinsurances as $insurance)
                            <div class="check pt-1 mt-3 mb-3 cart-exchange">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <div class="collapsed pl-3 pr-3 pb-0 pt-2 bg-white" role="button">
                                                <div class="row m-0 position-relative">
                                                    <div class="col-9 p-0">
                                                        <p class="cmntName m-0">
                                                            <span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{ getLocalizedString($insurance, 'name') }}</span>
                                                            <br class="d-lg-none d-block">
                                                            <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">£{{ $insurance->price }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3 p-0  text-right">
                                                        <a href="javascript:;" onclick="return false;" data-insurance-type="{{ $insurance->name }}" class="table_insurance addingCartInsurance">
                                                            <span class="withoutActive">
                                                                <i class="fas fa-cart-plus nothover"></i> <i class="far fa-cart-plus forhover "></i>
                                                            </span>
                                                            <i class="far fa-check ForActive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapseInsurance{{$loop->iteration}}" class="panel-collapse collapse cmnt mb-3" role="tabpanel">
                                        <div class="panel-body CourseBody cliping-p-2 text-justify cmntBody pl-3 pr-3 pb-0" style="margin-top: -5px;">
                                            <p>{{ getLocalizedString($insurance, 'description', true) }}</p>
                                            <a href="" class="font-weight-bold d-block text-right" style="font-size:13px;">Read more</a>
                                        </div>
                                    </div>
                                    <div class=" after mb-3 ml-3" style="margin-top: -10px;">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseInsurance{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseInsurance{{$loop->iteration}}">
                                            <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                        </a>
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseInsurance{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseInsurance{{$loop->iteration}}">
                                            <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <small style="color:#4A4A4A;">*Compulsory text if needed</small>
                            @else
                            <span class="clampHiden" style="font-size: 11px;">
                                No Insurance available.
                            </span>
                            @endif
                            <h3 class="font-weight-bold HeadingS1 mt-4">@lang('school.transportation')</h3>
                            @if(count($transports) > 0)
                            @foreach($transports as $transport)
                            <div class="check pt-1 mt-3 mb-3 cart-exchange">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <div class="collapsed pl-3 pr-3 pb-0 pt-2 bg-white" role="button">
                                                <div class="row m-0 position-relative">
                                                    <div class="col-9 p-0">
                                                        <p class="cmntName m-0">
                                                            <span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{ getLocalizedString($transport, 'airport_name') }}</span>
                                                            <br class="d-lg-none d-block">
                                                            <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">£{{ $transport->pick_up }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-3 p-0  text-right">
                                                        <a href="javascript:;" onclick="return false;" data-transport-type="{{ $transport->airport_name }}" class="table_transport addingCartTransportation">
                                                            <span class="withoutActive">
                                                                <i class="fas fa-cart-plus nothover"></i> <i class="far fa-cart-plus forhover "></i>
                                                            </span>
                                                            <i class="far fa-check ForActive"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapseTranspoart{{$loop->iteration}}" class="panel-collapse collapse cmnt mb-3" role="tabpanel">
                                        <div class="panel-body CourseBody cmntBody pl-3 pr-3 pb-0" style="margin-top: -5px;">
                                            <div class="row m-0" id="adtionl{{ $loop->iteration }}">
                                                <div class="col-9 p-0 additional-trasport">
                                                    @lang('school.pick_and_drop')
                                                    <br class="d-lg-none d-block">
                                                    <span class="font-weight-bold ml-lg-3 " style="color:#687AA0; font-size: 12px;">£{{ $transport->pick_up_and_drop }}</span>
                                                </div>
                                                <div class="col-3 text-right p-0">

                                                    <div class="pt-2" id="atcart{{ $loop->iteration }}">
                                                        <a href="javascript:;" class="table_transport addingCartTransportation" data-transport-type="{{ $transport->airport_name }}-dual">
                                                            <span class="withoutActive">
                                                                <i class="fas fa-cart-plus nothover"></i> <i class="far fa-cart-plus forhover "></i>
                                                            </span>
                                                            <i class="far fa-check ForActive"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" after mb-3 ml-3" style="margin-top: -10px;">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTranspoart{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseTranspoart{{$loop->iteration}}">
                                            <div class="moreInfo">More info <i class="ml-2 mt-1 far fa-angle-down"></i></div>
                                        </a>
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTranspoart{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseTranspoart{{$loop->iteration}}">
                                            <div class="lessInfo">Less info <i class="ml-2 mt-1 far fa-angle-up"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <span class="clampHiden" style="font-size: 11px;">
                                No transport available.
                            </span>
                            @endif
                            <small style="color:#4A4A4A;">*Compulsory text if needed</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed succed toster success-toast" style="display:none"><i class="fas fa-check-circle"> </i> <span class="success-toast-text"></span></div>
            <div class="position-fixed danger toster failed-toast" style="display:none"><i class="far fa-exclamation-circle"> </i> <span class="failed-toast-text"></span></div>
            <div class="col-md-4 ">
                <div class="d-md-none block w-100" style="height:99px; "></div>
                <div class="to-stick-calcutater" style="position: sticky;">
                    <div class="Enquiery bg-primary p-2 text-white mb-3">                        
                        <h3 class="text-center  mt-3 mb-3" style="font-weight: 800;">@lang('school.your_enquiry')</h3>
                        <form method="POST" action="{{ url('book_check') }}">
                        @csrf
                            <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">

                                {{-- @php print_r($courses->toArray()) @endphp --}}
                                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 calc_courses" name="course" id="" >
                                        <option value="">@lang('school.select_course')</option>
                                        @foreach($courses as $course)
                                        <option class="course-option course-{{$course->courseId}}" data-id="{{$course->courseId}}" data-school_id="{{$school->id}}" value="{{$course->course_title}}" data-course-fee="{{ $course->ppw1 }}" data-ppw1="{{ $course->ppw1 }}" data-ppw2="{{ $course->ppw2 }}" data-ppw3="{{ $course->ppw3 }}" data-ppw4="{{ $course->ppw4 }}" data-ppw5="{{ $course->ppw5 }}" data-ppw6="{{ $course->ppw6 }}" data-ppw7="{{ $course->ppw7 }}" data-ppw8="{{ $course->ppw8 }}" data-ppw9="{{ $course->ppw9 }}" data-ppw10="{{ $course->ppw10 }}" data-ppw11="{{ $course->ppw11 }}" data-ppw12="{{ $course->ppw12 }}" data-ppw13="{{ $course->ppw13 }}" data-course-discount={{ $course->discount }}>{{ $course->course_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="school_id" id="school_id">
                                <input type="hidden" name="course_id" id="calc_courses" > 
                                 <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_weeks" name="weeks" id="">
                                        <option value="0">@lang('school.select_weeks')</option>
                                        @for($i = 1 ; $i <= 52 ; $i++) <option value="{{ $i }}">{{$i}} @lang('header.week')</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="dATEp m-2 mt-3 mb-3">
                                    <div class="input-group bg-white" id="dateMusibt">
                                        <!--<input class="form-control rounded-0 border-0" style="height: 36px; font-size: 14px;" placeholder="MM/DD/YYYY" type="date"/>-->
                                        <!-- <input type="text" class="form-control bg-transparent rounded-0 border-0" style="height: 36px; font-size: 14px; z-index: 100;" id="datepicker" placeholder="MM/DD/YYYY"> -->
                                        <input class="form-control bg-transparent rounded-0 border-0" type="text" placeholder="DD/MM/YYYY" id="from" readonly="readonly" name="from">
                                        <!-- <span class="input-group-text rounded-0 border-0 show-clender"><i class="fa fa-calendar" id="to"></i></span> -->
                                        <!-- <span class="input-group-append input-group-addon">
                                        </span> -->
                                    </div>
                                </div>
                                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                                    {{-- @php print_r($accomodations); @endphp --}}
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_type" name="accommodation" id="">
                                        <option value="">@lang('school.select_accommodation')</option>
                                        @foreach($accomodations as $accommodation)
                                        <option value="{{$accommodation->typeName}}" data-accommodation-per-week="{{ $accommodation->price }}">{{ $accommodation->typeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                                    {{-- @php print_r($transports) @endphp --}}
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 transport_price" name="transport" id="">
                                        <option value="">@lang('school.select_transport')</option>
                                        @foreach($transports as $transport)
                                        <option value="{{ $transport->airport_name }}" data-transport-price="{{ $transport->pick_up }}" data-airport-type="@lang('school.pick') ({{ explode(' ',trim($transport->airport_name))[0] }})">{{ getLocalizedString($transport, 'airport_name') }} @lang('school.pickup')</option>
                                        <option value="{{$transport->airport_name}}-dual" data-transport-price="{{ $transport->pick_up_and_drop }}" data-airport-type="@lang('school.pick_and_drop') ({{ explode(' ',trim($transport->airport_name))[0] }})">{{ getLocalizedString($transport, 'airport_name') }} @lang('school.pickup_and_drop')</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 insurance_fee" name="insurance" id="">
                                        <option value="">@lang('school.select_insurance')</option>
                                        @foreach($scinsurances as $insurance)
                                        <option value="{{$insurance->name}}" data-insurance-price="{{ $insurance->price }}">{{ getLocalizedString($insurance, 'name') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool" style="position: relative !important;">
                                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 visa_fee" name="visa" id="">
                                        <option value="">@lang('school.select_visa')</option>
                                        @foreach($scvisas as $visa)
                                        <option value="{{$visa->name}}" data-visa-price="{{ $visa->price }}">{{ getLocalizedString($visa, 'name') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row m-0 texting pl-2 pr-2 pb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-8 p-0"> Course Fee <span id="course_title"></span></div>
                                        <div class="col-3 p-0 text-right">£<span id="course_fee">0.00</span><input type="hidden" name="price" class="course_fee"></div>
                                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".calc_courses"></i> </div>
                                    </div>
                                    <div class="row accommodation_section" style="display:none">
                                        <div class="col-8 p-0"> Accommodation Fee</div>
                                        <div class="col-3 p-0 text-right">£<span id="accommodation_fee">0.00</span></div>
                                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".accommodation_type"></i> </div>
                                    </div>
                                    <div class="row transport_total" style="display:none">
                                        <div class="col-9 p-0"> Airport <span id="airport_type"></span></div>
                                        <div class="col-2 p-0 text-right">£<span id="transport_fee"></span></div>
                                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".transport_price"></i> </div>
                                    </div>
                                    <div class="row insurance_fee_section" style="display:none">
                                        <div class="col-8 p-0"> Insurance Fee</div>
                                        <div class="col-3 p-0 text-right">£<span id="insurance_fee"></span></div>
                                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".insurance_fee"></i> </div>
                                    </div>
                                    <div class="row visa_fee_section" style="display:none">
                                        <div class="col-8 p-0"> Visa Fee</div>
                                        <div class="col-3 p-0 text-right">£<span id="visa_fee"></span></div>
                                        <div class="col-1 p-0 text-right"> <i class="far fa-times remove_calc_item" data-selector=".visa_fee"></i> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0 mt-3 mb-3" style="border-top:1px solid #b9d6dae0;"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 p-0"> School registration fee <i class="far fa-info-circle position-relative"><span>This fee is charged for the admin
                                                    fee, course materials and enrolment paper work.</span></i></div>
                                        <div class="col-4 p-0 text-right">£<span id="registration_fee">{{ number_format($school->registration_fee, 2, '.', ',') }}</span></div>
                                        <input type="hidden" name="registration_fee" class="registration_fee">
                                    </div>
                                    <div class="row">
                                        <div class="col-8 p-0"> Air Study Center Discount %<span id="discount_percent"></span></div>
                                        <div class="col-4 p-0 text-right">£<span id="discount_amount">0.00</span></div>
                                        <div class="col-12 p-0 mt-3 mb-3" style="border-top:1px solid #b9d6dae0;"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 p-0 text-white"> TOTAL</div>
                                        <div class="col-4 p-0 text-white text-right">£<span id="cart_total">0.00</span>
                                        <input type="hidden" name="total_price" class="cart_total">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-2 pb-3 pr-2">
                                <button type="submit" class="btn btn-block btn-lg btn-Book rounded-0 ">Book now!</button>
                            </div>
                        </form>
                    </div>
                    <!-- Why Section -->
                    <div class="bg-light p-3 text-center d-none d-md-block">
                        <h6 class="font-weight-bold ft-18 mt-2">Why use Air Study Center?</h6>
                        <div class="feeds">
                            <i class="far fa-piggy-bank usicon"></i>
                            <h6 class="mb-0">Save money</h6>
                            <p>Cheapest course fee guaranteed!</p>
                        </div>
                        <div class="feeds">
                            <i class="far fa-check-circle usicon"></i>
                            <h6 class="mb-0">Simple</h6>
                            <p>Booking online is really easy!</p>
                        </div>
                        <div class="feeds">
                            <i class="far fa-smile-beam usicon"></i>
                            <h6 class="mb-0">Customer Reviews</h6>
                            <p>100% genuine reviews on <br> student’s whole experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.calc_courses').on('change', function(){
        updateCourse();
        updateDiscount();
        updateTotal();
    });
    $('.accommodation_type').on('change', function(){
        updateAccommodation();
        updateTotal();
    });
    $('.transport_price').on('change', function(){
        updateTransportFee();
        updateTotal();
        select_changed();
    });
    $('.insurance_fee').on('change', function(){
        updateInsuranceFee();
        updateTotal();
    });
    $('.visa_fee').on('change', function(){
        updateVisaFee();
        updateTotal();
    });
    $('.accommodation_weeks').on('change', function(){
        updateAccommodation();
        updateCourse();
        updateDiscount();
        updateTotal();
    });

    function updateTotal(){
        var schoolRegistrationFee = {{ $school->registration_fee }};
        var courseWeeks = $('.accommodation_weeks').val();
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        courseFee = courseFee * courseWeeks;
        var discountPercent = getValue('.calc_courses', 'courseDiscount');
        var offAmount = getPercent(courseFee, discountPercent);
        courseFee = parseFloat(courseFee) - parseFloat(offAmount);

        var accommodationFee = getValue('.accommodation_type', 'accommodationPerWeek');
        var accommodationWeeks = $('.accommodation_weeks').val();
        var accommodationCharges = accommodationFee * accommodationWeeks;

        var transportPrice = getValue('.transport_price', 'transportPrice');
        var insuranceFee = getValue('.insurance_fee', 'insurancePrice');
        var visaFee = getValue('.visa_fee', 'visaPrice');


        var total = courseFee + accommodationCharges + transportPrice + insuranceFee + visaFee + schoolRegistrationFee;
        $('#cart_total').text(getNumber(total));
        $('#calc_courses').val(getValue('.calc_courses').id);
        $('#school_id').val(getValue('.calc_courses').school_id);
        $('.registration_fee').val(schoolRegistrationFee);
        $('.cart_total').val(getNumber(total));
        
    }
    function getValue(selector, dataAttrName){
        var value = $(selector).find(':selected').data(dataAttrName);
        if(typeof value == 'undefined'){
            return 0;
        } else {
            return value;
        }
    }
    function select_changed(dataAttrName){

        $(getValue('.transport_price', 'transportPrice')).each(function(){
        $(this).removeClass('yellow');
        });
        $(getValue('.table_transport', 'transportType')).each(function(){
            var selected = $(this).data('transportType');
            $('#'+selected).addClass('yellow');
        });
    }
    function updateTransportFee(){
        var transportPrice = getValue('.transport_price', 'transportPrice');
        if(transportPrice == 0){
            $('.transport_total').hide(250);
        } else {
            var airportType = getValue('.transport_price', 'airportType');
            $('#airport_type').text(airportType);
            $('#transport_fee').text(getNumber(transportPrice));
            $('.transport_total').show(250);
        }
        showMessage('Transport Fee Updated', true);
    }
    function updateInsuranceFee(){
        var insurancePrice = getValue('.insurance_fee', 'insurancePrice');
        if(insurancePrice == 0){
            $('.insurance_fee_section').hide(250);
        } else {
            $('#insurance_fee').text(getNumber(insurancePrice));
            $('.insurance_fee_section').show(250);
            showMessage('Insurance Fee Updated', true);
        }
    }
    function updateVisaFee(){
        var visaPrice = getValue('.visa_fee', 'visaPrice');
        if(visaPrice == 0){
            $('.visa_fee_section').hide(250);
        } else {
            $('#visa_fee').text(getNumber(visaPrice));
            $('.visa_fee_section').show(250);
        }
        showMessage('Visa Fee Updated', true);
    }
    function updateDiscount(){
        var discountPercent = getValue('.calc_courses', 'courseDiscount');
        var courseWeeks = $('.accommodation_weeks').val();
        // var courseFee = getValue('.calc_courses', 'courseFee');
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        courseFee = courseFee * courseWeeks;
        // console.log(courseFee);
        var offAmount = getPercent(courseFee, discountPercent);
        $('#discount_percent').text(discountPercent);
        $('#discount_amount').text(offAmount);
    }
    function updateCourse(){
        var courseName = $('.calc_courses').val();
        var courseWeeks = $('.accommodation_weeks').val();
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        $('.course_fee').val(getNumber(courseFee));
        if(courseWeeks > 0){
            $('#course_fee').text(getNumber(courseFee * courseWeeks));
        } else {
            $('#course_fee').text(getNumber(courseFee));
        }

        $('#course_title').text("("+courseName+")");
        showMessage('Course Updated', true);
    }
    function updateAccommodation(){
        var accommodationFee = getValue('.accommodation_type', 'accommodationPerWeek');
        var accommodationWeeks = $('.accommodation_weeks').val();
        var accommodationCharges = accommodationFee * accommodationWeeks;
        if(accommodationCharges == 0){
            $('.accommodation_section').hide(250);
        } else {
            $('#accommodation_fee').text(getNumber(accommodationCharges));
            $('.accommodation_section').show(250);
        }
        showMessage('Accommodation Updated', true);
    }
    $('.take_this_course').on('click', function(){
        var courseName = $(this).data('courseName');
        // console.log(courseName);
        $('.calc_courses').val(courseName);
        $('.calc_courses').trigger('change');
    });
    $('.table_accommodation').on('click', function(){
        var accommodation = $(this).data('accommodation');
        // console.log(accommodation);
        $('.accommodation_type').val(accommodation);
        $('.accommodation_type').trigger('change');
        $('.accommodation_weeks').val(1);
        $('.accommodation_weeks').trigger('change');
    });
    $('.table_visa').on('click', function(){
        var visaType = $(this).data('visaType');
        // console.log(visaType);
        $('.visa_fee').val(visaType);
        $('.visa_fee').trigger('change');
    });
    $('.table_insurance').on('click', function(){
        var insuranceType = $(this).data('insuranceType');
        // console.log(insuranceType);
        $('.insurance_fee').val(insuranceType);
        $('.insurance_fee').trigger('change');
    });

    $('.table_transport').on('click', function(){
        var transportType = $(this).data('transportType');
        // console.log(transportType);
        $('.transport_price').val(transportType);
        $('.transport_price').trigger('change');
    });
    function getNumber(num) {
        num = parseFloat(num);
        var n = num.toFixed(2);
        return n;
    }
    $('.remove_calc_item').on('click', function(){
        var selector = $(this).data('selector');
        switch(selector){
            case '.accommodation_type':
                $('.table_accommodation').removeClass('activeCart');
                break;
            case '.insurance_fee':
                $('.table_insurance').removeClass('activeCart');
                break;
            case '.visa_fee':
                $('.table_visa').removeClass('activeCart');
                break;
            case '.transport_price':
                $('.table_transport').removeClass('activeCart');
                break;
        }
        $(selector).prop('selectedIndex', 0);
        $(selector).trigger('change');
    });
    function getPercent(amount, percent){
        amount = parseInt(amount);
        percent = parseInt(percent);
        return (percent*amount/100).toFixed(2);
    }

    function showMessage(message, type){
        if(type === true){
            $('.success-toast-text').text(message);
            $('.success-toast').show(250);
            setTimeout(function() {
                $(".success-toast").hide(250);
                $('.success-toast-text').text("");
            }, 3000);

        } else {
            $('.failed-toast-text').text(message);
            $('.failed-toast').show(250);
            setTimeout(function() {
                $(".failed-toast").hide(250);
                $('.failed-toast-text').text("");
            }, 3000);
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;"></script>
<script type="text/javascript">
    function initMap() {
        var geocoder = new google.maps.Geocoder();
        var address = $('#address').text();
        var lat;
        var lng;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
            }
            var latlng = new google.maps.LatLng(lat, lng);
            var map = new google.maps.Map(document.getElementById('schoolmap'), {
                center: latlng,
                zoom: 13
            });
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('schoolpano'), {
                position: latlng,
                pov: {
                    heading: 34,
                    pitch: 10
                }
            });
            map.setStreetView(panorama);
            // var markerPath =
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
                anchorPoint: new google.maps.Point(0, -29),
                icon: {
                    url: '{{ asset("map-marker.png") }}'
                }
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function() {
                var iwContent = '<div id="iw_container">' +
                    '<div class="iw_title"><b>{{ getLocalizedString($school, 'name') }}</b><br />' + address + '</div></div>';
                // including content to the infowindow
                infowindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infowindow.open(map, marker);
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initMap);
    $('.courseSeclection').bind('click', function () {
        $('.courseSeclection').removeClass('activeCourse')
        $(this).addClass('activeCourse');
    });
    $('.addingCart').bind('click', function () {
        $('.addingCart').removeClass('activeCart')
        $(this).addClass('activeCart');
    });
    $('.addingCartOthers').bind('click', function () {
        $('.addingCartOthers').removeClass('activeCart')
        $(this).addClass('activeCart');
    });
    $('.addingCartInsurance').bind('click', function () {
        $('.addingCartInsurance').removeClass('activeCart')
        $(this).addClass('activeCart');
    });
    $('.addingCartTransportation').bind('click', function () {
        $('.addingCartTransportation').removeClass('activeCart')
        $(this).addClass('activeCart');
    });

    // $(".").click(function(){
    // $(".clampHiden").toggleClass("remove-clip");
    // });
    $(document).ready(function(){
        $('.addingclipiing').click(function(){
            var tagid = $(this).data('tag');
            var atagid =  $(this).data('atag');
            $('#'+atagid).toggleClass("red-more-less");
            $('#'+tagid).toggleClass("remove-clip");
        });
    });
    $(document).ready(function(){
        $('.addingclipiing2').click(function(){
            var tagid = $(this).data('tags');
            var atagid =  $(this).data('atags');
            $('#'+atagid).toggleClass("red-more-less");
            $('#'+tagid).toggleClass("remove-clip");
        });
    });
    $(document).ready(function(){
        $('.addingclipiing3').click(function(){
            var tagid = $(this).data('tages');
            var atagid =  $(this).data('atages');
            $('#'+atagid).toggleClass("red-more-less");
            $('#'+tagid).toggleClass("remove-clip");
        });
    });
    $(document).ready(function(){
        $('.aroow-clps').click(function(){
            var tagid = $(this).data('adtionl');
            var atagid =  $(this).data('atcart');
            var arwtagid =  $(this).data('arwtagid');
            $('#'+arwtagid).toggleClass("red-more-less");
            $('#'+atagid).toggleClass("d-none");
            $('#'+tagid).toggleClass("d-none");
        });
    });


</script>
<script>
$( document ).ready(function() {
	$('.tabs_dd').on('change', function() {
		 $('.tab').removeClass('active');
		 var tabs_id = $(".tabs_dd option:selected").attr('data');
		 $(tabs_id).addClass('active');
         $('html, body').animate({scrollTop: $(tabs_id).offset().top-150}, 500);
    });
    
    $('#from').datepicker({
        firstDay: 1,
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [(day == 1)];
        }
    });
});

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    function getPriceSlab(weeks){
        var slab = 'ppw1';
        if(weeks > 0){
            if(weeks >= 1 && weeks <= 4){
                slab = 'ppw1';
            } else if (weeks >= 5 && weeks <= 8){
                slab = 'ppw2';
            } else if (weeks >= 9 && weeks <= 12){
                slab = 'ppw3';
            } else if (weeks >= 13 && weeks <= 16){
                slab = 'ppw4';
            } else if (weeks >= 17 && weeks <= 20){
                slab = 'ppw5';
            } else if (weeks >= 21 && weeks <= 24){
                slab = 'ppw6';
            } else if (weeks >= 25 && weeks <= 28){
                slab = 'ppw7';
            } else if (weeks >= 29 && weeks <= 32){
                slab = 'ppw8';
            } else if (weeks >= 33 && weeks <= 36){
                slab = 'ppw9';
            } else if (weeks >= 37 && weeks <= 40){
                slab = 'ppw10';
            } else if (weeks >= 41 && weeks <= 44){
                slab = 'ppw11';
            } else if (weeks >= 45 && weeks <= 48){
                slab = 'ppw12';
            } else if (weeks >= 49 && weeks <= 52){
                slab = 'ppw13';
            } else {
                slab = 'ppw1';
            }
        } else {
            slab = 'ppw1';
        }
        return slab;
    }

    // bar chart
// ===========================
google.charts.load('current', { packages: ['corechart', 'bar'] });
google.charts.setOnLoadCallback(barChart);

function barChart() {
    var nationalitiesData = [
        ['Opening Move', 'Percentage', { role: 'style' }],
        @foreach($school_history as $nationality)
        ['{{ $nationality->country_id }}', {{ $nationality->no_of_student }}, '' ],
        @endforeach
        ];
    var data = new google.visualization.arrayToDataTable(
        nationalitiesData
    );

    var options = {
        chartArea: {
            width: '100%',
            left: 120, // adjust to display names
            //top: 0,
            //bottom: 20
        },
        width: '95%',
        height: 320,
        legend: { position: 'none' },
        hAxis: {
            // title: 'Percentage',
            format: 'short',
            // ticks: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            // max: 13
        },
        vAxis: {
            title: 'Nationalities'
        },
        bar: { groupWidth: "79%" },
        colors: ['#107786', '#107786', '#107786', '#107786', '#107786', '#107786']
    };

    var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
    chart.draw(data, options);
}


</script>

@endsection
