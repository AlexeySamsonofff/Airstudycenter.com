@extends('front.index1_new')

@section('title', getLocalizedString($pagedata, 'title'))

@section('content')
<div class="container-fluid bg-school text-white p-0 position-relative" style="background-image:url({{ asset('front/dpassets/img/CompanyBg.png') }}); height:450px;">
    {{-- <div class="container-fluid bg-school text-white  position-relative" style="background-image:url({{$pagedata->image}}); height:450px;"> --}}
    @include('front.layout.navigation')
    <h1 class="text-center text-white font-weight-normal pt-5 all-center" style="font-size: 45px;">{{getLocalizedString($pagedata, 'title')}}</h1>
</div>
<div class="container pt-5 pb-5 abouts">
    <h2 class="font-weight-bold HeadingS1 mb-md-4 mb-3">{{getLocalizedString($pagedata, 'title')}}</h2>

    <div class=" link-primary">{!! getLocalizedString($pagedata, 'description') !!}</div>
</div>
