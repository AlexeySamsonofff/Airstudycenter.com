@extends('schooladmin.layout.index')
@section('title','Dashboard')
@section('content')
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Add School in Other Language</h3>
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
                   
                    <form action="{{route('addLangSchool',['id'=> $school_id])}}" method="post" class="form form-horizontal" novalidate>
                       {{ csrf_field() }}

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In English</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name" value="{{$school->name}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by" aria-invalid="false" value="{{$school->recognised_by}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    


                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Turkish</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_tr" value="{{$school->name_tr}}" >
                            </div>
                            </div> 
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_tr" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_tr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_tr" aria-invalid="false"  value="{{$school->recognised_by_tr}}">
                            </div>
                          </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Arabic</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_ar" value="{{$school->name_ar}}" >
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_ar" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false">{!! $school->description_ar !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_ar" aria-invalid="false" value="{{$school->recognised_by_ar}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Russian</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_ru" value="{{$school->name_ru}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_ru" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_ru !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_ru" aria-invalid="false" value="{{$school->recognised_by_ru}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In German</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_de" value="{{$school->name_de}}" >
                            </div>
                            </div> 
                          </div>
                        </div>
                          
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_de" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false">{!! $school->description_de !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                       <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_de" aria-invalid="false" value="{{$school->recognised_by_de}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                   
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Italian</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_it" value="{{$school->name_it}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_it" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_it !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_it" aria-invalid="false" value="{{$school->recognised_by_it}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In French</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_fr" value="{{$school->name_fr}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_fr" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_fr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_fr" aria-invalid="false" value="{{$school->recognised_by_fr}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                     
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Spanish</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_es" value="{{$school->name_es}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_es" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_es !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_es" aria-invalid="false" value="{{$school->recognised_by_es}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Swedish</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_se" value="{{$school->name_se}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_se" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false">{!! $school->description_se !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_se" aria-invalid="false" value="{{$school->recognised_by_se}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Japanese</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_jp" value="{{$school->name_jp}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_jp" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false" >{!! $school->description_jp !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_jp" aria-invalid="false" value="{{$school->recognised_by_jp}}">
                            </div>
                          </div>
                          </div>
                        </div>
                     
                      </div>

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Persian</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_fa" value="{{$school->name_fa}}" >
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_fa" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_fa !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_fa" aria-invalid="false" value="{{$school->recognised_by_fa}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>

                        
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Portuguese</h4>
                        <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                            <h5>School Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="School Name"
                                name="name_pr" value="{{$school->name_pr}}">
                            </div>
                            </div> 
                          </div>
                          
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_pr" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $school->description_pr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="recognisedby">
                                Recognised by :
                              </label>
                              <div class="controls">
                              <input type="text" class="form-control" id="recognisedby" name="recognised_by_pr" aria-invalid="false" value="{{$school->recognised_by_pr}}">
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>

                      

                      @foreach($airports as $airport)

                      <div class="form-body col-md-6">

                        <h4 class="form-section"><i class="ft-user"></i>Add In Airport Name</h4>

                        <input type="hidden" name="pdp[]" value="{{$airport->pick_up_and_drop}}">
                        <input type="hidden" name="pp[]" value="{{$airport->pick_up}}">

                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In English
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name[]" value="{{$airport->airport_name}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Arabic
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_ar[]" value="{{$airport->airport_name_ar}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Turkish
                             
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_tr[]" value="{{$airport->airport_name_tr}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Germany
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_de[]" value="{{$airport->airport_name_de}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In French
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_fr[]"  value="{{$airport->airport_name_fr}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Russian
                             
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_ru[]"  value="{{$airport->airport_name_ru}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Spanish
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_es[]" value="{{$airport->airport_name_es}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Swedish
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_se[]" value="{{$airport->airport_name_se}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Japanese
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_jp[]" value="{{$airport->airport_name_jp}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Persian
                              
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_fa[]" value="{{$airport->airport_name_fa}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Portuguese
                             
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_pr[]" value="{{$airport->airport_name_pr}}" >
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Airport Name In Italian
                             
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Airport Name"
                                name="airport_name_it[]" value="{{$airport->airport_name_it}}">
                            </div>
                            </div> 
                          </div>
                         
                        </div>
                        
                      </div>

                      @endforeach
                      
            
                      <div class="form-actions center col-md-12">
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