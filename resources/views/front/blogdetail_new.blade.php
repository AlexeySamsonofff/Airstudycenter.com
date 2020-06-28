@extends('front.index1_new')
@section('title', $blog->title)
@section('content')
<div class="container-fluid bg-school text-white  position-relative p-0 d-sm-block d-none" style="background-image:url({{ asset('front/dpassets/img/BlogList.png') }}); height:475px;">
    @include('front.layout.navigation')
    <div class="all-center">
        <h1 class="text-center text-white font-weight-normal pt-5" style="font-size: 45px;">Our Latest News</h1>
        <p class="text-white font-roman text-center" style="font-size:25px;">Here you will find latest news and advice about <br> language schools and accommodation</p>
    </div>
</div>
<div class="d-sm-none d-block">
@include('front.layout.navigation')
</div>
@php
// dd($blog);
@endphp
<div class="container">
    <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
        <p class="breadcrumb mb-0 text-break pl-0 d-inline-block bg-transparent">
            <span class="breadcrumb-item"><a href="/">@lang('school.home')</a></span>
            <span class="breadcrumb-item"><a href="/blog">Blog</a></span>
            <span class="breadcrumb-item d-md-inline d-none" aria-current="page">{{ getLocalizedString($blog, 'title') }}</span>
        </p>
    </nav>
    <div class="row m-0 mb-5 pb-5">
        <div class="col-12 pr-0 pl-md-3 pl-0 pt-3 d-md-none d-block">
            @include('front.blogSidebarMobile')
        </div>
        <div class="col-lg-9 col-md-8 pl-0 pr-md-3 pr-0">
            <div class="border shadow-sm p-4 mb-4 mt-3">
                <div class="pb-4 float-left w-100">
                    <div class="rounded-img-blog rounded-circle overflow-hidden float-left">
                        <img src="{{ asset('front/dpassets/img/bloger-img.png') }}" alt="" class="w-100">
                    </div>
                    <p class="float-left pt-2 pl-3 mb-0 text-primary font-weight-bold">Emily Dewinson </p>
                    <p class="float-sm-left float-right pt-2 pl-3 mb-0 text-light-clr"><span class="">{{ date('d/m/Y', strtotime($blog->created_at)) }}</span></p>
                    <div class="clearfix d-sm-none d-block"></div>
                    <div class="float-right blog-icons pt-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(Request::url())}}&display=popup" data-toggle="tooltip" title="Share on Facebook" target="_blank"><i class="fab fa-facebook-square facebook-color"></i></a>
                    <a href="https://twitter.com/intent/tweet?text={{urlencode(Request::url())}}" data-toggle="tooltip" title="Share on Twitter" target="_blank"><i class="fab fa-twitter-square twitter-color"></i></a>
                    <a href="http://pinterest.com/pin/create/button/?url={{urlencode(Request::url())}}&media={{urlencode($blog->image)}}&description={{ urlencode(getLocalizedString($blog, 'title')) }}" data-toggle="tooltip"  title="Share on Pinterest"><i class="fab fa-pinterest pinterest-color"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators carousel-control">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner images-container">
                        <div class="carousel-item img-adjust crousel-height active">
                        <img src="{{ $blog->image }}" class="d-block w-100" alt="{{ asset('front/dpassets/img/bloger-img.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="pt-3 pb-3">
                    <p class=" blog-color">{{ getLocalizedString($blog, 'category_name') }}</p>
                    <h1 class="blog-Heading mb-3">{{ getLocalizedString($blog, 'title') }}</h1>
                    <p class="blogDetail-p  text-justify">
                        {{ getLocalizedSTring($blog, 'description', true) }}
                    </p>
                </div>
                <div class="text-primary  w-100">
                    <a href="" class="text-primary"><i class="far fa-comments mr-1"></i> {{ $countreview }} comments</a>
                </div>
                <div class="clearfix"></div>
                {{-- comment section starts here --}}
                @if(Auth::check())
                <form method="post" action="{{ route('storeblogReview') }}">
                    {{ csrf_field()}}
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                    <textarea name="comment" id="comment" rows="7" class="w-100 coment mt-3" placeholder="Add your comments"></textarea>
                    <div class="text-primary  w-100">
                        <a href="" class="text-primary"><span id="remaining">500</span> characters remaining</a>
                    </div>
                    <div class="text-right mb-3">
                        <button type="submit" class="text-center btn rounded-0 btn-Book text-center btnBlog" style="padding: 5px 19px;">Send</button>
                    </div>
                </form>
                @endif
                @foreach($reviews as $review)
                <div class="border border-primary p-2 mb-4">
                    <div class="row m-0">
                        <div class="col-lg-1 col-sm-2 col-3 p-0 text-center">
                            @php
                                $img = '';
                                $userimage = App\User::where('id',$review->user_id)->first();
                                if($userimage){
                                    $img = $userimage->image;
                                }
                            @endphp
                            <img src="{{$img}}" class="rounded-circle border border-light text-center" style="width:35px; height:35px;" alt="">
                        </div>
                        <div class="col-lg-11 col-sm-10 col-9 p-0">
                            <div class="row m-0 mb-2 pt-2">
                                <div class="col-10 p-0">
                                    <p class="cmntName mb-0"><span class="" style="color:#2A354F;  font-size: 16px; font-weight:bold;">{{$review->user_name}}</span> <br class="d-md-none d-block">
                                    <span class=" ml-lg-3" style="color:#687AA0; font-size: 12px;">{{ $review->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="col-2 p-0 pr-0  text-right">
                                    <i class="far fa-flag" style="color:#D0021B; font-size:16px;"></i>
                                </div>
                            </div>
                            <p class="blogDetail-p  " style="color:#687AA0;">
                                {{$review->comment}}
                            </p>
                            <div class="text-right">
                                <a class="text-primary text-right">
                                    <i class="fas fa-reply"></i> Reply
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @if($reviews->count() > 0)
                <div class="text-center mt-4">
                    <button class="btn btn-primary text-center rounded-0 font-bold"><a href="" class="text-white">Load more comments</a></button>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-md-4 pr-0 pl-md-3 pl-0 pt-3 d-md-block d-none">
            @include('front.blogSidebar')
        </div>
    </div>
</div>

<script>
   $('#comment').keyup(function() {
  var str = $(this).val();
  var txtCharCountLength = str.length;

  if (txtCharCountLength <= 500) {
    var remainingChar = 500 - txtCharCountLength;
    $("#remaining").html(remainingChar);

  }
  else {
    $(this).val($(this).val().substring(0, 500));
  }
});
</script>
@endsection
