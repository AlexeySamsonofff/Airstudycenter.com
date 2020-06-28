@extends('front.index1')
@section('title', 'Accommodation Detail')
@section('content')
</nav>
<!--Navigation end-->
<!--Courses Start-->
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
                <div class="cus_title acc_head">
                    <h1 class="distance">@lang('accommodation.accommodation')</h1>
                    <ul>
                        <li><a href="{{route('mainhome')}}">@lang('accommodation.home')</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="{{route('allaccommodation')}}">@lang('accommodation.accommodation')</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        @if ( Config::get('app.locale') == 'en')
                        <li>{{$accommodation->name}} </li>
                        @elseif ( Config::get('app.locale') == 'tr' )
                        <li>{{$accommodation->name_tr}} </li>
                        @elseif ( Config::get('app.locale') == 'ar' )
                        <li>{{$accommodation->name_ar}} </li>
                        @elseif ( Config::get('app.locale') == 'ru' )
                        <li>{{$accommodation->name_ru}} </li>
                        @elseif ( Config::get('app.locale') == 'de' )
                        <li>{{$accommodation->name_de}} </li>
                        @elseif ( Config::get('app.locale') == 'it' )
                        <li>{{$accommodation->name_it}} </li>
                        @elseif ( Config::get('app.locale') == 'fr' )
                        <li>{{$accommodation->name_fr}} </li>
                        @elseif ( Config::get('app.locale') == 'se' )
                        <li>{{$accommodation->name_se}} </li>
                        @elseif ( Config::get('app.locale') == 'pr' )
                        <li>{{$accommodation->name_pr}} </li>
                        @elseif ( Config::get('app.locale') == 'fa' )
                        <li>{{$accommodation->name_fa}} </li>
                        @elseif ( Config::get('app.locale') == 'jp' )
                        <li>{{$accommodation->name_jp}} </li>
                        @elseif ( Config::get('app.locale') == 'es' )
                        <li>{{$accommodation->name_es}} </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Courses End-->
