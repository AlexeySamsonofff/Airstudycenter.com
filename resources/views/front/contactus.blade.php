@extends('front.index1')
@section('title', 'Contact Us')
@section('content')
<div class="container-fluid about_inner">
	<div class="container">
		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
			</div>
		@endif
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top : 145px !important">
				<div class="about_sec custom_tag_head ">
					<h3 class="pd_l10">@lang('contact.contactus')</h3>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-md-8">
					<div class="contact_inn city_head"> 
						<form  method="post" action="{{route('contactusData')}}">
                   {{ csrf_field()}}
							<div class="row review_form">
								<div class="col-md-6">
									<input type="text" name="name" placeholder="@lang('contact.name_form')"  pattern="[A-Za-z\s]+" title="Enter only letters" value="{{old('name')}}" required>
								</div>
								<div class="col-md-6 mail">
									<input type="email" name="email" placeholder="@lang('contact.email_form')"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{old('email')}}" required>
								</div>
							</div>
							<div class="row review_form">
								<div class="col-md-6">
									<input type="number" name="mobile" placeholder="@lang('contact.phone_form')" value="{{old('mobile')}}" required>
								</div>
								<div class="col-md-6 mail">
									<input type="text" name="subject" placeholder="@lang('contact.subject_form')" value="{{old('subject')}}" required>
								</div>
							</div>
							<div class="row review_form coment">
								<div class="col-md-12">
									<textarea class="form-control rounded-0" name="message" id="exampleFormControlTextarea2" rows="3" placeholder="@lang('contact.message_form')" required>{{old('message')}}</textarea>
								</div>
							</div>
							  <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>
                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
							<div class="post_button subscribe_inner ">
								<input type="submit" value="@lang('contact.submit')" style="cursor:pointer;">
							</div>
						</form>
						</div>
					</div>
				<div class="col-md-4">
					<div class="contact_inn city_head pd_l10"> 
						<h3>@lang('contact.quick')</h3>
						<div class="con_add">
							<div class="row">
								<div class="col-md-3">
									<i class="fa fa-map-marker"></i>
								</div>
								<div class="col-md-9 add_txt">
									<h4>@lang('contact.address'):</h4>
									<span>47 Destiny Common, South London</span>
								</div>
							</div>
							<div class="row con_mail">
								<div class="col-md-3">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="col-md-9 add_txt">
									<h4>@lang('contact.email'):</h4>
									<span>info@airstudycenter.com</span>
								</div>
							</div>
							<div class="row con_phn">
								<div class="col-md-3">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="col-md-9 add_txt">
									<h4>@lang('contact.phone'):</h4>
									<span>+49-233-322-333</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row con_map pd_t10">
			<div class="col-md-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119263355!2d-0.38178406930702025!3d51.52873519756608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1543052631363" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>

@endsection