@extends('schooladmin.layout.index')
@section('title','Dashboard')
@section('content')

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
                    <form class="form" action="{{route('storecourseprice')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>Add Price</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="schoolList_data" required="" class="custom-select form-control chosen required"  aria-invalid="false" required data-validation-required-message="School is required">
                                <option value="">Select school</option>
                                @foreach($schools as $school)
                                 <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                           <style type="text/css" media="screen">
                       .chosen-container.chosen-with-drop .chosen-drop{max-height:100px; overflow-x: scroll}
                          
                        </style>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select Course
                              </label>
                              <div class="controls">
                               <select name="course_Id" id="courseList_data" class="custom-select form-control chosen required" aria-invalid="false" required data-validation-required-message="Course Name is required">
                                <option value="">Select Course Name</option>
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>



                        <div class="form-group input_fields_container">  
                        <style type="text/css" media="screen">
                          .box-listing .w-7per{width:6.29%; float: left; padding-right:5px; font-size:14px;}
                          .box-listing .w-7per:last-child{padding-right:0;}

                          
                        </style>                   
                        <div class="controls">
                        <div class="col-md-12 box-listing">
                          <div class="row">
                             <div class="w-7per">
                                 <label>Hours Per Week</label> 
                                 <input name="hour_per_week[]" class="form-control" required="" placeholder="Hours" data-validation-required-message="Duration Name is required" aria-invalid="false" type="Number">
                          </div>
                          <div class="w-7per">
                                 <label>price/week 1-4</label>
                                 <input name="ppw1[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Number Of Lesson is required" aria-invalid="false" type="Number">
                          </div>
                              <div class="w-7per">
                                <label>price per week 5-8</label>
                                <input name="ppw2[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 9-12</label>
                                <input name="ppw3[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 13-16</label>
                                <input name="ppw4[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 17-20</label>
                                <input name="ppw5[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 21-24</label>
                                <input name="ppw6[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 25-28</label>
                                <input name="ppw7[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 29-32</label>
                                <input name="ppw8[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price per week 33-36</label>
                                <input name="ppw9[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 36-40</label>
                                <input name="ppw10[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 40-44</label>
                                <input name="ppw11[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                               <div class="w-7per">
                                <label>price/week 45-48</label>
                                <input name="ppw12[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <label>price/week 49-52</label>
                                <input name="ppw13[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">
                              </div>
                              <div class="w-7per">
                                <button class="btn btn-primary add_more_button" style="margin-top: 47px;">Add More</button>
                              </div>
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

  $(document).ready(function($) {

  
});

  </script>
  <script>
  var data =
            '<div class="w-7per">'+
                                 '<label>Hours per Week</label>'+ 
                                 '<input name="hour_per_week[]" class="form-control" required="" placeholder="Hours" data-validation-required-message="Duration Name is required" aria-invalid="false" type="Number">'+
                          '</div>'+
                          '<div class="w-7per">'+
                                 '<label>price/week 1-4</label>'+
                                 '<input name="ppw1[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Number Of Lesson is required" aria-invalid="false" type="Number">'+
                          '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 5-8</label>'+
                                '<input name="ppw2[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 9-12</label>'+
                                '<input name="ppw3[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 13-16</label>'+
                                '<input name="ppw4[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 17-20</label>'+
                                '<input name="ppw5[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 21-24</label>'+
                                '<input name="ppw6[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 25-28</label>'+
                                '<input name="ppw7[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 29-32</label>'+
                                '<input name="ppw8[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 33-36</label>'+
                                '<input name="ppw9[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 36-40</label>'+
                                '<input name="ppw10[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 40-44</label>'+
                                '<input name="ppw11[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                               '<div class="w-7per">'+
                                '<label>price/week 45-48</label>'+
                                '<input name="ppw12[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
                              '</div>'+
                              '<div class="w-7per">'+
                                '<label>price/week 49-52</label>'+
                                '<input name="ppw13[]" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number">'+
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
            $('.input_fields_container').append('<div class="controls"><div class="col-md-12 box-listing" style="margin-top:17px">'+
                          '<div class="row">'+data+'<div class="w-7per"><a href="#" class="remove_field btn btn-danger" style="margin-top: 47px;">Remove</a></div></div></div></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e)
  {
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
</script>
          
  @endsection
