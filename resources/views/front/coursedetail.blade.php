@extends('front.index1')
@section('title', 'All School')
@section('content')
<!--City School Start-->
<!--City School Start-->
<section class="courses_sec city_school school_det_inn">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cus_title">
					<h1 class="distance">{{$course->schoolname}}</h1>
					<ul>
						<li><a href="{{route('mainhome')}}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li><a href="{{route('mainAllSchool')}}">School</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
						<li>{{$course->schoolname}}</li>
					</ul>
				</div> 
			</div>
		</div>	
	</div>
</section>
<!--City School End-->
<section class="school_det_inn">
	<div class="container">
		<div class="row">
			<div class="col-md-8 ">
				<div class="row bg-white pd_15 ml_10"> 
					<div class="col-md-4 program_img">
						<img src="{{asset('thumbnail_images/'.$course->image)}}" alt=""/>
					</div>
					<div class="col-md-8 deal_box no-border p0">
						<div class="program_txt city_head">
							<h2>{{$course->coursetitle}}</h2>
							<div class="rating_rev">
								<h6>Review</h6>
										<ul class="rgt-bor">
											<li><span class="fa fa-star checked"></span></li>
											<li><span class="fa fa-star checked"></span></li>
											<li><span class="fa fa-star checked"></span></li>
											<li><span class="fa fa-star"></span></li>
											<li class="white"><span class="fa fa-star"></span></li>
										</ul>
								<h5 class="age">Age: +{{$course->agelimit}}</h5>
								<div class="clearfix"></div>
							</div>
							<div class="lesson black">
								<h6 class="rgt-bor">Hours per week <span><b>{{$course->hours_per_week}}</b></span></h6>
								<h5 class="f13">Max group size <span class="f13"><b>{{$course->max_group_size}}</b> </span></h5>
							</div>
							{!!$course->description!!}
						</div>
					</div>
				</div>
				<div class="row course_pro city_head">
					<div class="col-md-12"><h2>Course Program</h2></div>
				</div>
				<div class="row bg-white mr_10 p10">
					<div class="col-md-10 review_form course_form_pro">
						<input type="text" disabled name="name" placeholder="{{$course->name}}">
					</div>
					<div class="col-md-2 fee pro_dur text-center ">
						<h3>&#163;</h3>
						<span> week</span>
					</div>
				</div>
				<!--<div class="row course_pro city_head">
					<div class="col-md-12"><h2>Accommodation Options</h2></div>
				</div>
				<div class="row bg-white mr_10 p10">
					<div class="col-md-10 review_form choose_sec">
						<div class="form-group select_dropdown mt_10 ">
							<select class="form-control">
								  <option>Select your accommodation option</option>
								  <option>Select your accommodation option</option>
								  <option>Select your accommodation option</option>
								  <option>Select your accommodation option</option>
							</select>
							<div class="select_arrow pr_10"><i class="fa fa-angle-down"></i></div>
						</div>
					</div>
					<div class="col-md-2 fee pro_dur text-center pt10">
						<h3>&#163;25.00</h3>
						<span>1 week</span>
					</div>
				</div>	
				<div class="row course_pro city_head">
					<div class="col-md-12"><h2>Airport Pickup</h2></div>
				</div>
				<div class="row bg-white mr_10 p10">
					<div class="col-md-10 review_form choose_sec">
						<div class="form-group select_dropdown mt_10">
							<select class="form-control">
								  <option>Select your transport</option>
								  <option>Select your transport</option>
								  <option>Select your transport</option>
								  <option>Select your transport</option>
							</select>
							<div class="select_arrow pr_10"><i class="fa fa-angle-down"></i></div>
						</div>
					</div>
					<div class="col-md-2 fee pro_dur text-center pt10">
						<h3>&#163;15.50</h3>
						<span>1 week</span>
					</div>
				</div>	
				<div class="row course_pro city_head">
					<div class="col-md-12"><h2>Insurance</h2></div>
				</div>
				<div class="row bg-white mr_10 p10">
					<div class="col-md-10 review_form choose_sec">
						<div class="form-group select_dropdown mt_10">
							<select class="form-control">
								  <option>Select your insurance</option>
								  <option>Select your insurance</option>
								  <option>Select your insurance</option>
								  <option>Select your insurance</option>
							</select>
							<div class="select_arrow pr_10"><i class="fa fa-angle-down"></i></div>
						</div>
					</div>
					<div class="col-md-2 fee pro_dur text-center pt10">
						<h3>&#163;30.05</h3>
						<span>1 week</span>
					</div>
				</div>
				<div class="row course_pro city_head">
					<div class="col-md-12"><h2>Visa</h2></div>
				</div>
				<div class="row bg-white mr_10 p10">
					<div class="col-md-10 review_form choose_sec">
						<div class="form-group select_dropdown mt_10 ">
							<select class="form-control">
								  <option>Select your visa</option>
								  <option>Select your visa</option>
								  <option>Select your visa</option>
								  <option>Select your visa</option>
							</select>
							<div class="select_arrow pr_10"><i class="fa fa-angle-down"></i></div>
						</div>
					</div>
					<div class="col-md-2 fee pro_dur text-center pt10">
						<h3>&#163;40.00</h3>
						<span>1 week</span>
					</div>
				</div>-->	
				<div class="row">
					<div class="col-md-12">
						<div class="course_pro city_head">
						<h2>Map</h2>
						</div>
					</div>
				</div>
				<div class="row bg-white p_20 mr_10">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119263355!2d-0.38178406930702025!3d51.52873519756608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1543052631363" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			
		</div>
	</div>
</section>
@endsection