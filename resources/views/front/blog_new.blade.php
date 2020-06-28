@extends('front.index1_new')
@section('title', 'Blogs')
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
<div class="container">
    <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
        <p class="breadcrumb mb-0 text-break pl-0 d-inline-block bg-transparent">
            <span class="breadcrumb-item"><a href="{{ route("mainhome") }}">@lang('school.home')</a></span>
            <span class="breadcrumb-item" aria-current="page">Blog</span>
        </p>
    </nav>
    <div class="row m-0">
        @include('front.blogSidebarMobile')
        <div class="col-lg-9 col-md-8 pl-0 pr-md-3 pr-0">
            @foreach($blogs as $blog)
            <div class="shadow-sm-blog p-4 mb-5 mt-3">
                <div class="pb-4 float-left w-100">
                    <div class="rounded-img-blog rounded-circle overflow-hidden float-left">
                        <img src="{{ asset('front/dpassets/img/bloger-img.png') }}" alt="" class="w-100">
                    </div>
                    <p class="float-left pt-2 pl-3 mb-0 text-primary font-weight-bold">Emily Dewinson </p>
                    <p class="float-sm-left text-light-clr float-right pt-2 pl-3 mb-0 "><span class="">{{ date('d/m/Y', strtotime($blog->created_at)) }}</span></p>
                    <div class="clearfix d-sm-none d-block"></div>
                    <div class="float-right blog-icons pt-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('blogDetail',['id'=>$blog->id])}}" data-toggle="tooltip" title="Share on Facebook"><i class="fab fa-facebook-square facebook-color"></i></a>
                        <a href="https://www.twitter.com/share?url={{route('blogDetail',['id'=>$blog->id])}}" data-toggle="tooltip" title="Share on Twitter"><i class="fab fa-twitter-square twitter-color"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url={{route('blogDetail',['id'=>$blog->id])}}" data-toggle="tooltip" title="Share on Pinterest"><i class="fab fa-pinterest pinterest-color"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators carousel-control">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
                    <h1 class="blog-Heading mb-3">
                        {{ getLocalizedString($blog, 'title') }}
                    </h1>
                    <div class="blog-p  ">{!! str_limit(getLocalizedString($blog,'description', true), 250) !!}</div>
                </div>
                <div class="text-primary float-left w-100">
                    <a href="{{route('blogDetail',['id'=>$blog->id])}}" class="float-left text-primary"><i class="far fa-comments mr-1"></i> {{ $blog->comments->count() }} comments</a>
                    <a href="{{route('blogDetail',['id'=>$blog->id])}}" class="float-right text-primary">Read more</a>
                </div>
                <div class="clearfix"></div>
            </div>
            @endforeach
            <div class="float-right">
                {{$blogs->links()}}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-3 col-md-4 pr-0 pl-md-3 pl-0 pt-3 d-md-block d-none">
            @include('front.blogSidebar')
        </div>
    </div>
</div>

<script>
    $(".images-container").each(function(slider){
        var count = $(this).children('div').length;
        if(count < 2){
            var wrapper = $(this).parent();
            $('.carousel-control',wrapper).hide();
        }
    });
</script>
@endsection
