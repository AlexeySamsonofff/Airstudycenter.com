@extends('front.index1_new')
@section('title', 'Top Cities Schools')
@section('content')
<div class="container-fluid bg-school text-white  position-relative p-0" style="background-image:url({{ asset('front/dpassets/img/CompanyBg.png') }}); height:475px;">
    @include('front.layout.navigation')
    <h1 class="text-center text-white font-weight-normal pt-5 all-center" style="font-size: 45px;">Top Cities Schools</h1>
</div>
<section>
    <div class="container p-0">
        <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
            <p class="breadcrumb text-break pl-md-0 d-inline-block bg-transparent">
                <span class="breadcrumb-item"><a href="/">@lang('school.home')</a></span>
                <span class="breadcrumb-item" aria-current="page">Popular Cities</span>
            </p>
        </nav>
        <div class="row m-0 mb-5 school-poupoler">
            <div class="col-md-8 p-md-0 ">
                <div class="w-85">
                    <small style="color:#6779A1; font-size:16px;" class="">Showing {{ $topcities->firstItem() }} - {{ $topcities->lastItem() }} of {{ $topcities->total() }} cities</small>
                    @foreach($topcities as $topcity)
                    <div class="searchingResult">
                        <div class="resultBlock mt-5">
                            <h2 class="result-heading2" style="font-size:30px !important">{{ $topcity->cityname }}</h2>
                            <hr style="border-top: 4px solid rgba(0,0,0,.1);">
                            @foreach($topcity->schools as $school)
                            <div class="row m-0">
                                <div class="col-lg-9 pl-lg-0 pr-lg-2  p-0">
                                    <a class="citySchool" href="{{route('schooldetail',['id'=>$school->schoolId,'slug'=>$school->slug])}}">
                                        <h2 class="result-heading2">{{ getLocalizedString($school, 'name') }} <i class="fas fa-chevron-right" style="font-size: 17px !important;"></i></h2>
                                    </a>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <p class=" star text-lg-right result-review m-0 pt-lg-3">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        {{ $school->reviews->count() }} @lang('school.reviews')
                                    </p>
                                </div>
                            </div>
                            <p class="AboutclampHiden mb-1 aboutstyling" id="moreCoursesshowings-{{$school->id}}">{!! getLocalizedString($school,'description', true) !!}</p>
                            <p class="clr-primry addingclipCourse" id="moreIds-{{$school->id}}" data-moreId="moreIds-{{$school->id}}" data-showId="moreCoursesshowings-{{$school->id}}"><span class="show-more"> More</span><span class="show-less"> Less</span></p>
                            @foreach($school->courses->take(2) as $course)
                            <div class="check row m-0 pb-1 mb-3 cart-exchange border-top-0 border-left-0 border-right-0">
                                <div class="col-10 p-0">
                                    <div class="row m-0">
                                        <div class="col-lg-5 col-9 p-0">
                                            <h5 class="courseresult-h5 m-0">
                                                <span class="font-weight-bold mb-2 mb-lg-0 d-block">{{ getLocalizedString($course->courseTitles, 'name') }} {{ $course->hours_per_week }}/h</span>
                                                <span class="d-lg-none d-block">Max. Class size: {{ $school->no_of_student }}</span>
                                            </h5>
                                        </div>
                                        <div class="col-lg-4 d-lg-block d-none p-0">
                                            <h5 class="courseresult-h5 m-0">
                                                Max. Class size: {{ $school->no_of_student }}
                                            </h5>
                                        </div>
                                        <div class="col-3 p-0 pr-0">
                                            <h5 class="courseresult-h5 m-0 text-md-right">
                                                <span class="font-weight-bold">{{ $course->ppw1 }}</span>
                                                p/w
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-right pt-lg-0 pt-md-1 p-0">
                                    <a href="javascript:;" onclick="javascript:addCourseToBasket({{$course->schoolId}}, {{$course->courseId}}, '{{ getLocalizedString($course->courseTitles, 'name') }}', {{$course->ppw1}});" data-transport-type="" class="table_transport text-primary addingCartSchool rounded p-2 p-lg-0  d-inline-block bg-after-md-primary text-after-md-white ">
                                        <span class="withoutActive">
                                            <i class="far fa-shopping-cart nothover" id="basket{{$course->courseId}}"></i> <i class="fas fa-shopping-cart forhover "></i>
                                        </span>
                                        <i class="far fa-check ForActive"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @if($school->courses->count() > 2)
                            <div class="d-none morecousesDiv mt-4" id="moreCoursesDisplay-{{ $school->id }}">
                                @foreach($school->courses->slice(2) as $course)
                                <div class="check row m-0 pb-1 mb-3 cart-exchange border-top-0 border-left-0 border-right-0">
                                    <div class="col-10 p-0">
                                        <div class="row m-0">
                                            <div class="col-lg-5 col-9 p-0">
                                                <h5 class="courseresult-h5 m-0">
                                                    <span class="font-weight-bold mb-2 mb-lg-0 d-block">{{ getLocalizedString($course->courseTitles, 'name') }} {{ $course->hours_per_week }}/h</span>
                                                    <span class="d-lg-none d-block">Max. Class size: {{ $school->no_of_student }}</span>
                                                </h5>
                                            </div>
                                            <div class="col-lg-4 d-lg-block d-none p-0">
                                                <h5 class="courseresult-h5 m-0">
                                                    Max. Class size: {{ $school->no_of_student }}
                                                </h5>
                                            </div>
                                            <div class="col-3 p-0 pr-0">
                                                <h5 class="courseresult-h5 m-0 text-md-right">
                                                    <span class="font-weight-bold">{{ $course->ppw1 }}</span>
                                                    p/w
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-right pt-lg-0 pt-md-1 p-0">
                                        <a href="javascript:;" onclick="return false;" data-transport-type="" class="table_transport text-primary addingCartSchool rounded p-2 p-lg-0  d-inline-block bg-after-md-primary text-after-md-white ">
                                            <span class="withoutActive">
                                                <i class="far fa-shopping-cart nothover"></i> <i class="fas fa-shopping-cart forhover "></i>
                                            </span>
                                            <i class="far fa-check ForActive"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <p class="clr-primry courseMoreSchool" data-id="#moreCoursesDisplay-{{ $school->id }}" data-line="#moreCoursesLine{{ $school->id }}" id="moreCoursesLine{{ $school->id }}"><span class="Courses-more">More courses <i style="vertical-align: -2.1px;" class="far fa-angle-down"></i></span><span class="Courses-less">Less courses <i style="vertical-align: -2.1px;" class="far fa-angle-up"></i></span></p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="container pb-5 pt-5 pl-0 pr-0">
                    <h3 class="headings text-center"><span class="font-weight-bold">Popular</span> Cities </h3>
                    <div class="owl-slider">
                        <div id="carouselSchool" class="owl-carousel row school-popular m-0">
                            @foreach($popularCities as $popularCity)
                            <div class="item mt-2 mb-2  pr-0 mt-md-5 mb-md-5 text-white ">
                                <a href="{{route('citySchool',['cityId'=>$popularCity->city_name])}}" class="text-white">
                                    <div class="m-auto m-sm-0 img-setting" style="background-image: url({{ $popularCity->image }})">
                                        <div class="bg-shaded btmDetails p-2">
                                            <h6 class="font-weight-bold ">{{ $popularCity->cityname }}</h6>
                                            <h6 class="schoolEducationBuilding">
                                                <a href="{{route('citySchool',['cityId'=>$popularCity->city_name])}}" class="text-white">
                                                    <div class="row m-0">
                                                        <div class="col-10 p-0">See all {{ $popularCity->cityname }} Schools </div>
                                                        <div class="col-2 p-0"><i class="ml-2 fa fa-angle-right" aria-hidden="true"></i></div>
                                                    </div>
                                                </a>
                                                <div class="line"></div>
                                            </h6>
                                            <h6><span class="float-left">{{ $popularCity->schoolcount }} @lang('front.schools')</span> <span class="float-right">{{ $popularCity->coursecount }} @lang('front.courses')</span></h6>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <button class="text-center btn  m-auto pt-4 d-block"><a href="{{route('allCitySchool')}}" class="text-center btn rounded-0 btn-primary pl-4 font-weight-bold pb-2 pr-4 pt-2 btnBlog ">Browse all</a></button> --}}
                </div>
                <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                    {{ $topcities->links() }}
                </nav>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 p-md-0">
                <div class="calculator-mbl d-md-block d-none h-100">
                    @include('front.coursesPagesCalculator')
                </div>
            </div>
        </div>
    </div>
    {{-- new calculator view on mobile --}}
    <div class="clicker-calcolater w-100 d-md-none d-block bg-primary text-white p-2 pl-3 pr-3">
        <div class="container p-0">
            <div class="" style="font-size:20px;">
                <a href="javascript:void(0)" class="show-calculator text-white pr-3">
                    <i class="fa-chevron-up fas pt-2"></i>
                </a>
                <span class=" pt-1 " style="font-size:18px;">Your Enquiry</span>
                <span class="cart pr-2 d-inline-block position-relative">
                    <div class="cart-number bg-white rounded-circle position-absolute">2</div>
                    <i class="fas fa-shopping-cart"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    {{-- end new calculator view on mobile --}}
</section>
<script>
    $('.courseMoreSchool').bind('click', function () {
    var id = $(this).data('id');
    var line = $(this).data('line')
    $(line).toggleClass('lessMore');
    $(id).toggleClass('d-none');
});
</script>
<script>
    $(".show-calculator").click(function(){
    $(".calculator-mbl").toggleClass("d-block");
    $(".clicker-calcolater").toggleClass("border-top border-white");
});

$('.addingclipCourse').bind('click', function () {
    var moreid = $(this).data('moreid');
    var showid = $(this).data('showid')
    $("#"+showid).toggleClass('AboutclampHiden');
    $("#"+moreid).toggleClass('navigateClass');
    console.log(this);

});
function addCourseToBasket(schoolId, courseId, courseName, price) {
    $(".calculator_schools")
        .val(schoolId)
        .trigger('change');
    g_selected_course = courseName;
    //$(".calc_courses").val(courseId);
    $(".course_fee").val(price);
    $("this i").removeClass("far fas");
    $("#basket"+courseId).addClass("fas");
}
</script>
@endsection
