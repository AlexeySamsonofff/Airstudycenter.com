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
						<h2 class="left-menu-title" style="font-weight: bold;padding-top: 30px">Profile info</h2>
					</div>
				</div>
				<div class="about_sec custom_tag_head">
					<div class="about_sec custom_tag_head">
						<h6 style="font-weight: bold;padding: 30px 0px 20px 455px"><span class="profile_head">Uploaded your profile details below</span></h6>
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
		<div class="col-md-7" style="margin-top: 50px; margin-bottom: 100px;">
			<form method="POST" action="{{route('updateUserInfo')}}">
				@csrf
				<div class="row" style="background-color: #eaebee; padding: 20px 0px; margin-left: 0px; margin-right: 0px">
					<div class="form-group labels-div col-3">
					@if (isset($userprofile->image) && $userprofile->image != '')
						<img style="width:100px;height:100px;" src="{{asset('/normal_images/'.$userprofile->image)}}" class="uploadpreview" alt="User Avatar" >
    		        @else
                		<img style="width:100px;height:100px;" src="{{asset('/normal_images/21548244636.jpg')}}" alt="User Avatar" class="uploadpreview">
            		@endif

					</div>
					<input class="uploadfile" type="file" id="asdasd" style="width: 100px;position: absolute;left: 126px;display: none;">
					<div class="form-group labels-div col-8">
						<a class="text-center btn btn-light btnBlog font-weight-bold" id="upload_btn"><i class="far fa-cloud-upload"></i> Change avatar</a>
						<p style="padding-top: 10px">Upload .JPG or .PNG image. 300 x 300 required.</p>
					</div>
				</div>
				<div class="row" style="padding-top: 20px">
					<div class="form-group labels-div col-md-6">
						<label for="name" class="mb-0">First Name</label>
						<input type="text" class="form-control" id="firstname" name="firstname" placeholder="John" value="<?php $name = explode(' ', $userprofile->name); echo $name[0]; ?>" required>
					</div>
					<div class="form-group labels-div col-md-6">
						<label for="name" class="mb-0">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Smith" value="<?php $name = explode(' ', $userprofile->name); if (isset($name[1])) { echo $name[1]; } ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group labels-div col-md-6">
						<label for="email" class="mb-0">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="yourworkemail@domain.com" value="{{$userprofile->email}}" required>
					</div>
					<div class="form-group labels-div col-md-6">
						<label for="name" class="mb-0">Phone Number</label>
						<input type="tel" class="form-control" id="phone" name="phone" placeholder="Optional" value="{{isset($userinfo->phone) ? $userinfo->phone : ''}}">
					</div>
				</div>
				<div class="row">
					<div class="form-group labels-div col-md-6">
						<label for="password" class="mb-0">New Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="●●●●●●●●●●">
							<div class="input-group-append">
								<span class="input-group-text" style="height:43.2px;margin-top: 5px;"><i toggle="#password" class="fa fa-eye" id="toggle-password"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group labels-div col-md-6">
						<label for="rpassword" class="mb-0">Confirm Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="●●●●●●●●●●">
							<div class="input-group-append">
								<span class="input-group-text" style="height:43.2px;margin-top: 5px;"><i toggle="#rpassword" class="fa fa-eye" id="toggle-rpassword"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div>
					<hr style="border-bottom: #126470 0.8px solid;">
				</div>
				<div class="row">
					<div class="form-group labels-div col-md-6">
						<label class="container-checkbox">Subscribe me to Newsletter
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-group labels-div col-md-6" align="right">
						<button class="text-center btn btn-warning btnBlog font-weight-bold btn-hover-trasparent" style="color: white">Update Profile</button>
						<input type="hidden" name="userid" value="{{$userprofile->id}}">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
			<div class="row">&nbsp;</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#toggle-password").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
	$("#toggle-rpassword").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
	$("#upload_btn").on('click',function(){
		//alert($("#asdasd").prop('id'));
		$(".uploadfile").trigger('click');
	});
	$(".uploadfile").on('change',function(){
		$('.uploadpreview').src="";
		readURL(this, "uploadpreview");
	});
	function readURL(input, f) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.' + f).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection