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
                    <form class="form" action="{{route('updateCourseprices')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">
                        <input type="hidden" name="id" value="{{$courseprice->id}}">
                        <h4 class="form-section"><i class="icon-eye6"></i>Update Price</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="schoolList_data" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="School is required">
                              <option value="{{$courseprice->school_id}}">{{$courseprice->school_name}}</option>
                              </select>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select Course
                              </label>
                              <div class="controls">
                               <select name="course_Id" id="stateList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="Course Name is required">
                                <option value="{{$courseprice->course_id}}">{{$courseprice->course_name}}</option>
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>



                        <div class="form-group input_fields_container">                     
                          <div class="controls">

                          <div class="row">
                          <div class="col-md-6">
                                 <label>Hours per Week</label> 
                                 <input name="hour_per_week" class="form-control" required="" placeholder="Hours" data-validation-required-message="Duration Name is required" aria-invalid="false" type="Number" value="{{$courseprice->hours_per_week}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-1">
                                 <label>price per week 1-4</label>
                                 <input name="ppw1" class="form-control" required="" placeholder="Price" data-validation-required-message="Number Of Lesson is required" aria-invalid="false" type="Number" value="{{$courseprice->ppw1}}">
                          </div>
                              <div class="col-md-1">
                                <label>price per week 5-8</label>
                                <input name="ppw2" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw2}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 9-12</label>
                                <input name="ppw3" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw3}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 13-16</label>
                                <input name="ppw4" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw4}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 17-20</label>
                                <input name="ppw5" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw5}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 21-24</label>
                                <input name="ppw6" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw6}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 25-28</label>
                                <input name="ppw7" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw7}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 29-32</label>
                                <input name="ppw8" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw8}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 33-36</label>
                                <input name="ppw9" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw9}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 36-40</label>
                                <input name="ppw10" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw10}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 40-44</label>
                                <input name="ppw11" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw11}}">
                              </div>
                               <div class="col-md-1">
                                <label>price per week 45-48</label>
                                <input name="ppw12" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw12}}">
                              </div>
                              <div class="col-md-1">
                                <label>price per week 49-52</label>
                                <input name="ppw13" class="form-control" required="" placeholder="Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$courseprice->ppw13}}">
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

  $('#schoolList_data').on("change",function (){
        var schoolId = $(this).find('option:selected').val();  
                       
       $.ajax
        ({
            url: "{{route('getcourseschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","schoolId":schoolId,},
            success: function (response) 
            { $('#stateList_data').html(response);
            },                                    
        });
    });
});

  </script>       
  @endsection
