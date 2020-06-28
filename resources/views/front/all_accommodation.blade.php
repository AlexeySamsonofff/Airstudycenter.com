@extends('front.index1_new')
@section('title', 'Accommodations')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<section>
    <div class="container p-0 accdin-result">
        <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
            <p class="breadcrumb text-break d-inline-block pl-md-0 bg-transparent">
                <span class="breadcrumb-item"><a href="{{ route('mainhome') }}">@lang('school.home')</a></span>
                <span class="breadcrumb-item" aria-current="page">Accommodations</span>
            </p>
        </nav>
        <form action="">
            @csrf
            <input type="hidden" name="search_accommodation" value="true">
            <div class="row pt-0 pb-4 m-0">
                <div class="col-md-3 pb-md-0 pb-2 pl-md-0 ">
                    <div class=" serchDropdownAfter searcha btn-white border-after">
                        <select class="serchDropdown course-result-dropdown pr-3 form-control btn w-100 text-left text-muted rounded-0" name="search_city" id="search_city">
                            <option value="">Select City</option>
                            @foreach($accommodationCities as $accommodationCity)
                            <option value="{{ $accommodationCity->city_id }}" {{ Request::get('search_city') == $accommodationCity->city_id ? "selected" : "" }}>{{ $accommodationCity->cityName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 pb-md-0 pb-2 ">
                    <div class="dATEp">
                        <div class="input-group bg-white course-result-dropdown" style="padding:0px !important;" id="dateMusibt">
                            <input class="form-control font-weight-normal bg-transparent w-100 rounded-0 border-0 pr-4" type="text" placeholder="Choose your duration" id="afrom" name="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pb-md-0 pb-2">
                    <div class=" serchDropdownAfter searcha btn-white border-after">
                        <select class="serchDropdown course-result-dropdown pr-3 form-control btn w-100 text-left text-muted rounded-0" name="accommodation_type" id="accommodation_type">
                            <option value="">Accommodation Type</option>
                            @foreach($accommodationsTypes as $accommodationsType)
                            <option value="{{ $accommodationsType->id }}" {{ Request::get('accommodation_type') == $accommodationsType->id ? "selected" : "" }}> {{ $accommodationsType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 pr-md-0 text-md-right">
                    <button type="submit" class="text-center btn rounded-0 btn-Book find-all d-block d-md-inline-block text-center  btnBlog" style="padding: 5px 19px;">Find </button>
                </div>
                {{-- <div class="col-md-3 pl-md-0">
                    <div class=" serchDropdownAfter searcha btn-white border-after">
                        <select class="serchDropdown font-weight-bold course-result-dropdown pr-3 form-control btn w-100 text-left text-muted rounded-0" name="search_city" id="search_city">
                            <option value="">Select City</option>
                            @foreach($accommodationCities as $accommodationCity)
                            <option value="{{ $accommodationCity->city_id }}" {{ Request::get('search_city') == $accommodationCity->city_id ? "selected" : "" }}>{{ $accommodationCity->cityName }}</option>
                @endforeach
                </select>
            </div>
    </div>
    <div class="col-md-3 ">
        <div class="dATEp">
            <div class="input-group bg-white course-result-dropdown" style="padding:0px !important;" id="dateMusibt">
                <input class="form-control bg-transparent w-100 rounded-0 border-0" type="text" placeholder="Choose your duration" id="afrom" name="">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class=" serchDropdownAfter searcha btn-white border-after">
            <select class="serchDropdown font-weight-bold course-result-dropdown pr-3 form-control btn w-100 text-left text-muted rounded-0" name="accommodation_type" id="accommodation_type">
                <option value="">Accommodation Type</option>
                @foreach($accommodationsTypes as $accommodationsType)
                <option value="{{ $accommodationsType->id }}" {{ Request::get('accommodation_type') == $accommodationsType->id ? "selected" : "" }}> {{ $accommodationsType->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3 pr-md-0 text-md-right">
        <button type="submit" class="text-center btn rounded-0 btn-Book d-block d-md-inline-block text-center btnBlog" style="padding: 5px 19px;">Find </button>
    </div> --}}
    </div>
    </form>
    <div class="row m-0 mb-5">
        <div class="col-md-9 pl-md-0 pb-4 pr-0">
            <div class="pr-md-s">
                <div class="tabs coursesa" style="margin-bottom:1em">
                    <div class="d-block mb-4">
                        <div class="row m-0">
                            <div class="col-md-8 col-9 p-0 result_counts">
                                <small class="d-inline-block pt-1" style="color:#6779A1; font-size: 16px;">Showing {{ $accommodations->firstItem() }} - {{ $accommodations->lastItem() }} of {{ $accommodations->total() }} results</small>
                            </div>
                            <div class="col-md-4 col-3 pl-0 text-right">
                                <nav role='navigation' class="tabse p-0 mb-0 transformer-tabs bg-transparent sticky-accordian-top">
                                    <ul class="p-0 m-0 border-0 normal-tabs d-inline-block shadow rounded bg-white">
                                        <li class="p-0 m-0"><a href="#tab-3" class="active"><i class="fas fa-th-large"></i></a></li>
                                        <li class="p-0 m-0"><a href="#tab-1"><i class="far fa-map-marker-alt"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab active">
                        <div class="row m-0 cards-host" id="all_accommodations_container">
                            @foreach($accommodations as $accommodation)
                            {{-- @php print_r($accommodation); die; @endphp --}}
                            <div class="col-lg-4 col-sm-6 mt-4 mb-4 pl-0">
                                <!-- <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark"> -->
                                    <div class="card productHeight m-auto bg-white">
                                        <div class="imgBlock position-relative mb-4">
                                            @if(Auth::check())
                                            <a href="#" onclick="favorite({{$accommodation->id}})"><div class="heart"><i id="acc{{$accommodation->id}}" class="{{$accommodation->favCss}} fa-heart" aria-hidden="true"></i></div></a>
                                            @else
                                            <div class="heart dnt-hover-heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                            @endif

                                            <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark">
                                            @if($accommodation->image != null)
                                                <img src="{{asset('thumbnail_images/'.$accommodation->image)}}" class="w-100" alt="General English – Elementary" style="object-fit: scale-down !important">
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
                                                    <span class="starr">
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
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-1" class="tab">
                        <div id="accomodation-result" class="border w-100" style="height:678px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124918.80690835493!2d74.4842022725707!3d32.77904120086372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8e4c90b331f00c15!2sGreen%20Centre!5e0!3m2!1sen!2s!4v1579680272631!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                        {{ $accommodations->links() }}
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-3 pr-md-0 colpasd-acodn">
            <div class="d-none d-md-block w-100" style="height:60px; "></div>
            <form action="" id="accommodation_filter">
                {{-- <input type="hidden" id="search_accommodation" value="true"> --}}
                <input type="hidden" id="search_city" value="{{ Request::get('search_city')}}">
                <input type="hidden" id="accommodation_type" value="{{ Request::get('accommodation_type')}}">
                <div class="to-stick-calcutater" style="position: sticky;">
                    <div class="panel-group w-100 " id="accordionMenu" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading " role="tab" id="sidebar-1" style="height:46px; overflow:hidden;">
                                <h4 class="panel-title">
                                    <a class="collapsed review pl-3 pr-3 side-heading" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-1" aria-expanded="false" aria-controls="sdbar-1">
                                        Price Range
                                    </a>
                                </h4>
                            </div>
                            <div id="sdbar-1" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-1">
                                <div class="panel-body cmntBody range-Sllider pl-3 pr-3 pb-3">
                                    <div class="pt-4 mt-2 pb-4 ">
                                        <div id="slider" data-min="20" data-max="1000" ></div>
                                        {{-- <div id="slider" data-min="{{ $minPrice }}" data-max="{{ $maxPrice }}"></div> --}}
                                    </div>
                                    <small class="text-white" style="font-size: 14px;">*Prices are for per week</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading " role="tab" id="sidebar-2" style="height:46px; overflow:hidden;">
                                <h4 class="panel-title">
                                    <a class="collapsed review pl-3 pr-3 side-heading" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-2" aria-expanded="false" aria-controls="sdbar-2">
                                        Rating
                                    </a>
                                </h4>
                            </div>
                            <div id="sdbar-2" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-2">
                                <div class="panel-body cmntBody  pl-3 pr-3 pb-3 side-rating">
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            <span class="text-white" style="font-size:12px;">(12)</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            <span class="text-white" style="font-size:12px;">(12)</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            <span class="text-white" style="font-size:12px;">(12)</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            <span class="text-white" style="font-size:12px;">(12)</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                            <span class="text-white" style="font-size:12px;">(12)</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading " role="tab" id="sidebar-3" style="height:46px; overflow:hidden;">
                                <h4 class="panel-title">
                                    <a class="collapsed review pl-3 pr-3 side-heading" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-3" aria-expanded="false" aria-controls="sdbar-3">
                                        Facilities
                                    </a>
                                </h4>
                            </div>
                            <div id="sdbar-3" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-3">
                                <div class="panel-body cmntBody  pl-3 pr-3 pb-3 side-rating" id="accommodation_facilities">
                                    @foreach($accommodationsFacilities as $accommodationFacility)
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <span class="text-white" style="font-size:15px;">{{ getLocalizedString($accommodationFacility, 'name') }}</span>
                                            <input type="checkbox" name="accommodation_facilities[]" value="{{ $accommodationFacility->id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading " role="tab" id="sidebar-4" style="height:46px; overflow:hidden;">
                                <h4 class="panel-title">
                                    <a class="collapsed review pl-3 pr-3 side-heading" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-4" aria-expanded="false" aria-controls="sdbar-4">
                                        Property type
                                    </a>
                                </h4>
                            </div>
                            <div id="sdbar-4" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-4">
                                <div class="panel-body cmntBody  pl-3 pr-3 pb-3 side-rating" id="property_types">
                                    @foreach($accommodationPropertyTypes as $propertyType)
                                    <p class="m-0">
                                        <label class="container-checkbox star ">
                                            <span class="text-white" style="font-size:15px;">{{ $propertyType->name }}</span>
                                            <input type="checkbox" class="property_type" name="property_type[]" value="{{ $propertyType->id }}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-0">
                        <a href="javascrip:;" class="btn btn-block btn-Book rounded-0" style="height:46px;" id="apply_filters_button">Apply Filters</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<script>
    var allAccommodationRoute = "{{URL::to('allAccommodation')}}";
</script>
@endsection
