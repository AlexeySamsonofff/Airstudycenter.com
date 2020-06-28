@extends('front.index1_new')
@section('title', 'About Us')
@section('content')
<!-- <div id="bg-clr">
</div> -->
<div class="container-fluid bg-school text-white  position-relative p-0" style="background-image:url({{ asset('front/dpassets/img/CompanyBg.png') }}); height:475px;">
@include('front.layout.navigation')
    <h1 class="text-center text-white font-weight-normal pt-5 all-center" style="font-size: 45px;">@lang('page.about') <br class="d-sm-none"> @lang('page.air_study_center')</h1>
</div>
<div class="container pt-5 pb-5 abouts">
    <div class="row m-0">
        <div class="col-lg-5 col-md-6 d-md-block d-none ">
            <img src="{{ asset('front/dpassets/img/how_we_are1.PNG') }}" alt="" class="w-100 pr-lg-5 pr-3">
            {{-- <img src="{{$who_we_are->image}}" alt="" class="w-100 h-100 pr-lg-5 pr-3"> --}}
        </div>
        <div class="col-lg-7 col-md-6 p-0 mb-4 mb-md-0">
            <h2 class="font-weight-bold HeadingS1 mb-md-4 mb-3" style="font-size:36px !important;">@lang('page.who_we_are')</h2>
            <p>{!! getLocalizedString($who_we_are, 'description') !!}</p>
        </div>
        <div class="col-12 d-none d-md-block p-5"></div>
        <div class="col-lg-7 col-md-6 p-0">
            <h2 class="font-weight-bold HeadingS1 mb-md-4 mb-3" style="font-size:36px !important;">@lang('page.our_education')</h2>
            <p>{!! getLocalizedString($our_education, 'description') !!}</p>
        </div>
        <div class="col-lg-5 col-md-6 d-md-block d-none">
            <img src="{{ asset('front/dpassets/img/Our_education.PNG') }}" alt="" class="w-100 pl-lg-5 pl-3">
            {{-- <img src="{{$our_education->image}}" alt="" class="w-100 h-100 pl-lg-5 pl-3"> --}}
        </div>
    </div>
    <div class="bg-light row m-0 mt-5 mb-5  aboutIcon aboutIcon2">
        <div class="col-sm-4 text-center pt-3 pb-3 border-right border border-light">
            <i class="far mb-2 clr-primry fa-school"></i>
            <p class=" mb-1 aboutp1">250+</p>
            <p class="mb-0 aboutIconp2 mt-2 icon-bottom-styling-p">UK Schools</p>
        </div>
        <div class="col-sm-4 text-center pt-3 pb-3 border-right border border-light">
            <i class="fas mb-2 clr-primry fa-users"></i>
            <p class=" mb-1 aboutp1">1000+</p>
            <p class="mb-0 aboutIconp2 mt-2 icon-bottom-styling-p">Students enrolled</p>
        </div>
        <div class="col-sm-4 text-center pt-3 pb-3 border-right border border-light">
            <i class="fas mb-2 clr-primry fa-bed"></i>
            <p class=" mb-1 aboutp1">150+</p>
            <p class="mb-0 aboutIconp2 mt-2 icon-bottom-styling-p">Accommodation</p>
        </div>
    </div>
</div>