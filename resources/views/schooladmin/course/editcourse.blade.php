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
                    <form class="form" action="{{route('updateCourse')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">
                        <input type="hidden" name="id" value="{{$course->id}}">
                        <h4 class="form-section"><i class="icon-eye6"></i>Update Course</h4>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="countryList_data" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="School is required">
                                 <option value="{{$course->schoolId}}" selected="selected">{{$course->school_name}}</option>
                              
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
                              <select name="course_id" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Course is required">
                               
                                 <option value="{{$course->course_id}}">{{$course->courseName}}</option>
                                
                              </select>
                            </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Age Limit</label>
                              <div class="controls">
                                 <input name="agelimit" class="form-control" required="" placeholder="Enter Age Limit" data-validation-required-message="Age is required" aria-invalid="false" type="number" value="{{$course->agelimit}}">
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description" id="shortDescription3" required="" rows="4" class="form-control" aria-invalid="false">{{$course->description}}</textarea>
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
                               <div class="form-group col-md-6">
                             <img id="image_upload_preview" src="{{asset('thumbnail_images/'.$course->image)}}" alt="" style="height:20%;width:20%">
                          </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Max-Group Size</label>
                              <div class="controls">
                                 <input name="max_group_size" class="form-control" required="" placeholder="Enter Age Limit" data-validation-required-message="max_group_size is required" aria-invalid="false" type="number" value="{{$course->max_group_size}}">
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

  </script>
          
  @endsection
