@extends('front.index1')
@section('title', 'VisaList')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<div class="container p-0 accdin-result">
	<nav aria-label="breadcrumb " class="bg-transparent brdcrm">
		<p class="breadcrumb text-break d-inline-block pl-md-0 bg-transparent">
			<span class="breadcrumb-item"><a href="{{ route('mainhome') }}">@lang('school.home')</a></span>
			<span class="breadcrumb-item" aria-current="page">Visa Information</span>
		</p>
	</nav>
</div>
<div class="container-fluid about_inner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
                <div class="about_sec custom_tag_head">
                    <div class="about_sec custom_tag_head">
                        <h2 style="font-weight: bold;">Visa Guide</h2>
                        <!-- <h3><span>@lang('page.welcome_to') </span>@lang('page.asc')</h3> -->
                    </div>
                    <!-- <h4>@lang('page.insurance_list')</h4> -->
                </div>
            </div>
        </div>
        <style>
			.list-inline {
				border-bottom: #126470 1.2px solid;
				padding-bottom: 15px;
				padding-top: 15px;
			}
		</style>
        <div class="col-md-12" style="overflow-y: auto">
			<div class="col-md-5" style="float:left">				
				@for ($i = 0; $i < count($visalist) / 2 ; $i++)
				<div class="list-inline">
					<div class="row" data-toggle="collapse" href="#{{str_replace(' ', '', $visalist[$i]->name)}}" role="button" aria-expanded="false">
						<div class="col-md-10">
							<a class="list-inline-item">
								@if ( Config::get('app.locale') == 'en')
								{{$visalist[$i]->name}}
								@elseif ( Config::get('app.locale') == 'tr' )
								{{$visalist[$i]->name_tr}}
								@elseif ( Config::get('app.locale') == 'ar' )
								{{$visalist[$i]->name_ar}}
								@elseif ( Config::get('app.locale') == 'ru' )
								{{$visalist[$i]->name_ru}}
								@elseif ( Config::get('app.locale') == 'de' )
								{{$visalist[$i]->name_de}}
								@elseif ( Config::get('app.locale') == 'it' )
								{{$$visalist[$i]->name_it}}
								@elseif ( Config::get('app.locale') == 'fr' )
								{{$visalist[$i]->name_fr}}
								@elseif ( Config::get('app.locale') == 'es' )
								{{$visalist[$i]->name_es}}
								@elseif ( Config::get('app.locale') == 'se' )
								{{$visalist[$i]->name_se}}
								@elseif ( Config::get('app.locale') == 'jp' )
								{{$visalist[$i]->name_jp}}
								@elseif ( Config::get('app.locale') == 'fa' )
								{{$visalist[$i]->name_fa}}
								@elseif ( Config::get('app.locale') == 'pr' )
								{{$visalist[$i]->name_pr}}
								@endif
							</a>
						</div>
						<div class="col-md-2 text-right">
							<i class="fa fa-angle-right" aria-hidden="true" ></i>
						</div>
					</div>
				</div>
				<div class="col-12">
				    <div class="collapse multi-collapse" id="{{str_replace(' ', '', $visalist[$i]->name)}}">
					    <div class="row">
					      	<div class="col-md-10">
						    	<a class="list-inline-item" style="padding-bottom: 20px;">
									@if ( Config::get('app.locale') == 'en')
									{{$visalist[$i]->name}}
									@elseif ( Config::get('app.locale') == 'tr' )
									{{$visalist[$i]->name_tr}}
									@elseif ( Config::get('app.locale') == 'ar' )
									{{$visalist[$i]->name_ar}}
									@elseif ( Config::get('app.locale') == 'ru' )
									{{$visalist[$i]->name_ru}}
									@elseif ( Config::get('app.locale') == 'de' )
									{{$visalist[$i]->name_de}}
									@elseif ( Config::get('app.locale') == 'it' )
									{{$visalist[$i]->name_it}}
									@elseif ( Config::get('app.locale') == 'fr' )
									{{$visalist[$i]->name_fr}}
									@elseif ( Config::get('app.locale') == 'es' )
									{{$visalist[$i]->name_es}}
									@elseif ( Config::get('app.locale') == 'se' )
									{{$visalist[$i]->name_se}}
									@elseif ( Config::get('app.locale') == 'jp' )
									{{$visalist[$i]->name_jp}}
									@elseif ( Config::get('app.locale') == 'fa' )
									{{$visalist[$i]->name_fa}}
									@elseif ( Config::get('app.locale') == 'pr' )
									{{$visalist[$i]->name_pr}}
									@endif
								</a>
						    </div>
						    <div class="col-md-2 text-right">
								<i class="fa fa-angle-down" aria-hidden="true" ></i>
							</div>
						</div>
				      	<div>
				        	{!!$visalist[$i]->description!!}
				      	</div>
				    </div>
			  	</div>
				@endfor
			</div>
			<div class="col-md-2" style="float:left">
				&nbsp
			</div>
			<div class="col-md-5" style="float:left">				
				@for ($i = count($visalist) / 2; $i < count($visalist) ; $i++)
				<div class="list-inline">
					<div class="row" data-toggle="collapse" href="#{{str_replace(' ', '', $visalist[$i]->name)}}" role="button" aria-expanded="false">
						<div class="col-md-10">
							<a class="list-inline-item">
								@if ( Config::get('app.locale') == 'en')
								{{$visalist[$i]->name}}
								@elseif ( Config::get('app.locale') == 'tr' )
								{{$visalist[$i]->name_tr}}
								@elseif ( Config::get('app.locale') == 'ar' )
								{{$visalist[$i]->name_ar}}
								@elseif ( Config::get('app.locale') == 'ru' )
								{{$visalist[$i]->name_ru}}
								@elseif ( Config::get('app.locale') == 'de' )
								{{$visalist[$i]->name_de}}
								@elseif ( Config::get('app.locale') == 'it' )
								{{$$visalist[$i]->name_it}}
								@elseif ( Config::get('app.locale') == 'fr' )
								{{$visalist[$i]->name_fr}}
								@elseif ( Config::get('app.locale') == 'es' )
								{{$visalist[$i]->name_es}}
								@elseif ( Config::get('app.locale') == 'se' )
								{{$visalist[$i]->name_se}}
								@elseif ( Config::get('app.locale') == 'jp' )
								{{$visalist[$i]->name_jp}}
								@elseif ( Config::get('app.locale') == 'fa' )
								{{$visalist[$i]->name_fa}}
								@elseif ( Config::get('app.locale') == 'pr' )
								{{$visalist[$i]->name_pr}}
								@endif
							</a>
						</div>
						<div class="col-md-2 text-right">
							<i class="fa fa-angle-right" aria-hidden="true" ></i>
						</div>
					</div>
				</div>
				<div class="col-12" >
				    <div class="collapse multi-collapse" id="{{str_replace(' ', '', $visalist[$i]->name)}}">
					    <div class="row">
					      	<div class="col-md-10">
						    	<a class="list-inline-item" style="padding-bottom: 20px;">
									@if ( Config::get('app.locale') == 'en')
									{{$visalist[$i]->name}}
									@elseif ( Config::get('app.locale') == 'tr' )
									{{$visalist[$i]->name_tr}}
									@elseif ( Config::get('app.locale') == 'ar' )
									{{$visalist[$i]->name_ar}}
									@elseif ( Config::get('app.locale') == 'ru' )
									{{$visalist[$i]->name_ru}}
									@elseif ( Config::get('app.locale') == 'de' )
									{{$visalist[$i]->name_de}}
									@elseif ( Config::get('app.locale') == 'it' )
									{{$visalist[$i]->name_it}}
									@elseif ( Config::get('app.locale') == 'fr' )
									{{$visalist[$i]->name_fr}}
									@elseif ( Config::get('app.locale') == 'es' )
									{{$visalist[$i]->name_es}}
									@elseif ( Config::get('app.locale') == 'se' )
									{{$visalist[$i]->name_se}}
									@elseif ( Config::get('app.locale') == 'jp' )
									{{$visalist[$i]->name_jp}}
									@elseif ( Config::get('app.locale') == 'fa' )
									{{$visalist[$i]->name_fa}}
									@elseif ( Config::get('app.locale') == 'pr' )
									{{$visalist[$i]->name_pr}}
									@endif
								</a>
						    </div>
						    <div class="col-md-2 text-right">
								<i class="fa fa-angle-down" aria-hidden="true" ></i>
							</div>
						</div>
				      	<div>
				        	{!!$visalist[$i]->description!!}
				      	</div>
				    </div>
			  	</div>
				@endfor
			</div>
		</div>
		<div style="padding-bottom: 80px">
		</div>
    </div>
</div>
@endsection
