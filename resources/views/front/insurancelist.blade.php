@extends('front.index1')
@section('title', 'InsuranceList')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<div class="container p-0 accdin-result">
	<nav aria-label="breadcrumb " class="bg-transparent brdcrm">
		<p class="breadcrumb text-break d-inline-block pl-md-0 bg-transparent">
			<span class="breadcrumb-item"><a href="{{ route('mainhome') }}">@lang('school.home')</a></span>
			<span class="breadcrumb-item" aria-current="page">Isurance Information</span>
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
                        <h2 style="font-weight: bold;">Insurance Guide</h2>
                    </div>
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
				@for ($i = 0; $i < count($insurancelist) / 2 ; $i++)
				<div class="list-inline">
					<div class="row" data-toggle="collapse" href="#{{str_replace(' ', '', $insurancelist[$i]->name)}}" role="button" aria-expanded="false">
						<div class="col-md-10">
							<a class="list-inline-item">
								@if ( Config::get('app.locale') == 'en')
								{{$insurancelist[$i]->name}}
								@elseif ( Config::get('app.locale') == 'tr' )
								{{$insurancelist[$i]->name_tr}}
								@elseif ( Config::get('app.locale') == 'ar' )
								{{$insurancelist[$i]->name_ar}}
								@elseif ( Config::get('app.locale') == 'ru' )
								{{$insurancelist[$i]->name_ru}}
								@elseif ( Config::get('app.locale') == 'de' )
								{{$insurancelist[$i]->name_de}}
								@elseif ( Config::get('app.locale') == 'it' )
								{{$$insurancelist[$i]->name_it}}
								@elseif ( Config::get('app.locale') == 'fr' )
								{{$insurancelist[$i]->name_fr}}
								@elseif ( Config::get('app.locale') == 'es' )
								{{$insurancelist[$i]->name_es}}
								@elseif ( Config::get('app.locale') == 'se' )
								{{$insurancelist[$i]->name_se}}
								@elseif ( Config::get('app.locale') == 'jp' )
								{{$insurancelist[$i]->name_jp}}
								@elseif ( Config::get('app.locale') == 'fa' )
								{{$insurancelist[$i]->name_fa}}
								@elseif ( Config::get('app.locale') == 'pr' )
								{{$insurancelist[$i]->name_pr}}
								@endif
							</a>
						</div>
						<div class="col-md-2 text-right">
							<i class="fa fa-angle-right" aria-hidden="true" ></i>
						</div>
					</div>
				</div>
				<div class="col-12">
				    <div class="collapse multi-collapse" id="{{str_replace(' ', '', $insurancelist[$i]->name)}}">
					    <div class="row">
					      	<div class="col-md-10">
						    	<a class="list-inline-item" style="padding-bottom: 20px;">
									@if ( Config::get('app.locale') == 'en')
									{{$insurancelist[$i]->name}}
									@elseif ( Config::get('app.locale') == 'tr' )
									{{$insurancelist[$i]->name_tr}}
									@elseif ( Config::get('app.locale') == 'ar' )
									{{$insurancelist[$i]->name_ar}}
									@elseif ( Config::get('app.locale') == 'ru' )
									{{$insurancelist[$i]->name_ru}}
									@elseif ( Config::get('app.locale') == 'de' )
									{{$insurancelist[$i]->name_de}}
									@elseif ( Config::get('app.locale') == 'it' )
									{{$insurancelist[$i]->name_it}}
									@elseif ( Config::get('app.locale') == 'fr' )
									{{$insurancelist[$i]->name_fr}}
									@elseif ( Config::get('app.locale') == 'es' )
									{{$insurancelist[$i]->name_es}}
									@elseif ( Config::get('app.locale') == 'se' )
									{{$insurancelist[$i]->name_se}}
									@elseif ( Config::get('app.locale') == 'jp' )
									{{$insurancelist[$i]->name_jp}}
									@elseif ( Config::get('app.locale') == 'fa' )
									{{$insurancelist[$i]->name_fa}}
									@elseif ( Config::get('app.locale') == 'pr' )
									{{$insurancelist[$i]->name_pr}}
									@endif
								</a>
						    </div>
						    <div class="col-md-2 text-right">
								<i class="fa fa-angle-down" aria-hidden="true" ></i>
							</div>
						</div>
				      	<div>
				        	{!!$insurancelist[$i]->description!!}
				      	</div>
				    </div>
			  	</div>
				@endfor
			</div>
			<div class="col-md-2" style="float:left">
				&nbsp
			</div>
			<div class="col-md-5" style="float:left">				
				@for ($i = count($insurancelist) / 2; $i < count($insurancelist) ; $i++)
				<div class="list-inline">
					<div class="row" data-toggle="collapse" href="#{{str_replace(' ', '', $insurancelist[$i]->name)}}" role="button" aria-expanded="false">
						<div class="col-md-10">
							<a class="list-inline-item">
								@if ( Config::get('app.locale') == 'en')
								{{$insurancelist[$i]->name}}
								@elseif ( Config::get('app.locale') == 'tr' )
								{{$insurancelist[$i]->name_tr}}
								@elseif ( Config::get('app.locale') == 'ar' )
								{{$insurancelist[$i]->name_ar}}
								@elseif ( Config::get('app.locale') == 'ru' )
								{{$insurancelist[$i]->name_ru}}
								@elseif ( Config::get('app.locale') == 'de' )
								{{$insurancelist[$i]->name_de}}
								@elseif ( Config::get('app.locale') == 'it' )
								{{$$insurancelist[$i]->name_it}}
								@elseif ( Config::get('app.locale') == 'fr' )
								{{$insurancelist[$i]->name_fr}}
								@elseif ( Config::get('app.locale') == 'es' )
								{{$insurancelist[$i]->name_es}}
								@elseif ( Config::get('app.locale') == 'se' )
								{{$insurancelist[$i]->name_se}}
								@elseif ( Config::get('app.locale') == 'jp' )
								{{$insurancelist[$i]->name_jp}}
								@elseif ( Config::get('app.locale') == 'fa' )
								{{$insurancelist[$i]->name_fa}}
								@elseif ( Config::get('app.locale') == 'pr' )
								{{$insurancelist[$i]->name_pr}}
								@endif
							</a>
						</div>
						<div class="col-md-2 text-right">
							<i class="fa fa-angle-right" aria-hidden="true" ></i>
						</div>
					</div>
				</div>
				<div class="col-12" >
				    <div class="collapse multi-collapse" id="{{str_replace(' ', '', $insurancelist[$i]->name)}}">
					    <div class="row">
					      	<div class="col-md-10">
						    	<a class="list-inline-item" style="padding-bottom: 20px;">
									@if ( Config::get('app.locale') == 'en')
									{{$insurancelist[$i]->name}}
									@elseif ( Config::get('app.locale') == 'tr' )
									{{$insurancelist[$i]->name_tr}}
									@elseif ( Config::get('app.locale') == 'ar' )
									{{$insurancelist[$i]->name_ar}}
									@elseif ( Config::get('app.locale') == 'ru' )
									{{$insurancelist[$i]->name_ru}}
									@elseif ( Config::get('app.locale') == 'de' )
									{{$insurancelist[$i]->name_de}}
									@elseif ( Config::get('app.locale') == 'it' )
									{{$insurancelist[$i]->name_it}}
									@elseif ( Config::get('app.locale') == 'fr' )
									{{$insurancelist[$i]->name_fr}}
									@elseif ( Config::get('app.locale') == 'es' )
									{{$insurancelist[$i]->name_es}}
									@elseif ( Config::get('app.locale') == 'se' )
									{{$insurancelist[$i]->name_se}}
									@elseif ( Config::get('app.locale') == 'jp' )
									{{$insurancelist[$i]->name_jp}}
									@elseif ( Config::get('app.locale') == 'fa' )
									{{$insurancelist[$i]->name_fa}}
									@elseif ( Config::get('app.locale') == 'pr' )
									{{$insurancelist[$i]->name_pr}}
									@endif
								</a>
						    </div>
						    <div class="col-md-2 text-right">
								<i class="fa fa-angle-down" aria-hidden="true" ></i>
							</div>
						</div>
				      	<div>
				        	{!!$insurancelist[$i]->description!!}
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
