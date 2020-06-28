@foreach($accommodations as $accommodation)
{{-- @php print_r($accommodation); die; @endphp --}}
<div class="col-lg-4 col-sm-6 mt-4 mb-4 pl-0">
    <a href="{{route('accommodationDetail',['slug'=>$accommodation->slug,'id'=>$accommodation->id] )}}" class="text-dark">
        <div class="card productHeight m-auto bg-white">
            <div class="imgBlock position-relative mb-4">
                <div class="heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
                @if($accommodation->image != null)
                <img src="{{asset('thumbnail_images/'.$accommodation->image)}}" class="w-100" alt="General English – Elementary">
                @else
                <img src="{{asset('front/images/image-not-available.png')}}" class="w-100" alt="General English – Elementary">
                @endif
                <h6 class="font-weight-bold offHeading rounded-pill pl-2 -md  text-white bg-primary">
                    @if($accommodation->roomtype == 'shared')
                    @lang('accommodation.shared')
                    @else
                    @lang('accommodation.independent')
                    @endif
                </h6>
                <img src="{{asset('/normal_images/'.$accommodation->owner_image)}}" alt="" class="rounded-circle crilcle-img-absolute">
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
                        <span class="star">
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
                                        <span class="bg-success pl-2 pr-2 ml-3 text-white rounded-pill small">{{ $accommodation->count_total_reviews }}</span>
                </div>
            </div>
            <div class="p-2">
                <p class="font-weight-bold fntb mb-0">£{{ $accommodation->price }} <small class="text-muted">p/w</small></p>
            </div>
        </div>
    </a>
</div>
@endforeach