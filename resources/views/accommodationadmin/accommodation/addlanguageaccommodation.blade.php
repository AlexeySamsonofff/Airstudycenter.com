@extends('accommodationadmin.layout.index')
@section('title','Accommodation')
@section('content')

  <div class="app-content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-xs-12 mb-2">
          <h3 class="content-header-title mb-0">Add Accomodation in Other Language</h3>
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
                   
                    <form action="{{route('addLangAccommodation',['id'=> $accomodation_id])}}" method="post" class="form form-horizontal" novalidate>
                       {{ csrf_field() }}
                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In English</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name" value="{{$accommodation->name}}" required data-validation-required-message="Accommodation is required" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername" value="{{$accommodation->owner_name}}" required data-validation-required-message="Owner is required" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description" id="shortDescription3" required="" rows="4" class="form-control" aria-invalid="false" required data-validation-required-message="Accommodation Description is required">{!! $accommodation->description !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Turkish</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_tr" value="{{$accommodation->name_tr}}" required data-validation-required-message="Accommodation is required" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_tr" value="{{$accommodation->owner_name_tr}}" required data-validation-required-message="Owner is required" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_tr" id="shortDescription3" required="" rows="4" class="form-control" aria-invalid="false" required data-validation-required-message="Accommodation Description is required">{!! $accommodation->description_tr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Arabic</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_ar" value="{{$accommodation->name_ar}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_ar" value="{{$accommodation->owner_name_ar}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_ar" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_ar !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Russian</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_ru" value="{{$accommodation->name_ru}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_ru" value="{{$accommodation->owner_name_ru}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_ru" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_ru !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In German</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_de" value="{{$accommodation->name_de}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_de" value="{{$accommodation->owner_name_de}}">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_de" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_de !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Italian</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_it" value="{{$accommodation->name_it}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_it" value="{{$accommodation->owner_name_it}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_it" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_it !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In French</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_fr" value="{{$accommodation->name_fr}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_fr" value="{{$accommodation->owner_name_fr}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_fr" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_fr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Spanish</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name"
                                name="name_es" value="{{$accommodation->name_es}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_es" value="{{$accommodation->owner_name_es}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_es" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_es !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Swedish</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name" name="name_se" value="{{$accommodation->name_se}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_se" value="{{$accommodation->owner_name_se}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_se" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_se !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Japanese</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name" name="name_jp" value="{{$accommodation->name_jp}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_jp" value="{{$accommodation->owner_name_jp}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_jp" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_jp !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Persian</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name" name="name_fa" value="{{$accommodation->name_fa}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_fa" value="{{$accommodation->owner_name_fa}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_fa" id="shortDescription3" rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_fa !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="form-body col-md-6">
                        <h4 class="form-section"><i class="ft-user"></i>Add In Portuguese</h4>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Accommodation Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Accommodation Name" name="name_pr" value="{{$accommodation->name_pr}}" value="">
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <h5>Owner Name
                            </h5>
                            <div class="controls">
                            <input type="text" id="userinput1" class="form-control" placeholder="Owner Name"
                                name="ownername_pr" value="{{$accommodation->owner_name_pr}}" value="">
                            </div>
                            </div> 
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="userinput3">Description</label>
                              <div class="controls">
                                   <textarea name="description_pr" id="shortDescription3"  rows="4" class="form-control" aria-invalid="false">{!! $accommodation->description_pr !!}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>





                      
            
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


  <script>
$('textarea').ckeditor(); 
</script>
@endsection