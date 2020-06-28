@extends('schooladmin.layout.index')
@section('title','Dashboard')
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
        <section id="basic-form-layouts">
          <div class="row">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Add School</h4>
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
                    <form action="{{route('storeSchool')}}" method="post" class="steps-validation wizard-circle" id="submitData" enctype="multipart/form-data" novalidate>

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
                              <div class="controls">
                              <input type="text" class="form-control required" id="firstName3" name="name" value="{{old('name')}}" aria-invalid="false">
                            </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="emailAddress5">
                                Email Address :
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                              @php
                                  $user = Auth::user();
                              @endphp
                              <input type="email" class="form-control required" id="emailAddress5" aria-invalid="false" value="{{$user->email}}" disabled>
                              <input type="hidden" name="email" value="{{$user->email}}">
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                              <label for="shortDescription3">School Description :</label>
                              <div class="controls">
                              <textarea name="description" id="shortDescription3" rows="4" class="form-control" aria-invalid="false"></textarea>
                            </div>
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
                              <div class="controls">
                              <input type="number" class="form-control" required="" id="agelimit" name="agelimit" aria-invalid="false">
                            </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="no_of_student">
                                Number of student :
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                              <input type="number" class="form-control" required="" id="no_of_student" name="no_of_student" aria-invalid="false">
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by" aria-invalid="false">
                            </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="latitude">
                                Website Link :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="weblink" name="weblink" aria-invalid="false">
                            </div>
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
                              <div class="controls">
                              <select name="countryId" id="countryList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="Country Name is required"> 
                               <option value="">Select Country Name</option>  
                               @foreach($countries as $country) 
                                <option value="{{$country->code}}|{{$country->name}}">{{$country->name}}</option>     
                                @endforeach   
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select County :
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                               <select name="stateId" id="stateList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="State Name is required">
                                <option value="">Select County Name</option>
                              </select>
                            </div>
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
                              <div class="controls">
                            <select name="cityId" id="cityList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="City Name is required">
                                <option value="">Select City</option>
                              </select>
                            </div>
                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                               Postal Code:
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                                <input type="text" name="zip_code" data-validation-required-message="Addess Number is required" aria-invalid="false" class="form-control required">
                        <!--<select name="zip_code" id="zip_codeList_data" class="form-control" aria-invalid="false" required data-validation-required-message="Postal Code is required">
                                <option value="">Select Zipcode Code</option>
                                
                              </select> -->
                            </div>
                             
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
                              <div class="controls">
                              <input type="text"  required="" data-validation-required-message="Addess Number is required" aria-invalid="false" class="form-control required" name="address" required="">
                            </div>
                          </div>
                          </div>
						  <script>						
						  </script>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                                Phone Number:
                                <span class="danger">*</span>
                              </label>
                              <div class="controls">
                              <input type="text" placeholder="e.g. +44 (0) 12736782345" required="" data-validation-required-message="Phone Number is required" aria-invalid="false" class="form-control required" id="phone" name="phone">
                            </div>
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
                              <div class="controls">
                              <input type="text" class="form-control required" id="jobTitle5" name="video" aria-invalid="false">
                            </div>
                          </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="jobTitle5">
                               Facilities :
                              </label>
                              <div class="controls">
                                <select name="facilities[]" data-placeholder="Select Facility" class="select2-icons form-control" id="select2-icons" multiple="multiple">
                                  <optgroup label="facilitites">
                                   @foreach($facilities as $facility)
                                  <option value="{{$facility->id}}">{{$facility->name}}</option>
                                  @endforeach
                                </optgroup>
                              </select>
                            </div>
                             
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
                              <input type="number" required="" data-validation-required-message="Phone Number is required" aria-invalid="false" class="form-control required" name="registration_fee">
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Upload Slider Images :
                                <span class="danger">*</span>
                              </label>
                              <div class="bor">

                                <div class="input-group control-group increment" >

                                  <input type="file" name="image[]" accept="image/*" class="form-control up_image_control">
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
                        </div>
						<!-- accreditations start -->
						<div class="row">
							<div class="col-md-12">
							<div class="row"><div class="col-md-12">Accreditations</div></div><br />
							@foreach($accreditations as $accreditation)
								<div class="col-md-4">
									<div class="checkbox">
										<label for="accreditation_{{$accreditation->id}}"><input type="checkbox" name="accreditations[]" id="accreditation_{{$accreditation->id}}" value="{{$accreditation->id}}">
										<img class="col-md-4" src="{{$accreditation->image}}" alt="{{$accreditation->title}}" /></br>
										{{$accreditation->title}}
										</label>
									</div>
								</div>
							@endforeach
							</div>
						</div>
						<!-- accreditations end -->
                      </fieldset>
                      <!-- Step 2 -->
                       <h6>Course Prices</h6>
                      <fieldset>
                       <div class="row match-height">
						<div class="col-md-12">
						  <div class="card" style="height: 1022px;">
							<div class="card-body collapse in">
							  <div class="card-block">
								<div class="col-md-12">
									<div class="row">
									  <h4 class="form-section mb-2"><i class="icon-eye6"></i>Add Price 
									  <div class="class_div_commission"><label>Add commission</label><input type="text" name="commission" placeholder="Commission"></div>
									  </h4>
									  <div class="col-md-6">
										<div class="form-group">
										  <label for="location">
											Please Select the course :
											<span class="danger">*</span>
										  </label>
										  <div class="controls">
										  <select class="Select_course custom-select form-control" aria-invalid="false"> 
										   <option value="">Select Course</option>  
												@foreach($coursetitles as $coursetitle)
												  <option value="{{$coursetitle->id}}|{{$coursetitle->name}}">{{$coursetitle->name}}</option>
												@endforeach  
										  </select>
										   <span style="color:red;font-size:10px;float:right;"><a href ="#" data-toggle="modal"data-target="#inlineForm">Do you want to add a new course ?</a></span>
										</div>
									  </div>
									  </div>
									 </div> 
								</div>
								  <div class="after_repeat-section"></div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
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
                              <select class="Select_acco_type custom-select form-control" name="get_acco"> 
                               <option value="">Select Accommodation Type</option>  
                              @foreach($Accommodationadmintype as $getacctype)
                                      <option value="{{$getacctype->id}}|{{$getacctype->name}}">{{$getacctype->name}}</option>
                              @endforeach  
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="after_repeat-section_accomodation"></div>
                         </div> 
                        </div>
                        </div>
                      </fieldset> 
                      <h6>Transportation</h6>
                      <fieldset>
                         <div class="row">
                          <h4 class="form-section mb-2"><i class="icon-eye6"></i>Transportation</h4>
                          <div class="transportincrement">
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
                                  <button class="btn addFiletransport btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add More</button>
                          </div>
                         </div>
                       </div>
                          <div class="transportclone" style="display:none;">
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
                              <label for="location">
                                Please Select the Insurance :
                              </label>
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
                         </div> 
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
                              @foreach($visa as $gevisa)
                                      <option value="{{$gevisa->id}}|{{$gevisa->name}}">{{$gevisa->name}}</option>
                              @endforeach  
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="after_repeat-section_visa"></div>
                         </div> 
                        </div>
                        </div>
                      </fieldset>   
                      
                     <button type="hidden" id="second"  hidden="hidden">Submit</button>
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

  <div class="modal fade text-xs-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="false" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close clear" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Add School Course</label>
      </div>
          <form action="{{route('storeSchoolCourse')}}" id="courseForm" class="form form-horizontal" method="post" novalidate>
        @csrf
          <input type="hidden" name="userId" value="{{Auth::user()->id}}">
        <div class="modal-body">
          <label>Course Name: </label>
          <div class="form-group">
            <div class="controls">
             <input type="text" id="userinput1" class="form-control" placeholder="Course Name"
                                name="name" required data-validation-required-message="Course Name is required">
            </div>
            <span id="courseErr" class="text-danger"></span>
          </div>
          <label>Course Shift: </label>
          <div class="form-group">
            <div class="controls selectmulticourse">
              <select name="shift[]" data-placeholder="Select Shift" class="select2-icons form-control selectmulticourse" id="select2-icons" multiple="multiple">
                                <optgroup label="Course Shifts">
                                   @foreach($shifts as $shift)
                                  <option value="{{$shift->id}}">{{$shift->name}}</option>
                                  @endforeach
                                </optgroup>
                              </select>
            </div>
            <span id="shiftErr" class="text-danger"></span>
          </div>

          <label>Course Description: </label>
          <div class="form-group">
            <div class="controls">
             <textarea name="description" id="description" required="" rows="4" class="form-control" aria-invalid="false" required data-validation-required-message="Course Description is required"></textarea>
            </div>
            <span id="descErr" class="text-danger"></span>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary btn-lg clear" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary btn-lg" id="courseForm" value="save">
        </div>
      </form>
    </div>
  </div>
