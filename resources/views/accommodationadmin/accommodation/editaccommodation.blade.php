@extends('accommodationadmin.layout.index')
@section('title','Accommodation')
@section('content')

<div class="app-content container-fluid">
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

 @if(Session::has('error'))

        <div class="alert alert-danger">

            {{ Session::get('error') }}

            @php

            Session::forget('error');

            @endphp

        </div>

        @endif
      <div class="content-body">
        <!-- Basic form layout section start -->
          <section id="basic-form-layouts">
          <div class="row">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Accommodation</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-body collapse in">
                  <div class="card-block">
                    <form action="{{route('updateAccommodation')}}" method="post" class="steps-validation wizard-circle" id="submitData" enctype="multipart/form-data" novalidate>

                      <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                      <input type="hidden" name="id" value="{{$accommodation->id}}">

                      {{ csrf_field() }}
                      <!-- Step 1 -->
                      <h6>Accommodation Detail</h6>
                      <fieldset>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Name</label>
                              <div class="controls">
                                 <input name="name" class="form-control" required="" placeholder="Enter Name" data-validation-required-message="accommodation Name field is required" aria-invalid="false" type="text" value="{{$accommodation->name}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Email</label>
                              <div class="controls">
                                 <input name="email" class="form-control" required="" placeholder="Enter Email of owner" data-validation-required-message="Email field is required" aria-invalid="false" type="email" value="{{$accommodation->email}}">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description" id="shortDescription3" rows="4" class="form-control  custextarea" aria-invalid="false">{{$accommodation->description}}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select Country</label>
                              <div class="controls">
                              <select name="country_id" id="countryList_data" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Country is required">
                                <option value="">Select Country Name</option>  
                               @foreach($countries as $country) 
                                <option value="{{$country->code}}|{{$country->name}}" @if($country_code == $country->code) selected="selected" @endif>{{$country->name}}</option>     
                                @endforeach 
                              </select>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select County</label>
                              <div class="controls">
                              <select name="state_id" id="stateList_data" required="" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="State is required">
                                <option value="">Select County</option>
                                 @foreach($states as $state)
                              <option value="{{$country_code}}|{{$state->region}}" @if($state_code == $state->region) selected="selected" @endif >{{$state->region}}</option>
                              option
                             @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select City</label>
                              <div class="controls">
                              <select name="city_id" id="cityList_data" required="" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="City is required">
                                <option value="">Select City</option>
                             @foreach($cities as $city)
                                <option value="{{urlencode($city->city)}}|{{$city->city}}"@if($city_code == urlencode($city->city))selected="selected"@endif>{{$city->city}}</option>
                              @endforeach         
                              </select>
                               
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select Postal Code</label>
                              <div class="controls">
                              <input type="text" name="zipcode_id" value="{{$zipcode_id}}" data-validation-required-message="Addess Number is required" aria-invalid="false" class="form-control required">
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Address</label>
                              <div class="controls">
                                 <input name="address" class="form-control" required="" placeholder="Enter address" data-validation-required-message="No of student field is required" aria-invalid="false" type="text" value="{{$accommodation->address}}">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Owner Name</label>
                              <div class="controls">
                                <input name="owner_name" class="form-control" required="" placeholder="Enter Owner's Name" data-validation-required-message="Owner name is required" aria-invalid="false" type="text" value="{{$accommodation->owner_name}}">
                              </div>
                            </div>
                          </div>
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Owner's Image</label>
                              <div class="controls">
                                <input type="file" name="owner_image" id="inputFile" class="form-control">
                              </div>
                               <div class="form-group col-md-6">
                             <img id="image_upload_preview" src="{{url('/normal_images/'.$accommodation->owner_image)}}" alt="" style="height:20%;width:20%">
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
                                Upload Room's Images :
                              </label>
                              <div class="bor">

                                <div class="input-group control-group increment" >

                                  <input type="file" name="image[]" class="form-control up_image_control">
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
                        </div>
                      </fieldset>
                      <!-- Step 2 -->
                       <h6>Property Type</h6>
                      <fieldset>
                         <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">
                               Property Type :
                              </label>
                              <div class="controls">
                                <select name="property_type" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Property Type is required">
                                <option value="">Select Property Type</option>  
                               @foreach($property_types as $property_type) 
                                <option value="{{$property_type->id}}" @if($selected_property_type == $property_type->id) selected="selected" @endif>{{$property_type->name}}</option>     
                                @endforeach  
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <!-- Step 3 -->
                      <h6>Property Facilities/ Description</h6>
                      <fieldset>
                        <div class="row">
                         <div class="w-100 float-left">
                            <div class="form-group">
                              <h3 for="userinput4">
                               Property Facilities :
                              </h3>
                              <div class="controls">
                                <div class="col-md-12">
                                  <div class="row">
                                    @foreach($facilities as $facility)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-2 mb-1">
                                      <input type="checkbox" name="check_list_fac[]" value="{{$facility->id}}" @foreach($accommodationfacilities as $a_facility) @if($a_facility->facility_id == $facility->id) checked="checked" @endif @endforeach> {{$facility->name}}
                                    </div>
                                    @endforeach 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 mt-3">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary p-1 text-md-center">Add Bedrooms</div>
                                    <div class="card-body">
                                      <div class="add-quantity">
                                        <div class="btn-minus btn-dark text-whitetext-white"><span class="fa fa-minus"></span></div>
                                        <input name="bedroom" value="{{$accomodationdescriptions->bedroom}}" />
                                        <div class="btn-plus btn-dark text-white"><span class="fa fa-plus"></span></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                 <div class="col-md-3">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Add Kitchen</div>
                                    <div class="card-body">
                                       <div class="add-quantity">
                                        <div class="btn-minus btn-dark text-whitetext-white"><span class="fa fa-minus"></span></div>
                                        <input name="kitchen" value="{{$accomodationdescriptions->kitchen}}" />
                                        <div class="btn-plus btn-dark text-white"><span class="fa fa-plus"></span></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="col-md-3">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Add Balcony</div>
                                    <div class="card-body">
                                       <div class="add-quantity">
                                        <div class="btn-minus btn-dark text-whitetext-white"><span class="fa fa-minus"></span></div>
                                        <input name="balcony" value="{{$accomodationdescriptions->balcony}}" />
                                        <div class="btn-plus btn-dark text-white"><span class="fa fa-plus"></span></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Add Bathroom</div>
                                    <div class="card-body">
                                      <div class="add-quantity">
                                        <div class="btn-minus btn-dark text-whitetext-white"><span class="fa fa-minus"></span></div>
                                        <input name="bathroom" value="{{$accomodationdescriptions->bathroom}}" />
                                        <div class="btn-plus btn-dark text-white"><span class="fa fa-plus"></span></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </div>
                      </fieldset> 
                      <h6>Accommodation Type/ Price</h6>
                      <fieldset>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">
                               Accommodation Type
                              </label>
                              <div class="controls">
                                <select id="accommodation_type" name="accommodation_type" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Accommodation Type is required">
                                <option value="">Select Accommodation Type</option>  
                                <option value="independent" @if($getacc_type->acc_type == 'independent') selected="selected" @endif>Independent</option> 
                                <option value="shared" @if($getacc_type->acc_type == 'shared') selected="selected" @endif>Shared</option>      
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                         @if($getacc_type->acc_type == 'independent')
                         @php
                          $get_independent   = App\Accommodationprice::where('accommodation_id', $accommodation->id)->first();
                         @endphp
                         <div class="row ind_acco"  style="@if($getacc_type->acc_type == 'shared') display:none @endif">
                                 <div class="col-md-9">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Independent</div>
                                    <div class="card-body">
                                        <label>Independent</label>
                                        <input name="ind_price_only" value="{{$get_independent->price}}" Placeholder="Price" />
                                        <input name="ind_price_with" value="{{$get_independent->pricewith}}" Placeholder="Price With Food" />
                                        <select name="ind_availability" id="ind_availability">
                                          <option value="">Please select availability</option>
                                          <option value="1" @if($get_independent->available == 1) selected="selected"  @endif>Yes</option>
                                          <option value="0" @if($get_independent->available == 0) selected="selected"  @endif>No</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                               </div>
                          <div class="row shared_acco" style="@if($getacc_type->acc_type == 'independent') display:none @endif">
                               <div class="col-md-9">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Shared</div>
                                    @foreach($acco_types as $type)
                                    <div class="card-body">
                                        <label>{{$type->name}}</label>
                                         <input type="hidden" name="typeid[]" value="{{$type->id}}" />
                                        <input name="shared_price_only[]" Placeholder="Price"  />
                                        <input name="shared_price_with[]" Placeholder="Price With Food" />
                                        <select name="shared_availability[]" id="ind_availability">
                                          <option value="">Please select availability</option>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select>
                                    </div>
                                    @endforeach
                                  </div>
                                </div>
                        </div>
                        @else
                        @php
                          $getacc_shared   = App\Accommodationprice::where('accommodation_id', $accommodation->id)->get();
                        @endphp  

                          <div class="row ind_acco"  style="@if($getacc_type->acc_type == 'shared') display:none @endif">
                          <div class="col-md-9">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Independent</div>
                                    <div class="card-body">
                                        <label>Independent</label>
                                        <input name="ind_price_only" Placeholder="Price" />
                                        <input name="ind_price_with" Placeholder="Price With Food" />
                                        <select name="ind_availability" id="ind_availability">
                                          <option value="">Please select availability</option>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                        </div>
                        <div class="row shared_acco" style="@if($getacc_type->acc_type == 'independent') display:none @endif">
                          <div class="col-md-9">
                                  <div class="card text-white border-primary mb-4">
                                    <div class="card-header bg-primary text-md-center p-1">Shared</div>
                                    @foreach($acco_types as $type)
                                    <div class="card-body">
                                        <label>{{$type->name}}</label>
                                         <input type="hidden" name="typeid[]" value="{{$type->id}}" />
                                        <input name="shared_price_only[]" @foreach($getacc_shared as $shared) @if($shared->typeid == $type->id) value="{{$shared->price}}" @endif @endforeach Placeholder="Price" />
                                        <input name="shared_price_with[]" @foreach($getacc_shared as $shared) @if($shared->typeid == $type->id) value="{{$shared->pricewith}}" @endif @endforeach Placeholder="Price With Food" />
                                        <select name="shared_availability[]" id="ind_availability">
                                          <option value="">Please select availability</option>
                                          <option value="1" @foreach($getacc_shared as $shared) @if($shared->typeid == $type->id)  @if($shared->available == 1) selected="selected"  @endif @endif @endforeach>Yes</option>
                                          <option value="0" @foreach($getacc_shared as $shared) @if($shared->typeid == $type->id)  @if($shared->available == 0) selected="selected"  @endif @endif @endforeach>No</option>
                                        </select>
                                    </div>
                                    @endforeach
                                  </div>
                                </div>
                        </div>

                        @endif     
                      </fieldset>
                      
                     <button type="hidden" id="second"  hidden="hidden">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>
