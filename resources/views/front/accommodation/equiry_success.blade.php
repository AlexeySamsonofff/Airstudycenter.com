@extends('front.index1_new')
@section('title', 'Accommodations')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<section>
    <div class="container p-0 accdin-result">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0">
                <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                    <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent">                            
                        <span class="breadcrumb-item " aria-current="page"><h3 class="font-weight-bold">Thank you!</h3></span>
                        {{$success}}
                    </p>
                </nav> 

                <?php 
                if (Auth::check()) {
                    $id = auth::user()->id;
                    $user_name =DB::table('users')->select('name')->where('id',$id)->first();
                    $receiver_name =DB::table('accommodations')->select('name')->where('id', $input['accommodationId'])->first();				
                }
                ?>
                <div class="row m-0 mb-5 enquirydetail" >
                    <div class="col-md-9 pl-md-0 pb-4 pr-0 mark1" >
                        <p class="enquiryname_e">  </p><input type="hidden" class="enquiryname_e">  
                        <p class="mb-2 titlespan"><i class="fas fa-map-marker-alt pr-1"></i>{{ $input['address']}}</p>
                        <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-utensils"></i>{{$input['sel_type']}}</p>                      
                        <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-calendar-alt"></i>{{$input['from']}}</p>
                        <p class="mb-2 titlespan"><i class="bg-light rounded-circle fas fa-users"></i>{{$input['duration']}}weeks</p>  
                    </div>
                    <div class="col-3 pl-1 pr-0 mark2">
                        <img src="{{asset('front/dpassets/img/ClientImg.png')}}" alt="" class="img-owner rounded-circle ">
                            <h5 >£{{$input['price']}}p/w </h5>
                        <h4 >Total £{{$input['total_price']}} </h4>
                    </div>
                </div>
                 {{$receiver_name->name}} will review your enquiry and contact you shortly via <a href="{{url('/inbox/view_receive/'.$data_id)}}">messages.</a> 
                <a href="{{url('/inbox/view_receive/'.$data_id)}}" class="btn btn-block btn-Book rounded-0" style="width: 150px; height:46px;" id="apply_filters_button">View messages</a>
            </div>                     
        </div>

            <h3>Other accommodation options in {{$country_name}}</h3>
            <div class="col-md-8 pl-md-0 pb-4 pr-0">
                <div class="pr-md-s">
                    <div class="tabs coursesa" style="margin-bottom:1em">                    
                        <div id="tab-3" class="tab active">
                            <div class="row m-0 cards-host" id="all_accommodations_container">
                                @foreach($accommodations as $accommodation)
                                {{-- @php print_r($accommodation); die; @endphp --}}
                                <div class="col-lg-4 col-sm-6 mt-4 mb-4 pl-0">
                                    <!-- <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark"> -->
                                        <div class="card productHeight m-auto bg-white">
                                            <div class="imgBlock position-relative mb-4">
                                                @if(Auth::check())
                                                <a href="#" onclick="favorite({{$accommodation->id}})"><div class="heart"><i id="acc{{$accommodation->id}}" class="{{$accommodation->favCss}} fa-heart" aria-hidden="true"></i></div></a>
                                                @else
                                                <div class="heart dnt-hover-heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                                @endif

                                                <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark">
                                                @if($accommodation->image != null)
                                                    <img src="{{asset('thumbnail_images/'.$accommodation->image)}}" class="w-100" alt="General English – Elementary" style="object-fit: scale-down !important">
                                                @else
                                                    <img src="{{asset('front/images/image-not-available.png')}}" class="w-100" alt="General English – Elementary">
                                                @endif
                                                </a>
                                                <h6 class="font-weight-bold offHeading rounded pl-2 text-white bg-primary">
                                                    @if($accommodation->roomtype == 'shared')
                                                    @lang('accommodation.shared')
                                                    @else
                                                    @lang('accommodation.independent')
                                                    @endif
                                                </h6>
                                                <img src="{{asset('/normal_images/'.$accommodation->owner_image)}}" alt="" class="rounded-circle crilcle-img-absolute" style="object-fit: scale-down !important">
                                                
                                            </div>
                                            <div class="headingHeight blogDetails p-2">
                                                <h6 class=" mt-1" style="font-weight:bold;">
                                                    {{$accommodation->name}}
                                                </h6>
                                                <p class="text-muted mb-2 small"><i class="far fa-map-marker-alt" aria-hidden="true"></i> {{$accommodation->address}},{{$accommodation->city}},{{$accommodation->country}}</p>
                                                <div class="stars">
                                                    @php
                                                    $alltotal = $accommodation->review_rate_fcourse + $accommodation->review_rate_fcourse1 + $accommodation->review_rate_fcourse2 + $accommodation->review_rate_fcourse3;
                                                    $getaverage = $alltotal/4;
                                                    $actReview = getOverallReviewMean($getaverage);
                                                    @endphp
                                                    <p>
                                                        <span class="starr">
                                                            @if($actReview != 0)
                                                            @for($i = 1 ; $i <= $actReview[0] ; $i++) <i class="fas fa-star"></i>
                                                                @endfor
                                                                @if($actReview[1] > 0)
                                                                <i class="fas fa-star-half-alt"></i>
                                                                @endif
                                                                @if($actReview[3] > 0)
                                                                @for($j = 0 ; $j < $actReview[3] ; $j++) <i class="far fa-star"></i>
                                                                    @endfor
                                                                    @endif
                                                                    @else
                                                                    @for($i = 1 ; $i <= 5 ; $i++) <i class="far fa-star"></i>
                                                                        @endfor
                                                                        @endif
                                                                        <span class="bg-success pl-2 pr-2 ml-3 text-white rounded-pill small d-inline-block text-center pt-0 " >{{ $accommodation->count_total_reviews }}</span>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <p class="font-weight-bold fntb mb-0">£{{ $accommodation->price }} <small class="text-muted">p/w</small></p>
                                            </div>
                                        </div>
                                    <!-- </a> -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div id="tab-1" class="tab">
                            <div id="accomodation-result" class="border w-100" style="height:678px">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124918.80690835493!2d74.4842022725707!3d32.77904120086372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8e4c90b331f00c15!2sGreen%20Centre!5e0!3m2!1sen!2s!4v1579680272631!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                            {{ $accommodations->links() }}
                        </nav>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</section>
<script>
    var allAccommodationRoute = "{{URL::to('allAccommodation')}}";
</script>
@endsection
