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
                    <form class="form" action="{{route('updateAccommodationPrice')}}" method="post" class="form form-horizontal" enctype="multipart/form-data" novalidate>
                      {{ csrf_field() }}
                       <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>update Accommodation</h4>
                        <input type="hidden" name="id" value="{{$accommodationprice->id}}">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput4">Select Accommodation</label>
                              <div class="controls">
                              <select name="accommodation_id"  required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Country is required">
                                 <option value="{{$accommodationname->id}}">{{$accommodationname->name}}</option>
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
                                <select name="type"  required="" class="custom-select form-control required"  aria-invalid="false" required data-validation-required-message="Accommodation Type is required">
                                  @foreach($accommodationtypes as $accommodationtype)
                                  <option value="{{$accommodationtype->id}}" @if($accommodationtype->id == $accommodationprice->type_id) selected="selected" @endif>{{$accommodationtype->name}}</option>
                                  @endforeach
                               
                               
                              </select>
                              </div>
                              <div class="col-md-6">
                                <input name="price" class="form-control" required="" placeholder="Enter Price" data-validation-required-message="Price field is required" aria-invalid="false" type="number" value="{{$accommodationprice->price}}">
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

  @endsection
