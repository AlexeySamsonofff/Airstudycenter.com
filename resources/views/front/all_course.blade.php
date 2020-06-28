@extends('front.index1_new')
@section('title', 'Courses')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<section>
    <div class="container p-0">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0">
                <div class="w-85">
                    <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                        <p class="breadcrumb text-break mb-0 d-inline-block pl-0 bg-transparent">
                            <span class="breadcrumb-item"><a href="/">@lang('school.home')</a></span>
                            <span class="breadcrumb-item" aria-current="page">Course results</span>
                        </p>
                    </nav>
                    <div class="row pt-0 pb-4 m-0">
                        <div class="col-md-5 col-md-3 mt-1 pl-md-0 pr-md-2 p-0 mb-1">
                            <div class=" serchDropdownAfter search1 btn-white border-after">
                                <select class="serchDropdown font-weight-bold course-result-dropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " name="course_city">
                                    <option value="" selected disabled>Course City</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->cityId}}">{{$city->cityname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-3 pl-md-1 pr-md-1 p-0 mt-1 mb-1">
                            <div class=" serchDropdownAfter search2 btn-white border-after">
                                <select class="serchDropdown font-weight-bold course-result-dropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " name="course_name">
                                    <option value="" selected disabled>Course Name</option>
                                    @foreach($courseTitles as $titles)
                                    @php $title = getLocalizedString($titles, 'name'); @endphp
                                    <option value="{{$title}}">{{$title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 mt-1 pl-md-2 pr-md-0 p-0 mb-1">
                            <a href="" class="text-center btn  w-100 rounded-0 btn-Book btn-block text-center h-100 btnBlog" style="padding: 5px 0px;">Find </a>
                        </div>
                    </div>
                    <small style="color:#6779A1; font-size:16px;" class="">Showing {{ $schools->firstItem() }} - {{ $schools->lastItem() }} of {{ $schools->total() }} results</small>
                    <div class="searchingResult">
                        @foreach($schools as $school)
                        <div class="resultBlock mt-5">
                            <div class="row m-0">
                                <div class="col-lg-9 pl-lg-0 pr-lg-2  p-0">
                                    <a  class="citySchool"  href="{{route('schooldetail',['id'=>$school->id,'slug'=>$school->slug])}}">
                                        <h2 class="result-heading2">{{ getLocalizedString($school, 'name') }} <i class="fas fa-chevron-right" style="font-size: 17px !important;"></i></h2>
                                    </a>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <p class=" star text-lg-right result-review m-0 pt-lg-2">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        {{ $school->reviews->count() }} @lang('school.reviews')
                                    </p>
                                </div>
                            </div>
                            <p class="AboutclampHiden mb-1 aboutstyling" id="moreCoursesshowings-{{$loop->iteration}}">{!! getLocalizedString($school,'description', true) !!}</p>
                            <p class="clr-primry addingclipCourse" id="moreIds-{{$loop->iteration}}" data-moreId="moreIds-{{$loop->iteration}}" data-showId="moreCoursesshowings-{{$loop->iteration}}"><span class="show-more"> More</span><span class="show-less"> Less</span></p>
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
                                                <span class="font-weight-bold">£175</span>
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
                            @if($school->courses->count() > 2)
                            <div class="d-none morecousesDiv" id="moreCoursesDisplay-{{ $loop->iteration }}">
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
                                                    <span class="font-weight-bold">£175</span>
                                                    p/w
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-right pt-lg-0 pt-md-1 p-0">
                                        <a href="javascript:;" onclick="return false;" data-transport-type="" class="table_transport text-primary addingCartSchool rounded p-2 p-lg-0  d-inline-block bg-after-md-primary text-after-md-white ">
                                            <span class="withoutActive">
                                                <i class="fa fa-shopping-cart nothover"></i> <i class="fas fa-shopping-cart forhover "></i>
                                            </span>
                                            <i class="far fa-check ForActive"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <p class="clr-primry courseMoreResult" data-id="#moreCoursesDisplay-{{ $loop->iteration }}" data-line="#moreCoursesLines-{{ $loop->iteration }}" id="moreCoursesLines-{{ $loop->iteration }}"><span class="Courses-more">More courses <i style="vertical-align: -2.1px;" class="fa fa-angle-down"></i></span><span class="Courses-less">Less courses <i style="vertical-align: -2.1px;" class="fa fa-angle-up"></i></span></p>
                            @endif
                        </div>
                        @if(!$loop->last)
                        <div class="line-light mt-5"></div>
                        @endif
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation example" class="bg-transparent mt-5 float-right">
                        {{ $schools->links() }}
                    </nav>
                </div>
            </div>
            <div class="col-md-4 p-md-0">
                <div class="calculator-mbl h-100 d-md-block d-none">
                    <div class="d-md-block d-none w-100" style="height: 115px;"></div>
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
    $('.courseMoreResult').bind('click', function () {
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;"></script>
@endsection
