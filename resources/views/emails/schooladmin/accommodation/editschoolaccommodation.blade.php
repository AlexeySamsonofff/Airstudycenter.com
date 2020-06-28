@extends('schooladmin.layout.index')
@section('title','School Accommodation')
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
                    <form class="form" action="{{route('updateSchoolAccommodation')}}" method="post" class="form form-horizontal" novalidate>
                      {{ csrf_field() }}

                     
                      <input type="hidden" name="id" value="{{$schoolaccommodation->id}}">
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-eye6"></i>Update School Accommodation</h4>
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="userinput4">Select School</label>
                          <div class="controls">
                          <select name="school_id" id="select" required="" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="School is required">
                            
                          <option value="{{$schoolaccommodation->school_id}}">{{$schoolaccommodation->school_name}}</option>
                               
                               
                              </select>
                            </div>
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="location">
                                Select Accommodation Type
                              </label>
                              <div class="controls">
                                 <select name="type" id="select"  data-placeholder="Select Type" required="" class="custom-select form-control required" aria-invalid="false" required data-validation-required-message="Type is required">
                                
                                @foreach($types as $type)
                                <option value="{{$type->id}}" @if($type->id == $schoolaccommodation->type_id) selected @endif>{{$type->name}}</option>
                                @endforeach
                              </select>
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
