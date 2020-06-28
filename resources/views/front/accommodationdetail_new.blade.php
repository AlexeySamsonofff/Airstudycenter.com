@extends('front.index1_new')

@section('title', getLocalizedString($accommodation, 'name'))

@section('content')
<section class="mt-10">
    <div id="bg-clr">
        @include('front.layout.navigation')
    </div>
    <div class="container p-0 mt-2">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0">
                <div class="w-85">
                    <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                        <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent">
                            <span class="breadcrumb-item"><a href="#">@lang('school.home')</a></span>
                            <!-- <span class="breadcrumb-item"><a href="#">@lang('school.accommodation')</a></span> -->
                            <span class="breadcrumb-item" aria-current="page">{{ getLocalizedString($accommodation, 'name') }}</span>
                        </p>
                    </nav>
                    <div class="upperDetail">
                        <input type="hidden" id="acco_hid" value="{{$accommodation->id }}">
                        <img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle ">
                        <div class="row m-0">
                            <div class="col-9 pl-0 pr-1">
                                <h3 class="font-weight-bold HeadingS1 mb-1" ><span class="equenyname">{{ getLocalizedString($accommodation, 'name') }}</span>
                                    <span style="font-size: 12px; vertical-align: 7px; padding: 5px 8px !important;" class="inner-type p-2 d-inline-block bg-primary ml-2 rounded text-white">{{ $getacc_type->acc_type }}</span>
                                </h3>
                                <p class="mb-2" style="color:#8398B6;"><i class="fas fa-map-marker-alt pr-1"></i><span id="address">{{$accommodation->address}}, {{$accommodation->city}}, {{$accommodation->country}}</span></p>
                                @php
                                $alltotal = $review_rate+$review_rate1+$review_rate2+$review_rate3;
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
                                    </span>
                                    <span style="color:#8398B6; font-weight:bold;" class="pl-2 ">{{ $count_total_reviews}} @lang('accommodation.reviews')</span>
                                </p>
                            </div>
                            <div class="col-3 pl-1 pr-0">
                                <h3 class="HeadingS1 mb-1 text-right"><span class="font-weight-bold ">£<p class="priceval">{{ $getacc_type->price }}</p></span><span class="font-weight-light"> p/w </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="tabs coursesa " style="margin-bottom:1em">
                        <nav role='navigation' class="  d-lg-block d-none  tabse p-0  mb-5 transformer-tabs bg-transparent sticky-accordian-top">
                            <ul class="p-0 m-0 border-0 normal-tabs d-inline-block shadow rounded bg-white">
                                <li class="p-0 m-0"><a href="#tab-3" class="active"><i class="far fa-info"></i>@lang('accommodation.general')</a></li>
                                <li class="p-0 m-0"><a href="#tab-1"><i class="far fa-star"></i>@lang('accommodation.reviews')</a></li>
                            </ul>
                        </nav>
                        <div class="mbl-tab shadow mb-4 d-lg-none d-block">
                            <select class="tabs_dd">
                                <option value="general" data="#tab-3">@lang('accommodation.general')</option>
                                <option value="reviews" data="#tab-1">@lang('accommodation.reviews')</option>
                            </select>
                        </div>
                        <div id="tab-3" class="tab active">
                            {{-- @php print_r($accommodation) @endphp --}}
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('accommodation.about')</h3>
                            <p class="AboutclampHiden aboutstyling mb-2" id="hereAdd">{{ getLocalizedString($accommodation, 'description', true) }}</p>
                            <p class="clr-primry" id="addingclip"><span class="show-more">Read more</span><span  class="show-less">Read less</span></p>
                            <div class="mt-5 mb-5 w-100"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-1">@lang('accommodation.facilities') </h3>
                            <div class="row m-0 mt-3">
                                @if(count($facilities) > 0)
                                @foreach($facilities as $facility)
                                <div class="col-6 mb-3 col-lg-3 pl-0">
                                    <div class="iconFac row m-0 position-relative">
                                        <div class="col-3 col-lg-3 p-0">
                                            <i class="bg-light rounded-circle {{$facility->facility_icon}}"></i>
                                        </div>
                                        <div class="col-9 col-lg-9 pl-2 pr-0 sir-dard" style="font-size: 14px; color: #687AA0;">
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
                                    @if(count($accommodationimages) > 0)
                                        @foreach($accommodationimages as $image)
                                        <div class="col-lg-4 col-6 {{ $loop->iteration > 5 ? "d-none" : "" }}">
                                            <a class="image photo-zoom" href="{{asset('thumbnail_images/'.$image->image)}}">
                                                <img src="{{asset('normal_images/'.$image->image)}}" alt="" />
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                    {{-- @if($school->video)
                                    <div class="col-lg-4 col-6 ">
                                        <a href="{{ $school->video }}" data-type="video" class="video photo-zoom" title="This is a video">
                                            <img src="{{asset('normal_images/'.$image)}}" alt="" />
                                        </a>
                                    </div>
                                    @endif --}}
                                </div>
                            </div>

                            <div class="mt-5 mb-5 w-100"></div>
                            <h3 class="font-weight-bold HeadingS1 mb-4">@lang('accommodation.map')</h3>
                            <div id="accommodationmap" style="height:450px;" class="w-100"></div>
                        </div>


                    <div id="tab-1" class="tab">
                        <h3 class="font-weight-bold d-none d-md-block HeadingS1 mt-4">@lang('accommodation.overall_reviews')</h3>
                        <div class="d-none d-md-flex row m-0 reviws-top font-weight-bold mt-3">
                            <div class="col-lg-6 p-0">
                                <p>
                                    <span class="float-left">@lang('accommodation.friendliness')</span> <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 20px;"></span>
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
                                    <span class="float-left">@lang('accommodation.accuracy')</span>
                                    <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 43px;"></span>
                                        @php $orgReview = getOverallReviewMean($review_rate1); @endphp
                                        @if($orgReview != 0)
                                            @for($i = 1 ; $i <= $orgReview[0] ; $i++) <i class="fas fa-star"></i> @endfor
                                            @if($orgReview[1] > 0)
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif
                                            @if($orgReview[3] > 0)
                                                @for($j = 0 ; $j < $orgReview[3] ; $j++) <i class="far fa-star"></i> @endfor
                                            @endif
                                        @else
                                            @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i> @endfor
                                        @endif
                                    </span>
                                    <div class="clearfix"></div>
                                </p>
                                <p>
                                    <span class="float-left">@lang('accommodation.value')</span>
                                    <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 69px;"></span>
                                        @php $actReview = getOverallReviewMean($review_rate2); @endphp
                                            @if($actReview != 0)
                                                @for($i = 1 ; $i <= $actReview[0] ; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if($actReview[1] > 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($actReview[3] > 0)
                                                    @for($j = 0 ; $j < $actReview[3] ; $j++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                @endif
                                            @else
                                                @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif
                                    </span>
                                    <div class="clearfix"></div>
                                </p>
                            </div>
                            <div class="col-lg-6 p-0">
                                <p>
                                    <span class="float-left">@lang('accommodation.communication')</span>
                                    <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 28px;"></span>
                                        @php $corQualityReview = getOverallReviewMean($review_rate3); @endphp
                                            @if($corQualityReview != 0)
                                                @for($i = 1 ; $i <= $corQualityReview[0] ; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if($corQualityReview[1] > 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($corQualityReview[3] > 0)
                                                    @for($j = 0 ; $j < $corQualityReview[3] ; $j++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                @endif
                                            @else
                                                @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif
                                    </span>
                                    <div class="clearfix"></div>
                                </p>
                                <p>
                                    <span class="float-left">@lang('accommodation.location')</span>
                                    <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 16px;"></span>
                                        {{-- @php $accReview = getOverallReviewMean($review_rate4); @endphp
                                            @if($accReview != 0)
                                                @for($i = 1 ; $i <= $accReview[0] ; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if($accReview[1] > 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($accReview[3] > 0)
                                                    @for($j = 0 ; $j < $accReview[3] ; $j++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                @endif
                                            @else
                                                @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif --}}
                                    </span>
                                    <div class="clearfix"></div>
                                </p>
                                <p>
                                    <span class="float-left">@lang('accommodation.cleanliness')</span>
                                    <span class="float-lg-left float-right">
                                        <span class="d-none d-md-inline" style="padding-left: 77px;"></span>
                                        {{-- @php $facReview = getOverallReviewMean($review_rate2); @endphp
                                            @if($facReview != 0)
                                                @for($i = 1 ; $i <= $facReview[0] ; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if($facReview[1] > 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @if($facReview[3] > 0)
                                                    @for($j = 0 ; $j < $facReview[3] ; $j++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                @endif
                                            @else
                                                @for($i = 1 ; $i <= 5 ; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif --}}
                                    </span>
                                    <div class="clearfix"></div>
                                </p>
                            </div>
                            <div class="mt-4  w-100" style="border-top:1px solid #D7E8EB;"></div>
                        </div>
                        <h3 class="font-weight-bold HeadingS1 mt-4">@lang('accommodation.comments')</h3>
                        <small style="color:#243B6B;">Showing {{count($reviews)}} of {{count($reviews)}} </small>

                        <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">
                            @foreach($reviews as $review)
                            @php
                                $alltotal = $review->rate+$review->rate1+$review->rate2+$review->rate3;
                                $getaverage = $alltotal/4;
                                $reviewMean = getOverallReviewMean($getaverage);
                            @endphp
                            <div class="check pt-1 mt-3 mb-3">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab" id="review_{{ $loop->iteration }}">
                                        <h4 class="panel-title">
                                            <a class="collapsed review pl-0 pr-0" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#rev_{{ $loop->iteration }}" aria-expanded="false" aria-controls="rev_{{ $loop->iteration }}">
                                                <div class="row m-0">
                                                    <div class="col-lg-1 col-sm-2 col-3 p-0 text-center">
                                                        @php $userimage = App\User::where('id',$review->user_id)->first(); @endphp
                                                            @if($userimage)
                                                                <img src="{{$userimage->image}}" class="rounded-circle border border-light text-center" style="width:35px; height:35px;" alt="">
                                                        @else
                                                        <img src="{{asset('front/images/man.png')}}" class="rounded-circle border border-light text-center" style="width:35px; height:35px;" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-11 col-sm-10 col-9 p-0 pr-2 widthing">
                                                        <div class="row m-0 ">
                                                            <div class="col-6 p-0">
                                                                <p class="cmntName mb-0"><span class="font-weight-bold" style="color:#2A354F;  font-size: 16px;">{{$review->name}}</span> <br class="d-lg-none d-block">
                                                                    <span class="font-weight-normal ml-lg-3" style="color:#687AA0; font-size: 12px;">{{ $review->updated_at->diffForHumans() }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="col-6 p-0 pr-3 star text-right">
                                                                @if($reviewMean != 0)
                                                                    @for($i = 1 ; $i <= $reviewMean[0] ; $i++)
                                                                        <i class="fas fa-star"></i>
                                                                    @endfor
                                                                    @if($reviewMean[1] > 0)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @endif
                                                                    @if($reviewMean[3] > 0)
                                                                        @for($j = 0 ; $j < $reviewMean[3] ; $j++)
                                                                            <i class="far fa-star"></i>
                                                                        @endfor
                                                                    @endif
                                                                @else
                                                                    @for($i = 1 ; $i <= 5 ; $i++)
                                                                        <i class="far fa-star"></i>
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
                                                                <span class="float-left">@lang('accommodation.friendliness')</span>
                                                                <span class="float-lg-left float-right">
                                                                    <span class="d-none d-md-inline" style="padding-left: 15px;"></span>
                                                                    @if($review->rate)
                                                                            @for($i=1;$i<=($review->rate);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate;$i<5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @else
                                                                            @for($i=1;$i<=5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @endif
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p>
                                                                <span class="float-left">@lang('accommodation.accuracy')</span>
                                                                <span class="float-lg-left float-right">
                                                                    <span class="d-none d-md-inline" style="padding-left: 38px;"></span>
                                                                    @if($review->rate1)
                                                                            @for($i=1;$i<=($review->rate1);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate1;$i<5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @else
                                                                            @for($i=1;$i<=5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @endif
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p>
                                                                <span class="float-left">@lang('accommodation.value')</span>
                                                                <span class="float-lg-left float-right">
                                                                    <span class="d-none d-md-inline" style="padding-left: 65px;"></span>
                                                                    @if($review->rate2)
                                                                            @for($i=1;$i<=($review->rate2);$i++)
                                                                            <i class="fas fa-star"></i>
                                                                            @endfor
                                                                            @for($i=$review->rate2;$i<5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @else
                                                                            @for($i=1;$i<=5;$i++)
                                                                            <i class="far fa-star"></i>
                                                                            @endfor
                                                                        @endif
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-6 p-0">
                                                            <p>
                                                                <span class="float-left">@lang('accommodation.communication')</span>
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
                                                            <p> <span class="float-left">@lang('accommodation.location')</span>
                                                                <span class="float-lg-left float-right">
                                                                    <span class="d-none d-md-inline" style="padding-left: 16px;"></span>
                                                                    {{-- @if($review->rate4)
                                                                    @for($i=1;$i<=($review->rate4);$i++)
                                                                        <i class="fas fa-star"></i>
                                                                        @endfor
                                                                        @for($i=$review->rate4;$i<5;$i++) <i class="far fa-star"></i>
                                                                            @endfor
                                                                            @else
                                                                            @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @endif --}}
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p>
                                                                <span class="float-left">@lang('accommodation.cleanliness')</span>
                                                                <span class="float-lg-left float-right">
                                                                    <span class="d-none d-md-inline" style="padding-left: 77px;"></span>
                                                                    {{-- @if($review->rate5)
                                                                    @for($i=1;$i<=($review->rate2);$i++)
                                                                        <i class="fas fa-star"></i>
                                                                        @endfor
                                                                        @for($i=$review->rate2;$i<5;$i++) <i class="far fa-star"></i>
                                                                            @endfor
                                                                            @else
                                                                            @for($i=1;$i<=5;$i++) <i class="far fa-star"></i>
                                                                                @endfor
                                                                                @endif --}}
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
                </div>

            </div>
        </div>
        <div class="col-md-4 ">
            <!-- <div class="d-md-none block w-100" style="height:99px; "></div> -->
            {{-- @php print_r($getaccommodationprice->toArray()) @endphp --}}
            <div class="to-stick-calcutater" style="position: sticky;">
                <div class="Enquiery bg-primary p-2 text-white mb-3 mt-3">
                    <h3 class="text-center  mt-3 mb-3" style="font-weight: 800;">@lang('accommodation.your_enquiry')</h3>
                    <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                            <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation-type" name="room" id="">
                                <option value="">@lang('accommodation.st2')</option>
                                @foreach($getaccommodationprice as $accommodation)
                                <option value="{{ $accommodation->typename }}" data-acco-id ="{{ $accommodation->id}}"  data-price-without-catering="{{ $accommodation->price }}" data-price-with-catering="{{ $accommodation->pricewith }}">{{ getLocalizedString($accommodation, 'typename') }} </option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                            <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 catering-type" name="catering_type" id="enquiery_cat_type">
                                <option value="">@lang('accommodation.catering_type')</option>
                                <option value="priceWithoutCatering" data-catering-type="@lang('accommodation.without_catering')">@lang('accommodation.without_catering')</option>
                                <option value="priceWithCatering" data-catering-type="@lang('accommodation.self_catering')">@lang('accommodation.self_catering')</option>
                            </select>
                        </div>

                        <div class="dATEp m-2 mt-3 mb-3">
                        <div class="input-group bg-white" id="dateMusibt">   
                                    <input class="form-control bg-transparent rounded-0 border-0" type="text"   placeholder="Accommodation start date" id="from" name="from">
                                </div>    
                            <!-- <div class="input-group date" id="datepicker">
                                <input class="form-control rounded-0 border-0 accoumodationDate" style="height: 36px; font-size: 14px;" placeholder="Accommodation start date" />
                                <span class="input-group-append input-group-addon">
                                    <span class="input-group-text rounded-0 border-0"><i class="far fa-calendar-alt"></i></span>
                                </span>
                            </div> -->
                        </div>
                        <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                            <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation-duration" name="duration" id="">
                                <option value="">@lang('accommodation.select_duration')</option>
                                @for($i = 1 ; $i <= 52 ; $i++)
                                <option value="{{ $i }}">{{$i}} @lang('header.week')</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row m-0 texting pl-2 pr-2 pb-3">
                        <div class="col-md-12 col-12">
                            {{-- <div class="row">
                                <div class="col-8 p-0"> Weeks x Y</div>
                                <div class="col-3 p-0 text-right">£00.00</div>
                                <div class="col-1 p-0 text-right"><i class="far fa-times"></i> </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-8 p-0 text-white"> TOTAL</div>
                                <div class="col-4 p-0 text-white text-right">£<span id="cart_total">0.00</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-2 pb-3 pr-2">
                        <button class="btn btn-block btn-lg btn-Book rounded-0 " onclick="Enquiry()" >Check availability</button>
                    </div>

                </div>
                <?php 
                if (Auth::check()) {
                    $id = auth::user()->id;
                }
                ?>
                @if(Auth::check())
                <div class="text-center"> <a href="" class="text-primary"> Contact Host</a></div>
                <input type="hidden" id="auth_id" value="{{$id}} ">
                @else
                <input type="hidden" id="auth_id" value="">                
                @endif
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="enquiry_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog enquiryModal" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #2A354F !important; font-size: 35px !important; opacity: 1;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rqstBody pl-4 pr-4 pb-3">
                <h2 class="font-weight-bold HeadingS1 mb-2" style="font-size: 26px;">Your enquiry for:</h2>
                @if(Auth::check())
                    @include('front.accommodation.auth_enquiry')
                @else
                    @include('front.accommodation.none_enquiry')
                @endif
            </div>
           <!-- end modal body -->
        </div>
    </div>
</div>
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
            var map = new google.maps.Map(document.getElementById('accommodationmap'), {
                center: latlng,
                zoom: 13
            });
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
                    '<div class="iw_title"><b>{{ getLocalizedString($accommodation, ' name ') }}</b><br />' + address + '</div></div>';
                // including content to the infowindow
                infowindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infowindow.open(map, marker);
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initMap);
</script>
<script>
    $('.accommodation-type').on('change', function(){
        updateSelects();
        updateTotal();
    });
    $('.catering-type').on('change', function(){
        updateTotal();
    });
    $('.accommodation-duration').on('change', function(){
        updateTotal();
    });

    function updateTotal(){
        var withCatering = 0.00;
        var withoutCatering = 0.00;
        var accommodationDuration = $('.accommodation-duration').val();
        var cateringType = $('.catering-type').val();
        var accommodationPrice = getNumber(getValue('.accommodation-type', cateringType) * accommodationDuration);
        console.log(accommodationPrice);
        $('#cart_total').text(getNumber(accommodationPrice));
    }

    function updateSelects(){
        var cateringType = $('.catering-type').val();
        var accommodationPeriod = $('.accommodation-duration').val();
        
        if(cateringType === ""){
            $('.catering-type :nth-child(3)').prop('selected', true);
            $('.catering-type').trigger('change');
        }

        if(accommodationPeriod === ""){
            $('.accommodation-duration :nth-child(2)').prop('selected', true);
            $('.accommodation-duration').trigger('change');
        }
    }

    function getValue(selector, dataAttrName){
        var value = $(selector).find(':selected').data(dataAttrName);
        if(typeof value == 'undefined'){
            return 0;
        } else {
            return value;
        }
    }

    function getNumber(num) {
        num = parseFloat(num);
        var n = num.toFixed(2);
        return n;
    }
</script>
<script>

$( document ).ready(function() {
	$('.tabs_dd').on('change', function() {
		 $('.tab').removeClass('active');
		 var tabs_id = $(".tabs_dd option:selected").attr('data');
         $(tabs_id).addClass('active');
         $('html, body').animate({scrollTop: $(tabs_id).offset().top-150}, 500);
	});
});
</script>
<script>  
    var user_id;
    function Enquiry() {
        var sel_type = $('.accommodation-type').val();
         var cat_type =$('.catering-type').val();
         var name =$('.equenyname').text();
         var address =$('#address').html();
         var price =$('.priceval').text();
         var date =$('#from').val();
         var duration =$('.accommodation-duration').val(); 
         var total_price =$('#cart_total').text();
         var message =$('#message').text();
         user_id = $('#auth_id').val();  
         var receiver_id =$('#acco_hid').val();
        
        $('#acco_id').val(receiver_id);           
        
        $('.enquiryname_e').text(name); 
        $('.enquiryname_e').val(name); 
        $('.address').text(address);
        $('.address').val(address);
        $('.sel_type').text(sel_type);
        $('#sel_type').val(sel_type);
        $('.accFood').text(cat_type);
        $('#accFood').val(cat_type);
        $('.date').text(date);
        $('#date').val(date);
        $('.duration').text(duration);
        $('#duration').val(duration);
        $('.price').text(price);     
        $('.price').val(price);     
        $('.total_price').text(total_price);     
        $('.total_price').val(total_price); 
        $('#type_id').val(getValue('.accommodation-type').accoId)   

        $('#enquiry_modal').modal();        
    }
    
    $('#checkbtn').on('click', function(){              
        if(user_id === ""){
            $('#block1').css('display','none');
            $('#block2').css('display','block');
        }        
    });   
   
    function showback() {
        $('#block2').css('display','none');
        $('#block1').css('display', 'block');
    }   
  
    
</script>
@endsection