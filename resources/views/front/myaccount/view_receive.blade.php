@extends('front.index1')
@section('title', 'User Profile')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<div style="background-color: #373f50; color:white;">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h2 class="left-menu-title" style="font-weight: bold;padding-top: 30px">Inbox</h2>
	                </div>
	            </div>
	            <div class="about_sec custom_tag_head">
	                <div class="about_sec custom_tag_head">
	                    <h6 style="font-weight: bold;padding: 30px 0px 20px 455px"></h6>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="row">
		@include('front.myaccount_leftside')
		<div class="col-md-1"></div>
		<div class="col-md-7 inbox-content" style="margin-top: 50px; margin-bottom: 100px;">
		<?php 
			if (Auth::check()) {
				$id = auth::user()->id;
				$user_name =DB::table('users')->select('name')->where('id',$id)->first();
				$receiver_name =DB::table('accommodations')->select('name')->where('id', $data->accommodationId)->first();				
			}
			?>
		<form method="POST" action="{{url('/bookaccommodation')}}">
			@csrf
			<input type="hidden" name="accommodationId" value="{{$data->accommodationId}}">			
			<div class="row m-0 btn-primary">
					@if($data->read_flag ==1)
					<div class="col-9"><p  style="padding:10px;">Great news! {{$receiver_name->name}} approved availability!</p></div>
					<div class="col-3" style="padding:10px;" ><button type="submit" class="btn btn-warning payacco">paynow!</button></div>
                    @else
                          <p style="padding:10px;">Waiting for {{$receiver_name->name }} to approve availability! </p>
                    @endif 
				
			</div>
			<!--enquiry detail -->
			<div class="row m-0 mb-5 enquirydetail" >
				<div class="col-md-9 pl-md-0 pb-4 pr-0 mark1" >
					<p class="enquiryname_e">{{ $user_name->name }}  </p><input type="hidden" name="accomoName" value="{{$user_name->name}}">
					<p class="mb-2 titlespan"><i class="fas fa-map-marker-alt pr-1"></i> {{$data->address }}</p><input type="hidden" name="address" value="{{$data->address}}">
					<p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-utensils"></i> {{$data->accoType }}</p>	<input type="hidden" name="accoType" value="{{$data->accoType}}">	
					<input type="hidden" name="accFood" value="{{$data->accFood}}">			
					<p class="mb-2 titlespan" ><i class="bg-light rounded-circle far fa-calendar-alt"></i> {{ $data->from }}</p><input type="hidden" name="from" value="{{$data->from}}" >
					<p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-users"> {{$data->weeks}}</i>weeks</p>  <input type="hidden" name="duration" value="{{$data->weeks}}">
				</div>				
				<div class="col-md-3 pl-1 pr-0 mark2">
					<img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle">
					<h5>£p/w {{$data->price }}<input type="hidden" name="price" value="{{$data->price}}"></h5>
						<h4 class="font-bold">£p/w {{$data->total_price}} <input type="hidden" name="total_price" value="{{$data->total_price}}">
					</h4>
                </div>
			</div>
			</form>
		<!-- view message -->
			<div class="media d-block d-md-flex">
				@if (isset($userprofile->image) && $userprofile->image != '')
					<img src="{{asset('/normal_images/'.$userprofile->image)}}" alt="User Avatar" class="img-owner rounded-circle">
				@else
					<img src="{{asset('/normal_images/21548244636.jpg')}}" alt="User Avatar" class="img-owner rounded-circle" >
				@endif				
			
				<div class="media-body text-center text-md-left ml-md-3 ml-0">
					<h5 class="mt-0 font-weight-bold blue-text"> {{$user_name->name}} </h5>
					<div class="shadow-textarea" style="border-radius:12%;">{{$data->message}}</div>

					@if($data->read_flag ==1)
					<?php
					$receive_data = DB::table('emails')->where('accobook_id', $data->id)->first(); 
					?>
					<div class="media d-block d-md-flex mt-3">
						<img class="img-owner  rounded-circle avatar" src="https://mdbootstrap.com/img/Others/documentation/img (3)-mini.jpg"
						alt="Generic placeholder image">
						<div class="media-body text-center text-md-left ml-md-3 ml-0">
							<h5 class="mt-0 font-weight-bold blue-text mb-3">{{$receiver_name->name }}</h5>
							<div class="form-group basic-textarea rounded-corners mb-md-0 mb-4">
								<div class="shadow-textarea" style="border-radius:12%;">{{$receive_data->content}}</div>
							</div>
						</div>
					</div>
					@endif

				</div>
			</div>
		
		<!-- send message -->	
			<div class="media d-block d-md-flex mt-3 shadow-textarea">
				<div class="media-body text-center text-md-left">
					<h5 class="mt-0 font-weight-bold blue-text mb-3">Send {{$receiver_name->name}} a Message</h5>
					<div class="form-group basic-textarea rounded-corners mb-md-0 mb-4">
						<textarea class="form-control z-depth-1" id="exampleFormControlTextarea3" rows="3" placeholder="Write your comment..."></textarea>
					</div>
					<div style="margin-top:10px;"><span class=" btn btn-warning">send</send></div>
				</div>
			</div>
			<!--end send message -->
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
		
	</div>
</div>
@endsection