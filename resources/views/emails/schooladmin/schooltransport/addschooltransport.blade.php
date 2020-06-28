@extends('schooladmin.layout.index')
@section('title','School Transport')
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
                    <form class="form" action="{{route('storeSchoolTransport')}}" method="post" class="form form-horizontal" novalidate>
                      {{ csrf_field() }}

                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>Add School Transport</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput4">Select School</label>
                              <div class="controls">
                              <select name="school_id" id="select" required="" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="School is required">
                                <option value="">Select School</option>
                                @foreach($schools as $school)
                                
                                <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                               
                              </select>
                            </div>
                            </div>
                          </div>
                         
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Airport Name</label>
                              <div class="controls">
                                 <input name="airport_name" class="form-control" required="" placeholder="Enter Airport Name" data-validation-required-message="Airport Name field is required" aria-invalid="false" type="text">
                              </div>
                            </div>
                          </div>
                          
                        </div>
                          
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Pick Up Price</label>
                              <div class="controls">
                                 <input name="pp" class="form-control" required="" placeholder="Enter Price" data-validation-required-message="Price is required" aria-invalid="false" type="number">
                              </div>
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="userinput3">Pickup & drop Price</label>
                              <div class="controls">
                                 <input name="pdp" class="form-control" required="" placeholder="Enter Price" data-validation-required-message="Price is required" aria-invalid="false" type="number">
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
