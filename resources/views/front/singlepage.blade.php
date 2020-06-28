@extends('front.index1')
@section('title', 'All School')
@section('content')
<div class="container-fluid about_inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 145px !important">
@if (\Session::has('success'))
<div class="alert alert-success">
{!! \Session::get('success') !!}
    </div>
@endif
				<div class="about_sec custom_tag_head">
					<h3><span>@lang('page.welcome_to') </span>@lang('page.asc')</h3>
					
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 wd100_xs">
					<div class="about_img">
						<img class="img-responsive" src="{{$pagedata->image}}" alt=""/>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 wd100_xs">
					<div class="about_txt">
						@if ( Config::get('app.locale') == 'en')
		                  <h2>{{$pagedata->title}}</h2>
						{!! $pagedata->description  !!}
		                @elseif ( Config::get('app.locale') == 'tr' )
		                  <h2>{{$pagedata->title_tr}}</h2>
						{!! $pagedata->description_tr  !!}
		                @elseif ( Config::get('app.locale') == 'ar' )
		                  <h2>{{$pagedata->title_ar}}</h2>
						{!! $pagedata->description_ar  !!}
		                @elseif ( Config::get('app.locale') == 'ru' )
		                  <h2>{{$pagedata->title_ru}}</h2>
						{!! $pagedata->description_ru  !!}
		                @elseif ( Config::get('app.locale') == 'de' )
		                  <h2>{{$pagedata->title_de}}</h2>
						{!! $pagedata->description_de  !!}
		                @elseif ( Config::get('app.locale') == 'it' )
		                  <h2>{{$pagedata->title_it}}</h2>
						{!! $pagedata->description_it  !!}
		                @elseif ( Config::get('app.locale') == 'fr' )
		                  <h2>{{$pagedata->title_fr}}</h2>
						{!! $pagedata->description_fr  !!}
						@elseif ( Config::get('app.locale') == 'es' )
		                  <h2>{{$pagedata->title_es}}</h2>
		                {!! $pagedata->description_es  !!}
		                @elseif ( Config::get('app.locale') == 'se' )
		                  <h2>{{$pagedata->title_se}}</h2>
		                {!! $pagedata->description_se  !!}  
		                @elseif ( Config::get('app.locale') == 'jp' )
		                  <h2>{{$pagedata->title_jp}}</h2>
		                {!! $pagedata->description_jp !!}  
		                @elseif ( Config::get('app.locale') == 'fa' ) 
		                  <h2>{{$pagedata->title_fa}}</h2>
		                {!! $pagedata->description_fa  !!}         
		                @elseif ( Config::get('app.locale') == 'pr' )
		                  <h2>{{$pagedata->title_pr}}</h2>
		                {!! $pagedata->description_pr  !!}        
                        @endif 
						
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
				<h3>@lang('page.subscribe1')<span>  @lang('page.us')</span></h3>
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
			