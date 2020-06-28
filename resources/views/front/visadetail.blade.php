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
.list-inline a .list-inline-item.active-visa{
	border-bottom: #7abf01 5px solid;
}
.custom_tag_head {
    padding: 30px 0px 0px 0px;
}
</style>

				<div class="about_sec custom_tag_head">
					<h3>@lang('page.visa_types')</h3>
					<ul class="list-inline">
	  @foreach($visalist as $visa)
					
  <a href="{{route('visaDetail',['id'=>$visa->id])}}"><li class="list-inline-item @if(Route::current()->getName().'/'.\Request::segment(2) === 'visaDetail/'.$visa->id){{'active-visa'}}@endif">
  	@if ( Config::get('app.locale') == 'en')
			  {{$visa->name}}
			@elseif ( Config::get('app.locale') == 'tr' )
			   {{$visa->name_tr}}
			@elseif ( Config::get('app.locale') == 'ar' )
			  {{$visa->name_ar}}
			@elseif ( Config::get('app.locale') == 'ru' )
			   {{$visa->name_ru}}
			@elseif ( Config::get('app.locale') == 'de' )
			  {{$visa->name_de}}
			@elseif ( Config::get('app.locale') == 'it' )
			   {{$visa->name_it}}
			@elseif ( Config::get('app.locale') == 'fr' )
			  {{$visa->name_fr}}
			@elseif ( Config::get('app.locale') == 'es' )
			  {{$visa->name_es}}
			@elseif ( Config::get('app.locale') == 'se' )
			   {{$visa->name_se}}
			@elseif ( Config::get('app.locale') == 'jp' )
			   {{$visa->name_jp}}
			@elseif ( Config::get('app.locale') == 'fa' ) 
			   {{$visa->name_fa}}
			@elseif ( Config::get('app.locale') == 'pr' )
			   {{$visa->name_pr}}  
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
	                  {{$visadetail->name}}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                   {{$visadetail->name_tr}}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                  {{$visadetail->name_ar}}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                   {{$visadetail->name_ru}}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {{$visadetail->name_de}}
	                @elseif ( Config::get('app.locale') == 'it' )
	                   {{$visadetail->name_it}}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                  {{$visadetail->name_fr}}
	                @elseif ( Config::get('app.locale') == 'es' )
                      {{$visadetail->name_es}}
                    @elseif ( Config::get('app.locale') == 'se' )
                       {{$visadetail->name_se}}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {{$visadetail->name_jp}}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                       {{$visadetail->name_fa}}
                    @elseif ( Config::get('app.locale') == 'pr' )
                       {{$visadetail->name_pr}}  
                   @endif</h1>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 wd100_xs test">
					<div class="about_txt">
						<h3>@if ( Config::get('app.locale') == 'en')
	                 {!! $visadetail->description !!}
	                @elseif ( Config::get('app.locale') == 'tr' )
	                   {!! $visadetail->description_tr !!}
	                @elseif ( Config::get('app.locale') == 'ar' )
	                  {!! $visadetail->description_ar !!}
	                @elseif ( Config::get('app.locale') == 'ru' )
	                   {!! $visadetail->description_ru !!}
	                @elseif ( Config::get('app.locale') == 'de' )
	                  {!! $visadetail->description_de !!}
	                @elseif ( Config::get('app.locale') == 'it' )
	                   {!! $visadetail->description_it !!}
	                @elseif ( Config::get('app.locale') == 'fr' )
	                  {!! $visadetail->description_fr !!}
	                @elseif ( Config::get('app.locale') == 'es' )
                      {!! $visadetail->description_es !!}
                    @elseif ( Config::get('app.locale') == 'se' )
                       {!! $visadetail->description_se !!}
                    @elseif ( Config::get('app.locale') == 'jp' )
                       {!! $visadetail->description_jp !!}
                    @elseif ( Config::get('app.locale') == 'fa' ) 
                       {!! $visadetail->description_fa !!}
                    @elseif ( Config::get('app.locale') == 'pr' )
                       {!! $visadetail->description_pr !!}
                   @endif</h3>
						
					</div>
				</div>
			</div>
	</div>
</div>
<!---- About Inner End ------>
<!---- Subsribe Inner Start ------>

@endsection
			