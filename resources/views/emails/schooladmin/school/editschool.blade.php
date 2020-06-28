@extends('schooladmin.layout.index')
@section('title','School')
@section('content')

 <!-- Form wizard with step validation section start -->
     <div class="app-content content container-fluid">
    <div class="content-wrapper">

       @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

            @php

            Session::forget('success');

            @endphp

        </div>

        @endif

               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error) 

                <li>{{ $error}}</li>

    @endforeach 
        </ul>
    </div>
@endif 
     <!--  <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Form Wizard</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Page</a>
                </li>
                <li class="breadcrumb-item active">Form Wizard
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-xs-12">
          <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right">
            <div role="group" class="btn-group">
              <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false" class="btn btn-outline-primary dropdown-toggle dropdown-menu-right"><i class="ft-cog icon-left"></i> Settings</button>
              <div aria-labelledby="btnGroupDrop1" class="dropdown-menu"><a href="card-bootstrap.html" class="dropdown-item">Bootstrap Cards</a>
                <a href="component-buttons-extended.html" class="dropdown-item">Buttons Extended</a>
              </div>
            </div><a href="calendars-clndr.html" class="btn btn-outline-primary"><i class="ft-mail"></i></a>
            <a href="timeline-center.html" class="btn btn-outline-primary"><i class="ft-pie-chart"></i></a>
          </div>
        </div>
      </div> -->
      <div class="content-body">
        <!-- Form wizard with number tabs section start -->
       
        <!-- Form wizard with number tabs section end -->
        <!-- Form wizard with icon tabs section start -->
        
        <!-- Form wizard with icon tabs section end -->
        <!-- Form wizard with step validation section start -->
        <section id="validation">
          <div class="row">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Update School</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <!-- <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div> -->
                </div>
                <div class="card-body collapse in">
                  <div class="card-block">
                    <form action="{{route('updateSchool')}}" method="post" class="steps-validation wizard-circle" id="submitData" enctype="multipart/form-data" novalidate>

                      <input type="hidden" name="id" value="{{$school->id}}">
                      
                      <input type="hidden" name="userId" value="{{Auth::user()->id}}">

                      {{ csrf_field() }}
                      <!-- Step 1 -->
                      <h6>School</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName3">
                                School Name :
                                <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control required" id="firstName3" name="name" value="{{$school->name}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="emailAddress5">
                                Email Address :
                                <span class="danger">*</span>
                              </label>
                              @php
                                  $user = Auth::user();
                              @endphp
                              <input type="email" class="form-control required" id="emailAddress5" value="{{$user->email}}" disabled>
                              <input type="hidden" name="email" value="{{$user->email}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                              <label for="shortDescription3">School Description :</label>
                              <textarea name="description" id="shortDescription3" rows="4" class="form-control">{{$school->description}}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="agelimit">
                                Age Limit :
                                <span class="danger">*</span>
                              </label>
                              <input type="number" class="form-control" required="" id="agelimit" name="agelimit" value="{{$school->agelimit}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="no_of_student">
                                Number of student :
                                <span class="danger">*</span>
                              </label>
                              <input type="number" class="form-control" required="" id="no_of_student" name="no_of_student" value="{{$school->no_of_student}}">
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                                <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by" value="{{$school->recognised_by}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="latitude">
                                Website Link :
                                <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control" id="weblink" name="weblink"  value="{{$school->weblink}}">
                            </div>
                          </div>

                        </div>  
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select Country :
                                <span class="danger">*</span>
                              </label>
                              <select name="countryId" id="countryList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="Country Name is required">
                               <option value="">Select Country Name</option>  
                               @foreach($countries as $country) 
                                <option value="{{$country->code}}|{{$country->name}}" @if($country_code == $country->code) selected="selected" @endif>{{$country->name}}</option>     
                                @endforeach 
                      </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select County :
                                <span class="danger">*</span>
                              </label>
                               <select name="stateId" id="stateList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="State Name is required">
                                <option value="">Select County</option>
                                 @foreach($states as $state)
                              <option value="{{$country_code}}|{{$state->region}}" @if($state_code == $state->region) selected="selected" @endif >{{$state->region}}</option>
                              option
                             @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select City :
                                <span class="danger">*</span>
                              </label>
                            <select name="cityId" id="cityList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="City Name is required">
                             <option value="">Select City</option>
                             @foreach($cities as $city)
                                <option value="{{urlencode($city->city)}}|{{$city->city}}"@if($city_code == urlencode($city->city))selected="selected"@endif>{{$city->city}}</option>
                              @endforeach         
                              </select>
                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                               Postal Code:
                                <span class="danger">*</span>
                              </label>
                              <input type="text" name="zip_code" value="{{$zipcode_id}}" data-validation-required-message="Addess Number is required" aria-invalid="false" class="form-control required">
                             
                            </div>
                          </div>
                          
                        </div>
                       <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                               Address:
                                <span class="danger">*</span>
                              </label>
                              
                              <input type="text"  required="" data-validation-required-message="Addess Number is required" aria-invalid="false" class="form-control required" name="address" value="{{$school->address}}" required="">
                            
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                                Phone Number:
                                <span class="danger">*</span>
                              </label>
                              <input type="text" required="" placeholder="e.g. +44 (0) 12736782345" data-validation-required-message="Phone Number is required" aria-invalid="false" class="form-control required" id="phone" name="phone" value="{{$school->phone}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                                Video:
                                <span class="danger">*</span>
                              </label>
                              <input type="text" class="form-control required" id="jobTitle5" name="video" value="{{$school->video}}">
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                               Facilities :
                                <span class="danger">*</span>
                              </label>
                                <select name="facilities[]" class="select2-placeholder-multiple form-control" multiple="multiple">
                                  <option value="" selected>Select facility</option>
                                   
                                  @php
                                   $facilityIds = array();
                                   
                                   if(count($schoolfacilities)>0){
                                     foreach($schoolfacilities as $schoolfacility)
                                                                      {
                                      $facility = App\Facility::where('id',  $schoolfacility->facility_id)->first();
                                      $facilityIds[] = $schoolfacility->facility_id;
                                     }
                                      
                                    }

                                 @endphp

                                   @foreach($facilities as $facility)

                                    @if(in_array($facility->id, $facilityIds, TRUE ))

                                     <option value="{{$facility->id}}" selected="selected">{{$facility->name}}</option>
                                     
                                    @else
                                  <option value="{{$facility->id}}">{{$facility->name}}</option>
                                  @endif
                                 
                                  @endforeach
                                  
                                   

                              </select>
                             
                            </div>
                          </div>
                        </div> 
                         <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                               Registration Fee
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                              <input type="number" required="" data-validation-required-message="Phone Number is required" aria-invalid="false" class="form-control required" name="registration_fee" value="{{$school->registration_fee}}">
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                @foreach($images as $image)
                <div id="multiple_images_{{$image->id}}" class="multiple_images_inner">
				  <div class="input-group-btn">
					<img src="{{url('/normal_images/'.$image->image)}}" width="200px" />
				  <button class="btn removeedit_image btn-danger" data-imgurl="{{ $image->image }}" data-imageid="{{$image->id}}" type="button">Remove</button>
				  </div>
			   </div>   
                @endforeach
				
                            <div class="form-group">
                              <label for="location">
                                Upload Slider Images :
                                <span class="danger">*</span>
                              </label>
                              <div class="bor">

                                <div class="input-group control-group increment" >

                                  <input type="file"  name="image[]" accept="image/*" class="form-control up_image_control">
                                 
                                  <div class="input-group-btn"> 
                                  <button class="btn addFile btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add More Images</button>
                                  </div>
                                </div>
                                <div class="clone" style="display:none;">
                                  <div class="control-group input-group" style="margin-top:10px">
                                  <input type="file" name="image[]" accept="image/*" class="form-control up_image_control">
                                  <div class="input-group-btn"> 
                                    <button class="btn removeFile btn-danger" type="button">Remove</button>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--school logo start-->
						  <div class="col-md-6">
							@if(isset($logo->id))
							<div id="logo_image_{{$logo->id}}" class="logo_inner">
							  <div class="input-group-btn">
								<img src="{{url('/logo_images/'.$logo->logo)}}" width="200px" />
							  <button class="btn removelogo_image btn-danger" data-imgurl="{{ $logo->logo }}" data-imageid="{{$logo->id}}" type="button">Remove</button>
							  </div>
						   </div>
							@endif
                            <div class="form-group">
                              <label for="logo">
							    @lang('school.usl')
                                <span class="danger">*</span>
                              </label>
                              <div class="bor">
                                <div class="input-group control-group" >
                                  <input type="file" name="logo" accept="image/*" id="logo" class="form-control">
                                  <div class="input-group-btn"> 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--school logo end-->
						  <!-- accreditations start -->
						  @php
						  $schoolAccreditations = explode(',', $school->accreditations);
						  @endphp
							<div class="row">
								<div class="col-md-12">
								<div class="row"><div class="col-md-12">Accreditations</div></div><br />
								@foreach($accreditations as $accreditation)
									<div class="col-md-4">
										<div class="checkbox">
											<label for="accreditation_{{$accreditation->id}}"><input type="checkbox" name="accreditations[]" id="accreditation_{{$accreditation->id}}" value="{{$accreditation->id}}" @if(in_array($accreditation->id, $schoolAccreditations)) {{'checked'}} @endif>
											<img class="col-md-4" src="{{$accreditation->image}}" alt="{{$accreditation->title}}" /></br>
											{{$accreditation->title}}
											</label>
										</div>
									</div>
								@endforeach
								</div>
							</div>
						<!-- accreditations end -->
                        </div>
                      </fieldset>
                      <!-- Step 2 -->
                      <h6>Course Prices</h6>
                      <fieldset>

                                       <fieldset>
                       <div class="row match-height">
            <div class="col-md-12">
              <div class="card" style="height: 1022px;">
                <div class="card-body collapse in">
                  <div class="card-block">
                    <div class="col-md-12">
                      <div class="row">
                        <h4 class="form-section mb-2"><i class="icon-eye6"></i>Add Price
                        @php  
                        $commission  = App\Coursediscount::where('school_id',$school->id)->first();
                        @endphp
                        <div class="class_div_commission"><label>Add commission</label><input type="text" value="@if($commission){{$commission->commission}}@endif" name="commission" placeholder="Commission"></div>
                        </h4>
                               <div class="example pull-left mb-3">
<select class="Select_course course_custom_select form-control">
  <option value="">Select Course</option>
  @foreach($coursetitles as $coursetitle)
    <option value="{{$coursetitle->id}}|{{$coursetitle->name}}">{{$coursetitle->name}}</option>
  @endforeach
</select>

</div>                  
                      </div>
                    </div>
                      
                      <div class="after_repeat-section"></div>
                      @if(!empty($allcourseid))
                     @foreach ($allcourseid as $id)
                     @php  
                        $title = App\Coursetitle::where('id', $id)->first();
                        $coursesprices    = App\Courseprice::where('courseId',$id)->where('schoolId',$school->id)->get();
                        $coursesdiscount  = App\Coursediscount::where('course_id',$id)->where('school_id',$school->id)->first();
                        $count = 1;
                     @endphp
                        <input type="hidden" name="course_id[]" value="{{$id}}">
                      <div class="w-100 float-left rmv_repeat repeat-section-{{$id}}  mb-3">
                        <h4 class="form-section mb-2">{{$title->name}}
                          <div class="class_div_discount"><label>Add Discount</label><input type="text" value="@if($coursesdiscount){{ $coursesdiscount->discount }}@endif" name="discount_A-{{$id}}[]" placeholder="Discount %"><label>Add Deal</label><input type="text" value="@if($coursesdiscount){{ $coursesdiscount->deal }}@endif" name="discount_B-{{$id}}[]" placeholder="Deal %"></div>
                        <span data-id="{{$id}}" data-school="{{$school->id}}" class="remove_course btn btn-danger">Remove</span></h4>
                        <div class="form-group input_fields_container">
                           @foreach ($coursesprices as $price)
                           <style type="text/css" media="screen">.box-listing .w-7per{width:6.50%; float: left; padding-right:5px; font-size:9px;}.box-listing .w-7per:last-child{padding-right:0;}</style>
                           <input type="hidden" name="coursepriceid-{{$id}}[]" value="{{$price->id}}">
                          <div class="controls remove_control"><div class="col-md-12 box-listing">
                            <div row-id="{{$id}}" class="row row-{{$id}}">
							  <div class="w-7per" style="width:25%"><label>Lesson Timings</label>
							    <input name="course_shift-{{$id}}[]" value="{{ $price->course_shift }}" class="form-control" placeholder="e.g Morning Shift" aria-invalid="false" type="text">
							  </div>
							  <br /><br /><br /><br />
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.hpw')">HPW <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="hour_per_week-{{$id}}[]" value="{{ $price->hours_per_week }}" class="form-control" placeholder="Hours" aria-invalid="false" type="Number">
                              </div>
							  <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.lpw')">LPW <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="lesson_per_week-{{$id}}[]" value="{{ $price->lesson_per_week }}" class="form-control" placeholder="Lesson Per Week" aria-invalid="false" type="Text">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 1-4 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw1-{{$id}}[]" value="{{ $price->ppw1 }}" class="form-control" placeholder="Price" aria-invalid="false" type="Number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 5-8 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw2-{{$id}}[]" value="{{ $price->ppw2 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 9-12 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw3-{{$id}}[]" value="{{ $price->ppw3 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 13-16 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw4-{{$id}}[]" value="{{ $price->ppw4 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 17-20 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw5-{{$id}}[]" value="{{ $price->ppw5 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 21-24 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw6-{{$id}}[]" value="{{ $price->ppw6 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 25-28 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw7-{{$id}}[]" value="{{ $price->ppw7 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 29-32 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw8-{{$id}}[]" value="{{ $price->ppw8 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 33-36 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw9-{{$id}}[]" value="{{ $price->ppw9 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 33-40 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw10-{{$id}}[]" value="{{ $price->ppw10 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 40-44 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw11-{{$id}}[]" value="{{ $price->ppw11 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 45-48 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw12-{{$id}}[]" value="{{ $price->ppw12 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per"><label data-toggle="tooltip" title="@lang('school.ppw')">PPW 49-52 <i class="fa fa-question-circle" style="font-size:11px"></i></label>
                                <input name="ppw13-{{$id}}[]" value="{{ $price->ppw13 }}" class="form-control" placeholder="Price" aria-invalid="false" type="number">
                              </div>
                              @if($count == 1) 
                              <div class="w-7per"><a id="add_more_button_id" data-id="{{$id}}" data-coursepid="{{$price->id}}" data-url="{{route('deleteSchoolcourseprice')}}" href="javascript:;" class="btn btn-primary add_more_button" style="margin-top: 20px;">Add More</a>
                              </div>
                              @else
                             <div class="w-7per"><a href="#" class="remove_field btn btn-danger"  data-courseid="{{$price->id}}" data-url="{{route('deleteSchoolcourseprice')}}" style="margin-top: 20px;">Remove</a></div>
                              @endif
                            </div>
                          </div>
                        </div>
                        @php 
                            $count++;
                        @endphp

                           @endforeach

                       </div>
                    </div>


                      @endforeach
                      @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
                      </fieldset>
                        
                      </fieldset>
                      <!-- Step 3 -->
                     <h6>Accommodation</h6>
                      <fieldset>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                          <h4 class="form-section mb-2"><i class="icon-eye6"></i>Accommodation</h4>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Please Select the Accommodation Type :
                              </label>
                              <div class="controls">
                              <select class="Select_acco_type custom-select form-control" name="get_acco" aria-invalid="false">
                                <option value="">Select Accommodation Type</option> 
                              @foreach($Accommodationadmintype as $getacctype)
                                      <option value="{{$getacctype->id}}|{{$getacctype->name}}">{{$getacctype->name}}</option>
                              @endforeach  
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="after_repeat-section_accomodation"></div>
                          @foreach($schoolaccommodationprices as $scprcies)
                          <input type="hidden" name="accopriceid-{{$scprcies->accommodation_id}}[]" value="{{$scprcies->id}}">
                          <div class="row acc_row">
                            <div class="form-group col-md-12">
                              <div class="w-100 float-left rmv_repeat repeat-section-{{$scprcies->accommodation_id}}  mb-3">
                                <input type="hidden" name="acco_type_id[]" value="{{$scprcies->accommodation_id}}">
                                <h4 class="form-section mb-2">{{$scprcies->acctypename}}<span data-id="{{$scprcies->accommodation_id}}" data-accopid="{{$scprcies->id}}" data-url="{{route('deleteschoolaccoprice')}}" class="remove_accomodation btn btn-danger">Remove</span></h4>
                                <div class="controls">
                                  <input name="accprice-{{$scprcies->accommodation_id}}[]" value="{{$scprcies->price}}" class="form-control" required="" placeholder="Enter Price" type="number">
                                <div class="help-block"></div><br />
								<input name="accdesc-{{$scprcies->accommodation_id}}[]" value="{{$scprcies->description}}" class="form-control" placeholder="Additional Info" type="text">
                                </div>
                              </div>
                            </div>
                         </div>
                         @endforeach 
                        </div>
                        </div>
                      </fieldset>
                      <h6>Transportation</h6>
                      <fieldset>
                          <div class="row">
                          <h4 class="form-section mb-2"><i class="icon-eye6"></i>Transportation</h4>
                          @php $count = 0; @endphp
                          @if(count($schooltransports)>0)
                          @foreach($schooltransports as $transport)
                          <input type="hidden" name="transportpriceid[]" value="{{$transport->id}}">
                          <div class="transportvalue">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Airport Name</label>
                              <div class="controls">
                                 <input name="airport_name[]" value="{{$transport->airport_name}}" class="form-control" placeholder="Enter Airport Name" aria-invalid="false" type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pick Up Price</label>
                              <div class="controls">
                                 <input name="pp[]" value="{{$transport->pick_up}}" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pickup & drop Price</label>
                              <div class="controls">
                                 <input name="pdp[]" value="{{$transport->pick_up_and_drop}}" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                          <div class="input-group-btn"> 
                            @if($count == 0)
                            <button class="btn removeFile btn-danger" type="button" data-transportid="{{$transport->id}}">Remove</button>
                            <button class="btn addFiletransport btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add More</button>
                            @else
                            <button class="btn removeFile btn-danger" type="button" data-transportid="{{$transport->id}}">Remove</button>
                            @endif
                                  
                          </div>
                         </div>
                       </div>
                        @php $count++; @endphp
                       @endforeach
                       @else
                        
                       <div class="transportvalue">
                        <input type="hidden" name="transportpriceid[]" value="">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Airport Name</label>
                              <div class="controls">
                                 <input name="airport_name[]" value="" class="form-control" placeholder="Enter Airport Name" aria-invalid="false" type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pick Up Price</label>
                              <div class="controls">
                                 <input name="pp[]" value="" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pickup & drop Price</label>
                              <div class="controls">
                                 <input name="pdp[]" value="" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                          <div class="input-group-btn"> 
                            @if($count == 0)
                            <button class="btn addFiletransport btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add More</button>
                            @else
                            <button class="btn removeFile btn-danger" type="button">Remove</button>
                            @endif
                                  
                          </div>
                         </div>
                       </div>


                       @endif

                          <div class="transportclone" style="display:none;">
                          <input type="hidden" name="transportpriceid[]" value="">
                          <div class="transportvalue">
                           <div class="col-md-3">
                            <div class="form-group">
                            <label for="userinput3">Airport Name</label>
                              <div class="controls">
                                 <input name="airport_name[]" class="form-control" placeholder="Enter Airport Name" aria-invalid="false" type="text">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pick Up Price</label>
                              <div class="controls">
                                 <input name="pp[]" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="userinput3">Pickup & drop Price</label>
                              <div class="controls">
                                 <input name="pdp[]" class="form-control" placeholder="Enter Price" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3"> 
                            <div class="input-group-btn"> 
                              <button class="btn removeFile btn-danger" type="button">Remove</button>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                          
                      </fieldset>
                      <h6>Insurance</h6>
                      <fieldset>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                          <h4 class="form-section mb-2"><i class="icon-eye6"></i>Insurance</h4>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="controls">
                              <select class="Select_ins_type custom-select form-control" name="get_insurence" aria-invalid="false">
                                <option value="">Select Insurance</option> 
                              @foreach($insaurence as $getins)
                                      <option value="{{$getins->id}}|{{$getins->name}}">{{$getins->name}}</option>
                              @endforeach  
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="after_repeat-section_insurence"></div>
                          @foreach($schoolinsurance as $scins)
                          <input type="hidden" name="insurenceid-{{$scins->insurence_id}}[]" value="{{$scins->id}}">
                          <div class="row ins_row">
                            <div class="form-group col-md-12">
                              <div class="w-100 float-left rmv_repeat repeat-section-{{$scins->insurence_id}}  mb-3">
                                <input type="hidden" name="ins_type_id[]" value="{{$scins->insurence_id}}">
                                <h4 class="form-section mb-2">{{$scins->insname}}<span data-id="{{$scins->insurence_id}}" data-inspid="{{$scins->id}}" data-url="{{route('deleteschoolinsprice')}}" class="remove_insurence btn btn-danger">Remove</span></h4>
                                <div class="controls">
                                  <input name="insprice-{{$scins->insurence_id}}[]" value="{{$scins->price}}" class="form-control" required="" placeholder="Enter Price" type="number">
                                <div class="help-block"></div>
                                </div>
                              </div>
                            </div>
                         </div>
                         @endforeach 
                        </div>
                        </div>
                      </fieldset>
                      <h6>Visa</h6>
                      <fieldset>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                          <h4 class="form-section mb-2"><i class="icon-eye6"></i>Visa</h4>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Please Select the Visa :
                              </label>
                              <div class="controls">
                              <select class="Select_visa_type custom-select form-control" name="get_visa" aria-invalid="false">
                                <option value="">Select Visa</option> 
                              @foreach($visa as $getvisa)
                                      <option value="{{$getvisa->id}}|{{$getvisa->name}}">{{$getvisa->name}}</option>
                              @endforeach  
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="after_repeat-section_visa"></div>
                          @foreach($schoolvisa as $scvisa)
                          <input type="hidden" name="visapid-{{$scvisa->visa_id}}[]" value="{{$scvisa->id}}">
                          <div class="row visa_row">
                            <div class="form-group col-md-12">
                              <div class="w-100 float-left rmv_repeat repeat-section-{{$scvisa->visa_id}}  mb-3">
                                <input type="hidden" name="visa_type_id[]" value="{{$scvisa->visa_id}}">
                                <h4 class="form-section mb-2">{{$scvisa->visaname}}<span data-id="{{$scvisa->visa_id}}" data-visapid="{{$scvisa->id}}" data-url="{{route('deleteschoolvisaprice')}}" class="remove_visa btn btn-danger">Remove</span></h4>
                                <div class="controls">
                                  <input name="visaprice-{{$scvisa->visa_id}}[]" value="{{$scvisa->price}}" class="form-control" required="" placeholder="Enter Price" type="number">
                                <div class="help-block"></div>
                                </div>
                              </div>
                            </div>
                         </div>
                         @endforeach 
                        </div>
                        </div>
                      </fieldset>
                     <button type="hidden" id="editsecond"  hidden="hidden">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Form wizard with step validation section end -->
        <!-- Form wizard with vertical tabs section start -->
        
        <!-- Form wizard with vertical tabs section end -->
      </div>
    </div>
  </div>
  <script>
$(document).ready(function($){
	$(document).ready(function(){
		$("ul[role=menu] li:last-child").remove();
		$("[role=menu]").append('<li aria-hidden="false" style="display: list-item;"><a id="submitSchoolForm" role="menuitem">Submit</a></li>');
		$("#submitSchoolForm").on('click', function(){
			$("#submitData").submit();
		});
	});
	//$.mask.definitions['~'] = '([0-9] )?';
	//$('#phone').mask("+ 99 (99~) 99999~~~~~~");
/* Accommodation Jquery */  
 var acc_type_array = new Array();
    <?php if(!empty($allaccommodationids)) {
      foreach($allaccommodationids as $key => $val){ ?>
        acc_type_array.push('<?php echo $val; ?>');
    <?php } } ?>
  $('body').on('change', '.Select_acco_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var acco_type_id   = result[0];
    var acco_type_name = result[1];
    var url = "{{route('deleteschoolaccoprice')}}" ;
    var accopid = "";
    if(acc_type_array.indexOf(acco_type_id) === -1){
          acc_type_array.push(acco_type_id);
          var data = '<input type="hidden" name="accopriceid-'+acco_type_id+'[]" value=""><div class="row acc_row"><div class="form-group col-md-12"><input type="hidden" name="acco_type_id[]" value="'+acco_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+acco_type_id+'  mb-3"><h4 class="form-section mb-2">'+acco_type_name+'<span data-id="'+acco_type_id+'"  data-accopid="'+accopid+'" data-url="'+url+'" class="remove_accomodation btn btn-danger">Remove</span></h4><div class="controls"><input name="accprice-'+acco_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div><br /><input name="accdesc-'+acco_type_id+'[]" class="form-control" placeholder="Additional Info" type="text"></div></div></div>';
          $(data).insertAfter(".after_repeat-section_accomodation"); 
        }
     }   

  });
  $('body').on("click",".remove_accomodation", function(e){
        var acco_type_id = $(this).attr('data-id');
        var $this = $(this);
        var accopid = $(this).attr('data-accopid') ;
        var url = $(this).attr('data-url') ;
    if(accopid === ""){
         $this.parents('.acc_row').prev().remove();
         $this.parents('.acc_row').remove();
        }
        else{
           $.ajax
          ({
            url: url,
            type: "POST",
            data:{"_token":"{{csrf_token()}}","accopid":accopid},
            success:function(data)
                {  

                  if(data == 1)
                  {
                      $this.parents('.acc_row').prev().remove();
                      $this.parents('.acc_row').remove();
                  }
                      
                },    
             }); 
          
        }
       acc_type_array = jQuery.grep(acc_type_array, function(value) {
                        return value != acco_type_id;
                     });

      // acc_type_array = jQuery.grep(acc_type_array, function(value) {
      // return value != acco_type_id;
      // });

      // if(jQuery.isEmptyObject(acc_type_array) ==  true){
      //   $('.Select_acco_type>option:eq(0)').prop('selected', true);
      //   //$('.Select_acco_type').addClass('required');
      // }
      //$(this).parents('.rmv_repeat').prev().remove();
      
  });

/* Insurence Jquery */
 var ins_type_array = new Array();
    <?php foreach($schoolinsurance as $ins){ 
        $val = $ins->insurence_id;
      ?>
        ins_type_array.push('<?php echo $val; ?>');
    <?php } ?>
  $('body').on('change', '.Select_ins_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var ins_type_id   = result[0];
    var ins_type_name = result[1];
    var url = "{{route('deleteschoolinsprice')}}" ;
    var inspid = "";
    if(ins_type_array.indexOf(ins_type_id) === -1){
          ins_type_array.push(ins_type_id);
          var data = '<input type="hidden" name="insurenceid-'+ins_type_id+'[]" value=""><div class="row ins_row"><div class="form-group col-md-12"><div class="row ins_row"><div class="form-group col-md-12"><input type="hidden" name="ins_type_id[]" value="'+ins_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+ins_type_id+'  mb-3"><h4 class="form-section mb-2">'+ins_type_name+'<span data-id="'+ins_type_id+'" data-accopid="'+inspid+'" data-url="'+url+'" class="remove_insurence btn btn-danger">Remove</span></h4><div class="controls"><input name="insprice-'+ins_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div></div></div></div>';
          $(data).insertAfter(".after_repeat-section_insurence"); 
        }
      }  

  });
  $('body').on("click",".remove_insurence", function(e){
      var ins_id = $(this).attr('data-id');
      var $this  = $(this);
      var inspid = $(this).attr('data-inspid') ;
      var url    = $(this).attr('data-url') ;
      if(inspid === ""){
         $this.parents('.ins_row').prev().remove();
         $this.parents('.ins_row').remove();
        }
        else{
           $.ajax
          ({
            url: url,
            type: "POST",
            data:{"_token":"{{csrf_token()}}","inspid":inspid},
            success:function(data)
                {  

                  if(data == 1)
                  {
                      $this.parents('.ins_row').prev().remove();
                      $this.parents('.ins_row').remove();
                  }
                      
                },    
             }); 
          
        }
        ins_type_array = jQuery.grep(ins_type_array, function(value) {
                        return value != ins_id;
                     });
      /*ins_type_array = jQuery.grep(ins_type_array, function(value) {
      return value != ins_id;
      });
      if(jQuery.isEmptyObject(ins_type_array) ==  true){
        $('.Select_ins_type>option:eq(0)').prop('selected', true);
        //$('.Select_ins_type').addClass('required');
      }
      //$(this).parents('.rmv_repeat').prev().remove();
      $(this).parents('.ins_row').remove();*/
  });
   /* Visa Jquery */
  var visa_type_array = new Array();
    <?php foreach($schoolvisa as $visa){ 
        $val = $visa->visa_id;
      ?>
        visa_type_array.push('<?php echo $val; ?>');
    <?php } ?>
  $('body').on('change', '.Select_visa_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var visa_type_id   = result[0];
    var visa_type_name = result[1];
    var url = "{{route('deleteschoolvisaprice')}}" ;
    var visapid = "";
    if(visa_type_array.indexOf(visa_type_id) === -1){
          visa_type_array.push(visa_type_id);
          var data = '<input type="hidden" name="visapid-'+visa_type_id+'[]" value=""><div class="row visa_row"><div class="form-group col-md-12"><input type="hidden" name="visa_type_id[]" value="'+visa_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+visa_type_id+'  mb-3"><h4 class="form-section mb-2">'+visa_type_name+'<span data-id="'+visa_type_id+'" data-accopid="'+visapid+'" data-url="'+url+'" class="remove_visa btn btn-danger">Remove</span></h4><div class="controls"><input name="visaprice-'+visa_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div></div></div></div>';
          $(data).insertAfter(".after_repeat-section_visa"); 
        }
     }   

  });
  $('body').on("click",".remove_visa", function(e){
      var visa_id = $(this).attr('data-id');
      var $this   = $(this);
      var visapid = $(this).attr('data-visapid');
      var url    = $(this).attr('data-url') ;
      if(visapid === ""){
         $this.parents('.visa_row').prev().remove();
         $this.parents('.visa_row').remove();
        }
        else{
           $.ajax
          ({
            url: url,
            type: "POST",
            data:{"_token":"{{csrf_token()}}","visapid":visapid},
            success:function(data)
                {  

                  if(data == 1)
                  {
                      $this.parents('.visa_row').prev().remove();
                      $this.parents('.visa_row').remove();
                  }
                      
                },    
             }); 
          
        }
        visa_type_array = jQuery.grep(visa_type_array, function(value) {
                        return value != visa_id;
                     });

      /*visa_type_array = jQuery.grep(visa_type_array, function(value) {
      return value != visa_id;
      });
      if(jQuery.isEmptyObject(visa_type_array) ==  true){
        $('.Select_visa_type>option:eq(0)').prop('selected', true);
        //$('.Select_visa_type').addClass('required');
      }
      //$(this).parents('.rmv_repeat').prev().remove();
      $(this).parents('.visa_row').remove();*/
  });
   var arrSelected = new Array();
    <?php if(!empty($allcourseid)){foreach($allcourseid as $key => $val){ ?>
        arrSelected.push('<?php echo $val; ?>');
    <?php } }?>
     $('body').on('change', '.Select_course', function(){ 
        var selected = this.value;
        if(selected === ""){}else{
        var result = selected.split('|');
        var course_id   = result[0];
        var course_name = result[1]; 
        var school_id = $('.remove_course').attr('data-school');
         if(arrSelected.indexOf(course_id) === -1){
          arrSelected.push(course_id);
          var $repeat_section = $('.repeat-section').clone();
          var data = '<input type="hidden" name="course_id[]" value="'+course_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+course_id+'  mb-3"><h4 class="form-section mb-2">'+course_name+'<div class="class_div_discount"><label>Add Discount</label><input type="text" name="discount_A-'+course_id+'[]" placeholder="Discount %"><label>Add Deal</label><input type="text" name="discount_B-'+course_id+'[]" placeholder="Deal %"></div><span data-id="'+course_id+'" class="remove_course btn btn-danger">Remove</span></h4><div class="form-group input_fields_container"><style type="text/css" media="screen">.box-listing .w-7per{width:6.50%; float: left; padding-right:5px; font-size:9px;}.box-listing .w-7per:last-child{padding-right:0;}</style><div class="controls"><div class="col-md-12 box-listing"><div row-id="'+course_id+'" class="row row-'+course_id+'"><div class="w-7per" style="width:25%"><label>Lesson Timings</label><input name="course_shift-'+course_id+'[]" class="form-control" placeholder="e.g Morning Shift" aria-invalid="false" type="text"></div><br /><br /><br /><br /><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.hpw")">HPW <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="hour_per_week-'+course_id+'[]" class="form-control" placeholder="Hours" aria-invalid="false" type="Number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.lpw")">LPW<i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="lesson_per_week-'+course_id+'[]" class="form-control" placeholder="Lesson per Week" aria-invalid="false" type="text"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 1-4 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw1-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="Number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 5-8 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw2-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 9-12 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw3-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 13-16 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw4-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 17-20 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw5-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 21-24 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw6-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 25-28 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw7-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 29-32 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw8-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 33-36 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw9-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 36-40 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw10-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 40-44 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw11-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 45-48 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw12-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 49-52 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw13-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><a id="add_more_button_id" data-id="'+course_id+'" href="javascript:;" class="btn btn-primary add_more_button" style="margin-top:20px;">Add More</a></div></div></div></div></div></div>';
         $(data).insertAfter(".after_repeat-section");
        }
      }         
  });
  $('body').on('click', '#add_more_button_id', function(){ 
          var cid  = $(this).attr('data-id');
          var cpid = $(this).attr('data-coursepid');
          var curl = $(this).attr('data-url');
          var data =
            '<input type="hidden" name="coursepriceid-'+cid+'[]" value=""><div class="w-7per" style="width:25%"><label>Lesson Timings</label><input name="course_shift-'+cid+'[]" class="form-control" placeholder="e.g Morning Shift" aria-invalid="false" type="text"></div><br /><br /><br /><br /><div class="w-7per">'+
                                 '<label data-toggle="tooltip" title="@lang("school.hpw")">HPW <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+ 
                                 '<input name="hour_per_week-'+cid+'[]" class="form-control" placeholder="Hours" aria-invalid="false" type="Number">'+
							  '</div>'+
							  '<div class="w-7per">'+
									 '<label data-toggle="tooltip" title="@lang("school.lpw")">LPW <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
									 '<input name="lesson_per_week-'+cid+'[]" class="form-control" placeholder="Lesson Per Week" aria-invalid="false" type="Text">'+
							  '</div>'+
							  '<div class="w-7per">'+
									 '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 1-4 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
									 '<input name="ppw1-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="Number">'+
							  '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 5-8 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw2-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 9-12 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw3-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 13-16 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw4-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 17-20 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw5-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 21-24 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw6-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 25-28 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw7-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 29-32 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw8-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 33-36 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw9-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 36-40 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw10-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 40-44 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw11-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                               '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 45-48 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw12-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label data-toggle="tooltip" title="@lang("school.ppw")">PPW 49-52 <i class="fa fa-question-circle" style="font-size:11px"></i></label>'+
                                '<input name="ppw13-'+cid+'[]" class="form-control"  placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>';
            $(this).parents('.input_fields_container').append('<div class="controls remove_control"><div class="col-md-12 box-listing" style="margin-top:17px">'+
                          '<div class="row">'+data+'<div class="w-7per"><a href="#" class="remove_field btn btn-danger" data-courseid="'+cpid+'" data-url="'+curl+'"  style="margin-top: 20px;">Remove</a></div></div></div></div>'); //add input field
						  $('[data-toggle="tooltip"]').tooltip();
						  
        });
  $('body').on("click",".remove_field", function(e){
        
        e.preventDefault();
        var $this = $(this);
        var coursepid = $(this).attr('data-courseid') ;
       var url = $(this).attr('data-url') ;
       
       if(coursepid === "undefined"){
        $this.parents('.remove_control').remove();
      
        }
        else{
           $.ajax
          ({
            url: url,
            type: "POST",
            data:{"_token":"{{csrf_token()}}","coursepid":coursepid},
            success:function(data)
                {  

                  if(data == 1)
                  {
                      $this.parents('.remove_control').remove();
                  }
                      
                },    
             }); 
          
        }
 
    });

 $('body').on("click",".remove_course", function(e){
      var course_id = $(this).attr('data-id');
      var school_id = $(this).attr('data-school');
      var $this = $(this);

     $.ajax
          ({
            url: "{{route('deleteschoolcourse')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","course_id":course_id,"school_id":school_id},
            success:function(data)
                { 

                  if(data == 1)
                  {
                    arrSelected = jQuery.grep(arrSelected, function(value) {
                        return value != course_id;
                     });
                    if(jQuery.isEmptyObject(arrSelected)){
                      $('.course_custom_select option[value=""]').prop("selected", true);
                      $('.course_custom_select').addClass('required');
                    }
                    $this.parents('.rmv_repeat').prev().remove();
                    $this.parents('.rmv_repeat').remove();
                  }
                      
                },    
             }); 
         });



    jQuery('body').on('click',".removeedit_image",function(){
     
        var data_imageid = jQuery(this).attr("data-imageid"); 
        var data_imgurl  = jQuery(this).attr("data-imgurl");   

        $.ajax
        ({
            url: "{{route('deleteSchoolImages')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","data_imageid":data_imageid,"data_imgurl":data_imgurl},
            success: function (response) 
            {
              if(response == "success"){

                 $('#multiple_images_'+data_imageid).remove();
              }

            },                                    
        });
    });
	
	jQuery('body').on('click',".removelogo_image",function(){
     
        var data_imageid = jQuery(this).attr("data-imageid"); 
        var data_imgurl  = jQuery(this).attr("data-imgurl");   

        $.ajax
        ({
            url: "{{route('deleteSchoolLogo')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","data_logoid":data_imageid,"data_imgurl":data_imgurl},
            success: function (response) 
            {console.log(response);
              if(response == "success"){

                 $('#logo_image_'+data_imageid).remove();
              }

            },                                    
        });
    });
});

  $(document).ready(function($) {

  $('#countryList_data').on("change",function (){
        var countryId = $(this).find('option:selected').val();  
                       
       $.ajax
        ({
            url: "{{route('getStatesschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","countryId":countryId,},
            success: function (response) 
            { $('#stateList_data').html(response);
            $('#cityList_data').html("<option>Select City</option>");
            $('#zip_codeList_data').html("<option>Select Zipcode</option>");
            },                                    
        });
    });

    /* Get list of city*/
     $('#stateList_data').on("change",function (){
        var stateId = $(this).find('option:selected').val();   
        $.ajax
        ({
            url: "{{route('getCitiesschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","stateId":stateId,},
            success: function (response) 
            {  $('#cityList_data').html(response);
            },                                    
        });                      
    });


     /* get lists of postalcode in selectbox */
    $('#cityList_data').on("change",function ()
    {
        var cityId = $(this).find('option:selected').val();  

        $.ajax
        ({
            url: "{{route('getPostalCodesschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","cityId":cityId,},
            success: function (response) 
            {  $('#zip_codeList_data').html(response);
               $("select").material_select('update');
            },                                    
        });                      
    });


    $(".addFile").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
    });
    $(".addFiletransport").click(function(){ 
        var html = $(".transportclone").html();
        $(this).parents(".transportvalue").after(html);
    });

   $("body").on("click",".removeFile",function()
   { 

        var $this = $(this);
        var transportpid = $(this).attr('data-transportid') ;
        var url = "{{route('deleteschooltransportprice')}}" ;
       
       if(transportpid === "null"){

          $this.parents(".transportvalue").remove();
      
        }
        else{
           $.ajax
          ({
            url: url,
            type: "POST",
            data:{"_token":"{{csrf_token()}}","transportpid":transportpid},
            success:function(data)
                {  

                  if(data == 1)
                  {
                       $this.parents(".transportvalue").remove();
                  }
                      
                },    
             }); 
          
        }
    });

    $("body").on("click",".removeFile",function()
   { 
        $(this).parents(".control-group").remove();

    });


$('#editsecond').on("click",function(){
    
  
});
/* CKEDITOR.replace('shortDescription3', {
      extraPlugins: 'autoembed,embedsemantic,image2,mathjax,codesnippet,font,colorbutton',
      removeButtons: 'Font',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      //colorButton_colors: 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16',
      colorButton_enableAutomatic: false,
	  colorButton_enableMore:false,
    }); */

  });

  </script>
          
       @endsection
        <!-- Form wizard with step validation section end -->