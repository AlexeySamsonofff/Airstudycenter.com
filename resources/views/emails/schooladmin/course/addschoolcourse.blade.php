@extends('schooladmin.layout.index')
@section('title','Schoolcourse')
@section('content')

   <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Add Course Title</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
              
              </ol>
            </div>
          </div>
        </div>
      </div>

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
      <div class="content-body">
        <!-- Stats -->
        <div class="row">
            <section id="horizontal-form-layouts" class="input-validation">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
               
                <div class="card-body collapse in">
                  <div class="card-block">
                   
                    <form action="{{route('storeSchoolCourse')}}" method="post" class="form form-horizontal" novalidate>
                       {{ csrf_field() }}
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Add School Course</h4>

                          <input type="hidden" name="userId" value="{{Auth::user()->id}}">

                        <div class="row">
                          <div class="col-md-6">
                           <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="schoolId" id="countryList_data" required="" class="custom-select form-control chosen required"  aria-invalid="false" required data-validation-required-message="School is required">
                                <option value="">Select school</option>
                                @foreach($schools as $school)
                                 <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                        <style type="text/css" media="screen">
                       .chosen-container.chosen-with-drop .chosen-drop{max-height:100px; overflow-x: scroll}
                          
                        </style>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Course Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Course Name"
                                name="name" required data-validation-required-message="Course Name is required">
                            </div>
                            </div> 
                          </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <h5>Course Shift
                              <span class="required">*</span>
                            </h5>
                              <div class="controls">
                                <select name="shift[]" data-placeholder="Select Course Shift" class="select2-icons form-control" id="select2-icons" multiple="multiple">
                                <optgroup label="Course Shifts">
                                  <option value="Morning">Morning</option>
                                  <option value="Evening">Evening</option>
                                  <option value="Afternoon">Afternoon</option>
                                </optgroup>
                                  
                              </select>
                            </div>
                             
                            </div>
                          </div>
                        
                        </div>
                      </div>
                      <div class="form-actions center">

                        <!-- <button type="button" class="btn btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </button> -->
                        <button type="submit" class="btn btn-primary">
                           Save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </section>
        </div>
      </div>
    </div>
  </div>
  @endsection
