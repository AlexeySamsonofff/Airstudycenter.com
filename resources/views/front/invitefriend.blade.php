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
	                    <h2 class="left-menu-title" style="font-weight: bold;padding-top: 30px">Invite friends</h2>
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
		<div class="col-md-7" style="padding-left: 25px; padding-right: 25px">
			<div class="row" style="padding-top: 20px">
				<div class="form-group labels-div col-md-12">
		            <strong>Recommend Air Study Centre, earn credits in return.</strong>
		            <p>Introduce a friend to Airstudy Center. They will get £2 in study credit when they sign up, and
						you will get £1 in study credit once they complete a course. <br>Only for new Airstudy Center
						Guests! T&Cs apply.</p>
		        </div>
			</div>
			<div class="row">
				<div class="form-group labels-div col-1" style="margin-right: 20px;">
		            <a href=""><img src="https://i2.wp.com/www.vectorico.com/wp-content/uploads/2018/02/Whatsapp-Icon.png?resize=300%2C300" alt="" class="rounded-circle" style="width: 40px;"></a>
		        </div>
		        <div class="form-group labels-div col-1" style="margin-right: 20px;">
		            <a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" alt="" class="rounded-circle" style="width: 40px;height:40px;"></a>
		        </div>
		        <div class="form-group labels-div col-1" style="margin-right: 20px;">
		            <a href=""><img src="https://i1.wp.com/www.vectorico.com/wp-content/uploads/2018/02/Facebook-Icon.png?resize=300%2C300" alt="" class="rounded-circle" style="width: 40px"></a>
		        </div>
		        <div class="form-group labels-div col-1" style="margin-right: 20px;">
		            <a href=""><img src="https://image.flaticon.com/icons/svg/124/124021.svg" alt="" class="rounded-circle" style="width: 40px;"></a>
		        </div>
		        <div class="form-group labels-div col-1" style="margin-right: 20px;">
		            <a href=""><img src="https://cdn3.iconfinder.com/data/icons/social-icons-5/606/LinkedIn.png" alt="" class="rounded-circle" style="width: 40px;"></a>
		        </div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="form-group labels-div col-md-12">
		            <p>or</p>
		        </div>
			</div>
			<form action="{{ route('process') }}" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="form-group labels-div col-md-6">
		            <label for="url" class="mb-0">Share the link below</label>
		            <div class="input-group">
			            <input type="text" class="form-control" id="url" name="url" value ="http://airstudycenter.com/accept/{{$invite->token}}" readonly="">
			            <div class="input-group-append" onclick="copy_url()">
			            	<span class="input-group-text" style="height:43.2px;margin-top: 5px;"><i class="fa fa-copy"></i></span>
			        	</div>
			        </div>
		        </div>
			</div>
			<div class="row">
				<div class="form-group labels-div col-md-6">
					<input type="email" class="form-control" id="email" name="email" placeHolder="Email Address" value="" required>
		        </div>
		        <div class="form-group labels-div col-md-6">
		            <button type="submit" class="text-center btn btn-warning btnBlog font-weight-bold btn-hover-trasparent" style="color: white;margin-top: 8px">Send via email</button>
					<input type="hidden" name="token" value="{{$invite->token}}"> 
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
	function copy_url() {
	  	var copyText = document.getElementById("url");
	  	copyText.select();
	  	copyText.setSelectionRange(0, 99999)
	  	document.execCommand("copy");
	}
	
</script>
@endsection