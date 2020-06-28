@extends('schooladmin.layout.index')
@section('title','School')
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
                    <form class="form" action="{{route('updateSchoolAccommodationPrice')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>update Price</h4>

                        <input type="hidden" name="id" value="{{$schoolaccommodationprice->id}}">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="schoolList_data" required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="School is required">
                                 <option value="{{$schoolaccommodationprice->school_id}}">{{$schoolaccommodationprice->school_name}}</option>
                                
                              </select>
                            </div>
                            </div>
                          </div>
                        </div>
                         
                        <div class="input_fields_container">  
                          <div class="row">
                          <div class="form-group col-md-5">
                             <div class="controls">
                                <select name="type"  required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Accommodation Type is required">
                                 <option value="{{$schoolaccommodationprice->accommodation_id}}">{{$schoolaccommodationprice->type_name}}</option>
                              </select>
                            </div>
                              </div>
                              <div class="form-group col-md-6">
                                 <div class="controls">
                                <input name="price" class="form-control" required="" placeholder="Enter Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$schoolaccommodationprice->price}}">
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
  @endsection
