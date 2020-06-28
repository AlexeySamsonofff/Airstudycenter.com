@extends('front.index1')
@section('title', 'All School')
@section('content')
<div class="container-fluid about_inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 145px !important">
				<div class="about_sec custom_tag_head">
					<h3><span>Welcome to</span> Air Study Center</h3>
					<p>Register Your Accomodation Here.</p>
				</div>
			</div>
		</div>
			<div class="row custom_padding pd_b50 ">
				<div class="col-md-6 col-sm-6 col-xs-12 wd100_xs  ">
					<div class="about_img h_324 ">
						<img class="img-responsive" src="{{asset('front/images/about_3.jpg')}}" alt=""/>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 wd100_xs ">
					<form method="POST" action="{{ route('register') }}">
                        @csrf
               <input type="hidden" name="role" value="Accommodation Admin">
               <div class="form-group">
                  <label for="usr">Name</label>
                  <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" title="Enter only letters" required/>
                  @if ($errors->has('name'))
                  <label id="name-error" class="error siguperror" for="name">{{ $errors->first('name') }}</label>
                  @endif
                </div>
                <div class="form-group input_email">
                  <label for="email">Email</label>
                  <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" required/>
                  @if ($errors->has('email'))
                  <label id="name-error" class="error siguperror" for="name">{{ $errors->first('email') }}</label>
                  @endif
                </div>
                <div class="form-group pass_input mt_10">
                  <label for="pwd">Password</label>
                  <input type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="password" name="password"/>
                  @if ($errors->has('password'))
                   <label id="name-error" class="error siguperror" for="name" required>{{ $errors->first('password') }}</label>
                  @endif 
                </div>
                <div class="form-group pass_input mt_10">
                  <label for="pwd">Confirm Password</label>
                  <input type="password" class="form-control" id="password_again" name="password_confirmation" required/>
                </div>
                <div class="form-group pass_input mt_10">
                  <!-- <label for="pwd">Confirm Password</label> -->
                  <p><span class="tandc"><input type="checkbox" name="term&condition" required/></span> I agree to the Terms and Conditions</p>
                </div>
                <div class="reg_btn text-center" >
                  <button type="submit" class="btn btn-secondary sign_btn">Register Now</button>
                  <a href="{{ route('login') }}">
                      <button type="button" class="btn btn-secondary sign_btn">Sign in</button>
                  </a>
                </div>
                    </form>
                  
				</div>
			</div>
	</div>
</div>
@endsection
			