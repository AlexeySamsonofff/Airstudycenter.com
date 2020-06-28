@extends('front.index1')
@section('title', 'All School')
@section('content')
<div class="container-fluid about_inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
@if (\Session::has('success'))
<div class="alert alert-success">
{!! \Session::get('success') !!}
    </div>
@endif	
<style>
.list-inline a .list-inline-item.active-insurance{
	border-bottom: #7abf01 5px solid;
}
.custom_tag_head {
    padding: 30px 0px 0px 0px;
}
</style>
				<div class="about_sec custom_tag_head">
				<h3>@lang('page.insurance_types')</h3>
				<ul class="list-inline">
					@foreach($insurancelist as $insurance)	
						<a href="{{route('insuranceDetail',['id'=>$insurance->id])}}"><li class="list-inline-item @if(Route::current()->getName().'/'.\Request::segment(2) === 'insuranceDetail/'.$insurance->id){{'active-insurance'}}@endif">
						@if ( Config::get('app.locale') == 'en')
						  {{$insurance->name}}
						@elseif ( Config::get('app.locale') == 'tr' )
						   {{$insurance->name_tr}}
						@elseif ( Config::get('app.locale') == 'ar' )
						  {{$insurance->name_ar}}
						@elseif ( Config::get('app.locale') == 'ru' )
						   {{$insurance->name_ru}}
						@elseif ( Config::get('app.locale') == 'de' )
						  {{$insurance->name_de}}
						@elseif ( Config::get('app.locale') == 'it' )
						   {{$insurance->name_it}}
						@elseif ( Config::get('app.locale') == 'fr' )
						  {{$insurance->name_fr}}
						@elseif ( Config::get('app.locale') == 'es' )
						  {{$insurance->name_es}}
						@elseif ( Config::get('app.locale') == 'se' )
						   {{$insurance->name_se}}
						@elseif ( Config::get('app.locale') == 'jp' )
						   {{$insurance->name_jp}}
						@elseif ( Config::get('app.locale') == 'fa' ) 
						   {{$insurance->name_fa}}
						@elseif ( Config::get('app.locale') == 'pr' )
						   {{$insurance->name_pr}}  
						@endif</li></a>
				    @endforeach
				</ul>	
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 wd100_xs">
					<div class="about_img">
						<h1>@if ( Config::get('app.locale') == 'en')
	                  {{$insurancedetail->name}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                   {{$insurancedetail->name_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                  {{$insurancedetail->name_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                   {{$insurancedetail->name_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$insurancedetail->name_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                   {{$insurancedetail->name_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                  {{$insurancedetail->name_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                      {{$insurancedetail->name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                       {{$insurancedetail->name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {{$insurancedetail->name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                       {{$insurancedetail->name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                       {{$insurancedetail->name_pr}}  
                   @endif</h1>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 wd100_xs test">
					<div class="about_txt">
						<h3>@if ( Config::get('app.locale') == 'en')
	                 {!! $insurancedetail->description !!}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                   {!! $insurancedetail->description_tr !!}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                  {!! $insurancedetail->description_ar !!}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                   {!! $insurancedetail->description_ru !!}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {!! $insurancedetail->description_de !!}
	                @elseif ( Config::get('app.locale') == 'it' )
	                   {!! $insurancedetail->description_it !!}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                  {!! $insurancedetail->description_fr !!}
	                @elseif ( Config::get('app.locale') == 'es' )
                      {!! $insurancedetail->description_es !!}
                    @elseif ( Config::get('app.locale') == 'se' )
                       {!! $insurancedetail->description_se !!}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {!! $insurancedetail->description_jp !!}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                       {!! $insurancedetail->description_fa !!}
                    @elseif ( Config::get('app.locale') == 'pr' )
                       {!! $insurancedetail->description_pr !!}
                   @endif</h3>
						
					</div>
				</div>
			</div>
	</div>
</div>
<!---- About Inner End ------>
<!---- Subsribe Inner Start ------>

@endsection
			