<section class="courses_det acc_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="course_inner no-border acc_inner ">
                    <div class="text-left english amz_txt">
                        @if ( Config::get('app.locale') == 'en')
                        <h2>{{$accommodation->name}} </h2>
                        @elseif ( Config::get('app.locale') == 'tr' )
                        <h2>{{$accommodation->name_tr}} </h2>
                        @elseif ( Config::get('app.locale') == 'ar' )
                        <h2>{{$accommodation->name_ar}} </h2>
                        @elseif ( Config::get('app.locale') == 'ru' )
                        <h2>{{$accommodation->name_ru}} </h2>
                        @elseif ( Config::get('app.locale') == 'de' )
                        <h2>{{$accommodation->name_de}} </h2>
                        @elseif ( Config::get('app.locale') == 'it' )
                        <h2>{{$accommodation->name_it}} </h2>
                        @elseif ( Config::get('app.locale') == 'fr' )
                        <h2>{{$accommodation->name_fr}} </h2>
                        @elseif ( Config::get('app.locale') == 'es' )
                        <h2>{{$accommodation->name_es}} </h2>
                        @elseif ( Config::get('app.locale') == 'se' )
                        <h2>{{$accommodation->name_se}} </h2>
                        @elseif ( Config::get('app.locale') == 'fa' )
                        <h2>{{$accommodation->name_fa}} </h2>
                        @elseif ( Config::get('app.locale') == 'pr' )
                        <h2>{{$accommodation->name_pr}} </h2>
                        @elseif ( Config::get('app.locale') == 'jp' )
                        <h2>{{$accommodation->name_jp}} </h2>
                        @endif
                        <!--<a href="#"><img class="share_icon" src="{{asset('front/images/share_icon.png')}}" alt=""></a>-->
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8 amz_txt ">
                            <h5><i
                                    class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}
                            </h5>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="review_rgt">
                                <div class="school_comment AirSmallStar">
                                    <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
                                        <?php 
                           $alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3;
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
                                            <span class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                class="AirStudyNumbers_from">/5.0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row acc_img">
                        <div id="jssor_1"
                            style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:500px;overflow:hidden;visibility:hidden;">
                            <!-- Loading Screen -->
                            <div data-u="slides"
                                style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:500px;overflow:hidden;">
                                @foreach($accommodationimages as $images)
                                <div>
                                    <img data-u="image" src="{{asset('/normal_images/'.$images->image)}}" />
                                    <!-- <div data-u="thumb">
                    <img data-u="thumb" src="{{asset('/normal_images/'.$images->image)}}" />
				</div>-->
                                </div>
                                @endforeach
                            </div>
                            <!-- Thumbnail Navigator -->
                            <div data-u="thumbnavigator" class="jssort111"
                                style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;cursor:default;"
                                data-autocenter="1" data-scale-bottom="0.75">
                                <div data-u="slides" class="thumb_lft">
                                    <div data-u="prototype" class="p">
                                        <div data-u="thumbnailtemplate" class="t"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora051"
                                style="width:55px;height:55px;top:162px;left:25px;" data-autocenter="2"
                                data-scale="0.75" data-scale-left="0.75">
                                <svg viewbox="0 0 16000 16000"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora051"
                                style="width:55px;height:55px;top:162px;right:25px;" data-autocenter="2"
                                data-scale="0.75" data-scale-right="0.75">
                                <svg viewbox="0 0 16000 16000"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                                </svg>
                            </div>
                        </div>
                        @if(Auth::check())
                        @if($count_favaccomodation == 0)
                        <div class="detail-banner-btn heart">
                            <input type="hidden" class="heart_input" value="0">
                            <input type="hidden" class="heart_accid" value="{{$accommodation->id}}">
                            <i class="fa fa-heart-o heart_submit"></i> <span
                                data-toggle="@lang('accommodation.ili')">@lang('accommodation.gh')</span>
                        </div>
                        @else
                        <div class="detail-banner-btn heart marked">
                            <input type="hidden" class="heart_input" value="1">
                            <input type="hidden" class="heart_accid" value="{{$accommodation->id}}">
                            <i class="fa fa-heart-o heart_submit"></i> <span
                                data-toggle="@lang('accommodation.gh')">@lang('accommodation.ili')</span>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="col-md-12 bg-white mt_20">
                    <div class="s_tabs course_inner no-border pd_lt_0  ">
                        <ul class="nav nav-tabs p-10" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                    role="tab" aria-controls="description"
                                    aria-selected="true">@lang('accommodation.description')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                    aria-controls="review" aria-selected="false">@lang('accommodation.review')</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active " id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="school_comment acc_detail ">
                                <div class="row">
                                    <div class="col-md-12 city_head">
                                        <h2>@lang('accommodation.od')</h2>
                                    </div>
                                </div>
                                <div class="row review_views acc_views">
                                    <div class="col-md-2">
                                        <div class="viwers_img">
                                            <div class="profile-pic-user">
                                                <img src="{{asset('/normal_images/'.$accommodation->owner_image)}}"
                                                    alt=""/ style="height:78%; width:78%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="viwers_txt acc_viwers">
                                            @if ( Config::get('app.locale') == 'en')
                                            <h3>{{$accommodation->owner_name}}</h3>
                                            @elseif ( Config::get('app.locale') == 'tr' )
                                            <h3>{{$accommodation->owner_name_tr}}</h3>
                                            @elseif ( Config::get('app.locale') == 'ar' )
                                            <h3>{{$accommodation->owner_name_ar}}</h3>
                                            @elseif ( Config::get('app.locale') == 'ru' )
                                            <h3>{{$accommodation->owner_name_ru}}</h3>
                                            @elseif ( Config::get('app.locale') == 'de' )
                                            <h3>{{$accommodation->owner_name_de}}</h3>
                                            @elseif ( Config::get('app.locale') == 'it' )
                                            <h3>{{$accommodation->owner_name_it}}</h3>
                                            @elseif ( Config::get('app.locale') == 'fr' )
                                            <h3>{{$accommodation->owner_name_fr}}</h3>
                                            @elseif ( Config::get('app.locale') == 'pr' )
                                            <h3>{{$accommodation->owner_name_pr}}</h3>
                                            @elseif ( Config::get('app.locale') == 'es' )
                                            <h3>{{$accommodation->owner_name_es}}</h3>
                                            @elseif ( Config::get('app.locale') == 'se' )
                                            <h3>{{$accommodation->owner_name_se}}</h3>
                                            @elseif ( Config::get('app.locale') == 'fa' )
                                            <h3>{{$accommodation->owner_name_fa}}</h3>
                                            @elseif ( Config::get('app.locale') == 'jp' )
                                            <h3>{{$accommodation->owner_name_jp}}</h3>
                                            @endif
                                            <span>{{$accommodation->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row about_sch acc_ab">
                                    <h2>@lang('accommodation.ar')</h2>
                                    <div class="col-md-12">
                                        @if ( Config::get('app.locale') == 'en')
                                        <p>{!! $accommodation->description!!}</p>
                                        @elseif ( Config::get('app.locale') == 'tr' )
                                        <p>{!! $accommodation->description_tr!!}</p>
                                        @elseif ( Config::get('app.locale') == 'ar' )
                                        <p>{!! $accommodation->description_ar!!}</p>
                                        @elseif ( Config::get('app.locale') == 'ru' )
                                        <p>{!! $accommodation->description_ru!!}</p>
                                        @elseif ( Config::get('app.locale') == 'de' )
                                        <p>{!! $accommodation->description_de!!}</p>
                                        @elseif ( Config::get('app.locale') == 'it' )
                                        <p>{!! $accommodation->description_it!!}</p>
                                        @elseif ( Config::get('app.locale') == 'fr' )
                                        <p>{!! $accommodation->description_fr!!}</p>
                                        @elseif ( Config::get('app.locale') == 'pr' )
                                        <p>{!! $accommodation->description_pr!!}</p>
                                        @elseif ( Config::get('app.locale') == 'fa' )
                                        <p>{!! $accommodation->description_fa!!}</p>
                                        @elseif ( Config::get('app.locale') == 'es' )
                                        <p>{!! $accommodation->description_es!!}</p>
                                        @elseif ( Config::get('app.locale') == 'se' )
                                        <p>{!! $accommodation->description_se!!}</p>
                                        @elseif ( Config::get('app.locale') == 'jp' )
                                        <p>{!! $accommodation->description_jp!!}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="mt-3 mb-2 card-header text-white property-type">
                                            @lang('accommodation.pt') :
                                            @if ( Config::get('app.locale') == 'en')
                                            {{$selected_property_type}}
                                            @elseif ( Config::get('app.locale') == 'tr' )
                                            {{$selected_property_type_tr}}
                                            @elseif ( Config::get('app.locale') == 'ar' )
                                            {{$selected_property_type_ar}}
                                            @elseif ( Config::get('app.locale') == 'ru' )
                                            {{$selected_property_type_ru}}
                                            @elseif ( Config::get('app.locale') == 'de' )
                                            {{$selected_property_type_de}}
                                            @elseif ( Config::get('app.locale') == 'it' )
                                            {{$selected_property_type_it}}
                                            @elseif ( Config::get('app.locale') == 'fr' )
                                            {{$selected_property_type_fr}}
                                            @elseif ( Config::get('app.locale') == 'fa' )
                                            {{$selected_property_type_fa}}
                                            @elseif ( Config::get('app.locale') == 'pr' )
                                            {{$selected_property_type_pr}}
                                            @elseif ( Config::get('app.locale') == 'se' )
                                            {{$selected_property_type_se}}
                                            @elseif ( Config::get('app.locale') == 'es' )
                                            {{$selected_property_type_es}}
                                            @elseif ( Config::get('app.locale') == 'jp' )
                                            {{$selected_property_type_jp}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row about_sch acc_fa">
                                    <h2>@lang('accommodation.facilities')</h2>
                                </div>
                                <div class="row">
                                    <div class="student_fac about_sch property-facilities">
                                        <ul>
                                            @foreach($facilities as $facility)
                                            <li><span><img src="{{$facility->facility_icon}}" style="margin: 3px;">
                                                    @if ( Config::get('app.locale') == 'en')
                                                    {{$facility->facility_name}}
                                                    @elseif ( Config::get('app.locale') == 'tr' )
                                                    {{$facility->facility_name_tr}}
                                                    @elseif ( Config::get('app.locale') == 'ar' )
                                                    {{$facility->facility_name_ar}}
                                                    @elseif ( Config::get('app.locale') == 'ru' )
                                                    {{$facility->facility_name_ru}}
                                                    @elseif ( Config::get('app.locale') == 'de' )
                                                    {{$facility->facility_name_de}}
                                                    @elseif ( Config::get('app.locale') == 'it' )
                                                    {{$facility->facility_name_it}}
                                                    @elseif ( Config::get('app.locale') == 'fr' )
                                                    {{$facility->facility_name_fr}}
                                                    @elseif ( Config::get('app.locale') == 'es' )
                                                    {{$facility->facility_name_es}}
                                                    @elseif ( Config::get('app.locale') == 'se' )
                                                    {{$facility->facility_name_se}}
                                                    @elseif ( Config::get('app.locale') == 'fa' )
                                                    {{$facility->facility_name_fa}}
                                                    @elseif ( Config::get('app.locale') == 'pr' )
                                                    {{$facility->facility_name_pr}}
                                                    @elseif ( Config::get('app.locale') == 'jp' )
                                                    {{$facility->facility_name_jp}}
                                                    @endif
                                                </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- listing starts -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <ul class="amenities">
                                            <li><i class="fa fa-check"></i>{{$accomodationdescription->bedroom}}
                                                @lang('accommodation.bedrooms') </li>
                                            <li><i class="fa fa-check"></i>{{$accomodationdescription->kitchen}}
                                                @lang('accommodation.kitchen') </li>
                                            <li><i class="fa fa-check"></i>{{$accomodationdescription->balcony}}
                                                @lang('accommodation.balcony') </li>
                                            <li><i class="fa fa-check"></i>{{$accomodationdescription->bathroom}}
                                                @lang('accommodation.bathroom') </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- listing finish -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course_pro city_head acc_map">
                                            <input id="address" type="hidden"
                                                value="{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->zipcode}},{{$accommodation->country}}">
                                            <h2>@lang('accommodation.map')</h2>
                                            <!-- 	<iframe id="mapplaceshow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119263355!2d-0.38178406930702025!3d51.52873519756608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1543052631363" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                                            <div class="col-md-12">
                                                <div id="accommodationmap" style="width:100%; height:392px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="school_comment acc_detail">
                                <!-- OverAll Comment Starts -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="AirSheading"><a name="evaluation" id="evaluation"></a><span
                                                class="titleSep">@lang('accommodation.reviews')</span></h2>
                                        <div id="AirMainCommentDiv">
                                            <?php 
                             $alltotal  = $review_rate+$review_rate1+$review_rate2+$review_rate3;
					         $getaverage = $alltotal/4;
					         if(is_float($getaverage)){
					          $starNumber = number_format((float)$getaverage, 1, '.', ''); 
					        }else{
                               $starNumber = $getaverage;
					        }
                  		?>
                                            <div class="AirStudyNumbers"><span
                                                    class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                    class="AirStudyNumbers_from">/5.0</span></div>
                                            <div id="AirStudyOverallComments">
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
                                                </div>
                                            </div>
                                        </div>
                                        <!-- overall Rating -->
                                        <div id="AirMainMultipleChoiceCommentDiv">
                                            <div class="MainA">
                                                <div class="MultipleChoiceInner">
                                                    <div class="Aircolleft">@lang('accommodation.homestay') </div>
                                                    <div class="AircolRight">
                                                        <div id="AirStudyOverallComments"
                                                            class="AirStudyMultipleComment">
                                                            <div class="stars">
                                                                <?php
					        if(is_float($review_rate)){
					          $starNumber = number_format((float)$review_rate, 1, '.', ''); 
					        }else{
                               $starNumber = $review_rate;
					        }
					         $explode    = explode('.',$starNumber);
							    for($x=1;$x<=$starNumber;$x++) { ?>
                                                                <span class="star on"></span>
                                                                <?php } if (strpos($starNumber,'.')) { ?>
                                                                <span
                                                                    class="star half exp<?php echo $explode[1]; ?>"></span>
                                                                <?php $x++; }
							    while ($x<=5) { ?>
                                                                <span class="star"></span>
                                                                <?php  $x++; }  ?>
                                                                <span
                                                                    class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                                    class="AirStudyNumbers_from">/5.0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="MultipleChoiceInner">
                                                    <div class="Aircolleft">@lang('accommodation.city') </div>
                                                    <div class="AircolRight">
                                                        <div id="AirStudyOverallComments"
                                                            class="AirStudyMultipleComment">
                                                            <div class="stars">
                                                                <?php
					        if(is_float($review_rate1)){
					          $starNumber = number_format((float)$review_rate1, 1, '.', ''); 
					        }else{
                               $starNumber = $review_rate1;
					        }
					         $explode    = explode('.',$starNumber);
							    for($x=1;$x<=$starNumber;$x++) { ?>
                                                                <span class="star on"></span>
                                                                <?php } if (strpos($starNumber,'.')) { ?>
                                                                <span
                                                                    class="star half exp<?php echo $explode[1]; ?>"></span>
                                                                <?php $x++; }
							    while ($x<=5) { ?>
                                                                <span class="star"></span>
                                                                <?php  $x++; }  ?>
                                                                <span
                                                                    class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                                    class="AirStudyNumbers_from">/5.0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="MainB">
                                                <div class="MultipleChoiceInner">
                                                    <div class="Aircolleft">@lang('accommodation.facilities') </div>
                                                    <div class="AircolRight">
                                                        <div id="AirStudyOverallComments"
                                                            class="AirStudyMultipleComment">
                                                            <div class="stars">
                                                                <?php
					        if(is_float($review_rate2)){
					          $starNumber = number_format((float)$review_rate2, 1, '.', ''); 
					        }else{
                               $starNumber = $review_rate2;
					        }
					         $explode    = explode('.',$starNumber);
							    for($x=1;$x<=$starNumber;$x++) { ?>
                                                                <span class="star on"></span>
                                                                <?php } if (strpos($starNumber,'.')) { ?>
                                                                <span
                                                                    class="star half exp<?php echo $explode[1]; ?>"></span>
                                                                <?php $x++; }
							    while ($x<=5) { ?>
                                                                <span class="star"></span>
                                                                <?php  $x++; }  ?>
                                                                <span
                                                                    class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                                    class="AirStudyNumbers_from">/5.0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="MultipleChoiceInner">
                                                    <div class="Aircolleft">@lang('accommodation.other') </div>
                                                    <div class="AircolRight">
                                                        <div id="AirStudyOverallComments"
                                                            class="AirStudyMultipleComment">
                                                            <div class="stars">
                                                                <?php
					        if(is_float($review_rate3)){
					          $starNumber = number_format((float)$review_rate3, 1, '.', ''); 
					        }else{
                               $starNumber = $review_rate3;
					        }
					         $explode    = explode('.',$starNumber);
							    for($x=1;$x<=$starNumber;$x++) { ?>
                                                                <span class="star on"></span>
                                                                <?php } if (strpos($starNumber,'.')) { ?>
                                                                <span
                                                                    class="star half exp<?php echo $explode[1]; ?>"></span>
                                                                <?php $x++; }
							    while ($x<=5) { ?>
                                                                <span class="star"></span>
                                                                <?php  $x++; }  ?>
                                                                <span
                                                                    class="AirStudyNumbers_get">{{$starNumber}}</span><span
                                                                    class="AirStudyNumbers_from">/5.0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- OverAll Comment Starts -->
                                <!-- User  Comment Strats -->
                                <div class="row Acco_UserComments">
                                    <div class="col-md-12 city_head">
                                        <h2>{{count($reviews)}} @lang('accommodation.comments')</h2>
                                    </div>
                                    @foreach($reviews as $review)
                                    <div class="col-md-12 review_views">
                                        <div class="d-inline float-left">
                                            <div class="viwers_img viewer_profile_image">
                                                @php
                                                $userimage = App\User::where('id',$review->user_id)->first();
                                                @endphp
                                                @if($userimage->image)
                                                <img src="{{$userimage->image}}" alt="">
                                                @else
                                                <img src="{{asset('front/images/man.png')}}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="viwers_txt">
                                                @php
                                                $date = date('d-M-Y', strtotime($review->created_at));
                                                @endphp
                                                <span>{{$date}}</span>
                                                <h3>{{$review->user_name}}</h3>
                                                <p>{{$review->comment}}</p>
                                                <div class="row viewer_rating no-gutter">
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <span>@lang('accommodation.homestay') </span>
                                                        <ul class="star_check">
                                                            @if($review->rate)
                                                            @for($i=1;$i<=($review->rate);$i++)
                                                                <i class="fa fa-star" style="color:#f7a238;"></i>
                                                                @endfor
                                                                @else
                                                                @for($i=1;$i<=5;$i++) <i class="fa fa-star"
                                                                    style="color:grey;"></i>
                                                                    @endfor
                                                                    @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <span>@lang('accommodation.city') </span>
                                                        <ul class="star_check">
                                                            @if($review->rate1)
                                                            @for($i=1;$i<=($review->rate1);$i++)
                                                                <i class="fa fa-star" style="color:#f7a238;"></i>
                                                                @endfor
                                                                @else
                                                                @for($i=1;$i<=5;$i++) <i class="fa fa-star"
                                                                    style="color:grey;"></i>
                                                                    @endfor
                                                                    @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <span>@lang('accommodation.facilities') </span>
                                                        <ul class="star_check">
                                                            @if($review->rate2)
                                                            @for($i=1;$i<=($review->rate2);$i++)
                                                                <i class="fa fa-star" style="color:#f7a238;"></i>
                                                                @endfor
                                                                @else
                                                                @for($i=1;$i<=5;$i++) <i class="fa fa-star"
                                                                    style="color:grey;"></i>
                                                                    @endfor
                                                                    @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <span>@lang('accommodation.other') </span>
                                                        <ul class="star_check">
                                                            @if($review->rate3)
                                                            @for($i=1;$i<=($review->rate3);$i++)
                                                                <i class="fa fa-star" style="color:#f7a238;"></i>
                                                                @endfor
                                                                @else
                                                                @for($i=1;$i<=5;$i++) <i class="fa fa-star"
                                                                    style="color:grey;"></i>
                                                                    @endfor
                                                                    @endif
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- User  Comment Ends -->
                                @if(Auth::check())
                                <div class="leave_comm">
                                    <h2>@lang('accommodation.leave_a_comment')</h2>
                                </div>
                                <form method="post" action="{{ route('storeAccommodationReview') }}" novalidate>
                                    {{ csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class='rating-stars'>
                                                <span>@lang('accommodation.homestay')</span>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="rate" class="form-control rateddata">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class='rating-stars'>
                                                <span>@lang('accommodation.city')</span>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="rate1" class="form-control rateddata">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class='rating-stars'>
                                                <span>@lang('accommodation.facilities')</span>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="rate2" class="form-control rateddata">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class='rating-stars'>
                                                <span>@lang('accommodation.other')</span>
                                                <ul id='stars'>
                                                    <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="rate3" class="form-control rateddata">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" class="form-control" @if(Auth::check())
                                        value="{{Auth::user()->id}}" @endif>
                                    <input type="hidden" name="accommodation_id" class="form-control"
                                        value="{{$accommodation->id}}" required>
                                    <div class="row review_form comm_sec">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Name"
                                                value="{{Auth::user()->name}}" required>
                                        </div>
                                        <div class="col-md-6 mail">
                                            <input type="email" name="getemail" value="{{Auth::user()->email}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row review_form comm_sec coment">
                                        <div class="col-md-12">
                                            <textarea class="form-control rounded-0" name="comment"
                                                id="exampleFormControlTextarea2" rows="3"
                                                placeholder="@lang('accommodation.your_comment')" required></textarea>
                                        </div>
                                    </div>
                                    <div class="post_button subscribe_inner">
                                        <input type="submit" value="@lang('accommodation.post_comment')"
                                            style="cursor:pointer;">
                                    </div>
                                </form>
                                @else
                                <div class="row client">
                                    <span>@lang('accommodation.must_logged_in')</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{route('bookAccommodation')}}" method="post" novalidate>
                    {{ csrf_field()}}
                    <div class="course_inner choose_sec bg-  yel cal acc_book book_cal">
                        <!--<h2>Booking Calculate</h2>-->
                        <!--<div class="form-group">
						<div class='input-group date date_cal'>
							<input id="checkin" class="check_calender" placeholder="Check In" />
						</div>
					</div>
					<div class="form-group">
						<div class='input-group date date_cal'>
							<input id="checkout" class="check_calender" placeholder="Check Out" />
						</div>
					</div>-->
                        <input type="hidden" name="userId" id="userId" @if(Route::has('login')) @auth
                            value="{{Auth::user()->id}}" @endauth @endif>
                        <input type="hidden" name="accomoId" id="accomoId" value="{{$accommodation->id}}">
                        <input type="hidden" name="accomoName" id="accomoName" value="{{$accommodation->name}}">
                        <input type="hidden" name="accomototalprice" id="accomototalprice" value="">
                        <input type="hidden" name="accomostatus" id="accomostatus" value="">
                        <h2>@lang('accommodation.at')</h2>
                        <div class="form-group select_dropdown ">
                            <select class="form-control" name="acc_type" id="acc_type">
                                <option value="{{$getacc_type->acc_type}}">
                                    @if($getacc_type->acc_type == 'shared')
                                    @lang('accommodation.shared')
                                    @else
                                    @lang('accommodation.independent')
                                    @endif
                                </option>
                            </select>
                            <div class="select_arrow cl_yell"><i class="fa fa-angle-down"></i></div>
                        </div>
                        @if($getacc_type->acc_type == 'independent')
                        <div class="form-group select_dropdown ">
                            <select class="form-control" name="acc_pricedata" id="acc_pricedata">
                                <option value="">@lang('accommodation.selectaccommodation')</option>
                                <option value="price">@lang('accommodation.without_catering')</option>
                                <option value="pricewith">@lang('accommodation.self_catering')</option>
                            </select>
                            <div class="select_arrow cl_yell"><i class="fa fa-angle-down"></i></div>
                        </div>
                        @else
                        <div class="form-group select_dropdown ">
                            <select class="form-control" name="acc_typedata" id="acc_typedata">
                                <option value="0">@lang('accommodation.st2')</option>
                                @foreach($getaccommodationprice as $price)
                                @if ( Config::get('app.locale') == 'en')
                                <option value="{{$price->typeid}}">{{$price->typename}}</option>
                                @elseif ( Config::get('app.locale') == 'tr' )
                                <option value="{{$price->typeid}}">{{$price->typename_tr}}</option>
                                @elseif ( Config::get('app.locale') == 'ar' )
                                <option value="{{$price->typeid}}">{{$price->typename_ar}}</option>
                                @elseif ( Config::get('app.locale') == 'ru' )
                                <option value="{{$price->typeid}}">{{$price->typename_ru}}</option>
                                @elseif ( Config::get('app.locale') == 'de' )
                                <option value="{{$price->typeid}}">{{$price->typename_de}}</option>
                                @elseif ( Config::get('app.locale') == 'it' )
                                <option value="{{$price->typeid}}">{{$price->typename_it}}</option>
                                @elseif ( Config::get('app.locale') == 'fr' )
                                <option value="{{$price->typeid}}">{{$price->typename_fr}}</option>
                                @elseif ( Config::get('app.locale') == 'pr' )
                                <option value="{{$price->typeid}}">{{$price->typename_pr}}</option>
                                @elseif ( Config::get('app.locale') == 'es' )
                                <option value="{{$price->typeid}}">{{$price->typename_es}}</option>
                                @elseif ( Config::get('app.locale') == 'se' )
                                <option value="{{$price->typeid}}">{{$price->typename_se}}</option>
                                @elseif ( Config::get('app.locale') == 'jp' )
                                <option value="{{$price->typeid}}">{{$price->typename_jp}}</option>
                                @elseif ( Config::get('app.locale') == 'fa' )
                                <option value="{{$price->typeid}}">{{$price->typename_fa}}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="select_arrow cl_yell"><i class="fa fa-angle-down"></i></div>
                        </div>
                        <div class="form-group select_dropdown ">
                            <select class="form-control" name="acc_pricedata" id="acc_pricedata" disabled="disabled">
                                <option value="0">@lang('accommodation.selectaccommodation')</option>
                                <option value="price">@lang('accommodation.without_catering')</option>
                                <option value="pricewith">@lang('accommodation.self_catering')</option>
                            </select>
                            <div class="select_arrow cl_yell"><i class="fa fa-angle-down"></i></div>
                        </div>
                        @endif
                        <div class="row total_rate clr_blk">
                            <div class="col-md-12 total_acc_hide">@lang('accommodation.status')<span
                                    class="acc_status float-right"></span></div>
                            <div class="col-md-12 total_acc_hide">@lang('accommodation.total') <span
                                    class="float-right">£<span class="acc_finalprice">0.00</span> </span></div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-s text-center place_order book_now bk_nw">
                                <!-- <a href="#">Book Now </a> -->
                                <input type="submit" class="book-now_btn" id="bookaccommodation"
                                    value="@lang('accommodation.booknow')" disabled>
                            </div>
                        </div>
                    </div>
                </form>
                <p id="showloginmsz"></p>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
   $('.detail-banner-btn').click(function() {
	$(this).toggleClass('marked');
	  var accid = $('.heart_accid').val();
      $('.marked .heart_input').val(1);
      var heart_input = $('.marked .heart_input').val();
      var data_toggle = $(this).find('span').attr('data-toggle');
      var data_text   = $(this).find('span').text();
       $.ajax
        ({
            url: "{{route('favaccomodation')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","heart_input":heart_input,"accid":accid,'data_toggle':data_toggle,'data_text':data_text},
            success: function (response) 
            { 
            	 var myJSON = JSON.parse(response);
            	 $('.heart span').text(myJSON[0]);
            	 $('.heart span').attr('data-toggle', myJSON[1]);
              
            },                                    
        });
});
   $('#acc_typedata').on('change', function() {	
       var typeid = this.value;
       var accid  = $('#accomoId').val();
       $('.total_acc_hide').hide();
       if(typeid == 0){
       	$('#acc_pricedata  option[value="0"]').prop("selected", true);
        $('#acc_pricedata').prop('disabled','disabled');
       }else{
       	$('#acc_pricedata').prop('disabled', false);
       }
   });
 $('#acc_pricedata').on('change', function() {
 	    var acc_type  = $("#acc_type").val();
        var pricetype = this.value;	
    	var accid     = $('#accomoId').val();
        var typeid    = $('#acc_typedata').val();
        if(pricetype == 0){
          $('.total_acc_hide').hide();
         } 	
    	$.ajax
        ({
            url: "{{route('mm')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","accid":accid,"typeid":typeid,"pricetype":pricetype,"acc_type":acc_type},
            success: function (response) 
            {  
            	var obj = jQuery.parseJSON(response);
            	$(".acc_finalprice").text(obj[0]);
            	$("#accomototalprice").val(obj[0]);
            	var userId = $('#userId').val();
            	var locale = "<?php echo app()->getLocale(); ?>"
            	
            	if(locale == 'en'){
            	 var available = "Available";	
            	 var not_available = "Not Available";
            	 var logged_msz = 'You must be logged in to Book this course';
            	}else if(locale == 'ar'){
                   var available = "متاح";
                    var not_available = "غير متوفر";
                    var logged_msz = 'يجب أن تكون مسجلا لحجز هذا السكن';
            	}else if(locale == 'ru'){
                   var available = "Имеется в наличии";
                    var not_available = "Недоступен";
                    var logged_msz = 'Вы должны войти в систему, чтобы забронировать это жилье';
            	}else if(locale == 'es'){
                   var available = "Disponible";
                    var not_available = "No disponible";
                    var logged_msz = 'Debes iniciar sesión para reservar este alojamiento';
            	}else if(locale == 'se'){
                   var available = "Tillgängliga";
                    var not_available = "Inte tillgänglig";
                    var logged_msz = 'Du måste vara inloggad för att boka detta boende';
            	}else if(locale == 'de'){
                   var available = "Verfügbar";
                    var not_available = "Nicht verfügbar";
                    var logged_msz = 'Sie müssen angemeldet sein, um diese Unterkunft zu buchen';
            	}else if(locale == 'fr'){
                   var available = "Disponible";
                    var not_available = "Indisponible";
                    var logged_msz = 'Vous devez être connecté pour réserver cet hébergement';
            	}else if(locale == 'tr'){
                   var available = "Mevcut";
                    var not_available = "Müsait değil";
                    var logged_msz = 'Bu konaklama yerinizi ayırtmak için giriş yapmalısınız';
            	}else if(locale == 'fa'){
                   var available = "در دسترس";
                    var not_available = "در دسترس نیست";
                    var logged_msz = 'برای رزرو این اقامت باید وارد سیستم شوید';
            	}else if(locale == 'pr'){
                   var available = "acessível";
                    var not_available = "Não disponível";
                    var logged_msz = 'Você deve estar logado para Reservar este alojamento';
            	}else if(locale == 'it'){
                   var available = "A disposizione";
                    var not_available = "Non disponibile";
                    var logged_msz = "Devi essere loggato per prenotare questa sistemazione";
            	}else if(locale == 'jp'){
                   var available = "利用可能";
                    var not_available = "利用不可";
                    var logged_msz = 'この宿泊施設を予約するにはログインしてください';
            	}
                if(obj[1] == 1 && obj[0]!=0.00 ){
                $(".acc_status").text(available);
                $("#accomostatus").val(available);
                if( userId != '')
            	 {
                    $('#bookaccommodation').prop('disabled', false);
                    $('div').removeClass('book_now');
                 }
                else{
            	
                   $('#showloginmsz').text(logged_msz);
            }
        }
               else{
                $(".acc_status").text(not_available);
                }
                
            	$(".total_rate.clr_blk div").show();
            	
            },                                    
        });
    	
    });
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var ratevalue = "";
    if (ratingValue > 1) {
        ratevalue = ratingValue;
    }
    else {
       ratevalue = ratingValue;
    }
     $(this).parent().next('.rateddata').val(ratevalue);
    
  });
  
  
});
</script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="{{asset('front/js/jssor.slider-27.5.0.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    jssor_1_slider_init = function() {
            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            var jssor_1_options = {
              $AutoPlay: 1,
              
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$
              }
            };
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            /*#region responsive code begin*/
            var MAX_WIDTH = 980;
            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;
                if (containerWidth) {
                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
</script>
<script type="text/javascript">
    jssor_1_slider_init();
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;">
</script>
<script type="text/javascript">
    function initMap() {
var geocoder = new google.maps.Geocoder();
var address = $('#address').val();
var lat;
var lng;
geocoder.geocode( { 'address': address}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    var lat = results[0].geometry.location.lat();
    var lng = results[0].geometry.location.lng();
  } 
   var latlng = new google.maps.LatLng(lat,lng);
    var map = new google.maps.Map(document.getElementById('accommodationmap'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
    }); 
}
google.maps.event.addDomListener(window, 'load', initMap);
</script>
@endsection