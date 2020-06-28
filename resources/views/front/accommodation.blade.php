@extends('front.index1')
@section('title', 'All Accommodation')
@section('content')
<!--Accommodation Head  Start-->
<section class="courses_sec city_school">
	<div class="container" style="margin-top : 145px !important">
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="cus_title acc_head ">
					<h1 class="distance">@lang('accommodation.accommodation')</h1>
					<ul>
						<li><a href="{{route('mainhome')}}">@lang('accommodation.home')</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>@lang('accommodation.accommodation')</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Accommodation Head End-->
<!--Book Accommodation Inner Start-->
<section class="acc_book booking_st">
	<div class="container">
		<form action="{{route('accommodationSearch')}}" method="post">
			{{ csrf_field()}}
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>@lang('accommodation.bys')</h2>
			</div>
		</div>
		<div class="row booking_address">
			<div class="col-md-3">
				<div class="input-field book_add">
					<i class="fa fa-map-marker"></i>
					<input id="autosearchcity" name="city" type="text" placeholder="@lang('accommodation.sc')">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div class='input-group'>
						<input type="text" name="address" id="autosearchacctitle" placeholder="@lang('accommodation.st1')" />
					</div>
				</div>
			</div>

			<div class="col-md-3 choose_sec guest_input">
				<div class="form-group select_dropdown ">
						<select class="form-control" name="accType">
							<option value="">@lang('accommodation.st2')</option>
							  <option value="independent">@lang('accommodation.independent')</option>
							  <option value="shared">@lang('accommodation.shared')</option>
						</select>
				<div class="select_arrow acc_arr"><i class="fa fa-angle-down"></i></div>
				</div>
			</div>
			<div class="col-md-2 book_now check_btn text-center">
				<input type="submit" value="@lang('accommodation.search')" class="btn" style="cursor: pointer; background: #333; border:0; color:#fff;">
			</div>
		</div>
	</form>
	</div>

