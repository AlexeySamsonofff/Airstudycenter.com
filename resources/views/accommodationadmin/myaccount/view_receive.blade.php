@extends('accommodationadmin.layout.index_inbox')
@section('title','Dashboard')
@section('content')
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
		@include('accommodationadmin.layout.myaccount_leftside')
		<div class="col-md-1"></div>
		<div class="col-md-7 inbox-content" style="margin-top: 50px; margin-bottom: 100px;">
		<?php 
			if (Auth::check()) {
				$id = auth::user()->id;
				$user_name =DB::table('users')->select('name')->where('id',$id)->first();
				$receiver_name =DB::table('accommodations')->select('name')->where('id', $data->accommodationId)->first();				
			}
			?>
			<input type="hidden" id="acco_id" value="{{$data->id}}">
			<input type="hidden" id="sender_id"  value="{{$data->receiver_id}}">
			<input type="hidden" id="receiver_id" value="{{$data->sender_id}}">
			<div class="row m-0 btn-primary">
                    @if($data->read_flag ==0)
                      <a class="btn btn-primary btn-sm" href="{{url('/accommodation-admin/active_m/'.$data->id)}}">
                            <i class="fa fa-thumbs-down"></i>active
                      </a>
                    @else
                      <a class="btn btn-success btn-sm" href="#">
                          <i class="fa fa-thumbs-up"></i>apporove
                      </a>
                    @endif                                
			</div>
			<!--enquiry detail -->
			<div class="row m-0 mb-5 enquirydetail" >
				<div class="col-md-9 pl-md-0 pb-4 pr-0 mark1" >
					<p class="enquiryname_e">{{ $user_name->name }}  </p>
					<p class="mb-2 titlespan"><i class="fa fa-map-marker-alt pr-1"></i> {{$data->address }}</p>
					<p class="mb-2 titlespan"><i class="bg-light rounded-circle fa fa-utensils"></i> {{$data->accoType }}</p>	
					<p class="mb-2 titlespan"><i class="fa fa-calandar-alt"></i>{{$data->from}}</p>
					<p class="mb-2 titlespan"><i class="fa fa-users"></i>{{$data->weeks}} weeks</p>
				</div>				
				<div class="col-md-3 pl-1 pr-0 mark2">
					<img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle">
					<h5>£p/w {{$data->price }}<input type="hidden" name="price" value="{{$data->price}}"></h5>
						<h4 class="font-bold">£p/w {{$data->total_price}} <input type="hidden" name="total_price" value="{{$data->total_price}}">
					</h4>
                </div>
			</div>
			
		<!-- view message -->
        <!-- Left-aligned -->
        <div class="media">
            <div class="media-left">
                <img src="{{asset('normal_images/21548244636.jpg')}}" class="media-object rounded-circle" style="width:60px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$data->sender_id}}</h4>
                <p class="shadow-textarea" style="border-radius:10%">{{$data->message}}</p>
            </div>
		</div>
		<?php
			$receive_data = DB::table('emails')->where('accobook_id', $data->id)->first(); 
			?>
			@if($data->read_flag ==1)		
				@if(isset($receive_data->content))
				<!-- right-aligned -->
				<div class="media view_message" >            
					<div class="media-body">
						<p class="shadow-textarea view_content" style="border-radius:10%">
						{{$receive_data->content}}</p>
						</div>
					<div class="media-right">
						<img src="{{asset('accommodationadmin/app-assets/images/portrait/small/avatar-s-1.png')}}" class="media-object rounded-circle" style="width:60px">
					</div>
				</div>
				@endif
			@endif
		
			<!-- right-aligned -->
			<div class="media view_message" style="display:none">            
				<div class="media-body">
					<p class="shadow-textarea view_content" style="border-radius:10%"></p>
				</div>
				<div class="media-right">
					<img src="{{asset('accommodationadmin/app-assets/images/portrait/small/avatar-s-1.png')}}" class="media-object rounded-circle" style="width:60px">
				</div>
			</div>

      
		<!-- send message -->	
			<div class="media d-block d-md-flex mt-3 shadow-textarea">
				<div class="media-body text-center text-md-left">
					<h5 class="mt-0 font-weight-bold blue-text mb-3">Send {{$receiver_name->name}} a Message</h5>
                        <textarea class="form-control"  id="message"></textarea>
					<div style="margin-top:10px;"><button  class="btn btn-warning" onclick="send_message()">send</div>
				</div>
			</div>
			<!--end send message -->
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
		
	</div>
</div>
<script>

	function send_message(){
		var acco_id =$('#acco_id').val();
		var sender_id =$('#sender_id').val();
		var receiver_id =$('#receiver_id').val();
		var message=$('#message').val();
		console.log(message);
		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
		});
		$.ajax({
			url: '/accommodation-admin/send_message',
			data:{
				'acco_id':acco_id,
				'sender_id':sender_id,
				'receiver_id':receiver_id,
				'message':message,
			},
			dataType: "JSON",
			success: function (data) {
				$('#message').val('');
				$('.view_content').text(message);
				$('.view_message').css('display','block');
			}
	
		}) ;

	}

</script>
@endsection

