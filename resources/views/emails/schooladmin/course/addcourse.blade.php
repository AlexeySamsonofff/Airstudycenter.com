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
                    <!-- <p align="right">
                          <a href="{{route('addSchoolCourse')}}"> <button class="btn btn-primary">
                           Do you Want to add a new Course?
                        </button></a>
                         
                      </p> -->
                    <form class="form" action="{{route('storeCourse')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">

                        <h4 class="form-section"><i class="icon-eye6"></i>Add Course</h4>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="countryList_data" required="" class="custom-select form-control chosen required"  aria-invalid="false" required data-validation-required-message="School is required">
                                <option value="">Select school</option>
                                @foreach($schools as $school)
                                 <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                              <label for="userinput4">Select Course</label>
                              <div class="controls">
                              <select name="course_id" required="" class="custom-select form-control chosenrequired load"  aria-invalid="false" required data-validation-required-message="Course is required">
                                <option value="">Select Course</option>
                                @foreach($coursetitles as $coursetitle)
                                 <option value="{{$coursetitle->id}}">{{$coursetitle->name}}</option>
                                @endforeach
                              </select>
                              <span style="color:red;font-size:10px;float:right;"><a href ="#" data-toggle="modal"data-target="#inlineForm">Do you want to add a new course ?</a></span>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Age Limit</label>
                              <div class="controls">
                                 <input name="agelimit" class="form-control" required="" placeholder="Enter Age Limit" data-validation-required-message="Age is required" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                        </div>
                          
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description" id="shortDescription3" required="" rows="4" class="form-control" aria-invalid="false"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">image</label>
                              <div class="controls">
                                 <input name="image" class="form-control" aria-invalid="false" type="file">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Max-Group Size</label>
                              <div class="controls">
                                 <input name="max_group_size" class="form-control" required="" placeholder="Enter Age Limit" data-validation-required-message="max_group_size is required" aria-invalid="false" type="number">
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
             <textarea name="description" id="shortDescription3" required="" rows="4" class="form-control" aria-invalid="false" required data-validation-required-message="Course Description is required"></textarea>
            </div>
            <span id="courseErr" class="text-danger"></span>
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
  
$('#courseForm').submit(function(e) 
{
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
        
        if(data.success)
       {
          toastr.success("You'r successfully added course", "Great !");
          $("#inlineForm").modal('hide');
          $('#courseForm')[0].reset();
          $('.load').html(data);
         
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

          if(data.error){

              $( '#courseErr' ).html("Course name is already exist");
          }  
              
        }   
        else{
          
          toastr.error("Course name is already exist");
       
        }        
      }
    });
 
  return false;
});

  </script>
          
  @endsection