</section>
<!--Book Accommodation Inner End-->
<!--  Accommodation Inner Start-->
<section class="acc_flats">
	<div class="container">
		<div class="col-md-12">
			<div class="row ">

				<ul class="breadcrumb bg-white p-0">
					<li class="display-5"> @lang('accommodation.showing') <span>{{count($accommodations)}}</span> @lang('accommodation.results')</li>
					</ul>
			 </div>
		</div>
		@foreach($accommodations as $accommodation)
		<div class="col-md-12 course_inner p_0 flats">
			<div class="row">

			<div class="col-md-4 col-sm-4 col-xs-4 accmodation-image acc_flat_1">
				 @if($accommodation->image != null)
                        <img class="full_img"src="{{asset('thumbnail_images/'.$accommodation->image)}}">
                        @else
                        <img class="full_img"  src="{{asset('front/images/image-not-available.png')}}">
                        @endif
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8 pl-md-0 w_100">
				<div class=" amaz_flat col-md-12 pl-xs-1 pl-md-0 pl-lg-1">
					<div class="row">
					<div class="col-md-8 col-lg-9 flat_txt about_sch">
                            @if ( Config::get('app.locale') == 'en')
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'tr' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_tr}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_tr, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'ar' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_ar}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_ar, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'ru' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_ru}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_ru, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'de' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_de}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_de, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'it' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_it}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_it, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
			                @elseif ( Config::get('app.locale') == 'fr' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_fr}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_fr, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
						@elseif ( Config::get('app.locale') == 'es' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_es}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_es, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
						@elseif ( Config::get('app.locale') == 'se' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_se}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_se, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
						@elseif ( Config::get('app.locale') == 'fa' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_fa}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_fa, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
						@elseif ( Config::get('app.locale') == 'pr' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_pr}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_pr, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
						@elseif ( Config::get('app.locale') == 'jp' )
			                  <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}"><h2>{{$accommodation->name_jp}}</h2></a>
			                  <h5><i class="fa fa-map-marker"></i>{{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</h5>
						@php $small = substr($accommodation->description_jp, 0, 300);  @endphp
						<p>{!! $small !!}...</p>
                            @endif
					</div>


					<div class="col-md-4 col-lg-3 text-center owner_img">
						<div class="profile-pic-user accomodation-user-pic">
						  <img src="{{asset('/normal_images/'.$accommodation->owner_image)}}" alt="">
				                @if ( Config::get('app.locale') == 'en')
				                  <h5>{{$accommodation->owner_name}}</h5>
				                @elseif ( Config::get('app.locale') == 'tr' )
				                  <h5>{{$accommodation->owner_name_tr}}</h5>
				                @elseif ( Config::get('app.locale') == 'ar' )
				                  <h5>{{$accommodation->owner_name_ar}}</h5>
				                @elseif ( Config::get('app.locale') == 'ru' )
				                  <h5>{{$accommodation->owner_name_ru}}</h5>
				                @elseif ( Config::get('app.locale') == 'de' )
				                  <h5>{{$accommodation->owner_name_de}}</h5>
				                @elseif ( Config::get('app.locale') == 'it' )
				                  <h5>{{$accommodation->owner_name_it}}</h5>
				                @elseif ( Config::get('app.locale') == 'fr' )
				                  <h5>{{$accommodation->owner_name_fr}}</h5>
				                @elseif ( Config::get('app.locale') == 'es' )
				                  <h5>{{$accommodation->owner_name_es}}</h5>
				                @elseif ( Config::get('app.locale') == 'pr' )
				                  <h5>{{$accommodation->owner_name_pr}}</h5>
				                @elseif ( Config::get('app.locale') == 'se' )
				                  <h5>{{$accommodation->owner_name_se}}</h5>
				                @elseif ( Config::get('app.locale') == 'fa' )
				                  <h5>{{$accommodation->owner_name_fa}}</h5>
				                @elseif ( Config::get('app.locale') == 'jp' )
				                  <h5>{{$accommodation->owner_name_jp}}</h5>
                          @endif
					    </div>
					</div>
</div>
				</div>
			<div class="rev_sec col-md-12">
				<div class="row">
				<div class="review_rgt">
							<div class="school_comment AirSmallStar">
						   <div id="AirStudyOverallComments" class="AirStudyMultipleComment">
						   	<?php
                           $alltotal  = $accommodation->review_rate_fcourse+$accommodation->review_rate_fcourse1+$accommodation->review_rate_fcourse2+$accommodation->review_rate_fcourse3;
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
						         <span class="AirStudyNumbers_get">{{$starNumber}}</span><span class="AirStudyNumbers_from">/5.0</span>
						      </div>
						   </div>
						</div>

					 </div>
				<div class="col-md-6 week_pr mt_5">
					<h6>@lang('accommodation.at'):<span class="orange_font pr_0">
						@if($accommodation->roomtype == 'shared')
						@lang('accommodation.shared')
                        @else
                        @lang('accommodation.independent')
                        @endif
					</span></h6>
					<!--<h6>Weekly Price:<span class="orange_font pr_0">&#163;120.80</span></h6>-->
				</div>
				<div class="col-md-4 chk_ava book_now text-right">
					<a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}">@lang('accommodation.ca')</a>
				</div>
</div>

			</div>
		</div>
		</div>
		</div>
		@endforeach
<div class="pager mainepager">
    {{$accommodations->links()}}
</div><!-- /.pagination -->
	</div>
</section>
<div class="subscribe_sec">
        <div id="map_canvas" style="width:100%; height:450px;"></div>
</div>
<!--  Accommodation Inner End-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;"></script>
<?php



$locations = array();
$i = 1;
foreach($accommodations as $accommodation) {
    $locations[] = array(
        '0' =>'Location '.$i,
        '1' => $accommodation->address.','.$accommodation->city.','.$accommodation->country,
        '2' => $accommodation->city
    );
    $i++;
}
?>
<script>
var locations = <?php echo json_encode($locations); ?>;

var geocoder;
var map;
var bounds = new google.maps.LatLngBounds();

function initialize() {
    map = new google.maps.Map(
    document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(-22.915,-0.120850),
        zoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
     map.setOptions({ minZoom: 0, maxZoom: 15 });
    geocoder = new google.maps.Geocoder();

    for (i = 0; i < locations.length; i++) {
        geocodeAddress(locations, i);
    }
}
google.maps.event.addDomListener(window, "load", initialize);

function geocodeAddress(locations, i) {
    var title = locations[i][0];
    var address = locations[i][1];
    var url = locations[i][2];
    geocoder.geocode({
        'address': locations[i][1]
    },

    function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url
            })
            infoWindow(marker, map, title, address, url);
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
        } else {
            alert("geocode of " + address + " failed:" + status);
        }
    });
}

function infoWindow(marker, map, title, address, url) {
    google.maps.event.addListener(marker, 'click', function () {
        var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div></p></div>";
        iw = new google.maps.InfoWindow({
            content: html,
            maxWidth: 350
        });
        iw.open(map, marker);
    });
}

function createMarker(results) {
    var marker = new google.maps.Marker({
        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
        map: map,
        position: results[0].geometry.location,
        title: title,
        animation: google.maps.Animation.DROP,
        address: address,
        url: url
    })
    bounds.extend(marker.getPosition());
    map.fitBounds(bounds);
    infoWindow(marker, map, title, address, url);
    return marker;
}


</script>
@endsection
