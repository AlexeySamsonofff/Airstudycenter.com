@extends('front.index1')
@section('title', 'All School')
@section('content')
<div class="container-fluid about_inner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 145px !important">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
                @if (\Session::has('failure'))
                <div class="alert alert-danger">
                    {!! \Session::get('failure') !!}
                </div>
                @endif
                @if (\Session::has('info'))
                <div class="alert alert-info">
                    {!! \Session::get('info') !!}
                </div>
                @endif
                <div class="about_sec custom_tag_head">
                    <h3><span>@lang('page.welcome_to')</span> @lang('page.asc')</h3>
                    <p> @lang('page.explore')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs">
                <div class="about_img h_422">
                    <img class="img-responsive" src="{{$who_we_are->image}}" alt="" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs">
                <div class="about_txt">
                    <h2>@if ( Config::get('app.locale') == 'en')
                        {{$who_we_are->title}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                        {{$who_we_are->title_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                        {{$who_we_are->title_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                        {{$who_we_are->title_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                        {{$who_we_are->title_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                        {{$who_we_are->title_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                        {{$who_we_are->title_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                        {{$who_we_are->title_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                        {{$who_we_are->title_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                        {{$who_we_are->title_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' )
                        {{$who_we_are->title_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                        {{$who_we_are->title_pr}}
                        @endif</h2>
                    @php
                    if( Config::get('app.locale') == 'en')
                    {
                    $description = $who_we_are->description;
                    }
                    elseif( Config::get('app.locale') == 'tr' )
                    { $description =$who_we_are->description_tr;}
                    elseif( Config::get('app.locale') == 'ar' )
                    {$description = $who_we_are->description_ar;}
                    elseif( Config::get('app.locale') == 'ru' )
                    { $description = $who_we_are->description_ru;}
                    elseif( Config::get('app.locale') == 'de' )
                    { $description = $who_we_are->description_de;}
                    elseif( Config::get('app.locale') == 'it' )
                    {$description = $who_we_are->description_it;}
                    elseif( Config::get('app.locale') == 'fr' )
                    {$description = $who_we_are->description_fr;}
                    elseif ( Config::get('app.locale') == 'es' )
                    {$description = $who_we_are->description_es;}
                    elseif ( Config::get('app.locale') == 'se' )
                    {$description = $who_we_are->description_se;}
                    elseif ( Config::get('app.locale') == 'jp' )
                    {$description =$who_we_are->description_jp;}
                    elseif ( Config::get('app.locale') == 'fa' )
                    {$description = $who_we_are->description_fa;}
                    elseif ( Config::get('app.locale') == 'pr' )
                    {$description = $who_we_are->description_pr;}
                    $small = substr($description, 0, 580); @endphp
                    {!! $small !!} ...
                    <p><a href="{{route('singlepage',['id'=>$who_we_are->id])}}">@lang('page.read_more')</a></p>
                </div>
            </div>
        </div>
        <div class="row custom_padding ">
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs">
                <div class="about_txt about_sec2 text-right ">
                    <h2>@if ( Config::get('app.locale') == 'en')
                        {{$our_education->title}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                        {{$our_education->title_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                        {{$our_education->title_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                        {{$our_education->title_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                        {{$our_education->title_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                        {{$our_education->title_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                        {{$our_education->title_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                        {{$our_education->title_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                        {{$our_education->title_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                        {{$our_education->title_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' )
                        {{$our_education->title_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                        {{$our_education->title_pr}}
                        @endif</h2>
                    @php

                    if( Config::get('app.locale') == 'en')
                    {
                    $description1 = $our_education->description;
                    }
                    elseif( Config::get('app.locale') == 'tr' )
                    { $description1 =$our_education->description_tr;}
                    elseif( Config::get('app.locale') == 'ar' )
                    {$description1 = $our_education->description_ar;}
                    elseif( Config::get('app.locale') == 'ru' )
                    { $description1 = $our_education->description_ru;}
                    elseif( Config::get('app.locale') == 'de' )
                    { $description1 = $our_education->description_de;}
                    elseif( Config::get('app.locale') == 'it' )
                    {$description1 = $our_education->description_it;}
                    elseif( Config::get('app.locale') == 'fr' )
                    {$description1 = $our_education->description_fr;}
                    elseif ( Config::get('app.locale') == 'es' )
                    {$description1 = $our_education->description_es;}
                    elseif ( Config::get('app.locale') == 'se' )
                    {$description1 = $our_education->description_se;}
                    elseif ( Config::get('app.locale') == 'jp' )
                    {$description1 =$our_education->description_jp;}
                    elseif ( Config::get('app.locale') == 'fa' )
                    {$description1 = $our_education->description_fa;}
                    elseif ( Config::get('app.locale') == 'pr' )
                    {$description1 = $our_education->description_pr;}
                    $small = substr($description1, 0, 580); @endphp
                    {!! $small !!} ...
                    <p><a href="{{route('singlepage',['id'=>$our_education->id])}}">@lang('page.read_more')</a></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs float-left ">
                <div class="about_img h_342 ">
                    <img class="img-responsive" src="{{$our_education->image}}" alt="" />
                </div>
            </div>
        </div>
        <div class="row custom_padding pd_b50 ">
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs  ">
                <div class="about_img h_324 ">
                    <img class="img-responsive" src="{{$our_story->image}}" alt="" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wd100_xs ">
                <div class="about_txt about_sec2 ">
                    <h2>@if ( Config::get('app.locale') == 'en')
                        {{$our_story->title}}
                        @elseif ( Config::get('app.locale') == 'tr' )
                        {{$our_story->title_tr}}
                        @elseif ( Config::get('app.locale') == 'ar' )
                        {{$our_story->title_ar}}
                        @elseif ( Config::get('app.locale') == 'ru' )
                        {{$our_story->title_ru}}
                        @elseif ( Config::get('app.locale') == 'de' )
                        {{$our_story->title_de}}
                        @elseif ( Config::get('app.locale') == 'it' )
                        {{$our_story->title_it}}
                        @elseif ( Config::get('app.locale') == 'fr' )
                        {{$our_story->title_fr}}
                        @elseif ( Config::get('app.locale') == 'es' )
                        {{$our_story->title_es}}
                        @elseif ( Config::get('app.locale') == 'se' )
                        {{$our_story->title_se}}
                        @elseif ( Config::get('app.locale') == 'jp' )
                        {{$our_story->title_jp}}
                        @elseif ( Config::get('app.locale') == 'fa' )
                        {{$our_story->title_fa}}
                        @elseif ( Config::get('app.locale') == 'pr' )
                        {{$our_story->title_pr}}
                        @endif</h2>
                    @php
                    if( Config::get('app.locale') == 'en')
                    {
                    $description2 = $our_story->description;
                    }
                    elseif( Config::get('app.locale') == 'tr' )
                    { $description2 =$our_story->description_tr;}
                    elseif( Config::get('app.locale') == 'ar' )
                    {$description2= $our_story->description_ar;}
                    elseif( Config::get('app.locale') == 'ru' )
                    { $description2 = $our_story->description_ru;}
                    elseif( Config::get('app.locale') == 'de' )
                    { $description2 = $our_story->description_de;}
                    elseif( Config::get('app.locale') == 'it' )
                    {$description2 = $our_story->description_it;}
                    elseif( Config::get('app.locale') == 'fr' )
                    {$description2 = $our_story->description_fr;}
                    elseif ( Config::get('app.locale') == 'es' )
                    {$description2 = $our_story->description_es;}
                    elseif ( Config::get('app.locale') == 'se' )
                    {$description2 = $our_story->description_se;}
                    elseif ( Config::get('app.locale') == 'jp' )
                    {$description2 =$our_story->description_jp;}
                    elseif ( Config::get('app.locale') == 'fa' )
                    {$description2 = $our_story->description_fa;}
                    elseif ( Config::get('app.locale') == 'pr' )
                    {$description2 = $our_story->description_pr;}
                    $small = substr($description2, 0, 580); @endphp
                    {!! $small !!} ...
                    <p><a href="{{route('singlepage',['id'=>$our_story->id])}}">@lang('page.read_more')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!---- About Inner End ------>
<!---- Subsribe Inner Start ------>
<div class="container subscribe_sec">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 sub_image">
            <div class="subscribe_inner custom_tag_head text-center ">
                <h3>@lang('page.subscribe1')<span>@lang('page.us')</span></h3>
                <p></p>
                <form action="{{ route('subscribe') }}" method="post">
                    <div class="review_form sub_input">
                        {{ csrf_field() }}
                        <input type="email" name="user_email" placeholder="@lang('page.your_email')" required>
                        <input type="submit" name="submit" value="@lang('page.subscribe2')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection