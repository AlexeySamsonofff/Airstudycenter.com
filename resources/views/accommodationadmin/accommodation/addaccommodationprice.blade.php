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
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card" style="height: 1022px;">
                <div class="card-body collapse in">
                  <div class="card-block">
                    <form class="form" action="{{route('storeAccommodationPrice')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                       <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>Add Accommodation</h4>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput4">Select Accommodation</label>
                              <div class="controls">
                              <select name="accommodation_id"  required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Country is required">
                                <option value="">Select Accommodation</option>
                                @foreach($accommodations as $accommodation)
                                 <option value="{{$accommodation->id}}">{{$accommodation->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                         
                        </div>
                        
                         <div class="form-group input_fields_container">
                          <label>Select Accommodation Type</label>                          
                          <div class="controls">

                            <div class="row">
                              <div class="col-md-5">
                                <select name="type[]"  required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Accommodation Type is required">
                                <option value="">Select Accommodation Type</option>
                                @foreach($types as $type)
                                 <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                              </select>
                              </div>
                              <div class="col-md-6">
                                <input name="price[]" class="form-control" required="" placeholder="Enter Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              
                              <div class="col-md-1">
                                <button class="btn btn-primary add_more_button">Add More</button>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      <div class="form-actions right">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> Save
                        </button>
                      </div>
                    </div>
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
  var data = '<div class="col-md-5">'+
                                '<select name="type[]" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Accommodation Type is required">'+
                               '<option value="">Select Accommodation Type</option>'+
                               '@foreach($types as $type)'+
                                 '<option value="{{$type->id}}">{{$type->name}}</option>'+
                               '@endforeach'+
                              '</select>'+
                              '</div>'+
                              '<div class="col-md-6">'+
                                '<input name="price[]" class="form-control"  required="" placeholder="Enter Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>';
$(document).ready(function()
{
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e)
  { 
        e.preventDefault();
        if(x < max_fields_limit)
    {
            x++; //counter increment
            $('.input_fields_container').append('<div class="controls" style="margin-top:20px"><div class="row">'+data+'<div class="col-md-1"><a href="#" class="remove_field btn btn-danger">Remove</a></div></div></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e)
  {
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
</script>
  @endsection