</div>
  <script>
	$(document).ready(function(){
		$("ul[role=menu] li:last-child").remove();
		$("[role=menu]").append('<li aria-hidden="false" style="display: list-item;"><a id="submitSchoolForm" role="menuitem">Submit</a></li>');
		$("#submitSchoolForm").on('click', function(){
			$("#submitData").submit();
		});
	});
   $('#courseForm').submit(function(e) 
{

    var des = CKEDITOR.instances['description'].getData();

    $("#courseForm").find('#description').text(des);
    var action = $('#courseForm').attr('action');
    var courseForm = $('#courseForm')[0];
    var formData = new FormData(courseForm);
    $.ajax
    ({
      type:"Post",
      url:action,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data)
      { 
        
        if(data == 1)
       {
          toastr.success("Please wait until super admin approved your request");
        
          $("#inlineForm").modal('hide');
          $('#courseForm')[0].reset();

          
        }
       
        else if(data.errors)
        {
             if(data.errors.name)
          {
            $( '#courseErr' ).html( data.errors.name[0] );
          }
         if(data.errors.shift)
          {
            $( '#shiftErr' ).html( data.errors.shift[0] );
          }  

           if(data.errors.discription)
          {
            $('#descErr').html( data.errors.description[0] );
          }  
          if(data.error){

              $('#courseErr').html("Course name is already exist");
          }  
              
        }   
        else{
          
          toastr.error("Course name is already exist");
       
        }        
      }
    });
 
  return false;
});


