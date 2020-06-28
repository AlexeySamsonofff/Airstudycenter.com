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
                    <form class="form" action="{{route('updateCourseDiscount')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">
                        <input type="hidden" name="id" value="{{$coursediscount->id}}">
                        <h4 class="form-section"><i class="icon-eye6"></i>Update Discount</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="schoolList_data" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="School is required">
                              <option value="{{$coursediscount->school_id}}">{{$coursediscount->school_name}}</option>
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
                               <select name="course_id" id="stateList_data" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="Course Name is required">
                                <option value="{{$coursediscount->course_id}}">{{$coursediscount->course_name}}</option>
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                            <h5>Course Discount
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Enter Discount"
                            name="discount" data-validation-regex-regex="(^[1-9]\d*(\.\d+)?$)" required data-validation-required-message="Discount is required"
                            data-validation-regex-message="invalid Format" value="{{$coursediscount->discount}}">
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