<script>

   $(document).ready(function(){
    $('#accommodation_type').on("change",function (){
        var type = this.value;  
        if(type == 'independent'){
          $('.shared_acco').hide();
          $('.ind_acco').show();
        }else{
          $('.shared_acco').show();
          $('.ind_acco').hide();
        }

    });
        /*---------- product quantity js -------------*/
 $(".btn-minus").on("click", function () {
  $this = $(this);
  var now = $this.parents('.add-quantity').find("input").val();
  if ($.isNumeric(now)) {
    if (parseInt(now) - 1 >= 0) {
      now--;
    }
    $this.parents('.add-quantity').find("input").val(now);
  } else {
    $this.parents('.add-quantity').find("input").val(0);
  }
 })
 $(".btn-plus").on("click", function () {
  $this = $(this);
  var now = $this.parents('.add-quantity').find("input").val();
  if ($.isNumeric(now)) {
    $this.parents('.add-quantity').find("input").val(parseInt(now) + 1);
  } else {
    $this.parents('.add-quantity').find("input").val(0);
  }
 });
    jQuery('body').on('click',".removeedit_image",function(){
     
        var data_imageid = jQuery(this).attr("data-imageid"); 
        var data_imgurl  = jQuery(this).attr("data-imgurl");   

        $.ajax
        ({
            url: "{{route('deleteAccommodationImages')}}",
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
});


  $(document).ready(function($) {

  $('#countryList_data').on("change",function (){
        var countryId = $(this).find('option:selected').val();  
               
       $.ajax
        ({
            url: "{{route('getStatesAccommodation')}}",
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
            url: "{{route('getCitiesAccommodation')}}",
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
            url: "{{route('getPostalCodesAccommodation')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","cityId":cityId,},
            success: function (response) 
            {  $('#zip_codeList_data').html(response);
               $("select").material_select('update');
            },                                    
        });                      
    });


     $(".addFile").click(function()
    { 

        var html = $(".clone").html();
        $(".increment").after(html);
    });
    $("body").on("click",".removeFile",function()
   { 
        $(this).parents(".control-group").remove();

    });





  });

  </script>
  <!-- <script>
$('textarea').ckeditor(); 
</script>       -->
  @endsection