$(document).ready(function($) {
  	//$.mask.definitions['~'] = '([0-9] )?';
	//$('#phone').mask("+ 99 (99~) 99999~~~~~~");
  /* Accommodation Jquery */
  var acc_type_array = [];
  $('body').on('change', '.Select_acco_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var acco_type_id   = result[0];
    var acco_type_name = result[1];
    if(acc_type_array.indexOf(acco_type_id) === -1){
          acc_type_array.push(acco_type_id);
          var data = '<div class="row acc_row"><div class="form-group col-md-12"><input type="hidden" name="acco_type_id[]" value="'+acco_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+acco_type_id+'"><h4 class="form-section mb-2">'+acco_type_name+'<span data-id="'+acco_type_id+'" class="remove_accomodation btn btn-danger">Remove</span></h4><div class="controls"><input name="accprice-'+acco_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div><br /><input name="accdesc-'+acco_type_id+'[]" class="form-control" required="" placeholder="Additional Info" type="text"></div></div></div>';
          $(data).insertAfter(".after_repeat-section_accomodation"); 
        }
      }

  });
  $('body').on("click",".remove_accomodation", function(e){
      var acco_type_id = $(this).attr('data-id');
      acc_type_array = jQuery.grep(acc_type_array, function(value) {
      return value != acco_type_id;
      });
      if(jQuery.isEmptyObject(acc_type_array) ==  true){
        $('.Select_acco_type>option:eq(0)').prop('selected', true);
        //$('.Select_acco_type').addClass('required');
      }
      //$(this).parents('.rmv_repeat').prev().remove();
      $(this).parents('.acc_row').remove();
  });
    /* Insurence Jquery */
  var ins_type_array = [];
  $('body').on('change', '.Select_ins_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var ins_type_id   = result[0];
    var ins_type_name = result[1];
    if(ins_type_array.indexOf(ins_type_id) === -1){
          ins_type_array.push(ins_type_id);
          var data = '<div class="row ins_row"><div class="form-group col-md-12"><input type="hidden" name="ins_type_id[]" value="'+ins_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+ins_type_id+'  mb-3"><h4 class="form-section mb-2">'+ins_type_name+'<span data-id="'+ins_type_id+'" class="remove_insurence btn btn-danger">Remove</span></h4><div class="controls"><input name="insprice-'+ins_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div></div></div></div>';
          $(data).insertAfter(".after_repeat-section_insurence"); 
        }
      }
  });
  $('body').on("click",".remove_insurence", function(e){
      var ins_id = $(this).attr('data-id');
      ins_type_array = jQuery.grep(ins_type_array, function(value) {
      return value != ins_id;
      });
      if(jQuery.isEmptyObject(ins_type_array) ==  true){
        $('.Select_ins_type>option:eq(0)').prop('selected', true);
        //$('.Select_ins_type').addClass('required');
      }
      //$(this).parents('.rmv_repeat').prev().remove();
      $(this).parents('.ins_row').remove();
  });
   /* Visa Jquery */
  var visa_type_array = [];
  $('body').on('change', '.Select_visa_type', function(){ 
    var selected = this.value;
    if(selected === ""){}else{
    var result = selected.split('|');
    var visa_type_id   = result[0];
    var visa_type_name = result[1];
    if(visa_type_array.indexOf(visa_type_id) === -1){
          visa_type_array.push(visa_type_id);
          var data = '<div class="row visa_row"><div class="form-group col-md-12"><input type="hidden" name="visa_type_id[]" value="'+visa_type_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+visa_type_id+'  mb-3"><h4 class="form-section mb-2">'+visa_type_name+'<span data-id="'+visa_type_id+'" class="remove_visa btn btn-danger">Remove</span></h4><div class="controls"><input name="visaprice-'+visa_type_id+'[]" class="form-control" required="" placeholder="Enter Price" type="number"><div class="help-block"></div></div></div></div>';
          $(data).insertAfter(".after_repeat-section_visa"); 
        }
      }  

  });
  $('body').on("click",".remove_visa", function(e){
      var visa_id = $(this).attr('data-id');
      visa_type_array = jQuery.grep(visa_type_array, function(value) {
      return value != visa_id;
      });
      if(jQuery.isEmptyObject(visa_type_array) ==  true){
        $('.Select_visa_type>option:eq(0)').prop('selected', true);
        //$('.Select_visa_type').addClass('required');
      }
      //$(this).parents('.rmv_repeat').prev().remove();
      $(this).parents('.visa_row').remove();
  });



 var arrSelected = [];
  $('body').on('change', '.Select_course', function(){ 
        var selected = this.value;
        var result = selected.split('|');
        var course_id   = result[0];
        var course_name = result[1]; 
        if(arrSelected.indexOf(course_id) === -1){
          arrSelected.push(course_id);
          var $repeat_section = $('.repeat-section').clone();
          var data = '<input type="hidden" name="course_id[]" value="'+course_id+'"><div class="w-100 float-left rmv_repeat repeat-section-'+course_id+'  mb-3"><h4 class="form-section mb-2">'+course_name+'<div class="class_div_discount"><label>Add Discount</label><input type="text" name="discount_A-'+course_id+'[]" placeholder="Discount %"><label>Add Deal</label><input type="text" name="discount_B-'+course_id+'[]" placeholder="Deal %"></div><span data-id="'+course_id+'" class="remove_course btn btn-danger">Remove</span></h4><div class="form-group input_fields_container"><style type="text/css" media="screen">.box-listing .w-7per{width:6.50%; float: left; padding-right:5px; font-size:9px;}.box-listing .w-7per:last-child{padding-right:0;}</style><div class="controls"><div class="col-md-12 box-listing"><div row-id="'+course_id+'" class="row row-'+course_id+'"><div class="w-7per" style="width:25%"><label>Lesson Timings</label><input name="course_shift-'+course_id+'[]" class="form-control" placeholder="e.g Morning Shift" aria-invalid="false" type="text"></div><br /><br /><br /><br /><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.hpw")">HPW <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="hour_per_week-'+course_id+'[]" class="form-control" placeholder="Hours" aria-invalid="false" type="Number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.lpw")">LPW <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="lesson_per_week-'+course_id+'[]" class="form-control" placeholder="Lesson per Week" aria-invalid="false" type="text"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 1-4 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw1-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="Number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 5-8 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw2-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 9-12 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw3-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 13-6 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw4-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 17-20 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw5-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 21-24 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw6-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 25-28 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw7-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 29-32 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw8-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 33-36 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw9-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 36-40 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw10-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 40-44 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw11-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 45-48 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw12-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><label data-toggle="tooltip" title="@lang("school.ppw")">PPW 49-52 <i class="fa fa-question-circle" style="font-size:11px"></i></label><input name="ppw13-'+course_id+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number"></div><div class="w-7per"><a id="add_more_button_id" data-id="'+course_id+'" href="javascript:;" class="btn btn-primary add_more_button" style="margin-top:20px;">Add More</a></div></div></div></div></div></div>';
         $(data).insertAfter(".after_repeat-section");
        }       
  });
   $('body').on('click', '#add_more_button_id', function(){ 
          var cid = $(this).attr('data-id');
          var data =
            '<div class="w-7per" style="width:25%"><label>Lesson Timings</label><input name="course_shift-'+cid+'[]" class="form-control" placeholder="e.g Morning Shift" aria-invalid="false" type="text"></div><br /><br /><br /><br /><div class="w-7per">'+
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
                                '<input name="ppw13-'+cid+'[]" class="form-control" placeholder="Price" aria-invalid="false" type="number">'+
                              '</div>';
            $(this).parents('.row-'+cid).append('<div class="controls remove_control"><div class="col-md-12 box-listing" style="margin-top:17px">'+
                          '<div class="row">'+data+'<div class="w-7per"><a href="#" class="remove_field btn btn-danger" style="margin-top: 47px;">Remove</a></div></div></div></div>'); //add input field
						  $('[data-toggle="tooltip"]').tooltip();
        });
     $('body').on("click",".remove_field", function(e){
        e.preventDefault();
        $(this).parents('.remove_control').remove();
    });
    $('body').on("click",".remove_course", function(e){
      var course_id = $(this).attr('data-id');
      arrSelected = jQuery.grep(arrSelected, function(value) {
      return value != course_id;
      });
      $(this).parents('.rmv_repeat').fadeOut( "slow", function() {
      $(this).parents('.rmv_repeat').remove();
    });
    });

  $('#countryList_data').on("change",function (){
        var countryId = $(this).find('option:selected').val();  
                       
       $.ajax
        ({
            url: "{{route('getStatesschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","countryId":countryId,},
            success: function (response) 
            { $('#stateList_data').html(response);
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
    $("body").on("click",".removeFile",function(){ 
        $(this).parents(".control-group").remove();
    });
    $(".addFiletransport").click(function(){ 
        var html = $(".transportclone").html();
        $(".transportincrement").after(html);
    });
    $("body").on("click",".removeFile",function()
   { 
        $(this).parents(".transportvalue").remove();

    });


$('#second').on("click",function(){
    
   // alert("helloo");
});

$('#select_all').click(function() {
     $('#select2-icons').multiSelect('select_all');
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