@extends('front.index1')
@section('title', 'User Profile')
@section('content')
 <!-- Profile section starts  -->
<section>
	 @php
    $user_id = Auth::user()->id; 
    $getrole = App\UserRole::where('user_id', $user_id)->first();
      if($getrole){
              $role_id = $getrole->role_id;
              $role = App\Role::where('id', $role_id)->first();
              $role = $role->name;
         }
    @endphp	 
<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic col-lg-12 text-center float-left">
						<a href="/users" class=""><img title="profile image" class="img-circle img-responsive" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a>
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							Marcus Doe
						</div>
						<div class="profile-usertitle-job">
							Developer
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<button type="button" class="btn btn-success btn-sm">Follow</button>
						<button type="button" class="btn btn-danger btn-sm">Message</button>
					</div>
					<!-- END SIDEBAR BUTTONS -->
					<div class="profile-usermenu">
							<ul class="nav">
									<li class="active">
										<a href="{{route('userProfile')}}"> 
										Overview </a>
									</li>
									<li>
										<a href="{{route('refferFriend')}}"> 
										Invite Friends </a>
									</li>
									<li>
										<a href="{{route('myCredit')}}"> 
										My Credits</a>
									</li>
									<li>
										<a href="{{route('savedSchool')}}"> 
										My Saved Schools </a>
									</li>
									<li>
										<a href="{{route('paidCourse')}}">
											Paid Courses
										</a>
									</li>
									<li>
										<a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Logout</a> </li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
										</a>
									</li>
								</ul>
					</div>
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
				<div class="profile-content">
					<div class="clearfix"></div>
					<!-- paid courses content starts -->	
					<div class="col-md-12">
						<div class="row">
								<div class="inner_refer mt-0 bg-light"> 	
										<div class="row">
											<div class="col-md-10 col-sm-10 col-xs-10 offset-xs-1 offset-md-1 offset-sm-2 text-center">		
												<div class="cus_title refer_txt">
													<h5>Share Your Link</h5>	
												</div>
												<p class="custom_p main-head">Introduce a friend to Airstudy Center. They' ll  get $35 in study 
												credit when they sign up, and you' ll get $20 in study credit once they complete a course. Only 
												for new  Airstudy Center<br/> Guests! Read the terms</p>
											</div>	
										</div>
										<div class="share_links">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
												<div class="row">
													<ul>
							<li><a href="https://web.whatsapp.com/send?text=http://smartit.ventures/AS/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/whatsapp.png')}}"/><span>Whatsapp</span></a></li>
							<li><a href="https://plus.google.com/share?url=http://smartit.ventures/AS/school_listing_project/public/?code={{$concatinate}}"
   title="Share by Email"><img class="full" src="{{asset('front/images/rsz_google-logo-1-resized.jpg')}}"/><span>Email</span></a></li>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://smartit.ventures/AS/school_listing_project/public/?code={{$concatinate}}" target="_blank"><img class="full" src="{{asset('front/images/facebook.png')}}"/><span>Facebook</span></a></li>
							<li><a href="https://twitter.com/intent/tweet?url=http://smartit.ventures/AS/school_listing_project/public/?code={{$concatinate}}"><img class="full" src="{{asset('front/images/twiter.png')}}"/><span>Twitter</span></a></li>
							<li><a href="#"><img class="full" src="{{asset('front/images/linkdin.png')}}"/><span>Linkedin</span></a></li>
						</ul>
												</div>
											</div>
										</div>
										<div class="col-md-10 col-sm-10 col-xs-10 offset-md-1 offset-sm-1 text-center or">
											<span>OR</span>
											<p>Share The Link</p>
											<div class="row">
												<div class="col-md-8 col-sm-8 col-xs-9 input-field input-link review_form">
													<input class="form-control w-100" value="http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}">
												</div>
												<div class="col-md-4 col-sm-4 col-xs-3 pl-0 text-center invite_send">
													<a class="send" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://d4b28c5e.ngrok.io/keeram/school_listing_project/public/?code={{$concatinate}}">Send Invite</a>
												</div>
											</div>
										</div>
									</div>
						</div>
					</div>
					<!-- paid courses content finsih -->
				</div>
			</div>
		</div>
	</div> 
</section>
 <!-- profile section finish -->
@endsection