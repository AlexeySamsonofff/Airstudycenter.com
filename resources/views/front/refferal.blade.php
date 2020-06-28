@extends('front.index1')
@section('title', 'All School')
@section('content')

<!-- Inner Refferal Starts -->
<section class=" refer_friend">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="cus_title">
						<h1>Refer A Friend</h1>
						<ul>
							<li>Home</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
							<li>Refer a friend</li>
						</ul>
					</div> 
			</div>
		</div>
		<div class="inner_refer"> 	
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12 offset-md-2 offset-sm-2 text-center">		
					<div class="cus_title refer_txt">
						<h5>Share Your Link</h5>	
					</div>
					<p class="custom_p main-head">Introduce a friend to Airstudy Center. They' ll  get $35 in study 
					credit when they sign up, and you' ll get $20 in study credit once they complete a course. Only 
					for new  Airstudy Center<br/> Guests! Read the terms</p>
				</div>	
			</div>
			<div class="share_links">
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-lg-2 text-center">
					<div class="row">
						<ul>
							<li><a href="https://web.whatsapp.com/send?text=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/whatsapp.png')}}"/><span>Whatsapp</span></a></li>
							<li><a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}."
   title="Share by Email"><img class="full" src="{{asset('front/images/email.png')}}"/><span>Email</span></a></li>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}" target="_blank"><img class="full" src="{{asset('front/images/messenger.png')}}"/><span>Facebook</span></a></li>
							<li><a href="https://twitter.com/intent/tweet?url=http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/twitter.png')}}"/><span>Twitter</span></a></li>
							<li><a href="#"><img class="full" src="{{asset('front/images/in.png')}}"/><span>Linkedin</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-10 offset-md-1 offset-sm-1 text-center or">
				<span>OR</span>
				<p>Copy the Share Link</p>
				<div class="row">
					<div class="col-md-9 col-sm-9 col-xs-9 input-field input-link review_form">
						<input class="form-control">
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 text-center invite_send">
						<a class="send" href="#">Send Invite</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Inner Refferal Ends -->

@endsection