<?php

namespace App\Http\Controllers\Front;

use App\Accobooking;
use App\Accommodation;
use App\Accommodationadminfacility;
use App\Accommodationadmintype;
use App\Accommodationfacility;
use App\Accommodationimage;
use App\Accommodationprice;
use App\Accommodationreview;
use App\Accommodationtype;
use App\Accomodationdescription;
use App\Accomodationpropertytype;
use App\Accreditation;
use App\Blog;
use App\Blogcategory;
use App\Blogreview;
use App\City;
use App\Contact;
use App\Country;
use App\Course;
use App\Coursebooking;
use App\Coursediscount;
use App\Courseprice;
use App\Coursereview;
use App\Coursetitle;
use App\Faq;
use App\Favaccommodation;
use App\Favcourse;
use App\Favschool;
use App\Http\Controllers\Controller;
use App\Insurance;
use App\Logoimage;
use App\Page;
use App\Refer;
use App\Role;
use App\School;
use App\Schoolaccommodationprice;
use App\Schooladdress;
use App\Schoolfacility;
use App\Schoolhistory;
use App\Schoolimage;
use App\Schoolinsurance;
use App\Schoolreview;
use App\Schooltransport;
use App\Schoolvisa;
use App\SliderImage;
use App\State;
use App\Testimonial;
use App\Topcity;
use App\User;
use App\Userinfo;
use App\UserRole;
use App\Visa;
use App\Zipcode;
use App\Email;
use App\Credit;
use App\Payment;
use Auth;
use DB;
use Illuminate\Http\Request;
use Imageresize;
use Mail;
use Newsletter;
use PDF;
use Illuminate\Support\Facades\Hash;
use App\Invite;
use App\Mail\InviteCreated;

class MainController extends Controller
{
    public function mainhome(Request $request)
    {
        $schools = School::where('status', '1')->where('deactiveStatus', "0")->orderBy('id', 'desc')->get()->take('8');
        $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', "0")->select('courseprices.*', 'schools.name as schoolName', 'schools.agelimit as agelimit', 'schools.registration_fee as registration_fee')->get()->take('4');
        foreach ($courses as $course) {
            $coursetitle = Coursetitle::where('id', $course->courseId)->first();
            $course->name = $coursetitle->name;
            $course->name_tr = $coursetitle->name_tr;
            $course->name_ar = $coursetitle->name_ar;
            $course->name_ru = $coursetitle->name_ru;
            $course->name_de = $coursetitle->name_de;
            $course->name_it = $coursetitle->name_it;
            $course->name_fr = $coursetitle->name_fr;
            $course->name_es = $coursetitle->name_es;
            $course->name_se = $coursetitle->name_se;
            $course->name_jp = $coursetitle->name_jp;
            $course->name_fa = $coursetitle->name_fa;
            $course->name_pr = $coursetitle->name_pr;
            $course->slug = $coursetitle->slug;
            $course->description = $coursetitle->description;
            $schoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
            if ($schoolimage != null) {
                $course->image = $schoolimage->image;
                $school = School::where('id', $course->schoolId)->first();
                if ($school != null) {
                    $course->age = $school->agelimit;
                } else {
                    $course->age = "";
                }
            } else {
                $course->image = "";
            }
            $schooladdress = Schooladdress::where('schoolId', $course->schoolId)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $course->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $course->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $course->city = $city_code;
                /* Get Postalcode */
                $course->zipcode = $schooladdress->zipCodeId;
            } else {
                $course->country = "";
                $course->state = "";
                $course->city = "";
                $course->zipcode = "";
            }
            $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews_fcourse = 0;
            $sum_reviews_fcourse1 = 0;
            $sum_reviews_fcourse2 = 0;
            $sum_reviews_fcourse3 = 0;
            $review_rate_fcourse = 0;
            $review_rate_fcourse1 = 0;
            $review_rate_fcourse2 = 0;
            $review_rate_fcourse3 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews_fcourse = $sum_reviews_fcourse + $getreviwes->rate;
                $sum_reviews_fcourse1 = $sum_reviews_fcourse1 + $getreviwes->rate1;
                $sum_reviews_fcourse2 = $sum_reviews_fcourse2 + $getreviwes->rate2;
                $sum_reviews_fcourse3 = $sum_reviews_fcourse3 + $getreviwes->rate3;
            }
            if ($count_total_reviews > 0) {
                $review_rate_fcourse = $sum_reviews_fcourse / $count_total_reviews;
                $review_rate_fcourse1 = $sum_reviews_fcourse1 / $count_total_reviews;
                $review_rate_fcourse2 = $sum_reviews_fcourse2 / $count_total_reviews;
                $review_rate_fcourse3 = $sum_reviews_fcourse3 / $count_total_reviews;
            }
            $course->count_total_reviews = $count_total_reviews;
            $course->review_rate_fcourse = $review_rate_fcourse;
            $course->review_rate_fcourse1 = $review_rate_fcourse1;
            $course->review_rate_fcourse2 = $review_rate_fcourse2;
            $course->review_rate_fcourse3 = $review_rate_fcourse3;
        }
        foreach ($schools as $school) {
            $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            $countCourse = Courseprice::where('schoolId', $school->id)->groupBy('schoolId')->count();
            $school->courseCount = $countCourse;
            $reviews = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews_fschool = count($reviews);
            $school->count_total_reviews_fschool = $count_total_reviews_fschool;
            $sum_reviews_fschool = 0;
            $sum_reviews_fschool1 = 0;
            $sum_reviews_fschool2 = 0;
            $sum_reviews_fschool3 = 0;
            $sum_reviews_fschool4 = 0;
            $sum_reviews_fschool5 = 0;
            foreach ($reviews as $getreviwes) {
                $sum_reviews_fschool = $sum_reviews_fschool + $getreviwes->rate;
                $sum_reviews_fschool1 = $sum_reviews_fschool1 + $getreviwes->rate1;
                $sum_reviews_fschool2 = $sum_reviews_fschool2 + $getreviwes->rate2;
                $sum_reviews_fschool3 = $sum_reviews_fschool3 + $getreviwes->rate3;
                $sum_reviews_fschool4 = $sum_reviews_fschool4 + $getreviwes->rate4;
                $sum_reviews_fschool5 = $sum_reviews_fschool5 + $getreviwes->rate5;
            }
            if ($count_total_reviews_fschool > 0) {
                $review_rate_fschool = $sum_reviews_fschool / $count_total_reviews_fschool;
                $review_rate_fschool1 = $sum_reviews_fschool1 / $count_total_reviews_fschool;
                $review_rate_fschool2 = $sum_reviews_fschool2 / $count_total_reviews_fschool;
                $review_rate_fschool3 = $sum_reviews_fschool3 / $count_total_reviews_fschool;
                $review_rate_fschool4 = $sum_reviews_fschool4 / $count_total_reviews_fschool;
                $review_rate_fschool5 = $sum_reviews_fschool5 / $count_total_reviews_fschool;
                $school->review_rate_fschool = $review_rate_fschool;
                $school->review_rate_fschool1 = $review_rate_fschool1;
                $school->review_rate_fschool2 = $review_rate_fschool2;
                $school->review_rate_fschool3 = $review_rate_fschool3;
                $school->review_rate_fschool4 = $review_rate_fschool4;
                $school->review_rate_fschool5 = $review_rate_fschool5;
            }
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
            } else {
                $school->country = "";
                $school->state = "";
                $school->city = "";
                $school->zipcode = "";
            }
            if ($schoolimage) {
                $school->image = $schoolimage->image;
            } else {
                $school->image = "";
            }
        }
        // topcities
        $topcities = TopCity::orderBy('id', 'desc')->get();
        foreach ($topcities as $city) {
            $cityId = explode('|', $city->city_name);
            $cityname = $cityId[1];
            $city->cityname = $cityname;
            $school = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', 0)->where('schooladdresses.cityId', $city->city_name)->get();
            $countschool = count($school);
            $city->schoolcount = $countschool;
            if ($countschool > 0) {
                $schoolimage = Schoolimage::Join('schooladdresses', 'schooladdresses.schoolId', '=', 'schoolimages.schoolId')->where('schooladdresses.cityId', $city->city_name)->first();
                if ($schoolimage != null) {
                    $city->image = $schoolimage->image;
                } else {
                    $city->image = "";
                }
            } else {
                $city->image = "";
            }
            $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', "1")->where('schools.deactiveStatus', "0")->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $city->city_name)->get();
            $countcourse = count($course);
            $city->coursecount = $countcourse;
        }
        // courses with discount
        // $topdeals = School::join('coursediscounts', 'coursediscounts.school_id','=','schools.id')->where('status', "1")->where('deactiveStatus', "0")->select('schools.*', 'coursediscounts.discount as discount','coursediscounts.course_id as course_id' )->orderBy('id','desc')->get();
        $topdeals = Coursediscount::Join('schools', 'schools.id', '=', 'coursediscounts.school_id')->where('schools.status', '1')->where('schools.deactiveStatus', '0')->whereNotNull('deal')->get()->take(10);
        foreach ($topdeals as $deal) {
            $discount = $deal->discount;
            $dealper = $deal->deal;
            $school = School::where('id', $deal->school_id)->first();
            $deal->status = $school->status;
            $deal->agelimit = $school->agelimit;
            $deal->no_of_student = $school->no_of_student;
            $price = Courseprice::where('schoolId', $deal->school_id)->where('courseId', $deal->course_id)->first();
            if ($price != null) {
                if ($discount != null) {
                    $firstprice = $price->ppw1;
                    $discountnum = $firstprice * $discount / 100;
                    $pricead = $firstprice - $discountnum;
                    $deal->pricead = $pricead;
                    $dealpricenum = $pricead * $dealper / 100;
                    $dealprice = $pricead - $dealpricenum;
                    $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                } else {
                    $deal->pricead = $price->ppw1;
                    $dealpricenum = $price->ppw1 * $dealper / 100;
                    $dealprice = $pricead - $dealpricenum;
                    $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                }
                $deal->pricecourseid = $price->id;
            }
            $coursetitle = Coursetitle::where('id', $deal->course_id)->first();
            $deal->name = $coursetitle->name;
            $deal->name_tr = $coursetitle->name_tr;
            $deal->name_ar = $coursetitle->name_ar;
            $deal->name_ru = $coursetitle->name_ru;
            $deal->name_de = $coursetitle->name_de;
            $deal->name_it = $coursetitle->name_it;
            $deal->name_fr = $coursetitle->name_fr;
            $deal->name_es = $coursetitle->name_es;
            $deal->name_se = $coursetitle->name_se;
            $deal->name_jp = $coursetitle->name_jp;
            $deal->name_fa = $coursetitle->name_fa;
            $deal->name_pr = $coursetitle->name_pr;
            $deal->slug = $coursetitle->slug;
            $schoolimage = Schoolimage::where('schoolId', $deal->school_id)->first();
            if ($schoolimage) {
                $deal->image = $schoolimage->image;
            } else {
                $deal->image = "";
            }
            $schooladdress = Schooladdress::where('schoolId', $deal->school_id)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $deal->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $deal->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $deal->city = $city_code;
            } else {
                $deal->country = "";
                $deal->state = "";
                $deal->city = "";
                $deal->zipcode = "";
            }
            $total_review = Coursereview::where('school_id', $deal->school_id)->where('course_id', $deal->course_id)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $review_rate = 0;
            $review_rate1 = 0;
            $review_rate2 = 0;
            $review_rate3 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
            }
            $deal->count_total_reviews = $count_total_reviews;
            $deal->review_rate = $review_rate;
            $deal->review_rate1 = $review_rate1;
            $deal->review_rate2 = $review_rate2;
            $deal->review_rate3 = $review_rate3;
        }
        $testimonials = Testimonial::orderBy('id', 'DESC')->orderBy('id', 'desc')->get()->take(4);
        if (count($testimonials) == 4 || count($testimonials) == 3) {
            $testimonial = $testimonials->chunk(2)->toArray();
            $testi1 = $testimonial[0];
            $testi2 = $testimonial[1];
        } elseif (count($testimonials) == 1 || count($testimonials) == 2) {
            $testi1 = $testimonials->toArray();
            $testi2 = array();
        } else {
            $testi1 = array();
            $testi2 = array();
        }
        $getallCourseTitles = Coursetitle::where('status', '1')->orderBy('name')->get();
        $sliderImages = SliderImage::orderBy('slide_order')->get();
        // print_r($sliderImages);
        // die;
        return view('front/front', compact('schools', 'courses', 'topcities', 'topdeals', 'testi1', 'testi2', 'getallCourseTitles', 'sliderImages'));
    }
    public function mainhome2(Request $request)
    {
        // topcities
        $topcities = TopCity::orderBy('id', 'desc')->get()->take(6);
        // print_r($topcities->toArray());
        // die;
        foreach ($topcities as $city) {
            $cityId = explode('|', $city->city_name);
            $cityname = $cityId[1];
            $city->cityname = $cityname;
            $school = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', 0)->where('schooladdresses.cityId', $city->city_name)->get();
            $countschool = count($school);
            $city->schoolcount = $countschool;
            // if ($countschool > 0) {
            //     $schoolimage = Schoolimage::Join('schooladdresses', 'schooladdresses.schoolId', '=', 'schoolimages.schoolId')->where('schooladdresses.cityId', $city->city_name)->first();
            //     if ($schoolimage != null) {
            //         $city->image = $schoolimage->image;
            //     } else {
            //         $city->image = "";
            //     }
            // } else {
            //     $city->image = "";
            // }
            $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', "1")->where('schools.deactiveStatus', "0")->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $city->city_name)->get();
            $countcourse = count($course);
            $city->coursecount = $countcourse;
        }
        $topdeals = Coursediscount::Join('schools', 'schools.id', '=', 'coursediscounts.school_id')->where('schools.status', '1')->where('schools.deactiveStatus', '0')->whereNotNull('deal')->get()->take(6);
        foreach ($topdeals as $deal) {
            $discount = $deal->discount;
            $dealper = $deal->deal;
            $school = School::where('id', $deal->school_id)->first();
            $deal->status = $school->status;
            $deal->agelimit = $school->agelimit;
            $deal->no_of_student = $school->no_of_student;
            $deal->schoolId = $school->id;
            $deal->schoolSlug = $school->slug;
            $deal->schoolName = $school->name;
            $price = Courseprice::where('schoolId', $deal->school_id)->where('courseId', $deal->course_id)->first();

            $deal->favCss = "fa";
            if (Auth::check()) {
                $userid = auth::user()->id;
                $favschool = Favschool::where('schoolid', $deal->schoolId)->where('userid', $userid)->first();
                if ($favschool != null)
                    $deal->favCss = "fas";
            }

            if ($price != null) {
                if ($discount != null) {
                    $firstprice = $price->ppw1;
                    $discountnum = $firstprice * $discount / 100;
                    $pricead = $firstprice - $discountnum;
                    $deal->pricead = $pricead;
                    $dealpricenum = $pricead * $dealper / 100;
                    $dealprice = $pricead - $dealpricenum;
                    $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                } else {
                    $deal->pricead = $price->ppw1;
                    $pricead = $deal->pricead;
                    $dealpricenum = $price->ppw1 * $dealper / 100;
                    $dealprice = $pricead - $dealpricenum;
                    $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                }
                $deal->pricecourseid = $price->id;
                $deal->hpw = $price->hours_per_week;
            }
            $coursetitle = Coursetitle::where('id', $deal->course_id)->first();
            $deal->name = $coursetitle->name;
            $deal->name_tr = $coursetitle->name_tr;
            $deal->name_ar = $coursetitle->name_ar;
            $deal->name_ru = $coursetitle->name_ru;
            $deal->name_de = $coursetitle->name_de;
            $deal->name_it = $coursetitle->name_it;
            $deal->name_fr = $coursetitle->name_fr;
            $deal->name_es = $coursetitle->name_es;
            $deal->name_se = $coursetitle->name_se;
            $deal->name_jp = $coursetitle->name_jp;
            $deal->name_fa = $coursetitle->name_fa;
            $deal->name_pr = $coursetitle->name_pr;
            $deal->slug = $coursetitle->slug;
            $schoolimage = Schoolimage::where('schoolId', $deal->school_id)->first();
            if ($schoolimage) {
                $deal->image = $schoolimage->image;
            } else {
                $deal->image = "";
            }
            $schooladdress = Schooladdress::where('schoolId', $deal->school_id)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $deal->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $deal->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $deal->city = $city_code;
            } else {
                $deal->country = "";
                $deal->state = "";
                $deal->city = "";
                $deal->zipcode = "";
            }
            $total_review = Coursereview::where('school_id', $deal->school_id)->where('course_id', $deal->course_id)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $sum_reviews4 = 0;
            $review_rate = 0;
            $review_rate1 = 0;
            $review_rate2 = 0;
            $review_rate3 = 0;
            $review_rate4 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                $sum_reviews4 = $sum_reviews4 + $getreviwes->rate4;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
                $review_rate4 = $sum_reviews4 / $count_total_reviews;
            }
            $deal->count_total_reviews = $count_total_reviews;
            $deal->review_rate = $review_rate;
            $deal->review_rate1 = $review_rate1;
            $deal->review_rate2 = $review_rate2;
            $deal->review_rate3 = $review_rate3;
            $deal->review_rate4 = $review_rate4;
        }
        $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('id', 'desc')->get()->take(3);
        $courseTitles = Coursetitle::where('status', '1')->orderBy('name', 'asc')->get();
        $cities = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->select('schooladdresses.cityId')->orderBy('cityId', 'asc')->distinct()->get();

        foreach ($cities as $city) {
            $data_city = $city->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $city->cityname = $city_code;
        }
        $testimonials = Testimonial::orderBy('id', 'DESC')->orderBy('id', 'desc')->get()->take(3);
        if (count($testimonials) == 4 || count($testimonials) == 3) {
            $testimonial = $testimonials->chunk(2)->toArray();
            $testi1 = $testimonial[0];
            $testi2 = $testimonial[1];
        } elseif (count($testimonials) == 1 || count($testimonials) == 2) {
            $testi1 = $testimonials->toArray();
            $testi2 = array();
        } else {
            $testi1 = array();
            $testi2 = array();
        }
        return view('front/front_new', compact('topdeals', 'topcities', 'blogs', 'courseTitles', 'cities', 'testimonials'));
    }
    public function studyabout(Request $request)
    {
        return view('front/studyacourse');
    }
    public function mainAllSchool(Request $request)
    {
        $schools = School::where('status', '1')->where('deactiveStatus', "0")->orderBy('id', 'desc')->paginate(6);
        foreach ($schools as $school) {
            $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            $countCourse = Courseprice::where('schoolId', $school->id)->groupBy('schoolId')->count();
            $school->courseCount = $countCourse;
            $reviews = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews = count($reviews);
            $school->count_total_reviews = $count_total_reviews;
            $sum_reviews = 0;
            $school->review_rate = 0;
            foreach ($reviews as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $school->review_rate = $review_rate;
            }
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
            } else {
                $school->country = "";
                $school->state = "";
                $school->city = "";
                $school->zipcode = "";
            }
            if ($schoolimage) {
                $school->image = $schoolimage->image;
            } else {
                $school->image = "";
            }
        }
        return view('front/school', compact('schools'));
    }
    public function allCourse(Request $request)
    {
        $courses = courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', "0")->where('courseprices.ppw1', '>', 0)->select('courseprices.*', 'courseprices.ppw1 as price', 'schools.name as schoolName', 'schools.agelimit as agelimit', 'schools.registration_fee as registration_fee')->orderBy('id', 'desc')->paginate('12');
        foreach ($courses as $course) {
            $coursetitle = Coursetitle::where('id', $course->courseId)->first();
            if ($coursetitle) {
                $course->name = $coursetitle->name;
                $course->slug = $coursetitle->slug;
                $course->description = $coursetitle->description;
                $schoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
                $course->image = $schoolimage->image;
            }
            $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->id)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $review_rate = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
            }
            $course->count_total_reviews = $count_total_reviews;
            $course->review_rate = $review_rate;
            $schooladdress = Schooladdress::where('schoolId', $course->schoolId)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $course->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $course->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $course->city = $city_code;
                /* Get Postalcode */
                $course->zipcode = $schooladdress->zipCodeId;
            } else {
                $course->country = "";
                $course->state = "";
                $course->city = "";
                $course->zipcode = "";
            }
        }
        $courseTitles = Coursetitle::where('status', '1')->orderBy('name', 'asc')->get();
        $cities = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->select('schooladdresses.cityId')->orderBy('cityId', 'asc')->distinct()->get();
        foreach ($cities as $city) {
            $data_city = $city->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $city->cityname = $city_code;
        }

        return view('front/all_course', compact('courses', 'courseTitles', 'cities'));
    }
    public function getweekajax(Request $request)
    {
        $course_id = $request->courseid;
        $mainschool_ID = $request->mainschool_ID;
        $h_per_weeks = Courseprice::where('courseId', $course_id)->where('schoolId', $mainschool_ID)->get();
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $shpw = 'Select hours pw';
            $hpw = "hours pw";
        } elseif ($locale == 'tr') {
            $shpw = 'Saat/Hafta Seçin';
            $hpw = "Saat/Hafta";
        } elseif ($locale == 'ar') {
            $shpw = 'اختر ساعات / أسبوع';
            $hpw = "ساعات / أسبوع";
        } elseif ($locale == 'ru') {
            $shpw = 'Выберите Часы / Неделя';
            $hpw = "Часы / Неделя";
        } elseif ($locale == 'de') {
            $shpw = 'Wählen Sie Stunden / Woche';
            $hpw = "Hours/Week";
        } elseif ($locale == 'it') {
            $shpw = 'Seleziona ore / settimana';
            $hpw = "Stunden / Woche";
        } elseif ($locale == 'fr') {
            $shpw = 'Sélectionnez Heures / Semaine';
            $hpw = "Heures / Semaine";
        } elseif ($locale == 'es') {
            $shpw = 'Seleccione Horas / Semana';
            $hpw = "Horas / Semana";
        } elseif ($locale == 'se') {
            $shpw = 'Välj timmar / veckak';
            $hpw = "timmar / veckak";
        } elseif ($locale == 'jp') {
            $shpw = '時間/週を選択してください';
            $hpw = "時間/週";
        } elseif ($locale == 'fa') {
            $shpw = 'اعت را انتخاب کنید / هفته ';
            $hpw = "ساعتها / هفته";
        } elseif ($locale == 'pr') {
            $shpw = "Selecione Horas / Semana";
            $hpw = "Horas / Semana";
        }
        $html = '<option value="">' . $shpw . '</option>';
        foreach ($h_per_weeks as $h_per_week) {
            $html .= "<option value=" . $h_per_week->hours_per_week . ">" . $h_per_week->hours_per_week . " " . $hpw . "</option>";
        }
        return $html;
        /*$coursediscount = Coursediscount::where('course_id',$course_id)->first();
        if($coursediscount){
        $discount       = $coursediscount->deal;
        }else{
        $discount       = 0;
        }
        return json_encode(array($discount,$html));*/
    }
    public function gettransportpriceajax(Request $request)
    {
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $stt = 'Select Transportation Type';
            $pu = "Pick Up";
            $puad = "Pick Up & Drop";
        } elseif ($locale == 'tr') {
            $stt = 'Ulaşım Tipini Seçiniz';
            $pu = "Almak";
            $puad = " Al ve Bırak";
        } elseif ($locale == 'ar') {
            $stt = 'اختر نوع النقل';
            $pu = "امسك";
            $puad = " التقاط وإسقاط";
        } elseif ($locale == 'ru') {
            $stt = 'Выберите вид транспорта';
            $pu = "подобрать";
            $puad = " Подбери и урони";
        } elseif ($locale == 'de') {
            $stt = 'Wählen Sie Transporttyp';
            $pu = "Abholen";
            $puad = " Abholen und ablegen";
        } elseif ($locale == 'it') {
            $stt = 'Seleziona il tipo di trasporto';
            $pu = "Raccogliere";
            $puad = "Pick Up and Drop";
        } elseif ($locale == 'fr') {
            $stt = 'Sélectionnez le type de transport';
            $pu = "Ramasser";
            $puad = "Ramasser et déposer";
        } elseif ($locale == 'es') {
            $stt = 'Seleccione el tipo de transporte';
            $pu = "Recoger";
            $puad = " Recoger y soltar";
        } elseif ($locale == 'se') {
            $stt = 'Välj Transporttyp';
            $pu = " Plocka upp";
            $puad = " Plocka upp och släpp";
        } elseif ($locale == 'jp') {
            $stt = '交通機関の種類を選択';
            $pu = " 拾う";
            $puad = " ピックアップアンドドロップ";
        } elseif ($locale == 'fa') {
            $stt = 'انتخاب نوع حمل و نقل';
            $pu = " سوار کردن";
            $puad = " بلند کردن و رها کردن";
        } elseif ($locale == 'pr') {
            $stt = 'Selecione o tipo de transporte';
            $pu = "Pegar";
            $puad = " Pick Up and Drop";
        }
        $transport_id = $request->transport_id;
        if ($transport_id != 0) {
            $transportprice = Schooltransport::where('id', $transport_id)->first();
            return $html = '<option value="0.00">' . $stt . '</option>
            <option value="' . number_format((float) $transportprice->pick_up, 2, '.', '') . '">' . $pu . '</option>
            <option value="' . number_format((float) $transportprice->pick_up_and_drop, 2, '.', '') . '">' . $puad . '</option>';
        }
    }
    public function getaccomodationtypeajax(Request $request)
    {
        $accomodation_id = $request->accomodation_id;
        $getprice = Schoolaccommodationprice::where('accommodation_id', $accomodation_id)->first();
        if ($getprice) {
            $acc_price = $getprice->price;
            return number_format((float) $acc_price, 2, '.', '');
        }
        /*$typeid = [];
        foreach($accomodationtype as $type){
        $typeid[] =  $type->type_id;
        }
        $actypes = Accommodationadmintype::whereIn('id', $typeid)->get();*/
    }
    public function getaccomodationpriceajax(Request $request)
    {
        $accomodation_id = $request->accomodation_id;
        $type_id = $request->type_id;
        $accomodationprice = Schoolaccommodationprice::where('accommodation_id', $accomodation_id)->where('type_id', $type_id)->first();
        return $price = number_format((float) $accomodationprice->price, 2, '.', '');
    }
    public function favschool(Request $request)
    {
        //var_dump('ok');die();
        if (Auth::check()) {
            $heart_input = $request->heart_input;
            $userId = Auth::id();
            $school_id = $request->schoolid;
            $success = true;
            // $data_toggle = $request->data_toggle;
            // $data_text = $request->data_text;
            if ($heart_input == 1) {
                $savedschool = Favschool::create([
                    'userid' => $userId,
                    'schoolid' => $school_id,
                ]);
                if ($savedschool) {
                    return json_encode(array('success' => $success));
                    // return json_encode(array($data_toggle, $data_text));
                }
            } else {
                $deletesavedschool = Favschool::where('userid', $userId)->where('schoolid', $school_id)->delete();
                if ($deletesavedschool) {
                    return json_encode(array('success' => $success));
                    //return json_encode(array($data_toggle, $data_text));
                }
            }
        }
    }
    public function favcourse(Request $request)
    {
        if (Auth::check()) {
            $heart_input = $request->heart_input;
            $userId = Auth::id();
            $courseid = $request->courseid;
            $data_toggle = $request->data_toggle;
            $data_text = $request->data_text;
            if ($heart_input == 1) {
                $savedcourse = Favcourse::create([
                    'userid' => $userId,
                    'coursePid' => $courseid,
                ]);
                if ($savedcourse) {
                    return json_encode(array($data_toggle, $data_text));
                }
            } else {
                $deletesavedcourse = Favcourse::where('userid', $userId)->where('coursePid', $courseid)->delete();
                if ($deletesavedcourse) {
                    return json_encode(array($data_toggle, $data_text));
                }
            }
        }
    }
    public function favaccomodation(Request $request)
    {
        if (Auth::check()) {
            $heart_input = $request->heart_input;
            $userId = Auth::id();
            $accomodation_id = $request->accid;
            $success = true;
            //$data_text = $request->data_text;
            if ($heart_input == 1) {
                $savedacc = Favaccommodation::create([
                    'userid' => $userId,
                    'accommodationid' => $accomodation_id,
                ]);
                if ($savedacc) {
                    return json_encode(array('success' => $success));
                }
            } else {
                $deletesavedacc = Favaccommodation::where('userid', $userId)->where('accommodationid', $accomodation_id)->delete();
                if ($deletesavedacc) {
                    return json_encode(array('success' => $success));
                }
            }
        }
    }
    public function schoolDetail(Request $request)
    {
        $courseid_singlepage = $request->single_course_id;
        try {
            $school = School::where('status', '1')->where('deactiveStatus', '0')->where('id', $request->id)->firstOrFail();
            /* Get school Address */
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
                $school->address = $schooladdress->address;
            } else {
                $school->country = '';
                $school->state = '';
                $school->city = '';
                $school->zipcode = '';
                $school->address = '';
            }
            /* Get school Images */
            $schoolimages = Schoolimage::where('schoolId', $school->id)->get();
            if ($schoolimages->isNotEmpty()) {
                $images = [];
                foreach ($schoolimages as $schoolimage) {
                    $images[] = $schoolimage->image;
                }
                $school->images = $images;
            } else {
                $school->images = 'noimage';
            }
            /* Get school facilities */
            // $school_facilities = Schoolfacility::where('school_id', $school->id)->get();
            $school_facilities = Schoolfacility::join('facilities', 'school_facilities.facility_id', '=', 'facilities.id')->where('school_facilities.school_id', $school->id)->select('school_facilities.*', 'facilities.name as facility_name', 'facilities.icon as facility_icon')->get();
            /* Get Courses */
            $courses = Courseprice::where('schoolId', $school->id)->select('courseId')->distinct()->get();
            if ($courses->isNotEmpty()) {
                /* Add Course Title to Course */
                foreach ($courses as $course) {
                    $coursetitles = Coursetitle::where('id', $course->courseId)->get();
                    foreach ($coursetitles as $coursetitle) {
                        $course->course_title = $coursetitle->name;
                        $course->course_slug = $coursetitle->slug;
                    }
                    /* Add hourse per week to Course */
                    $course_hours_per_week = [];
                    $hours_p_ws = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->get();
                    foreach ($hours_p_ws as $hours_p_w) {
                        $course_hours_per_week[] = $hours_p_w->hours_per_week;
                    }
                    $course->course_hours_per_week = $course_hours_per_week;
                    $total_review_courses = Coursereview::where('school_id', $school->id)->where('course_id', $course->courseId)->get();
                    $count_total_reviews_courses = count($total_review_courses);
                    $sum_reviews_courses = 0;
                    $sum_reviews_courses1 = 0;
                    $sum_reviews_courses2 = 0;
                    $sum_reviews_courses3 = 0;
                    $review_rate_courses = 0;
                    $review_rate_courses1 = 0;
                    $review_rate_courses2 = 0;
                    $review_rate_courses3 = 0;
                    foreach ($total_review_courses as $getreviwes_courses) {
                        $sum_reviews_courses = $sum_reviews_courses + $getreviwes_courses->rate;
                        $sum_reviews_courses1 = $sum_reviews_courses1 + $getreviwes_courses->rate1;
                        $sum_reviews_courses2 = $sum_reviews_courses2 + $getreviwes_courses->rate2;
                        $sum_reviews_courses3 = $sum_reviews_courses3 + $getreviwes_courses->rate3;
                    }
                    if ($count_total_reviews_courses > 0) {
                        $review_rate_courses = $sum_reviews_courses / $count_total_reviews_courses;
                        $review_rate_courses1 = $sum_reviews_courses1 / $count_total_reviews_courses;
                        $review_rate_courses2 = $sum_reviews_courses2 / $count_total_reviews_courses;
                        $review_rate_courses3 = $sum_reviews_courses3 / $count_total_reviews_courses;
                    }
                    $course->count_total_reviews_courses = $count_total_reviews_courses;
                    $course->review_rate_courses = $review_rate_courses;
                    $course->review_rate_courses1 = $review_rate_courses1;
                    $course->review_rate_courses2 = $review_rate_courses2;
                    $course->review_rate_courses3 = $review_rate_courses3;
                }
                //reviews
                //$total_review = Coursereview::where('school_id',  $course->schoolId)->where('course_id',$course->id )->get();
            }
            /* Get school Accomodation */
            $accomodations = Schoolaccommodationprice::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodationprices.accommodation_id')->where('schoolaccommodationprices.school_id', $school->id)->select('schoolaccommodationprices.*', 'accommodationadmintypes.name as typeName')->get();
            /* Get school Insurence */
            $scinsurances = Schoolinsurance::join('insurances', 'insurances.id', '=', 'schoolinsurances.insurence_id')->where('schoolinsurances.school_id', $school->id)->select('schoolinsurances.*', 'insurances.name as insName')->get();
            /* Get school Visa */
            $scvisas = Schoolvisa::join('visas', 'visas.id', '=', 'schoolvisas.visa_id')->where('schoolvisas.school_id', $school->id)->select('schoolvisas.*', 'visas.name as visaName')->get();
            /*if($accomodations->isNotEmpty())
            {
            foreach($accomodations as $acc){
            $getprice  = Schoolaccommodationprice::where('accommodation_id',$acc->id)->first();
            if($getprice){
            $acc->price = number_format((float)$getprice->price, 2, '.', '');
            }else{
            $acc->price = 0.00;
            }
            }
            }*/
            $transports = Schooltransport::where('school_id', $school->id)->get();
            $reviews = Schoolreview::where('school_id', $school->id)->limit(5)->get();
            $total_review = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $sum_reviews4 = 0;
            $sum_reviews5 = 0;
            $review_rate = 0;
            $review_rate1 = 0;
            $review_rate2 = 0;
            $review_rate3 = 0;
            $review_rate4 = 0;
            $review_rate5 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                $sum_reviews4 = $sum_reviews4 + $getreviwes->rate4;
                $sum_reviews5 = $sum_reviews5 + $getreviwes->rate5;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
                $review_rate4 = $sum_reviews4 / $count_total_reviews;
                $review_rate5 = $sum_reviews5 / $count_total_reviews;
            }
            foreach ($reviews as $review) {
                $user = User::where('id', $review->user_id)->first();
                $review->user_name = $user->name;
            }
            $schoollists = School::where('status', 1)->where('deactiveStatus', 0)->where('id', '!=', $school->id)->orderBy('id', 'desc')->get()->take('4');
            foreach ($schoollists as $schoollist) {
                $schoolimage = Schoolimage::where('schoolId', $schoollist->id)->first();
                if ($schoolimage) {
                    $schoollist->image = $schoolimage->image;
                } else {
                    $schoollist->image = "";
                }
            }
            $userId = Auth::id();
            $favschool = Favschool::where('userid', $userId)->where('schoolid', $school->id)->get();
            $count_favschool = count($favschool);
            if ($count_favschool == 1) {
            } else {
                $count_favschool = 0;
            }
            /* Showing Natinality Strats*/
            /* $get_user_from_coursebookings  = Coursebooking::where('school_id', $school->id)->get();
            $usercountry = array();
            $totaluser = array();
            foreach($get_user_from_coursebookings as $booking){
            $usercountry[] = $booking->country;
            //$totaluser[]     = Coursebooking::where('school_id', $school->id)->where('country',$booking->country)->get()->count();
            }
            $unique_country   = array_values(array_unique($usercountry));
            for($i=0;$i<count($unique_country);$i++){
            $totaluser[]     = Coursebooking::where('school_id', $school->id)->where('country',$unique_country[$i])->get()->count();
            }*/
            /* Get school History */
            $school_history = Schoolhistory::where('school_id', $school->id)->get();
            if ($school_history->isNotEmpty()) {
                foreach ($school_history as $history) {
                    $history_country[] = $history->country_id;
                    $history_nos[] = $history->no_of_student;
                }
                $c = array_combine($history_country, $history_nos);
                $d = arsort($c);
                $array_keys = array_keys($c);
                $array_values = array_values($c);
                $school->history_country = $array_keys;
                $school->history_nos = $array_values;
            } else {
                $school->history_country = 'no';
                $school->history_nos = 'no';
            }
            /* Showing Natinality Ends */
            /* user total  credits */
            $get_refers = Refer::where('sendinguserid', $userId)->get();
            $count_refer = count($get_refers);
            $total_credit = $count_refer * 10;
            $final_credit = .5 * $total_credit;
            $logo = Logoimage::where(['logoable_id' => $request->id, 'logoable_type' => "school"])->first();
            $accreditations = Accreditation::findMany(explode(',', $school->accreditations));
            return view('front/schooldetail', compact('school', 'accreditations', 'logo', 'reviews', 'courses', 'accomodations', 'scinsurances', 'scvisas', 'review_rate', 'review_rate1', 'review_rate2', 'review_rate3', 'review_rate4', 'review_rate5', 'transports', 'count_total_reviews', 'schoollists', 'courseid_singlepage', 'school_facilities', 'count_favschool', 'final_credit'));
        } catch (ErrorException $e) {
            // Do stuff if it doesn't exist.
        }
    }
    public function schoolDetail_new(Request $request)
    {
        $courseid_singlepage = $request->single_course_id;
        try {
            $school = School::where('status', '1')->where('deactiveStatus', '0')->where('id', $request->id)->firstOrFail();
            /* Get school Address */
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
                $school->address = $schooladdress->address;
            } else {
                $school->country = '';
                $school->state = '';
                $school->city = '';
                $school->zipcode = '';
                $school->address = '';
            }
            /* Get school Images */
            $schoolimages = Schoolimage::where('schoolId', $school->id)->get();
            if ($schoolimages->isNotEmpty()) {
                $images = [];
                foreach ($schoolimages as $schoolimage) {
                    $images[] = $schoolimage->image;
                }
                $school->images = $images;
            } else {
                $school->images = 'noimage';
            }
            /* Get school facilities */
            // $school_facilities = Schoolfacility::where('school_id', $school->id)->get();
            $school_facilities = Schoolfacility::join('facilities', 'school_facilities.facility_id', '=', 'facilities.id')->where('school_facilities.school_id', $school->id)->select('school_facilities.*', 'facilities.name as facility_name', 'facilities.icon as facility_icon')->get();
            /* Get Courses */
            $courses = Courseprice::where('schoolId', $school->id)->select('courseId')->distinct()->get();
            if ($courses->isNotEmpty()) {
                /* Add Course Title to Course */
                foreach ($courses as $course) {
                    $coursetitles = Coursetitle::where('id', $course->courseId)->get();
                    foreach ($coursetitles as $coursetitle) {
                        $course->course_title = $coursetitle->name;
                        $course->course_slug = $coursetitle->slug;
                    }
                    /* Add hourse per week to Course */
                    $course_hours_per_week = [];
                    $hours_p_ws = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->get();
                    foreach ($hours_p_ws as $hours_p_w) {
                        $course_hours_per_week[] = $hours_p_w->hours_per_week;
                    }
                    $course->ppw1 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw1')->get()->first()->ppw1;
                    $course->ppw2 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw2')->get()->first()->ppw2;
                    $course->ppw3 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw3')->get()->first()->ppw3;
                    $course->ppw4 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw4')->get()->first()->ppw4;
                    $course->ppw5 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw5')->get()->first()->ppw5;
                    $course->ppw6 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw6')->get()->first()->ppw6;
                    $course->ppw7 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw7')->get()->first()->ppw7;
                    $course->ppw8 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw8')->get()->first()->ppw8;
                    $course->ppw9 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw9')->get()->first()->ppw9;
                    $course->ppw10 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw10')->get()->first()->ppw10;
                    $course->ppw11 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw11')->get()->first()->ppw11;
                    $course->ppw12 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw12')->get()->first()->ppw12;
                    $course->ppw13 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $school->id)->select('ppw13')->get()->first()->ppw13;
                    // $course->ppw1 = isset($hours_p_ws->ppw1) ? $hours_p_ws->ppw1 : 0;
                    $course->course_hours_per_week = $course_hours_per_week;
                    $total_review_courses = Coursereview::where('school_id', $school->id)->where('course_id', $course->courseId)->get();
                    $count_total_reviews_courses = count($total_review_courses);
                    $sum_reviews_courses = 0;
                    $sum_reviews_courses1 = 0;
                    $sum_reviews_courses2 = 0;
                    $sum_reviews_courses3 = 0;
                    $review_rate_courses = 0;
                    $review_rate_courses1 = 0;
                    $review_rate_courses2 = 0;
                    $review_rate_courses3 = 0;
                    foreach ($total_review_courses as $getreviwes_courses) {
                        $sum_reviews_courses = $sum_reviews_courses + $getreviwes_courses->rate;
                        $sum_reviews_courses1 = $sum_reviews_courses1 + $getreviwes_courses->rate1;
                        $sum_reviews_courses2 = $sum_reviews_courses2 + $getreviwes_courses->rate2;
                        $sum_reviews_courses3 = $sum_reviews_courses3 + $getreviwes_courses->rate3;
                    }
                    if ($count_total_reviews_courses > 0) {
                        $review_rate_courses = $sum_reviews_courses / $count_total_reviews_courses;
                        $review_rate_courses1 = $sum_reviews_courses1 / $count_total_reviews_courses;
                        $review_rate_courses2 = $sum_reviews_courses2 / $count_total_reviews_courses;
                        $review_rate_courses3 = $sum_reviews_courses3 / $count_total_reviews_courses;
                    }
                    $course->count_total_reviews_courses = $count_total_reviews_courses;
                    $course->review_rate_courses = $review_rate_courses;
                    $course->review_rate_courses1 = $review_rate_courses1;
                    $course->review_rate_courses2 = $review_rate_courses2;
                    $course->review_rate_courses3 = $review_rate_courses3;
                    //echo $course->courseId.'  '.$school->id;
                    $discount = Coursediscount::where('course_id', $course->courseId)->where('school_id', $school->id)->get()->first();
                    if ($discount) {
                        $course->discount = $discount->discount;
                    } else {
                        $course->discount = 0;
                    }
                    // if()
                    //     print_r($discount->toArray());
                    //   die;
                }
                // die;
                //reviews
                //$total_review = Coursereview::where('school_id',  $course->schoolId)->where('course_id',$course->id )->get();
            }
            /* Get school Accomodation */
            $accomodations = Schoolaccommodationprice::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodationprices.accommodation_id')->where('schoolaccommodationprices.school_id', $school->id)->select('schoolaccommodationprices.*', 'accommodationadmintypes.name as typeName')->get();
            /* Get school Insurence */
            $scinsurances = Schoolinsurance::join('insurances', 'insurances.id', '=', 'schoolinsurances.insurence_id')->where('schoolinsurances.school_id', $school->id)->select('schoolinsurances.*', 'insurances.*')->get();
            /* Get school Visa */
            $scvisas = Schoolvisa::join('visas', 'visas.id', '=', 'schoolvisas.visa_id')->where('schoolvisas.school_id', $school->id)->select('schoolvisas.*', 'visas.*')->get();

            if ($accomodations->isNotEmpty()) {
                foreach ($accomodations as $accommodation) {
                    $accommodation_name = Accommodation::where('id', $accommodation->accommodation_id)->first();
                    if ($accommodation_name) {
                        $accommodation->slug = $accommodation_name->slug;
                    }
                }
                //die;
            }
            /*if($accomodations->isNotEmpty())
            {
            foreach($accomodations as $acc){
            $getprice  = Schoolaccommodationprice::where('accommodation_id',$acc->id)->first();
            if($getprice){
            $acc->price = number_format((float)$getprice->price, 2, '.', '');
            }else{
            $acc->price = 0.00;
            }
            }
            }*/
            $transports = Schooltransport::where('school_id', $school->id)->get();
            $reviews = Schoolreview::where('school_id', $school->id)->limit(5)->get();
            $total_review = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $sum_reviews4 = 0;
            $sum_reviews5 = 0;
            $review_rate = 0;
            $review_rate1 = 0;
            $review_rate2 = 0;
            $review_rate3 = 0;
            $review_rate4 = 0;
            $review_rate5 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                $sum_reviews4 = $sum_reviews4 + $getreviwes->rate4;
                $sum_reviews5 = $sum_reviews5 + $getreviwes->rate5;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
                $review_rate4 = $sum_reviews4 / $count_total_reviews;
                $review_rate5 = $sum_reviews5 / $count_total_reviews;
            }
            foreach ($reviews as $review) {
                $user = User::where('id', $review->user_id)->first();
                $review->user_name = $user->name;
            }
            $schoollists = School::where('status', 1)->where('deactiveStatus', 0)->where('id', '!=', $school->id)->orderBy('id', 'desc')->get()->take('4');
            foreach ($schoollists as $schoollist) {
                $schoolimage = Schoolimage::where('schoolId', $schoollist->id)->first();
                if ($schoolimage) {
                    $schoollist->image = $schoolimage->image;
                } else {
                    $schoollist->image = "";
                }
            }
            $userId = Auth::id();
            $favschool = Favschool::where('userid', $userId)->where('schoolid', $school->id)->get();
            $count_favschool = count($favschool);
            if ($count_favschool == 1) {
            } else {
                $count_favschool = 0;
            }
            /* Showing Natinality Strats*/
            /* $get_user_from_coursebookings  = Coursebooking::where('school_id', $school->id)->get();
            $usercountry = array();
            $totaluser = array();
            foreach($get_user_from_coursebookings as $booking){
            $usercountry[] = $booking->country;
            //$totaluser[]     = Coursebooking::where('school_id', $school->id)->where('country',$booking->country)->get()->count();
            }
            $unique_country   = array_values(array_unique($usercountry));
            for($i=0;$i<count($unique_country);$i++){
            $totaluser[]     = Coursebooking::where('school_id', $school->id)->where('country',$unique_country[$i])->get()->count();
            }*/
            /* Get school History */
            $school_history = Schoolhistory::where('school_id', $school->id)->get();
            if ($school_history->isNotEmpty()) {
                foreach ($school_history as $history) {
                    $history_country[] = $history->country_id;
                    $history_nos[] = $history->no_of_student;
                }
                $c = array_combine($history_country, $history_nos);
                $d = arsort($c);
                $array_keys = array_keys($c);
                $array_values = array_values($c);
                $school->history_country = $array_keys;
                $school->history_nos = $array_values;
            } else {
                $school->history_country = 'no';
                $school->history_nos = 'no';
            }
            /* Showing Natinality Ends */
            /* user total  credits */
            $get_refers = Refer::where('sendinguserid', $userId)->get();
            $count_refer = count($get_refers);
            $total_credit = $count_refer * 10;
            $final_credit = .5 * $total_credit;
            $logo = Logoimage::where(['logoable_id' => $request->id, 'logoable_type' => "school"])->first();
            $accreditations = Accreditation::findMany(explode(',', $school->accreditations));
            // print_r($school_history->toArray());
            // die;
            return view('front/schooldetail_new', compact('school', 'accreditations', 'logo', 'reviews', 'courses', 'accomodations', 'scinsurances', 'scvisas', 'review_rate', 'review_rate1', 'review_rate2', 'review_rate3', 'review_rate4', 'review_rate5', 'transports', 'count_total_reviews', 'schoollists', 'courseid_singlepage', 'school_facilities', 'count_favschool', 'final_credit', 'school_history'));
        } catch (ErrorException $e) {
            // Do stuff if it doesn't exist.
        }
    }
    public function courseDetail(Request $request)
    {
        $course_slug = $request->slug;
        $course_id = $request->id;
        $hours_per_week = $request->hours;
        $price_per_week = $request->price;
        /* Get Single Course Details */
        try {
            $course = Course::where('id', $course_id)->firstOrFail();
            $schoolId = $course->schoolId;
            $school = School::where('id', $schoolId)->first();
            $course->schoolname = $school->name;
            $coursetitle = Coursetitle::where('id', $course->course_id)->first();
            $course->coursetitle = $coursetitle->name;
            $course->hours_per_week = $hours_per_week;
            $courseprice = Courseprice::where('courseId', $course->course_id)->where('hours_per_week', $hours_per_week)->first();
            return view('front/coursedetail', compact('course'));
        } catch (ErrorException $e) {
            // Do stuff if it doesn't exist.
        }
    }
    public function getsearchschools(Request $request)
    {
        $search_school = $request->search_school;
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $name = "name";
        } elseif ($locale == 'tr') {
            $name = "name_tr";
        } elseif ($locale == 'ar') {
            $name = "name_ar";
        } elseif ($locale == 'ru') {
            $name = "name_ru";
        } elseif ($locale == 'de') {
            $name = "name_de";
        } elseif ($locale == 'it') {
            $name = "name_it";
        } elseif ($locale == 'fr') {
            $name = "name_fr";
        } elseif ($locale == 'es') {
            $name = "name_es";
        } elseif ($locale == 'se') {
            $name = "name_se";
        } elseif ($locale == 'jp') {
            $name = "name_jp";
        } elseif ($locale == 'fa') {
            $name = "name_fa";
        } elseif ($locale == 'pr') {
            $name = "name_pr";
        }
        if (!empty($search_school)) {
            $schools = School::where($name, 'LIKE', '%' . $search_school . '%')->where('status', 1)->where('deactiveStatus', "0")->orderBy('id', 'desc')->paginate('6');
        } else {
            $schools = School::where('status', '1')->where('deactiveStatus', "0")->orderBy('id', 'desc')->paginate(6);
        }
        foreach ($schools as $school) {
            $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
            $countCourse = Courseprice::where('schoolId', $school->id)->groupBy('schoolId')->count();
            $school->courseCount = $countCourse;
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            $reviews = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews = count($reviews);
            $school->count_total_reviews = $count_total_reviews;
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $sum_reviews4 = 0;
            $sum_reviews5 = 0;
            foreach ($reviews as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                $sum_reviews4 = $sum_reviews4 + $getreviwes->rate4;
                $sum_reviews5 = $sum_reviews5 + $getreviwes->rate5;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
                $review_rate4 = $sum_reviews4 / $count_total_reviews;
                $review_rate5 = $sum_reviews5 / $count_total_reviews;
                $school->review_rate = $review_rate;
                $school->review_rate1 = $review_rate1;
                $school->review_rate2 = $review_rate2;
                $school->review_rate3 = $review_rate3;
                $school->review_rate4 = $review_rate4;
                $school->review_rate5 = $review_rate5;
            }
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
            } else {
                $school->country = "";
                $school->state = "";
                $school->city = "";
                $school->zipcode = "";
            }
            if ($schoolimage) {
                $school->image = $schoolimage->image;
            } else {
                $school->image = "";
            }
        }
        return view('front/school', compact('schools'));
    }
    public function getSearchCourses(Request $request)
    {
        // die;
        // $schools = School::all();
        // foreach($schools as $school){
        //     // echo '<pre>';
        //     foreach($school->coursePrices as $course){
        //         print_r($course->courseTitles->toArray());
        //         die;
        //     }
        //     // print_r($school->coursePrices->toArray());
        //     die;
        // }
        // print_r();
        $search_course = $request->search_course;
        $locale = app()->getLocale();
        // if ($locale == 'en') {
        //     $name = "name";
        // } elseif ($locale == 'tr') {
        //     $name = "name_tr";
        // } elseif ($locale == 'ar') {
        //     $name = "name_ar";
        // } elseif ($locale == 'ru') {
        //     $name = "name_ru";
        // } elseif ($locale == 'de') {
        //     $name = "name_de";
        // } elseif ($locale == 'it') {
        //     $name = "name_it";
        // } elseif ($locale == 'fr') {
        //     $name = "name_fr";
        // } elseif ($locale == 'es') {
        //     $name = "name_es";
        // } elseif ($locale == 'se') {
        //     $name = "name_se";
        // } elseif ($locale == 'jp') {
        //     $name = "name_jp";
        // } elseif ($locale == 'fa') {
        //     $name = "name_fa";
        // } elseif ($locale == 'pr') {
        //     $name = "name_pr";
        // }
        if (!empty($search_course)) {
            $schools = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where('coursetitles.' . $name, 'LIKE', '%' . $search_course . '%')->where('courseprices.ppw1', '>', 0)->select('courseprices.*', 'courseprices.ppw1 as price', 'coursetitles.name as name', 'coursetitles.description as description', 'coursetitles.slug as slug')->orderBy('id', 'desc')->paginate(12);
        } else {
            $schools = School::paginate(12);
            // $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        // foreach ($courses as $course) {
        //     /* Get course Id  */
        //     $getCourseId = Courseprice::where('schoolId', $course->schoolId)->where('courseId', $course->courseId)->where('ppw1', $course->price)->first();
        //     $course->id = $getCourseId->id;
        //     $course->hours_per_week = $getCourseId->hours_per_week;
        //     $getTitleSlug = Coursetitle::where('id', $course->courseId)->first();
        //     $course->slug = $getTitleSlug->id;
        //     $course->name = $getTitleSlug->name;
        //     $course->name_tr = $getTitleSlug->name_tr;
        //     $course->name_ar = $getTitleSlug->name_ar;
        //     $course->name_de = $getTitleSlug->name_de;
        //     $course->name_it = $getTitleSlug->name_it;
        //     $course->name_fr = $getTitleSlug->name_fr;
        //     $course->name_es = $getTitleSlug->name_es;
        //     $course->name_se = $getTitleSlug->name_se;
        //     $course->name_jp = $getTitleSlug->name_jp;
        //     $course->name_fa = $getTitleSlug->name_fa;
        //     $course->name_pr = $getTitleSlug->name_pr;
        //     $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
        //     $count_total_reviews = count($total_review);
        //     $sum_reviews = 0;
        //     $sum_reviews1 = 0;
        //     $sum_reviews2 = 0;
        //     $sum_reviews3 = 0;
        //     $review_rate = 0;
        //     $review_rate1 = 0;
        //     $review_rate2 = 0;
        //     $review_rate3 = 0;
        //     foreach ($total_review as $getreviwes) {
        //         $sum_reviews = $sum_reviews + $getreviwes->rate;
        //         $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
        //         $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
        //         $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
        //     }
        //     if ($count_total_reviews > 0) {
        //         $review_rate = $sum_reviews / $count_total_reviews;
        //         $review_rate1 = $sum_reviews1 / $count_total_reviews;
        //         $review_rate2 = $sum_reviews2 / $count_total_reviews;
        //         $review_rate3 = $sum_reviews3 / $count_total_reviews;
        //     }
        //     $course->count_total_reviews = $count_total_reviews;
        //     $course->review_rate = $review_rate;
        //     $course->review_rate1 = $review_rate1;
        //     $course->review_rate2 = $review_rate2;
        //     $course->review_rate3 = $review_rate3;
        // }
        $courseTitles = Coursetitle::where('status', '1')->orderBy('name', 'asc')->get();
        $cities = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->select('schooladdresses.cityId')->orderBy('cityId', 'asc')->distinct()->get();
        foreach ($cities as $city) {
            $data_city = $city->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $city->cityname = $city_code;
        }
        // print_r($courses->toArray());
        // die;
        // print_r($schools->toArray());
        // die;
        return view('front/all_course', compact('schools', 'courseTitles', 'cities'));
    }
    public function getSearchblogs(Request $request)
    {
        $search_blog = $request->search_blog;
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $blogtitle = "title";
        } elseif ($locale == 'tr') {
            $blogtitle = "title_tr";
        } elseif ($locale == 'ar') {
            $blogtitle = "title_ar";
        } elseif ($locale == 'ru') {
            $blogtitle = "title_ru";
        } elseif ($locale == 'de') {
            $blogtitle = "title_de";
        } elseif ($locale == 'it') {
            $blogtitle = "title_it";
        } elseif ($locale == 'fr') {
            $blogtitle = "title_fr";
        } elseif ($locale == 'es') {
            $blogtitle = "title_es";
        } elseif ($locale == 'se') {
            $blogtitle = "title_se";
        } elseif ($locale == 'jp') {
            $blogtitle = "title_jp";
        } elseif ($locale == 'fa') {
            $blogtitle = "title_fa";
        } elseif ($locale == 'pr') {
            $blogtitle = "title_pr";
        }
        if (!empty($search_blog)) {
            $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->where('blogs.' . $blogtitle, 'LIKE', '%' . $search_blog . '%')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('id', 'desc')->paginate(2);
        } else {
            $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('id', 'desc')->paginate(2);
        }
        $categories = Blogcategory::all();
        $otherblogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('blogs.id', 'desc')->limit(4)->get();
        foreach ($otherblogs as $otherblog) {
            $comments = Blogreview::where('blog_id', $otherblog->id)->get();
            $otherblog->comments = count($comments);
        }
        return view('front/blog', compact('blogs', 'categories', 'otherblogs'));
    }
    public function storeReview(Request $request)
    {
        $schoolreview = new Schoolreview;
        $schoolreview->school_id = $request->school_id;
        $schoolreview->user_id = $request->user_id;
        $schoolreview->name = $request->name;
        $schoolreview->email = $request->email;
        $schoolreview->comment = $request->comment;
        if ($request->rate == null) {
            $request->rate = 0;
        }
        if ($request->rate1 == null) {
            $request->rate1 = 0;
        }
        if ($request->rate2 == null) {
            $request->rate2 = 0;
        }
        if ($request->rate3 == null) {
            $request->rate3 = 0;
        }
        if ($request->rate4 == null) {
            $request->rate4 = 0;
        }
        if ($request->rate5 == null) {
            $request->rate5 = 0;
        }
        $schoolreview->rate = $request->rate;
        $schoolreview->rate1 = $request->rate1;
        $schoolreview->rate2 = $request->rate2;
        $schoolreview->rate3 = $request->rate3;
        $schoolreview->rate4 = $request->rate4;
        $schoolreview->rate5 = $request->rate5;
        if (($request->comment && $request->school_id && $request->user_id) == null) {
            return redirect()->back()->with('success', "Please Comment to post review");
        } else {
            $deletereview = Schoolreview::where('user_id', $request->user_id)->where('school_id', $request->school_id)->delete();
            $schoolreview->save();
            return redirect()->back()->with('success', "Your Review is posted Successfully");
        }
    }
    public function singleCourse(Request $request)
    {
        $courseId = $request->id;
        $course = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('courseprices.id', $courseId)->select('courseprices.*', 'schools.name as schoolName', 'schools.name_ar as schoolName_ar', 'schools.name_ru as schoolName_ru', 'schools.name_es as schoolName_es', 'schools.name_se as schoolName_se', 'schools.name_fr as schoolName_fr', 'schools.name_fa as schoolName_fa', 'schools.name_pr as schoolName_pr', 'schools.name_de as schoolName_de', 'schools.name_it as schoolName_it', 'schools.name_tr as schoolName_tr', 'schools.name_jp as schoolName_jp', 'schools.slug as schoolSlug', 'schools.registration_fee as registration_fee')->first();
        $coursetitle = Coursetitle::where('id', $course->courseId)->first();
        $course->name = $coursetitle->name;
        $course->slug = $coursetitle->slug;
        $course->description = $coursetitle->description;
        $course->description_ar = $coursetitle->description_ar;
        $course->description_pr = $coursetitle->description_pr;
        $course->description_de = $coursetitle->description_de;
        $course->description_fa = $coursetitle->description_fa;
        $course->description_fr = $coursetitle->description_fr;
        $course->description_es = $coursetitle->description_es;
        $course->description_se = $coursetitle->description_se;
        $course->description_it = $coursetitle->description_it;
        $course->description_jp = $coursetitle->description_jp;
        $course->description_tr = $coursetitle->description_tr;
        $course->description_ru = $coursetitle->description_ru;
        //address
        $courseschool = School::where('id', $course->schoolId)->first();
        $course->agelimit = $courseschool->agelimit;
        $schooladdress = Schooladdress::where('schoolId', $course->schoolId)->first();
        $schoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
        if ($schoolimage != null) {
            $course->image = $schoolimage->image;
        }
        if ($schooladdress) {
            /* Get country */
            $data_country = $schooladdress->countryId;
            $country_explode = explode('|', $data_country);
            $country_code = $country_explode[1];
            $course->country = $country_code;
            /* Get state */
            $data_state = $schooladdress->stateId;
            $state_explode = explode('|', $data_state);
            $state_code = $state_explode[1];
            $course->state = $state_code;
            /* Get City */
            $data_city = $schooladdress->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $course->city = $city_code;
            /* Get Postalcode */
            $course->zipcode = $schooladdress->zipCodeId;
        } else {
            $course->country = "";
            $course->state = "";
            $course->city = "";
            $course->zipcode = "";
        }
        //reviews
        $coursereviews = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->limit(5)->get();
        $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
        $count_total_reviews = count($total_review);
        $sum_reviews = 0;
        $sum_reviews1 = 0;
        $sum_reviews2 = 0;
        $sum_reviews3 = 0;
        $review_rate = 0;
        $review_rate1 = 0;
        $review_rate2 = 0;
        $review_rate3 = 0;
        foreach ($total_review as $getreviwes) {
            $sum_reviews = $sum_reviews + $getreviwes->rate;
            $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
            $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
            $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
        }
        if ($count_total_reviews > 0) {
            $review_rate = $sum_reviews / $count_total_reviews;
            $review_rate1 = $sum_reviews1 / $count_total_reviews;
            $review_rate2 = $sum_reviews2 / $count_total_reviews;
            $review_rate3 = $sum_reviews3 / $count_total_reviews;
        }
        foreach ($coursereviews as $review) {
            $user = User::where('id', $review->user_id)->first();
            $review->user_name = $user->name;
        }
        //other courses of same school
        $othercourses = Courseprice::where('schoolId', $course->schoolId)->where('id', '!=', $course->id)->orderBy('id', 'desc')->take(5)->get();
        foreach ($othercourses as $othercourse) {
            $coursetitle = Coursetitle::where('id', $othercourse->courseId)->first();
            $othercourse->courseName = $coursetitle->name;
            $othercourse->courseName_ar = $coursetitle->name_ar;
            $othercourse->courseName_jp = $coursetitle->name_jp;
            $othercourse->courseName_pr = $coursetitle->name_pr;
            $othercourse->courseName_fa = $coursetitle->name_fa;
            $othercourse->courseName_fr = $coursetitle->name_fr;
            $othercourse->courseName_it = $coursetitle->name_it;
            $othercourse->courseName_tr = $coursetitle->name_tr;
            $othercourse->courseName_ru = $coursetitle->name_ru;
            $othercourse->courseName_de = $coursetitle->name_de;
            $othercourse->courseName_es = $coursetitle->name_es;
            $othercourse->courseName_se = $coursetitle->name_se;
            $othercourse->slug = $coursetitle->slug;
            $othercourse->description = $coursetitle->description;
            $otherschoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
            $othercourse->image = $otherschoolimage->image;
            $other_course_total_review = Coursereview::where('school_id', $othercourse->schoolId)->where('course_id', $othercourse->courseId)->get();
            $other_course_count_total_reviews = count($other_course_total_review);
            $other_course_sum_reviews = 0;
            $other_course_sum_reviews1 = 0;
            $other_course_sum_reviews2 = 0;
            $other_course_sum_reviews3 = 0;
            $other_course_review_rate = 0;
            $other_course_review_rate1 = 0;
            $other_course_review_rate2 = 0;
            $other_course_review_rate3 = 0;
            foreach ($other_course_total_review as $other_course_getreviwes) {
                $other_course_sum_reviews = $other_course_sum_reviews + $other_course_getreviwes->rate;
                $other_course_sum_reviews1 = $other_course_sum_reviews1 + $other_course_getreviwes->rate1;
                $other_course_sum_reviews2 = $other_course_sum_reviews2 + $other_course_getreviwes->rate2;
                $other_course_sum_reviews3 = $other_course_sum_reviews3 + $other_course_getreviwes->rate3;
            }
            if ($other_course_count_total_reviews > 0) {
                $other_course_review_rate = $other_course_sum_reviews / $other_course_count_total_reviews;
                $other_course_review_rate1 = $other_course_sum_reviews1 / $other_course_count_total_reviews;
                $other_course_review_rate2 = $other_course_sum_reviews2 / $other_course_count_total_reviews;
                $other_course_review_rate3 = $other_course_sum_reviews3 / $other_course_count_total_reviews;
            }
            $othercourse->review_rate = $other_course_review_rate;
            $othercourse->review_rate1 = $other_course_review_rate1;
            $othercourse->review_rate2 = $other_course_review_rate2;
            $othercourse->review_rate3 = $other_course_review_rate3;
            $othercourse->count_total_reviews = $other_course_count_total_reviews;
        }
        //dd($othercourses);
        $schools = School::where('status', 1)->where('deactiveStatus', "0")->where('id', '!=', $course->schoolId)->orderBy('id', 'desc')->get()->take(8);
        foreach ($schools as $school) {
            $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            $countCourse = Courseprice::where('schoolId', $school->id)->groupBy('id')->count();
            $school->courseCount = $countCourse;
            $reviews = Schoolreview::where('school_id', $school->id)->get();
            $count_total_reviews_school = count($reviews);
            $school->count_total_reviews_school = $count_total_reviews_school;
            $sum_reviews_school = 0;
            $sum_reviews_school1 = 0;
            $sum_reviews_school2 = 0;
            $sum_reviews_school3 = 0;
            $sum_reviews_school4 = 0;
            $sum_reviews_school5 = 0;
            foreach ($reviews as $getreviwes) {
                $sum_reviews_school = $sum_reviews_school + $getreviwes->rate;
                $sum_reviews_school1 = $sum_reviews_school1 + $getreviwes->rate1;
                $sum_reviews_school2 = $sum_reviews_school2 + $getreviwes->rate2;
                $sum_reviews_school3 = $sum_reviews_school3 + $getreviwes->rate3;
                $sum_reviews_school4 = $sum_reviews_school4 + $getreviwes->rate4;
                $sum_reviews_school5 = $sum_reviews_school5 + $getreviwes->rate5;
            }
            if ($count_total_reviews_school > 0) {
                $review_rate_school = $sum_reviews_school / $count_total_reviews_school;
                $review_rate_school1 = $sum_reviews_school1 / $count_total_reviews_school;
                $review_rate_school2 = $sum_reviews_school2 / $count_total_reviews_school;
                $review_rate_school3 = $sum_reviews_school3 / $count_total_reviews_school;
                $review_rate_school4 = $sum_reviews_school4 / $count_total_reviews_school;
                $review_rate_school5 = $sum_reviews_school5 / $count_total_reviews_school;
                $school->review_rate_school = $review_rate_school;
                $school->review_rate_school1 = $review_rate_school1;
                $school->review_rate_school2 = $review_rate_school2;
                $school->review_rate_school3 = $review_rate_school3;
                $school->review_rate_school4 = $review_rate_school4;
                $school->review_rate_school5 = $review_rate_school5;
            }
            if ($schooladdress) {
                /* Get country */
                $data_country = $schooladdress->countryId;
                $country_explode = explode('|', $data_country);
                $country_code = $country_explode[1];
                $school->country = $country_code;
                /* Get state */
                $data_state = $schooladdress->stateId;
                $state_explode = explode('|', $data_state);
                $state_code = $state_explode[1];
                $school->state = $state_code;
                /* Get City */
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $city_code = $city_explode[1];
                $school->city = $city_code;
                /* Get Postalcode */
                $school->zipcode = $schooladdress->zipCodeId;
            } else {
                $school->country = "";
                $school->state = "";
                $school->city = "";
                $school->zipcode = "";
            }
            if ($schoolimage) {
                $school->image = $schoolimage->image;
            } else {
                $school->image = "";
            }
        }
        $userId = Auth::id();
        $favcourse = Favcourse::where('userid', $userId)->where('coursePid', $courseId)->get();
        $count_favcourse = count($favcourse);
        if ($count_favcourse == 1) {
        } else {
            $count_favcourse = 0;
        }
        return view('front/singlecourse', compact('course', 'coursereviews', 'review_rate', 'review_rate1', 'review_rate2', 'review_rate3', 'count_total_reviews', 'othercourses', 'schools', 'count_favcourse'));
    }
    public function aboutus(Request $request)
    {
        $who_we_are = Page::where('id', 1)->first();
        $our_education = Page::where('id', 2)->first();
        //$our_story     = Page::where('id', 3)->first();
        return view('front/aboutus_new', compact('who_we_are', 'our_education'));
    }
    public function faqs(Request $request)
    {
        $faqs = Faq::all();
        $faqsCount = ceil($faqs->count() / 2);
        $faqs1 = $faqs->slice(0, $faqsCount);
        $faqs2 = $faqs->slice($faqsCount);
        return view('front/faqs', compact('faqs1', 'faqs2'));
    }
    public function singlePage(Request $request)
    {
        $pagedata = Page::where('id', $request->id)->first();
        return view('front/singlepage_new', compact('pagedata'));
    }
    public function autoSearchSchool(Request $request)
    {
        $term = $request->get('term', '');
        $searchlist = School::where('status', 1)->where('deactiveStatus', "0")->where('name', 'LIKE', '%' . $term . '%')->get();
        $data = array();
        $locale = app()->getLocale();
        foreach ($searchlist as $list) {
            if ($locale == 'en') {
                $data[] = array('value' => $list->name, 'id' => $list->id);
            } elseif ($locale == 'tr') {
                $data[] = array('value' => $list->name_tr, 'id' => $list->id);
            } elseif ($locale == 'ar') {
                $data[] = array('value' => $list->name_ar, 'id' => $list->id);
            } elseif ($locale == 'ru') {
                $data[] = array('value' => $list->name_ru, 'id' => $list->id);
            } elseif ($locale == 'de') {
                $data[] = array('value' => $list->name_de, 'id' => $list->id);
            } elseif ($locale == 'it') {
                $data[] = array('value' => $list->name_it, 'id' => $list->id);
            } elseif ($locale == 'fr') {
                $data[] = array('value' => $list->name_fr, 'id' => $list->id);
            } elseif ($locale == 'es') {
                $data[] = array('value' => $list->name_es, 'id' => $list->id);
            } elseif ($locale == 'se') {
                $data[] = array('value' => $list->name_se, 'id' => $list->id);
            } elseif ($locale == 'jp') {
                $data[] = array('value' => $list->name_jp, 'id' => $list->id);
            } elseif ($locale == 'fa') {
                $data[] = array('value' => $list->name_fa, 'id' => $list->id);
            } elseif ($locale == 'pr') {
                $data[] = array('value' => $list->name_pr, 'id' => $list->id);
            }
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }
    public function autoSearchCourse(Request $request)
    {
        $search_course = $request->get('term', '');
        $courselist = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where('coursetitles.name', 'LIKE', '%' . $search_course . '%')->select('coursetitles.name as name', 'coursetitles.name_tr as name_tr', 'coursetitles.name_ar as name_ar', 'coursetitles.name_ru as name_ru', 'coursetitles.name_de as name_de', 'coursetitles.name_fr as name_fr', 'coursetitles.name_it as name_it', 'coursetitles.name_es as name_es', 'coursetitles.name_se as name_se', 'coursetitles.name_jp as name_jp', 'coursetitles.name_fa as name_fa', 'coursetitles.name_pr as name_pr')->distinct()->get();
        $data = array();
        $locale = app()->getLocale();
        foreach ($courselist as $list) {
            if ($locale == 'en') {
                $data[] = array('value' => $list->name, 'id' => $list->id);
            } elseif ($locale == 'tr') {
                $data[] = array('value' => $list->name_tr, 'id' => $list->id);
            } elseif ($locale == 'ar') {
                $data[] = array('value' => $list->name_ar, 'id' => $list->id);
            } elseif ($locale == 'ru') {
                $data[] = array('value' => $list->name_ru, 'id' => $list->id);
            } elseif ($locale == 'de') {
                $data[] = array('value' => $list->name_de, 'id' => $list->id);
            } elseif ($locale == 'it') {
                $data[] = array('value' => $list->name_it, 'id' => $list->id);
            } elseif ($locale == 'fr') {
                $data[] = array('value' => $list->name_fr, 'id' => $list->id);
            } elseif ($locale == 'es') {
                $data[] = array('value' => $list->name_es, 'id' => $list->id);
            } elseif ($locale == 'se') {
                $data[] = array('value' => $list->name_se, 'id' => $list->id);
            } elseif ($locale == 'jp') {
                $data[] = array('value' => $list->name_jp, 'id' => $list->id);
            } elseif ($locale == 'fa') {
                $data[] = array('value' => $list->name_fa, 'id' => $list->id);
            } elseif ($locale == 'pr') {
                $data[] = array('value' => $list->name_pr, 'id' => $list->id);
            }
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }
    public function autoSearchBlog(Request $request)
    {
        $search_blog = $request->get('term', '');
        $bloglist = Blog::where('title', 'LIKE', '%' . $search_blog . '%')->get();
        $data = array();
        $locale = app()->getLocale();
        foreach ($bloglist as $list) {
            if ($locale == 'en') {
                $data[] = array('value' => $list->title, 'id' => $list->id);
            } elseif ($locale == 'tr') {
                $data[] = array('value' => $list->title_tr, 'id' => $list->id);
            } elseif ($locale == 'ar') {
                $data[] = array('value' => $list->title_ar, 'id' => $list->id);
            } elseif ($locale == 'ru') {
                $data[] = array('value' => $list->title_ru, 'id' => $list->id);
            } elseif ($locale == 'de') {
                $data[] = array('value' => $list->title_de, 'id' => $list->id);
            } elseif ($locale == 'it') {
                $data[] = array('value' => $list->title_it, 'id' => $list->id);
            } elseif ($locale == 'fr') {
                $data[] = array('value' => $list->title_fr, 'id' => $list->id);
            } elseif ($locale == 'es') {
                $data[] = array('value' => $list->title_es, 'id' => $list->id);
            } elseif ($locale == 'se') {
                $data[] = array('value' => $list->title_se, 'id' => $list->id);
            } elseif ($locale == 'jp') {
                $data[] = array('value' => $list->title_jp, 'id' => $list->id);
            } elseif ($locale == 'fa') {
                $data[] = array('value' => $list->title_fa, 'id' => $list->id);
            } elseif ($locale == 'pr') {
                $data[] = array('value' => $list->title_pr, 'id' => $list->id);
            }
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }
    public function autoSearchCity(Request $request)
    {
        $term = $request->get('term', '');
        $searchlist = Accommodation::where('status', 1)->where('city_id', 'LIKE', '%' . $term . '%')->select('city_id')->distinct()->get();
        $data = array();
        foreach ($searchlist as $list) {
            $data_city = $list->city_id;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $data[] = array('value' => $city_code, 'id' => $list->id);
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }
    public function autoSearchAccTitle(Request $request)
    {
        $term = $request->get('term', '');
        $searchlist = Accommodation::where('status', 1)->where('deactiveStatus', 0)->where('name', 'LIKE', '%' . $term . '%')->get();
        $data = array();
        $locale = app()->getLocale();
        foreach ($searchlist as $list) {
            if ($locale == 'en') {
                $data[] = array('value' => $list->name, 'id' => $list->id);
            } elseif ($locale == 'tr') {
                $data[] = array('value' => $list->name_tr, 'id' => $list->id);
            } elseif ($locale == 'ar') {
                $data[] = array('value' => $list->name_ar, 'id' => $list->id);
            } elseif ($locale == 'ru') {
                $data[] = array('value' => $list->name_ru, 'id' => $list->id);
            } elseif ($locale == 'de') {
                $data[] = array('value' => $list->name_de, 'id' => $list->id);
            } elseif ($locale == 'it') {
                $data[] = array('value' => $list->name_it, 'id' => $list->id);
            } elseif ($locale == 'fr') {
                $data[] = array('value' => $list->name_fr, 'id' => $list->id);
            } elseif ($locale == 'es') {
                $data[] = array('value' => $list->name_es, 'id' => $list->id);
            } elseif ($locale == 'se') {
                $data[] = array('value' => $list->name_se, 'id' => $list->id);
            } elseif ($locale == 'jp') {
                $data[] = array('value' => $list->name_jp, 'id' => $list->id);
            } elseif ($locale == 'fa') {
                $data[] = array('value' => $list->name_fa, 'id' => $list->id);
            } elseif ($locale == 'pr') {
                $data[] = array('value' => $list->name_pr, 'id' => $list->id);
            }
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }
    public function allAccommodation(Request $request)
    {
        $search_accommodation = $request->search_accommodation;
        $accommodations = "";
        if (!empty($search_accommodation)) {
            $query = DB::table('accommodations');
            $query->join('accommodationtypes', 'accommodations.id', '=', 'accommodationtypes.accommodation_id');
            $query->join('accommodationprices', 'accommodations.id', '=', 'accommodationprices.accommodation_id');
            if ($request->search_city) {
                $query->where('accommodations.city_id', $request->search_city);
            }
            if ($request->accommodation_type) {
                $query->where('accommodationtypes.type_id', $request->accommodation_type);
            }
            if ($request->property_type) {
                $query->whereIn('accommodationprices.typeid', $request->property_type);
            }
            $query->where('accommodations.status', 1);
            $query->where('accommodations.deactiveStatus', 0);
            $query->orderBy('accommodations.id', 'desc');
            $accommodations = $query->paginate(3);
        } else {
            $accommodations = Accommodation::where('status', 1)->where('deactiveStatus', 0)->orderBy('id', 'desc')->paginate(3);
        }

        $accommodationCities = Accommodation::where('status', 1)->where('deactiveStatus', 0)->orderBy('city_id', 'desc')->get();
        // print_r($accommodationCities);
        // die;
        foreach ($accommodationCities as $accommodationCity) {
            $city_explode = explode('|', $accommodationCity->city_id);
            if (count($city_explode) > 1) {
                $city_code = $city_explode[1];
                $accommodationCity->cityName = $city_code;
            }
        }
        $accommodationsFacilities = Accommodationadminfacility::all();
        $accommodationsTypes = Accommodationadmintype::all();
        $accommodationPropertyTypes = Accomodationpropertytype::all();
        // print_r($accommodationsTypes);
        // die;
        $maxPrice = Accommodationprice::max('price');
        $minPrice = Accommodationprice::min('price');
        // echo count($accommodations);
        // die;
        foreach ($accommodations as $accommodation) {
            if ($accommodation) {
                // echo 'here';
                /* Get Postalcode */
                $accommodation->favCss = "fa";
                if (Auth::check()) {
                    $userid = auth::user()->id;
                    $favaccommodation = Favaccommodation::where('accommodationid', $accommodation->id)->where('userid', $userid)->first();
                    if ($favaccommodation != null)
                        $accommodation->favCss = "fas";
                }
                if ($accommodation->country_id) {
                    $data_country = $accommodation->country_id;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $accommodation->country = $country_code;
                } else {
                    $accommodation->country = "";
                }
                /* Get state */
                if ($accommodation->state_id) {
                    $data_state = $accommodation->state_id;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $accommodation->state = $state_code;
                } else {
                    $accommodation->state = "";
                }
                if ($accommodation->city_id) {
                    /* Get City */
                    $data_city = $accommodation->city_id;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $accommodation->city = $city_code;
                } else {
                    $accommodation->city = "";
                }
                if ($accommodation->zipcode_id) {
                    $accommodation->zipcode = $accommodation->zipcode_id;
                } else {
                    $accommodation->zipcode = "";
                }
            }
            // echo $accommodation->id;
            $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
            $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();

            if (!$roomtype) {
                unset($accommodation);
                continue;
            }
            $accommodation->roomtype = $roomtype['acc_type'];
            // $price = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
            if ($roomtype) {
                if (count($roomtype->toArray()) > 0) {
                    $accommodation->price = $roomtype['price'];
                } else {
                    $accommodation->price = 0;
                }
            }

            // print_r($accommodation->price->toArray());
            // die;
            //  $count_total_reviews  = count($total_review);
            //  $sum_reviews          = 0;
            //  $review_rate          = 0;
            // foreach($total_review as $getreviwes){
            //  $sum_reviews = $sum_reviews+$getreviwes->rate;
            // }
            //   if($count_total_reviews>0){
            //     $review_rate = $sum_reviews/$count_total_reviews;
            //   }
            //  $accommodation->count_total_reviews = $count_total_reviews;
            //   $accommodation->review_rate        =        $review_rate;
            $count_total_reviews = count($total_review);
            $sum_reviews_fcourse = 0;
            $sum_reviews_fcourse1 = 0;
            $sum_reviews_fcourse2 = 0;
            $sum_reviews_fcourse3 = 0;
            $review_rate_fcourse = 0;
            $review_rate_fcourse1 = 0;
            $review_rate_fcourse2 = 0;
            $review_rate_fcourse3 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews_fcourse = $sum_reviews_fcourse + $getreviwes->rate;
                $sum_reviews_fcourse1 = $sum_reviews_fcourse1 + $getreviwes->rate1;
                $sum_reviews_fcourse2 = $sum_reviews_fcourse2 + $getreviwes->rate2;
                $sum_reviews_fcourse3 = $sum_reviews_fcourse3 + $getreviwes->rate3;
            }
            if ($count_total_reviews > 0) {
                $review_rate_fcourse = $sum_reviews_fcourse / $count_total_reviews;
                $review_rate_fcourse1 = $sum_reviews_fcourse1 / $count_total_reviews;
                $review_rate_fcourse2 = $sum_reviews_fcourse2 / $count_total_reviews;
                $review_rate_fcourse3 = $sum_reviews_fcourse3 / $count_total_reviews;
            }
            $accommodation->count_total_reviews = $count_total_reviews;
            $accommodation->review_rate_fcourse = $review_rate_fcourse;
            $accommodation->review_rate_fcourse1 = $review_rate_fcourse1;
            $accommodation->review_rate_fcourse2 = $review_rate_fcourse2;
            $accommodation->review_rate_fcourse3 = $review_rate_fcourse3;
            $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
            if ($image) {
                $accommodation->image = $image->image;
            } else {
                $accommodation->image = "";
            }
        }
        if ($request->ajax()) {
            //     echo json_encode($request->toArray());
            //     // echo json_encode(explode(",",explode('&',$request->toArray()['form'])));
            // die;
            $data = array();
            if ($accommodations->count() > 0) {
                $courses = view('front.ajax.partials.allAccommodationSearch', compact('accommodations'))->render();
                $data = array(
                    'error' => false,
                    'message' => 'Courses Found',
                    'data' => $courses,
                );
            } else {
                $data = array(
                    'error' => true,
                    'message' => 'Courses not Found',
                    'data' => null,
                );
            }
            echo json_encode($data);
            die;
        }
        // print_r($accommodations->toArray());
        // die;
        // die;
        return view('front/all_accommodation', compact('accommodations', 'accommodationsFacilities', 'accommodationPropertyTypes', 'accommodationsTypes', 'accommodationCities', 'minPrice', 'maxPrice'));
    }
    public function accommodationDetail_new(Request $request)
    {
        $accommodation = Accommodation::find($request->id);
        if ($accommodation->country_id) {
            $data_country = $accommodation->country_id;
            $country_explode = explode('|', $data_country);
            $country_code = $country_explode[1];
            $accommodation->country = $country_code;
        } else {
            $accommodation->country = "";
        }
        /* Get state */
        if ($accommodation->state_id) {
            $data_state = $accommodation->state_id;
            $state_explode = explode('|', $data_state);
            $state_code = $state_explode[1];
            $accommodation->state = $state_code;
        } else {
            $accommodation->state = "";
        }
        if ($accommodation->city_id) {
            /* Get City */
            $data_city = $accommodation->city_id;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $accommodation->city = $city_code;
        } else {
            $accommodation->city = "";
        }
        if ($accommodation->zipcode_id) {
            $accommodation->zipcode = $accommodation->zipcode_id;
        } else {
            $accommodation->zipcode = "";
        }
        $facilities = Accommodationfacility::join('accommodationadminfacilities', 'accommodationfacilities.facility_id', '=', 'accommodationadminfacilities.id')->where('accommodationfacilities.accommodation_id', $request->id)->select('accommodationfacilities.*', 'accommodationadminfacilities.name as facility_name', 'accommodationadminfacilities.name_tr as facility_name_tr', 'accommodationadminfacilities.name_ar as facility_name_ar', 'accommodationadminfacilities.name_ru as facility_name_ru', 'accommodationadminfacilities.name_de as facility_name_de', 'accommodationadminfacilities.name_it as facility_name_it', 'accommodationadminfacilities.name_fr as facility_name_fr', 'accommodationadminfacilities.icon as facility_icon')->get();
        //reviews
        $reviews = Accommodationreview::where('accommodation_id', $request->id)->limit(5)->get();
        $total_review = Accommodationreview::where('accommodation_id', $request->id)->get();
        $count_total_reviews = count($total_review);
        $sum_reviews = 0;
        $sum_reviews1 = 0;
        $sum_reviews2 = 0;
        $sum_reviews3 = 0;
        $review_rate = 0;
        $review_rate1 = 0;
        $review_rate2 = 0;
        $review_rate3 = 0;
        foreach ($total_review as $getreviwes) {
            $sum_reviews = $sum_reviews + $getreviwes->rate;
            $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
            $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
            $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
        }
        if ($count_total_reviews > 0) {
            $review_rate = $sum_reviews / $count_total_reviews;
            $review_rate1 = $sum_reviews1 / $count_total_reviews;
            $review_rate2 = $sum_reviews2 / $count_total_reviews;
            $review_rate3 = $sum_reviews3 / $count_total_reviews;
        }
        foreach ($reviews as $review) {
            $user = User::where('id', $review->user_id)->first();
            if ($user) {
                $review->name = $user->name;
            }
        }
        $accommodationimages = Accommodationimage::where('accommodation_id', $request->id)->get();
        $getproperty_types = Accommodationtype::join('accomodationpropertytypes', 'accomodationpropertytypes.id', '=', 'accommodationtypes.type_id')->where('accommodationtypes.accommodation_id', $request->id)->select('accommodationtypes.*', 'accomodationpropertytypes.id as propertyid', 'accomodationpropertytypes.name as propertyname', 'accomodationpropertytypes.name_tr as propertyname_tr', 'accomodationpropertytypes.name_ar as propertyname_ar', 'accomodationpropertytypes.name_ru as propertyname_ru', 'accomodationpropertytypes.name_de as propertyname_de', 'accomodationpropertytypes.name_it as propertyname_it', 'accomodationpropertytypes.name_fr as propertyname_fr')->first();
        if ($getproperty_types) {
            $selected_property_type = $getproperty_types->propertyname;
            $selected_property_type_tr = $getproperty_types->propertyname_tr;
            $selected_property_type_ar = $getproperty_types->propertyname_ar;
            $selected_property_type_ru = $getproperty_types->propertyname_ru;
            $selected_property_type_de = $getproperty_types->propertyname_de;
            $selected_property_type_it = $getproperty_types->propertyname_it;
            $selected_property_type_fr = $getproperty_types->propertyname_fr;
        } else {
            $selected_property_type = "";
            $selected_property_type_tr = "";
            $selected_property_type_ar = "";
            $selected_property_type_ru = "";
            $selected_property_type_de = "";
            $selected_property_type_it = "";
            $selected_property_type_fr = "";
        }
        $accomodationdescription = Accomodationdescription::where('accommodation_id', $request->id)->first();
        $getacc_type = Accommodationprice::where('accommodation_id', $request->id)->first();
        $getaccommodationprice = Accommodationprice::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'accommodationprices.typeid')->where('accommodationprices.accommodation_id', $request->id)->select('accommodationprices.*', 'accommodationadmintypes.id as typeid', 'accommodationadmintypes.name as typename', 'accommodationadmintypes.name_tr as typename_tr', 'accommodationadmintypes.name_ar as typename_ar', 'accommodationadmintypes.name_ru as typename_ru', 'accommodationadmintypes.name_de as typename_de', 'accommodationadmintypes.name_it as typename_it', 'accommodationadmintypes.name_fr as typename_fr')->get();
        $userId = Auth::id();
        $favaccomodation = Favaccommodation::where('userid', $userId)->join('accommodations', 'accommodations.id', '=', 'favaccommodations.accommodationid')->where('accommodations.status', 1)->where('accommodations.deactiveStatus', 0)->select('favaccommodations.*')->where('favaccommodations.accommodationid', $request->id)->get();
        $count_favaccomodation = count($favaccomodation);
        if ($count_favaccomodation == 1) {
        } else {
            $count_favaccomodation = 0;
        }
        // print_r($accommodation->toArray());
        // die;
        // print_r($accommodationimages->toArray());
        // die;
        return view('front/accommodationdetail_new', compact('accommodation', 'facilities', 'reviews', 'review_rate', 'review_rate1', 'review_rate2', 'review_rate3', 'count_total_reviews', 'accommodationimages', 'selected_property_type', 'selected_property_type_tr', 'selected_property_type_ar', 'selected_property_type_de', 'selected_property_type_ru', 'selected_property_type_it', 'selected_property_type_fr', 'accomodationdescription', 'getacc_type', 'getaccommodationprice', 'count_favaccomodation'));
    }
    public function accommodationDetail(Request $request)
    {
        $accommodation = Accommodation::find($request->id);
        if ($accommodation->country_id) {
            $data_country = $accommodation->country_id;
            $country_explode = explode('|', $data_country);
            $country_code = $country_explode[1];
            $accommodation->country = $country_code;
        } else {
            $accommodation->country = "";
        }
        /* Get state */
        if ($accommodation->state_id) {
            $data_state = $accommodation->state_id;
            $state_explode = explode('|', $data_state);
            $state_code = $state_explode[1];
            $accommodation->state = $state_code;
        } else {
            $accommodation->state = "";
        }
        if ($accommodation->city_id) {
            /* Get City */
            $data_city = $accommodation->city_id;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $accommodation->city = $city_code;
        } else {
            $accommodation->city = "";
        }
        if ($accommodation->zipcode_id) {
            $accommodation->zipcode = $accommodation->zipcode_id;
        } else {
            $accommodation->zipcode = "";
        }
        $facilities = Accommodationfacility::join('accommodationadminfacilities', 'accommodationfacilities.facility_id', '=', 'accommodationadminfacilities.id')->where('accommodationfacilities.accommodation_id', $request->id)->select('accommodationfacilities.*', 'accommodationadminfacilities.name as facility_name', 'accommodationadminfacilities.name_tr as facility_name_tr', 'accommodationadminfacilities.name_ar as facility_name_ar', 'accommodationadminfacilities.name_ru as facility_name_ru', 'accommodationadminfacilities.name_de as facility_name_de', 'accommodationadminfacilities.name_it as facility_name_it', 'accommodationadminfacilities.name_fr as facility_name_fr', 'accommodationadminfacilities.icon as facility_icon')->get();
        //reviews
        $reviews = Accommodationreview::where('accommodation_id', $request->id)->limit(5)->get();
        $total_review = Accommodationreview::where('accommodation_id', $request->id)->get();
        $count_total_reviews = count($total_review);
        $sum_reviews = 0;
        $sum_reviews1 = 0;
        $sum_reviews2 = 0;
        $sum_reviews3 = 0;
        $review_rate = 0;
        $review_rate1 = 0;
        $review_rate2 = 0;
        $review_rate3 = 0;
        foreach ($total_review as $getreviwes) {
            $sum_reviews = $sum_reviews + $getreviwes->rate;
            $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
            $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
            $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
        }
        if ($count_total_reviews > 0) {
            $review_rate = $sum_reviews / $count_total_reviews;
            $review_rate1 = $sum_reviews1 / $count_total_reviews;
            $review_rate2 = $sum_reviews2 / $count_total_reviews;
            $review_rate3 = $sum_reviews3 / $count_total_reviews;
        }
        foreach ($reviews as $review) {
            $user = User::where('id', $review->user_id)->first();
            $review->user_name = $user->name;
        }
        $accommodationimages = Accommodationimage::where('accommodation_id', $request->id)->get();
        $getproperty_types = Accommodationtype::join('accomodationpropertytypes', 'accomodationpropertytypes.id', '=', 'accommodationtypes.type_id')->where('accommodationtypes.accommodation_id', $request->id)->select('accommodationtypes.*', 'accomodationpropertytypes.id as propertyid', 'accomodationpropertytypes.name as propertyname', 'accomodationpropertytypes.name_tr as propertyname_tr', 'accomodationpropertytypes.name_ar as propertyname_ar', 'accomodationpropertytypes.name_ru as propertyname_ru', 'accomodationpropertytypes.name_de as propertyname_de', 'accomodationpropertytypes.name_it as propertyname_it', 'accomodationpropertytypes.name_fr as propertyname_fr')->first();
        if ($getproperty_types) {
            $selected_property_type = $getproperty_types->propertyname;
            $selected_property_type_tr = $getproperty_types->propertyname_tr;
            $selected_property_type_ar = $getproperty_types->propertyname_ar;
            $selected_property_type_ru = $getproperty_types->propertyname_ru;
            $selected_property_type_de = $getproperty_types->propertyname_de;
            $selected_property_type_it = $getproperty_types->propertyname_it;
            $selected_property_type_fr = $getproperty_types->propertyname_fr;
        } else {
            $selected_property_type = "";
            $selected_property_type_tr = "";
            $selected_property_type_ar = "";
            $selected_property_type_ru = "";
            $selected_property_type_de = "";
            $selected_property_type_it = "";
            $selected_property_type_fr = "";
        }
        $accomodationdescription = Accomodationdescription::where('accommodation_id', $request->id)->first();
        $getacc_type = Accommodationprice::where('accommodation_id', $request->id)->first();
        $getaccommodationprice = Accommodationprice::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'accommodationprices.typeid')->where('accommodationprices.accommodation_id', $request->id)->select('accommodationprices.*', 'accommodationadmintypes.id as typeid', 'accommodationadmintypes.name as typename', 'accommodationadmintypes.name_tr as typename_tr', 'accommodationadmintypes.name_ar as typename_ar', 'accommodationadmintypes.name_ru as typename_ru', 'accommodationadmintypes.name_de as typename_de', 'accommodationadmintypes.name_it as typename_it', 'accommodationadmintypes.name_fr as typename_fr')->get();
        $userId = Auth::id();
        $favaccomodation = Favaccommodation::where('userid', $userId)->join('accommodations', 'accommodations.id', '=', 'favaccommodations.accommodationid')->where('accommodations.status', 1)->where('accommodations.deactiveStatus', 0)->select('favaccommodations.*')->where('favaccommodations.accommodationid', $request->id)->get();
        $count_favaccomodation = count($favaccomodation);
        if ($count_favaccomodation == 1) {
        } else {
            $count_favaccomodation = 0;
        }
        return view('front/accommodationdetail', compact('accommodation', 'facilities', 'reviews', 'review_rate', 'review_rate1', 'review_rate2', 'review_rate3', 'count_total_reviews', 'accommodationimages', 'selected_property_type', 'selected_property_type_tr', 'selected_property_type_ar', 'selected_property_type_de', 'selected_property_type_ru', 'selected_property_type_it', 'selected_property_type_fr', 'accomodationdescription', 'getacc_type', 'getaccommodationprice', 'count_favaccomodation'));
    }
    public function storeCourseReview(Request $request)
    {
        $coursereview = new Coursereview;
        $coursereview->school_id = $request->school_id;
        $coursereview->course_id = $request->course_id;
        $coursereview->user_id = $request->user_id;
        $coursereview->name = $request->name;
        $coursereview->email = $request->email;
        $coursereview->comment = $request->comment;
        if ($request->rate == null) {
            $request->rate = 0;
        }
        if ($request->rate1 == null) {
            $request->rate1 = 0;
        }
        if ($request->rate2 == null) {
            $request->rate2 = 0;
        }
        if ($request->rate3 == null) {
            $request->rate3 = 0;
        }
        $coursereview->rate = $request->rate;
        $coursereview->rate1 = $request->rate1;
        $coursereview->rate2 = $request->rate2;
        $coursereview->rate3 = $request->rate3;
        if (($request->rate && $request->rate && $request->school_id && $request->user_id) == null) {
            return redirect()->back()->with('success', "Please Select Rating to post review");
        } else {
            $deletereview = Coursereview::where('user_id', $request->user_id)->where('school_id', $request->school_id)->where('course_id', $request->course_id)->delete();
            $coursereview->save();
            return redirect()->back()->with('success', "Your Review is posted Successfully");
        }
    }
    public function storeAccommodationReview(Request $request)
    {
        $accommodationreview = new Accommodationreview;
        $accommodationreview->accommodation_id = $request->accommodation_id;
        $accommodationreview->user_id = $request->user_id;
        $accommodationreview->name = $request->name;
        $accommodationreview->email = $request->getemail;
        $accommodationreview->comment = $request->comment;
        if ($request->rate == null) {
            $request->rate = 0;
        }
        if ($request->rate1 == null) {
            $request->rate1 = 0;
        }
        if ($request->rate2 == null) {
            $request->rate2 = 0;
        }
        if ($request->rate3 == null) {
            $request->rate3 = 0;
        }
        $accommodationreview->rate = $request->rate;
        $accommodationreview->rate1 = $request->rate1;
        $accommodationreview->rate2 = $request->rate2;
        $accommodationreview->rate3 = $request->rate3;
        if (($request->comment && $request->accommodation_id && $request->user_id) == null) {
            return redirect()->back()->with('success', "Please Select Rating to post review");
        } else {
            $deletereview = Accommodationreview::where('user_id', $request->user_id)->where('accommodation_id', $request->accommodation_id)->delete();
            $accommodationreview->save();
            return redirect()->back()->with('success', "Your Review is posted Successfully");
        }
    }
    public function contactUs(Request $request)
    {
        return view('front/contactus');
    }
    public function blogList(Request $request)
    {
        $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name', 'blogcategories.name_tr as category_name_tr', 'blogcategories.name_ar as category_name_ar', 'blogcategories.name_ru as category_name_ru', 'blogcategories.name_de as category_name_de', 'blogcategories.name_fr as category_name_fr', 'blogcategories.name_it as category_name_it', 'blogcategories.name_es as category_name_es')->paginate(2);
        $categories = Blogcategory::all();
        $otherblogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('blogs.id', 'desc')->limit(4)->get();
        foreach ($otherblogs as $otherblog) {
            $comments = Blogreview::where('blog_id', $otherblog->id)->get();
            $otherblog->comments = count($comments);
        }
        // print_r($blogs->toArray());
        // die;
        return view('front/blog_new', compact('blogs', 'categories', 'otherblogs'));
    }
    public function blogDetail(Request $request)
    {
        $blog = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->where('blogs.id', $request->id)->select('blogs.*', 'blogcategories.name as category_name', 'blogcategories.name_tr as category_name_tr', 'blogcategories.name_ar as category_name_ar', 'blogcategories.name_ru as category_name_ru', 'blogcategories.name_it as category_name_it', 'blogcategories.name_de as category_name_de', 'blogcategories.name_fr as category_name_fr')->first();
        $categories = Blogcategory::all();
        // $next = Blog::where('id', '>', $blog->id)->first();
        // $previous = Blog::where('id', '<', $blog->id)->first();
        $reviews = Blogreview::where('blog_id', $blog->id)->limit(5)->get();
        $countreview = count($reviews);
        foreach ($reviews as $review) {
            $user = User::where('id', $review->user_id)->first();
            if ($user) {
                $review->user_name = $user->name;
            }
        }
        $otherblogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name')->orderBy('blogs.id', 'desc')->limit(4)->get();
        foreach ($otherblogs as $otherblog) {
            $comments = Blogreview::where('blog_id', $otherblog->id)->get();
            $otherblog->comments = count($comments);
        }
        return view('front/blogdetail_new', compact('blog', 'categories', 'reviews', 'countreview', 'otherblogs'));
    }
    public function categoryBlog(Request $request)
    {
        $blogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->where('blogs.category_id', $request->id)->select('blogs.*', 'blogcategories.name as category_name', 'blogcategories.name_tr as category_name_tr', 'blogcategories.name_se as category_name_se', 'blogcategories.name_es as category_name_es', 'blogcategories.name_fr as category_name_fr', 'blogcategories.name_ru as category_name_ru', 'blogcategories.name_it as category_name_it', 'blogcategories.name_de as category_name_de', 'blogcategories.name_pr as category_name_pr', 'blogcategories.name_fa as category_name_fa', 'blogcategories.name_ar as category_name_ar', 'blogcategories.name_jp as category_name_jp')->paginate(2);
        $categories = Blogcategory::all();
        $otherblogs = Blog::join('blogcategories', 'blogs.category_id', '=', 'blogcategories.id')->select('blogs.*', 'blogcategories.name as category_name', 'blogcategories.name_tr as category_name_tr', 'blogcategories.name_se as category_name_se', 'blogcategories.name_es as category_name_es', 'blogcategories.name_fr as category_name_fr', 'blogcategories.name_ru as category_name_ru', 'blogcategories.name_it as category_name_it', 'blogcategories.name_de as category_name_de', 'blogcategories.name_pr as category_name_pr', 'blogcategories.name_fa as category_name_fa', 'blogcategories.name_ar as category_name_ar', 'blogcategories.name_jp as category_name_jp')->orderBy('blogs.id', 'desc')->limit(4)->get();
        foreach ($otherblogs as $otherblog) {
            $comments = Blogreview::where('blog_id', $otherblog->id)->get();
            $otherblog->comments = count($comments);
        }
        return view('front/categoryblog', compact('blogs', 'categories', 'otherblogs'));
    }
    // function to send mail
    public function callUS(Request $request)
    {
        $data = array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'subject' => 'Let Us Call You',
            'phone' => $request->phone,
            'to' => "sameer.smartitventures@gmail.com",
        );
        Mail::send('front.email.letuscall', $data, function ($message) use ($data) {
            $message->to($data['to']);
            $message->subject($data['subject']);
        });
        return back()->with('success', "Message Sent");
        dd($request->all());
    }
    public function contactusmail(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();
        $data = array(
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'bodyMessage' => $request->message,
            'to' => "mani.smartitventures@gmail.com",
        );
        Mail::send('front.email.content', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });
        return back()->with('success', "Message Sent");
    }
    public function storeBlogReview(Request $request)
    {
        $blogreview = new Blogreview;
        $blogreview->blog_id = $request->blog_id;
        $blogreview->user_id = Auth::user()->id;
        $blogreview->name = $request->name;
        $blogreview->email = $request->email;
        $blogreview->comment = $request->comment;
        if ($request->blog_id == null) {
            return redirect()->back();
        } else {
            $blogreview->save();
            return redirect()->back()->with('success', "Your Review is posted Successfully");
        }
    }
   
    public function referFriend(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $random_number = substr(md5(uniqid(mt_rand(), true)), 0, $id);
            $concatinate = $id . '' . $random_number;
            $get_refers = Refer::where('sendinguserid', $id)->get();
            $count_refer = count($get_refers);
            $total_credit = $count_refer * 10;
            foreach ($get_refers as $get_refer) {
                $nid = $get_refer->newuserid;
                $get_users = User::where('id', $nid)->first();
                $get_refer->name = $get_users->name;
                $get_refer->email = $get_users->email;
            }
            /* Showing Saved school */
            $favschools = Favschool::Join('schools', 'schools.id', '=', 'favschools.schoolid')->where('status', 1)->where('deactiveStatus', '0')->select('favschools.*')->where('favschools.userid', $id)->get();
            $count_fav_school = count($favschools);
            if ($favschools->isNotEmpty()) {
                $school_ids = array();
                foreach ($favschools as $favschool) {
                    $school_ids[] = $favschool->schoolid;
                }
                $schools = School::whereIn('id', $school_ids)->get();
                foreach ($schools as $school) {
                    $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
                    $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
                    $countCourse = Course::where('schoolId', $school->id)->groupBy('schoolId')->count();
                    $school->courseCount = $countCourse;
                    $reviews = Schoolreview::where('school_id', $school->id)->get();
                    $count_total_reviews_fschool = count($reviews);
                    $school->count_total_reviews_fschool = $count_total_reviews_fschool;
                    $sum_reviews_fschool = 0;
                    $sum_reviews_fschool1 = 0;
                    $sum_reviews_fschool2 = 0;
                    $sum_reviews_fschool3 = 0;
                    $sum_reviews_fschool4 = 0;
                    $sum_reviews_fschool5 = 0;
                    foreach ($reviews as $getreviwes) {
                        $sum_reviews_fschool = $sum_reviews_fschool + $getreviwes->rate;
                        $sum_reviews_fschool1 = $sum_reviews_fschool1 + $getreviwes->rate1;
                        $sum_reviews_fschool2 = $sum_reviews_fschool2 + $getreviwes->rate2;
                        $sum_reviews_fschool3 = $sum_reviews_fschool3 + $getreviwes->rate3;
                        $sum_reviews_fschool4 = $sum_reviews_fschool4 + $getreviwes->rate4;
                        $sum_reviews_fschool5 = $sum_reviews_fschool5 + $getreviwes->rate5;
                    }
                    if ($count_total_reviews_fschool > 0) {
                        $review_rate_fschool = $sum_reviews_fschool / $count_total_reviews_fschool;
                        $review_rate_fschool1 = $sum_reviews_fschool1 / $count_total_reviews_fschool;
                        $review_rate_fschool2 = $sum_reviews_fschool2 / $count_total_reviews_fschool;
                        $review_rate_fschool3 = $sum_reviews_fschool3 / $count_total_reviews_fschool;
                        $review_rate_fschool4 = $sum_reviews_fschool4 / $count_total_reviews_fschool;
                        $review_rate_fschool5 = $sum_reviews_fschool5 / $count_total_reviews_fschool;
                        $school->review_rate_fschool = $review_rate_fschool;
                        $school->review_rate_fschool1 = $review_rate_fschool1;
                        $school->review_rate_fschool2 = $review_rate_fschool2;
                        $school->review_rate_fschool3 = $review_rate_fschool3;
                        $school->review_rate_fschool4 = $review_rate_fschool4;
                        $school->review_rate_fschool5 = $review_rate_fschool5;
                    }
                    if ($schooladdress) {
                        /* Get country */
                        $data_country = $schooladdress->countryId;
                        $country_explode = explode('|', $data_country);
                        $country_code = $country_explode[1];
                        $school->country = $country_code;
                        /* Get state */
                        $data_state = $schooladdress->stateId;
                        $state_explode = explode('|', $data_state);
                        $state_code = $state_explode[1];
                        $school->state = $state_code;
                        /* Get City */
                        $data_city = $schooladdress->cityId;
                        $city_explode = explode('|', $data_city);
                        $city_code = $city_explode[1];
                        $school->city = $city_code;
                        /* Get Postalcode */
                        $school->zipcode = $schooladdress->zipCodeId;
                    } else {
                        $school->country = "";
                        $school->state = "";
                        $school->city = "";
                        $school->zipcode = "";
                    }
                    if ($schoolimage) {
                        $school->image = $schoolimage->image;
                    } else {
                        $school->image = "";
                    }
                }
                /* Showing Saved school end*/
            } else {
                $count_fav_school = 0;
            }
            $bookedCourses = Coursebooking::where('user_id', $id)->get();
            foreach ($bookedCourses as $bookedcourse) {
                $school = School::where('id', $bookedcourse->school_id)->first();
                if ($school != null) {
                    $bookedcourse->schoolname = $school->name;
                    $bookedcourse->schoolname_ar = $school->name_ar;
                    $bookedcourse->schoolname_fr = $school->name_fr;
                    $bookedcourse->schoolname_fa = $school->name_fa;
                    $bookedcourse->schoolname_es = $school->name_es;
                    $bookedcourse->schoolname_se = $school->name_se;
                    $bookedcourse->schoolname_pr = $school->name_pr;
                    $bookedcourse->schoolname_ru = $school->name_ru;
                    $bookedcourse->schoolname_it = $school->name_it;
                    $bookedcourse->schoolname_tr = $school->name_tr;
                    $bookedcourse->schoolname_de = $school->name_de;
                    $bookedcourse->schoolname_jp = $school->name_jp;
                }
                $course = Courseprice::where('courseId', $bookedcourse->course_id)->where('hours_per_week', $bookedcourse->hours_per_week)->first();
                if ($course != null) {
                    $coursetitle = Coursetitle::where('id', $course->courseId)->first();
                    if ($coursetitle != null) {
                        $bookedcourse->course_name = $coursetitle->name;
                        $bookedcourse->course_name_ar = $coursetitle->name_ar;
                        $bookedcourse->course_name_fr = $coursetitle->name_fr;
                        $bookedcourse->course_name_fa = $coursetitle->name_fa;
                        $bookedcourse->course_name_es = $coursetitle->name_es;
                        $bookedcourse->course_name_se = $coursetitle->name_se;
                        $bookedcourse->course_name_pr = $coursetitle->name_pr;
                        $bookedcourse->course_name_tr = $coursetitle->name_tr;
                        $bookedcourse->course_name_ru = $coursetitle->name_ru;
                        $bookedcourse->course_name_jp = $coursetitle->name_jp;
                        $bookedcourse->course_name_it = $coursetitle->name_it;
                        $bookedcourse->course_name_de = $coursetitle->name_de;
                    }
                }
                if ($bookedcourse->accommodation_id) {
                    $accommodationtype = Accommodationadmintype::where('id', $bookedcourse->accommodation_id)->first();
                    $bookedcourse->accommodation = $accommodationtype->name;
                    $bookedcourse->accommodation_ar = $accommodationtype->name_ar;
                    $bookedcourse->accommodation_fr = $accommodationtype->name_fr;
                    $bookedcourse->accommodation_fa = $accommodationtype->name_fa;
                    $bookedcourse->accommodation_es = $accommodationtype->name_es;
                    $bookedcourse->accommodation_se = $accommodationtype->name_se;
                    $bookedcourse->accommodation_pr = $accommodationtype->name_pr;
                    $bookedcourse->accommodation_tr = $accommodationtype->name_tr;
                    $bookedcourse->accommodation_ru = $accommodationtype->name_ru;
                    $bookedcourse->accommodation_jp = $accommodationtype->name_jp;
                    $bookedcourse->accommodation_it = $accommodationtype->name_it;
                    $bookedcourse->accommodation_de = $accommodationtype->name_de;
                }
            }
            //paid accommodation
            $accobookings = Accobooking::where('userId', $id)->get();
            foreach ($accobookings as $accbooking) {
                $accommodation_name = Accommodation::where('id', $accbooking->accommodationId)->first();
                if ($accbooking->typeId != null) {
                    $accommodatio_type_name = Accommodationadmintype::where('id', $accbooking->typeId)->first();
                    $accbooking->typename = $accommodatio_type_name->name;
                    $accbooking->typename_ar = $accommodatio_type_name->name_ar;
                    $accbooking->typename_ru = $accommodatio_type_name->name_ru;
                    $accbooking->typename_de = $accommodatio_type_name->name_de;
                    $accbooking->typename_fr = $accommodatio_type_name->name_fr;
                    $accbooking->typename_tr = $accommodatio_type_name->name_tr;
                    $accbooking->typename_it = $accommodatio_type_name->name_it;
                    $accbooking->typename_se = $accommodatio_type_name->name_se;
                    $accbooking->typename_es = $accommodatio_type_name->name_es;
                    $accbooking->typename_fa = $accommodatio_type_name->name_fa;
                    $accbooking->typename_fa = $accommodatio_type_name->name_pr;
                    $accbooking->typename_jp = $accommodatio_type_name->name_jp;
                } else {
                    $accbooking->typename = "";
                    $accbooking->typename_ar = "";
                    $accbooking->typename_ru = "";
                    $accbooking->typename_de = "";
                    $accbooking->typename_fr = "";
                    $accbooking->typename_tr = "";
                    $accbooking->typename_it = "";
                    $accbooking->typename_se = "";
                    $accbooking->typename_es = "";
                    $accbooking->typename_fa = "";
                    $accbooking->typename_fa = "";
                    $accbooking->typename_jp = "";
                }
                $accbooking->name = $accommodation_name->name;
                $accbooking->name_ar = $accommodation_name->name_ar;
                $accbooking->name_fa = $accommodation_name->name_fa;
                $accbooking->name_fr = $accommodation_name->name_fr;
                $accbooking->name_pr = $accommodation_name->name_pr;
                $accbooking->name_de = $accommodation_name->name_de;
                $accbooking->name_ru = $accommodation_name->name_ru;
                $accbooking->name_it = $accommodation_name->name_it;
                $accbooking->name_jp = $accommodation_name->name_jp;
                $accbooking->name_es = $accommodation_name->name_es;
                $accbooking->name_se = $accommodation_name->name_se;
                $accbooking->name_tr = $accommodation_name->name_tr;
                $accbooking->slug = $accommodation_name->slug;
            }
            //saved coures
            $savedcourses = Favcourse::join('courseprices', 'courseprices.id', '=', 'favcourses.coursePid')->join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '1')->where('schools.deactiveStatus', "0")->select('favcourses.*')->where('favcourses.userid', $id)->get();
            foreach ($savedcourses as $savedcourse) {
                $course = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', "0")->select('courseprices.*', 'schools.name as schoolName', 'schools.name_ar as schoolName_ar', 'schools.name_de as schoolName_de', 'schools.name_it as schoolName_it', 'schools.name_jp as schoolName_jp', 'schools.name_se as schoolName_se', 'schools.name_es as schoolName_es', 'schools.name_ru as schoolName_ru', 'schools.name_fr as schoolName_fr', 'schools.name_fa as schoolName_fa', 'schools.name_pr as schoolName_pr', 'schools.name_tr as schoolName_tr', 'schools.agelimit as agelimit', 'schools.registration_fee as registration_fee')->where('courseprices.id', $savedcourse->coursePid)->first();
                $coursetitle = Coursetitle::where('id', $course->courseId)->first();
                $savedcourse->name = $coursetitle->name;
                $savedcourse->name_ar = $coursetitle->name_ar;
                $savedcourse->name_it = $coursetitle->name_it;
                $savedcourse->name_pr = $coursetitle->name_pr;
                $savedcourse->name_fa = $coursetitle->name_fa;
                $savedcourse->name_fr = $coursetitle->name_fr;
                $savedcourse->name_se = $coursetitle->name_se;
                $savedcourse->name_es = $coursetitle->name_es;
                $savedcourse->name_jp = $coursetitle->name_jp;
                $savedcourse->name_de = $coursetitle->name_de;
                $savedcourse->name_ru = $coursetitle->name_ru;
                $savedcourse->name_tr = $coursetitle->name_tr;
                $savedcourse->slug = $coursetitle->slug;
                $savedcourse->description = $coursetitle->description;
                $schoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
                $savedcourse->image = $schoolimage->image;
                $school = School::where('id', $course->schoolId)->first();
                $savedcourse->age = $school->agelimit;
                $savedcourse->ppw1 = $course->ppw1;
                $schooladdress = Schooladdress::where('schoolId', $course->schoolId)->first();
                if ($schooladdress) {
                    /* Get country */
                    $data_country = $schooladdress->countryId;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $savedcourse->country = $country_code;
                    /* Get state */
                    $data_state = $schooladdress->stateId;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $savedcourse->state = $state_code;
                    /* Get City */
                    $data_city = $schooladdress->cityId;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $savedcourse->city = $city_code;
                    /* Get Postalcode */
                    $savedcourse->zipcode = $schooladdress->zipCodeId;
                } else {
                    $savedcourse->country = "";
                    $savedcourse->state = "";
                    $savedcourse->city = "";
                    $savedcourse->zipcode = "";
                }
                $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
                $count_total_reviews = count($total_review);
                $sum_reviews_fcourse = 0;
                $sum_reviews_fcourse1 = 0;
                $sum_reviews_fcourse2 = 0;
                $sum_reviews_fcourse3 = 0;
                $review_rate_fcourse = 0;
                $review_rate_fcourse1 = 0;
                $review_rate_fcourse2 = 0;
                $review_rate_fcourse3 = 0;
                foreach ($total_review as $getreviwes) {
                    $sum_reviews_fcourse = $sum_reviews_fcourse + $getreviwes->rate;
                    $sum_reviews_fcourse1 = $sum_reviews_fcourse1 + $getreviwes->rate1;
                    $sum_reviews_fcourse2 = $sum_reviews_fcourse2 + $getreviwes->rate2;
                    $sum_reviews_fcourse3 = $sum_reviews_fcourse3 + $getreviwes->rate3;
                }
                if ($count_total_reviews > 0) {
                    $review_rate_fcourse = $sum_reviews_fcourse / $count_total_reviews;
                    $review_rate_fcourse1 = $sum_reviews_fcourse1 / $count_total_reviews;
                    $review_rate_fcourse2 = $sum_reviews_fcourse2 / $count_total_reviews;
                    $review_rate_fcourse3 = $sum_reviews_fcourse3 / $count_total_reviews;
                }
                $savedcourse->count_total_reviews = $count_total_reviews;
                $savedcourse->review_rate_fcourse = $review_rate_fcourse;
                $savedcourse->review_rate_fcourse1 = $review_rate_fcourse1;
                $savedcourse->review_rate_fcourse2 = $review_rate_fcourse2;
                $savedcourse->review_rate_fcourse3 = $review_rate_fcourse3;
            }
        }
        /* Showing Saved Accomodation */
        $favaccommodations = Favaccommodation::join('accommodations', 'accommodations.id', '=', 'favaccommodations.accommodationid')->where('favaccommodations.userid', $id)->where('accommodations.status', 1)->where('accommodations.deactiveStatus', 0)->select('favaccommodations.*')->get();
        $count_fav_accomodation = count($favaccommodations);
        if ($favaccommodations->isNotEmpty()) {
            $accommodation_ids = array();
            foreach ($favaccommodations as $favaccommodation) {
                $accommodation_ids[] = $favaccommodation->accommodationid;
            }
            $accommodations = Accommodation::whereIn('id', $accommodation_ids)->get();
            foreach ($accommodations as $accommodation) {
                if ($accommodation) {
                    /* Get Postalcode */
                    if ($accommodation->country_id) {
                        $data_country = $accommodation->country_id;
                        $country_explode = explode('|', $data_country);
                        $country_code = $country_explode[1];
                        $accommodation->country = $country_code;
                    } else {
                        $accommodation->country = "";
                    }
                    /* Get state */
                    if ($accommodation->state_id) {
                        $data_state = $accommodation->state_id;
                        $state_explode = explode('|', $data_state);
                        $state_code = $state_explode[1];
                        $accommodation->state = $state_code;
                    } else {
                        $accommodation->state = "";
                    }
                    if ($accommodation->city_id) {
                        /* Get City */
                        $data_city = $accommodation->city_id;
                        $city_explode = explode('|', $data_city);
                        $city_code = $city_explode[1];
                        $accommodation->city = $city_code;
                    } else {
                        $accommodation->city = "";
                    }
                    if ($accommodation->zipcode_id) {
                        $accommodation->zipcode = $accommodation->zipcode_id;
                    } else {
                        $accommodation->zipcode = "";
                    }
                }
                $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
                $accommodation->roomtype = $roomtype->acc_type;
                $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
                $count_total_reviews = count($total_review);
                $sum_reviews = 0;
                $sum_reviews1 = 0;
                $sum_reviews2 = 0;
                $sum_reviews3 = 0;
                $review_rate = 0;
                $review_rate1 = 0;
                $review_rate2 = 0;
                $review_rate3 = 0;
                foreach ($total_review as $getreviwes) {
                    $sum_reviews = $sum_reviews + $getreviwes->rate;
                    $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                    $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                    $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                }
                if ($count_total_reviews > 0) {
                    $accommodation->review_rate = $sum_reviews / $count_total_reviews;
                    $accommodation->review_rate1 = $sum_reviews1 / $count_total_reviews;
                    $accommodation->review_rate2 = $sum_reviews2 / $count_total_reviews;
                    $accommodation->review_rate3 = $sum_reviews3 / $count_total_reviews;
                }
                $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
                if ($image) {
                    $accommodation->image = $image->image;
                } else {
                    $accommodation->image = "";
                }
            }
        } else {
            $count_fav_accomodation = 0;
        }
        return view('front/referfriend', compact('concatinate', 'get_refers', 'total_credit', 'schools', 'count_fav_school', 'bookedCourses', 'accobookings', 'savedcourses', 'accommodations', 'count_fav_accomodation'));
    }
    public function changeProfileImage(Request $request)
    {
        $user = User::find(auth::user()->id);
        if ($request->file('image')) {
            $photo = $request->file('image');
            $name = rand(1, 100);
            $name = $name . time();
            $imagename = $name . '.' . $photo->getClientOriginalExtension();
            $base_url = \URL::to('/');
            $fullurl = $base_url . '/thumbnail_images/' . $imagename;
            $destinationPath = public_path('/thumbnail_images');
            $thumb_img = Imageresize::make($photo->getRealPath())->resize(1140, 760);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $destinationPath = public_path('/normal_images');
            $photo->move($destinationPath, $imagename);
            $user->image = $fullurl;
        }
        $user->update();
        return redirect()->back();
    }
    public function edituser(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $random_number = substr(md5(uniqid(mt_rand(), true)), 0, $id);
            $concatinate = $id . '' . $random_number;
            $get_refers = Refer::where('sendinguserid', $id)->get();
            $count_refer = count($get_refers);
            $total_credit = $count_refer * 10;
            foreach ($get_refers as $get_refer) {
                $nid = $get_refer->newuserid;
                $get_users = User::where('id', $nid)->first();
                $get_refer->name = $get_users->name;
                $get_refer->email = $get_users->email;
            }
            /* Showing Saved school */
            $favschools = Favschool::Join('schools', 'schools.id', '=', 'favschools.schoolid')->where('status', 1)->where('deactiveStatus', '0')->select('favschools.*')->where('favschools.userid', $id)->get();
            $count_fav_school = count($favschools);
            if ($favschools->isNotEmpty()) {
                $school_ids = array();
                foreach ($favschools as $favschool) {
                    $school_ids[] = $favschool->schoolid;
                }
                $schools = School::whereIn('id', $school_ids)->get();
                if ($schools->isNotEmpty()) {
                    foreach ($schools as $school) {
                        $schoolimage = Schoolimage::where('schoolId', $school->id)->first();
                        $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
                        $countCourse = Course::where('schoolId', $school->id)->groupBy('schoolId')->count();
                        $school->courseCount = $countCourse;
                        $reviews = Schoolreview::where('school_id', $school->id)->get();
                        $count_total_reviews_fschool = count($reviews);
                        $school->count_total_reviews_fschool = $count_total_reviews_fschool;
                        $sum_reviews_fschool = 0;
                        $sum_reviews_fschool1 = 0;
                        $sum_reviews_fschool2 = 0;
                        $sum_reviews_fschool3 = 0;
                        $sum_reviews_fschool4 = 0;
                        $sum_reviews_fschool5 = 0;
                        foreach ($reviews as $getreviwes) {
                            $sum_reviews_fschool = $sum_reviews_fschool + $getreviwes->rate;
                            $sum_reviews_fschool1 = $sum_reviews_fschool1 + $getreviwes->rate1;
                            $sum_reviews_fschool2 = $sum_reviews_fschool2 + $getreviwes->rate2;
                            $sum_reviews_fschool3 = $sum_reviews_fschool3 + $getreviwes->rate3;
                            $sum_reviews_fschool4 = $sum_reviews_fschool4 + $getreviwes->rate4;
                            $sum_reviews_fschool5 = $sum_reviews_fschool5 + $getreviwes->rate5;
                        }
                        if ($count_total_reviews_fschool > 0) {
                            $review_rate_fschool = $sum_reviews_fschool / $count_total_reviews_fschool;
                            $review_rate_fschool1 = $sum_reviews_fschool1 / $count_total_reviews_fschool;
                            $review_rate_fschool2 = $sum_reviews_fschool2 / $count_total_reviews_fschool;
                            $review_rate_fschool3 = $sum_reviews_fschool3 / $count_total_reviews_fschool;
                            $review_rate_fschool4 = $sum_reviews_fschool4 / $count_total_reviews_fschool;
                            $review_rate_fschool5 = $sum_reviews_fschool5 / $count_total_reviews_fschool;
                            $school->review_rate_fschool = $review_rate_fschool;
                            $school->review_rate_fschool1 = $review_rate_fschool1;
                            $school->review_rate_fschool2 = $review_rate_fschool2;
                            $school->review_rate_fschool3 = $review_rate_fschool3;
                            $school->review_rate_fschool4 = $review_rate_fschool4;
                            $school->review_rate_fschool5 = $review_rate_fschool5;
                        }
                        if ($schooladdress) {
                            /* Get country */
                            $data_country = $schooladdress->countryId;
                            $country_explode = explode('|', $data_country);
                            $country_code = $country_explode[1];
                            $school->country = $country_code;
                            /* Get state */
                            $data_state = $schooladdress->stateId;
                            $state_explode = explode('|', $data_state);
                            $state_code = $state_explode[1];
                            $school->state = $state_code;
                            /* Get City */
                            $data_city = $schooladdress->cityId;
                            $city_explode = explode('|', $data_city);
                            $city_code = $city_explode[1];
                            $school->city = $city_code;
                            /* Get Postalcode */
                            $school->zipcode = $schooladdress->zipCodeId;
                        } else {
                            $school->country = "";
                            $school->state = "";
                            $school->city = "";
                            $school->zipcode = "";
                        }
                        if ($schoolimage) {
                            $school->image = $schoolimage->image;
                        } else {
                            $school->image = "";
                        }
                    }
                }
            } else {
                $count_fav_school = 0;
                $schools = 0;
            }
            $bookedCourses = Coursebooking::where('user_id', $id)->get();
            foreach ($bookedCourses as $bookedcourse) {
                $school = School::where('id', $bookedcourse->school_id)->first();
                if ($school != null) {
                    $bookedcourse->schoolname = $school->name;
                    $bookedcourse->schoolname_ar = $school->name_ar;
                    $bookedcourse->schoolname_pr = $school->name_pr;
                    $bookedcourse->schoolname_fr = $school->name_fr;
                    $bookedcourse->schoolname_fa = $school->name_fa;
                    $bookedcourse->schoolname_tr = $school->name_tr;
                    $bookedcourse->schoolname_jp = $school->name_jp;
                    $bookedcourse->schoolname_ru = $school->name_ru;
                    $bookedcourse->schoolname_es = $school->name_es;
                    $bookedcourse->schoolname_se = $school->name_se;
                    $bookedcourse->schoolname_it = $school->name_it;
                    $bookedcourse->schoolname_de = $school->name_de;
                }
                $course = Courseprice::where('courseId', $bookedcourse->course_id)->where('hours_per_week', $bookedcourse->hours_per_week)->first();
                if ($course != null) {
                    $coursetitle = Coursetitle::where('id', $course->courseId)->first();
                    if ($coursetitle != null) {
                        $bookedcourse->course_name = $coursetitle->name;
                        $bookedcourse->course_name_ar = $coursetitle->name_ar;
                        $bookedcourse->course_name_fr = $coursetitle->name_fr;
                        $bookedcourse->course_name_fa = $coursetitle->name_fa;
                        $bookedcourse->course_name_es = $coursetitle->name_es;
                        $bookedcourse->course_name_se = $coursetitle->name_se;
                        $bookedcourse->course_name_pr = $coursetitle->name_pr;
                        $bookedcourse->course_name_tr = $coursetitle->name_tr;
                        $bookedcourse->course_name_ru = $coursetitle->name_ru;
                        $bookedcourse->course_name_jp = $coursetitle->name_jp;
                        $bookedcourse->course_name_it = $coursetitle->name_it;
                        $bookedcourse->course_name_de = $coursetitle->name_de;
                    }
                }
                if ($bookedcourse->accommodation_id) {
                    $accommodationtype = Accommodationadmintype::where('id', $bookedcourse->accommodation_id)->first();
                    $bookedcourse->accommodation = $accommodationtype->name;
                    $bookedcourse->accommodation_ar = $accommodationtype->name_ar;
                    $bookedcourse->accommodation_fr = $accommodationtype->name_fr;
                    $bookedcourse->accommodation_fa = $accommodationtype->name_fa;
                    $bookedcourse->accommodation_es = $accommodationtype->name_es;
                    $bookedcourse->accommodation_se = $accommodationtype->name_se;
                    $bookedcourse->accommodation_pr = $accommodationtype->name_pr;
                    $bookedcourse->accommodation_tr = $accommodationtype->name_tr;
                    $bookedcourse->accommodation_ru = $accommodationtype->name_ru;
                    $bookedcourse->accommodation_jp = $accommodationtype->name_jp;
                    $bookedcourse->accommodation_it = $accommodationtype->name_it;
                    $bookedcourse->accommodation_de = $accommodationtype->name_de;
                }
            }
            //paid accommodation
            $accobookings = Accobooking::where('userId', $id)->get();
            foreach ($accobookings as $accbooking) {
                $accommodation_name = Accommodation::where('id', $accbooking->accommodationId)->first();
                if ($accbooking->typeId != null) {
                    $accommodatio_type_name = Accommodationadmintype::where('id', $accbooking->typeId)->first();
                    $accbooking->typename = $accommodatio_type_name->name;
                    $accbooking->typename_ar = $accommodatio_type_name->name_ar;
                    $accbooking->typename_ru = $accommodatio_type_name->name_ru;
                    $accbooking->typename_de = $accommodatio_type_name->name_de;
                    $accbooking->typename_fr = $accommodatio_type_name->name_fr;
                    $accbooking->typename_tr = $accommodatio_type_name->name_tr;
                    $accbooking->typename_it = $accommodatio_type_name->name_it;
                    $accbooking->typename_se = $accommodatio_type_name->name_se;
                    $accbooking->typename_es = $accommodatio_type_name->name_es;
                    $accbooking->typename_fa = $accommodatio_type_name->name_fa;
                    $accbooking->typename_fa = $accommodatio_type_name->name_pr;
                    $accbooking->typename_jp = $accommodatio_type_name->name_jp;
                } else {
                    $accbooking->typename = "";
                    $accbooking->typename_ar = "";
                    $accbooking->typename_ru = "";
                    $accbooking->typename_de = "";
                    $accbooking->typename_fr = "";
                    $accbooking->typename_tr = "";
                    $accbooking->typename_it = "";
                    $accbooking->typename_se = "";
                    $accbooking->typename_es = "";
                    $accbooking->typename_fa = "";
                    $accbooking->typename_fa = "";
                    $accbooking->typename_jp = "";
                }
                $accbooking->name = $accommodation_name->name;
                $accbooking->name_ar = $accommodation_name->name_ar;
                $accbooking->name_fa = $accommodation_name->name_fa;
                $accbooking->name_fr = $accommodation_name->name_fr;
                $accbooking->name_pr = $accommodation_name->name_pr;
                $accbooking->name_de = $accommodation_name->name_de;
                $accbooking->name_ru = $accommodation_name->name_ru;
                $accbooking->name_it = $accommodation_name->name_it;
                $accbooking->name_jp = $accommodation_name->name_jp;
                $accbooking->name_es = $accommodation_name->name_es;
                $accbooking->name_se = $accommodation_name->name_se;
                $accbooking->name_tr = $accommodation_name->name_tr;
                $accbooking->slug = $accommodation_name->slug;
            }
            /* Showing Saved Accomodation */
            $favaccommodations = Favaccommodation::join('accommodations', 'accommodations.id', '=', 'favaccommodations.accommodationid')->where('favaccommodations.userid', $id)->where('accommodations.status', 1)->where('accommodations.deactiveStatus', 0)->select('favaccommodations.*')->get();
            $count_fav_accomodation = count($favaccommodations);
            if ($favaccommodations->isNotEmpty()) {
                $accommodation_ids = array();
                foreach ($favaccommodations as $favaccommodation) {
                    $accommodation_ids[] = $favaccommodation->accommodationid;
                }
                $accommodations = Accommodation::whereIn('id', $accommodation_ids)->get();
                foreach ($accommodations as $accommodation) {
                    if ($accommodation) {
                        /* Get Postalcode */
                        if ($accommodation->country_id) {
                            $data_country = $accommodation->country_id;
                            $country_explode = explode('|', $data_country);
                            $country_code = $country_explode[1];
                            $accommodation->country = $country_code;
                        } else {
                            $accommodation->country = "";
                        }
                        /* Get state */
                        if ($accommodation->state_id) {
                            $data_state = $accommodation->state_id;
                            $state_explode = explode('|', $data_state);
                            $state_code = $state_explode[1];
                            $accommodation->state = $state_code;
                        } else {
                            $accommodation->state = "";
                        }
                        if ($accommodation->city_id) {
                            /* Get City */
                            $data_city = $accommodation->city_id;
                            $city_explode = explode('|', $data_city);
                            $city_code = $city_explode[1];
                            $accommodation->city = $city_code;
                        } else {
                            $accommodation->city = "";
                        }
                        if ($accommodation->zipcode_id) {
                            $accommodation->zipcode = $accommodation->zipcode_id;
                        } else {
                            $accommodation->zipcode = "";
                        }
                    }
                    $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
                    $accommodation->roomtype = $roomtype->acc_type;
                    $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
                    $count_total_reviews = count($total_review);
                    $sum_reviews = 0;
                    $sum_reviews1 = 0;
                    $sum_reviews2 = 0;
                    $sum_reviews3 = 0;
                    $review_rate = 0;
                    $review_rate1 = 0;
                    $review_rate2 = 0;
                    $review_rate3 = 0;
                    foreach ($total_review as $getreviwes) {
                        $sum_reviews = $sum_reviews + $getreviwes->rate;
                        $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                        $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                        $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                    }
                    if ($count_total_reviews > 0) {
                        $accommodation->review_rate = $sum_reviews / $count_total_reviews;
                        $accommodation->review_rate1 = $sum_reviews1 / $count_total_reviews;
                        $accommodation->review_rate2 = $sum_reviews2 / $count_total_reviews;
                        $accommodation->review_rate3 = $sum_reviews3 / $count_total_reviews;
                    }
                    $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
                    if ($image) {
                        $accommodation->image = $image->image;
                    } else {
                        $accommodation->image = "";
                    }
                }
            } else {
                $count_fav_accomodation = 0;
                $accommodations = 0;
            }
            //saved coures
            $savedcourses = Favcourse::join('courseprices', 'courseprices.id', '=', 'favcourses.coursePid')->join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '1')->where('schools.deactiveStatus', "0")->select('favcourses.*')->where('favcourses.userid', $id)->get();
            foreach ($savedcourses as $savedcourse) {
                $course = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', "0")->select('courseprices.*', 'schools.name as schoolName', 'schools.name_ar as schoolName_ar', 'schools.name_de as schoolName_de', 'schools.name_it as schoolName_it', 'schools.name_jp as schoolName_jp', 'schools.name_se as schoolName_se', 'schools.name_es as schoolName_es', 'schools.name_ru as schoolName_ru', 'schools.name_fr as schoolName_fr', 'schools.name_fa as schoolName_fa', 'schools.name_pr as schoolName_pr', 'schools.name_tr as schoolName_tr', 'schools.agelimit as agelimit', 'schools.registration_fee as registration_fee')->where('courseprices.id', $savedcourse->coursePid)->first();
                $coursetitle = Coursetitle::where('id', $course->courseId)->first();
                $savedcourse->name = $coursetitle->name;
                $savedcourse->name_ar = $coursetitle->name_ar;
                $savedcourse->name_it = $coursetitle->name_it;
                $savedcourse->name_pr = $coursetitle->name_pr;
                $savedcourse->name_fa = $coursetitle->name_fa;
                $savedcourse->name_fr = $coursetitle->name_fr;
                $savedcourse->name_se = $coursetitle->name_se;
                $savedcourse->name_es = $coursetitle->name_es;
                $savedcourse->name_jp = $coursetitle->name_jp;
                $savedcourse->name_de = $coursetitle->name_de;
                $savedcourse->name_ru = $coursetitle->name_ru;
                $savedcourse->name_tr = $coursetitle->name_tr;
                $savedcourse->slug = $coursetitle->slug;
                $savedcourse->description = $coursetitle->description;
                $schoolimage = Schoolimage::where('schoolId', $course->schoolId)->first();
                $savedcourse->image = $schoolimage->image;
                $school = School::where('id', $course->schoolId)->first();
                $savedcourse->age = $school->agelimit;
                $savedcourse->ppw1 = $course->ppw1;
                $schooladdress = Schooladdress::where('schoolId', $course->schoolId)->first();
                if ($schooladdress) {
                    /* Get country */
                    $data_country = $schooladdress->countryId;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $savedcourse->country = $country_code;
                    /* Get state */
                    $data_state = $schooladdress->stateId;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $savedcourse->state = $state_code;
                    /* Get City */
                    $data_city = $schooladdress->cityId;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $savedcourse->city = $city_code;
                    /* Get Postalcode */
                    $savedcourse->zipcode = $schooladdress->zipCodeId;
                } else {
                    $savedcourse->country = "";
                    $savedcourse->state = "";
                    $savedcourse->city = "";
                    $savedcourse->zipcode = "";
                }
                $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
                $count_total_reviews = count($total_review);
                $sum_reviews_fcourse = 0;
                $sum_reviews_fcourse1 = 0;
                $sum_reviews_fcourse2 = 0;
                $sum_reviews_fcourse3 = 0;
                $review_rate_fcourse = 0;
                $review_rate_fcourse1 = 0;
                $review_rate_fcourse2 = 0;
                $review_rate_fcourse3 = 0;
                foreach ($total_review as $getreviwes) {
                    $sum_reviews_fcourse = $sum_reviews_fcourse + $getreviwes->rate;
                    $sum_reviews_fcourse1 = $sum_reviews_fcourse1 + $getreviwes->rate1;
                    $sum_reviews_fcourse2 = $sum_reviews_fcourse2 + $getreviwes->rate2;
                    $sum_reviews_fcourse3 = $sum_reviews_fcourse3 + $getreviwes->rate3;
                }
                if ($count_total_reviews > 0) {
                    $review_rate_fcourse = $sum_reviews_fcourse / $count_total_reviews;
                    $review_rate_fcourse1 = $sum_reviews_fcourse1 / $count_total_reviews;
                    $review_rate_fcourse2 = $sum_reviews_fcourse2 / $count_total_reviews;
                    $review_rate_fcourse3 = $sum_reviews_fcourse3 / $count_total_reviews;
                }
                $savedcourse->count_total_reviews = $count_total_reviews;
                $savedcourse->review_rate_fcourse = $review_rate_fcourse;
                $savedcourse->review_rate_fcourse1 = $review_rate_fcourse1;
                $savedcourse->review_rate_fcourse2 = $review_rate_fcourse2;
                $savedcourse->review_rate_fcourse3 = $review_rate_fcourse3;
            }
            $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
            $api = "http://battuta.medunes.net/api/country/all/?key=$battuta_key";
            $response = file_get_contents($api);
            $countries = json_decode($response);
        }
        return view('front/edituser', compact('schools', 'concatinate', 'get_refers', 'total_credit', 'countries', 'count_fav_school', 'bookedCourses', 'accobookings', 'savedcourses', 'accommodations', 'count_fav_accomodation'));
    }
    public function updateUserInfo(Request $request)
    {
        $userId = $request->userid;
        $user = User::find($userId);
        $date = date("Y-m-d", strtotime($request->dob));
        if ($user) {
            $user->name = $request->firstname . ' ' . $request->lastname;
            $user->email = $request->email;
            if (($request->password != '') && ($request->password == $request->rpassword))
                $user->password = Hash::make($request->password);
            $user->update();
            $userinfoexist = Userinfo::where('userId', $userId)->first();
            if ($userinfoexist) {
                $userinfo = Userinfo::find($userinfoexist->id);
                $userinfo->userId = $userId;
                $userinfo->dob = $date;
                $userinfo->phone = $request->phone;
                $userinfo->address = (isset($request->address) ? $request->address : '');
                $userinfo->language = (isset($request->language) ? $request->lanuage : '');
                $userinfo->currency = (isset($request->currency) ? $request->currency : '');
                $userinfo->country = (isset($request->countryId) ? $request->countryId : '');
                if (isset($request->countryId)) {
                    Coursebooking::where('user_id', $userId)->update(array('country' => $request->countryId));
                }
                $userinfo->update();
                return redirect()->back();
            } else {
                $userinfo = new Userinfo;
                $userinfo->userId = $userId;
                $userinfo->dob = $date;
                $userinfo->phone = $request->phone;
                $userinfo->address = (isset($request->address) ? $request->address : '');
                $userinfo->language = (isset($request->language) ? $request->lanuage : '');
                $userinfo->currency = (isset($request->currency) ? $request->currency : '');
                $userinfo->country = (isset($request->countryId) ? $request->countryId : '');
                $userinfo->save();
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function homeSearch(Request $request)
    {
        $searchbudget = $request->budget;
        $searchcity = $request->city;
        $coursetype = $request->search_course;
        $courselength = $request->search_length;
        $clength = 'courseprices.' . $courselength;
        $cprice = $clength . ' as price';
        if (empty($searchbudget) && empty($searchcity) && empty($coursetype) && empty($courselength)) {
            return back();
        }
        if (!empty($courselength) && empty($searchbudget) && empty($searchcity) && empty($coursetype)) {
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where($clength, '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (!empty($searchbudget) && empty($searchcity) && empty($coursetype) && empty($courselength)) {
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where('courseprices.ppw1', '<=', $searchbudget)->where('courseprices.ppw1', '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (!empty($searchbudget) && empty($searchcity) && empty($coursetype) && !empty($courselength)) {
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where($clength, '<=', $searchbudget)->where($clength, '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (empty($searchbudget) && !empty($searchcity) && empty($coursetype) && empty($courselength)) {
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (empty($searchbudget) && !empty($searchcity) && empty($coursetype) && !empty($courselength)) {
            $length = 'cou.' . $courselength;
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where($length, '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (!empty($searchbudget) && !empty($searchcity) && empty($coursetype) && empty($courselength)) {
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where('cou.ppw1', '<=', $searchbudget)
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (!empty($searchbudget) && !empty($searchcity) && empty($coursetype) && !empty($courselength)) {
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where('cou.ppw1', '<=', $searchbudget)
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (empty($searchbudget) && !empty($coursetype) && empty($searchcity) && empty($courselength)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'coursetitles.name';
            } else {
                $cu_title = 'coursetitles.name_' . $locale;
            }
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where($cu_title, 'LIKE', '%' . $coursetype . '%')->where('courseprices.ppw1', '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (empty($searchbudget) && !empty($coursetype) && empty($searchcity) && !empty($courselength)) {
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where('coursetitles.name', 'LIKE', '%' . $coursetype . '%')->where($clength, '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (!empty($searchbudget) && !empty($coursetype) && empty($searchcity)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'coursetitles.name';
            } else {
                $cu_title = 'coursetitles.name_' . $locale;
            }
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where($cu_title, 'LIKE', '%' . $coursetype . '%')->where('courseprices.ppw1', '<=', $searchbudget)->where('courseprices.ppw1', '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (!empty($searchbudget) && !empty($coursetype) && empty($searchcity) && !empty($courselength)) {
            $courses = Courseprice::join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', '=', '1')->where('schools.deactiveStatus', "0")->join('coursetitles', 'courseprices.courseId', '=', 'coursetitles.id')->where('coursetitles.name', 'LIKE', '%' . $coursetype . '%')->where($clength, '<=', $searchbudget)->where($clength, '>', 0)->select('schoolId', 'courseId', DB::raw('min(ppw1) as price'))->groupBy('schoolId', 'courseId')->paginate(12);
        }
        if (empty($searchbudget) && !empty($coursetype) && !empty($searchcity) && empty($courselength)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'cot.name';
            } else {
                $cu_title = 'cot.name_' . $locale;
            }
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where($cu_title, 'LIKE', '%' . $coursetype . '%')
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (empty($searchbudget) && !empty($coursetype) && !empty($searchcity) && !empty($courselength)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'cot.name';
            } else {
                $cu_title = 'cot.name_' . $locale;
            }
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where($cu_title, 'LIKE', '%' . $coursetype . '%')
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (!empty($searchbudget) && !empty($coursetype) && !empty($searchcity) && empty($courselength)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'cot.name';
            } else {
                $cu_title = 'cot.name_' . $locale;
            }
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where($cu_title, 'LIKE', '%' . $coursetype . '%')
                ->where('cou.ppw1', '<=', $searchbudget)
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        if (!empty($searchbudget) && !empty($coursetype) && !empty($searchcity) && !empty($courselength)) {
            $locale = app()->getLocale();
            if ($locale == 'en') {
                $cu_title = 'cot.name';
            } else {
                $cu_title = 'cot.name_' . $locale;
            }
            $courses = DB::table('courseprices as cou')
                ->join('schools as sch', 'sch.id', '=', 'cou.schoolId')
                ->join('schooladdresses as sca', 'sca.schoolId', '=', 'cou.schoolId')
                ->join('coursetitles as cot', 'cou.courseId', '=', 'cot.id')
                ->where('sch.status', '=', '1')
                ->where('sch.deactiveStatus', "0")
                ->where('sca.cityId', $searchcity)
                ->where($cu_title, 'LIKE', '%' . $coursetype . '%')
                ->where('cou.ppw1', '<=', $searchbudget)
                ->where('cou.ppw1', '>', 0)
                ->select('cou.schoolId', 'cou.courseId', DB::raw('min(ppw1) as price'))
                ->groupBy('cou.schoolId', 'cou.courseId')
                ->paginate(12);
        }
        foreach ($courses as $course) {
            /* Get course Id  */
            $getCourseId = Courseprice::where('schoolId', $course->schoolId)->where('courseId', $course->courseId)->where('ppw1', $course->price)->first();
            $course->id = $getCourseId->id;
            $course->hours_per_week = $getCourseId->hours_per_week;
            $getTitleSlug = Coursetitle::where('id', $course->courseId)->first();
            $course->slug = $getTitleSlug->id;
            $course->name = $getTitleSlug->name;
            $course->name_tr = $getTitleSlug->name_tr;
            $course->name_ar = $getTitleSlug->name_ar;
            $course->name_de = $getTitleSlug->name_de;
            $course->name_it = $getTitleSlug->name_it;
            $course->name_fr = $getTitleSlug->name_fr;
            $course->name_es = $getTitleSlug->name_es;
            $course->name_se = $getTitleSlug->name_se;
            $course->name_jp = $getTitleSlug->name_jp;
            $course->name_fa = $getTitleSlug->name_fa;
            $course->name_pr = $getTitleSlug->name_pr;
            $total_review = Coursereview::where('school_id', $course->schoolId)->where('course_id', $course->courseId)->get();
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $sum_reviews1 = 0;
            $sum_reviews2 = 0;
            $sum_reviews3 = 0;
            $review_rate = 0;
            $review_rate1 = 0;
            $review_rate2 = 0;
            $review_rate3 = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
                $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
                $review_rate1 = $sum_reviews1 / $count_total_reviews;
                $review_rate2 = $sum_reviews2 / $count_total_reviews;
                $review_rate3 = $sum_reviews3 / $count_total_reviews;
            }
            $course->count_total_reviews = $count_total_reviews;
            $course->review_rate = $review_rate;
            $course->review_rate1 = $review_rate1;
            $course->review_rate2 = $review_rate2;
            $course->review_rate3 = $review_rate3;
        }
        return view('front/course', compact('courses'));
    }
    public function citySchool(Request $request)
    {
        $schools = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', "0")->where('schooladdresses.cityId', $request->cityId)->get();
        foreach ($schools as $school) {
            $sch = School::find($school->id);
            $school->courses = $sch->courses;
            $school->reviews = $sch->reviews;
        }
        $countschool = count($schools);
        $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', '0')->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $request->cityId)->get();
        $countcourse = count($course);

        $popularCities = TopCity::orderBy('id', 'desc')->get()->take(3);
        foreach ($popularCities as $city) {
            $cityId = explode('|', $city->city_name);
            $cityname = $cityId[1];
            $city->cityname = $cityname;
            $school = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', 0)->where('schooladdresses.cityId', $city->city_name)->get();
            $countschool = count($school);
            $city->schoolcount = $countschool;

            $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', "1")->where('schools.deactiveStatus', "0")->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $city->city_name)->get();
            $countcourse = count($course);
            $city->coursecount = $countcourse;
        }

        $cityId = explode('|', $request->cityId);
        $cityname = $cityId[1];
        // echo '<pre>';
        // print_r($schools->toArray());
        // die;
        return view('front/cityschool_new', compact('schools', 'cityname', 'popularCities'));
    }
    public function allCitySchool(Request $request)
    {
        $topcities = TopCity::orderBy('id', 'desc')->paginate(12);
        foreach ($topcities as $city) {
            $cityId = explode('|', $city->city_name);
            $cityname = $cityId[1];
            $city->cityname = $cityname;
            $schools = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', "0")->where('schooladdresses.cityId', $city->city_name)->get();
            foreach ($schools as $school) {
                $sch = School::find($school->id);
                $school->courses = $sch->courses;
                $school->reviews = $sch->reviews;
            }
            $city->schools = $schools;
            $countschool = count($schools);
            $city->schoolcount = $countschool;
            if ($countschool > 0) {
                $schoolimage = Schoolimage::Join('schooladdresses', 'schooladdresses.schoolId', '=', 'schoolimages.schoolId')->where('schooladdresses.cityId', $city->city_name)->first();
                if ($schoolimage != null) {
                    $city->image = $schoolimage->image;
                }
            } else {
                $city->image = "";
            }
            $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('status', '1')->where('deactiveStatus', '0')->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $city->city_name)->get();
            $countcourse = count($course);
            $city->coursecount = $countcourse;
            $city->course = $course;
        }

        $popularCities = TopCity::orderBy('id', 'desc')->get();
        foreach ($popularCities as $city) {
            $cityId = explode('|', $city->city_name);
            $cityname = $cityId[1];
            $city->cityname = $cityname;
            $school = Schooladdress::join('schools', 'schools.id', '=', 'schooladdresses.schoolId')->where('schools.status', 1)->where('schools.deactiveStatus', 0)->where('schooladdresses.cityId', $city->city_name)->get();
            $countschool = count($school);
            $city->schoolcount = $countschool;

            $course = Courseprice::Join('schools', 'schools.id', '=', 'courseprices.schoolId')->where('schools.status', "1")->where('schools.deactiveStatus', "0")->Join('schooladdresses', 'schooladdresses.schoolId', '=', 'courseprices.schoolId')->where('schooladdresses.cityId', $city->city_name)->get();
            $countcourse = count($course);
            $city->coursecount = $countcourse;
        }
        return view('front/allcityschool_new', compact('topcities', 'popularCities'));
    }
    public function mm(Request $request)
    {
        $acc_type = $request->acc_type;
        $accid = $request->accid;
        $typeid = $request->typeid;
        $pricetype = $request->pricetype;
        if ($acc_type == 'independent') {
            $price = Accommodationprice::where('accommodation_id', $accid)->where('acc_type', $acc_type)->first();
        } else {
            $price = Accommodationprice::where('accommodation_id', $accid)->where('typeid', $typeid)->where('acc_type', $acc_type)->first();
        }
        if ($pricetype == 'price') {
            $newprice = number_format((float) $price->price, 2, '.', '');
        } elseif ($pricetype == 'pricewith') {
            $newprice = number_format((float) $price->pricewith, 2, '.', '');
        }
        $available = $price->available;
        return json_encode(array($newprice, $available));
    }
    public function subscribe(Request $request)
    {
        if (!Newsletter::isSubscribed($request->user_email)) {
            $abc = Newsletter::subscribe($request->user_email);
            if ($abc) {
                return redirect()->back()->with('success', 'You Have Been Successfully Subscribed!');
            } else {
                return redirect()->back()->with('failure', 'Something Went Wrong!');
            }
        } else {
            return redirect()->back()->with('info', 'Already Subscribed!');
        }
    }
    public function accommodationSearch(Request $request)
    {
        $city = $request->city;
        $address = $request->address;
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $name = "name";
        } elseif ($locale == 'tr') {
            $name = "name_tr";
        } elseif ($locale == 'ar') {
            $name = "name_ar";
        } elseif ($locale == 'ru') {
            $name = "name_ru";
        } elseif ($locale == 'de') {
            $name = "name_de";
        } elseif ($locale == 'it') {
            $name = "name_it";
        } elseif ($locale == 'fr') {
            $name = "name_fr";
        } elseif ($locale == 'es') {
            $name = "name_es";
        } elseif ($locale == 'se') {
            $name = "name_se";
        } elseif ($locale == 'jp') {
            $name = "name_jp";
        } elseif ($locale == 'fa') {
            $name = "name_fa";
        } elseif ($locale == 'pr') {
            $name = "name_pr";
        }
        $type = $request->accType;
        if (!empty($city) && empty($address) && empty($type)) {
            $accommodations = Accommodation::where('city_id', 'LIKE', '%' . $city . '%')->where('status', 1)->paginate(10);
        }
        if (empty($city) && !empty($address) && empty($type)) {
            $accommodations = Accommodation::where($name, $address)->where('status', 1)->paginate(10);
        }
        if (empty($city) && empty($address) && !empty($type)) {
            $accommodations = Accommodation::join('accommodationprices', 'accommodations.id', '=', 'accommodationprices.accommodation_id')->where('accommodationprices.acc_type', $type)->where('accommodations.status', 1)->select('accommodations.*')->distinct()->paginate(10);
        }
        if (empty($city) && empty($address) && empty($type)) {
            $accommodations = Accommodation::where('status', 1)->paginate(10);
        }
        if (!empty($city) && !empty($address) && empty($type)) {
            $accommodations = Accommodation::where('accommodations.status', 1)->where('accommodations.' . $name, $address)->where('accommodations.city_id', 'LIKE', '%' . $city . '%')->paginate(10);
        }
        if (!empty($city) && empty($address) && !empty($type)) {
            $accommodations = Accommodation::join('accommodationprices', 'accommodations.id', '=', 'accommodationprices.accommodation_id')->where('accommodations.status', 1)->where('accommodations.city_id', 'LIKE', '%' . $city . '%')->where('accommodationprices.acc_type', $type)->select('accommodations.*')->distinct()->paginate(10);
        }
        if (empty($city) && !empty($address) && !empty($type)) {
            $accommodations = Accommodation::join('accommodationprices', 'accommodations.id', '=', 'accommodationprices.accommodation_id')->where('accommodations.status', 1)->where('accommodations.' . $name, $address)->where('accommodationprices.acc_type', $type)->select('accommodations.*')->distinct()->paginate(10);
        }
        if (!empty($city) && !empty($address) && !empty($type)) {
            $accommodations = Accommodation::join('accommodationprices', 'accommodations.id', '=', 'accommodationprices.accommodation_id')->where('accommodations.status', 1)->where('accommodations.' . $name, $address)->where('accommodations.city_id', 'LIKE', '%' . $city . '%')->where('accommodationprices.acc_type', $type)->select('accommodations.*')->distinct()->paginate(10);
        }
        foreach ($accommodations as $accommodation) {
            if ($accommodation) {
                /* Get Postalcode */
                if ($accommodation->country_id) {
                    $data_country = $accommodation->country_id;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $accommodation->country = $country_code;
                } else {
                    $accommodation->country = "";
                }
                /* Get state */
                if ($accommodation->state_id) {
                    $data_state = $accommodation->state_id;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $accommodation->state = $state_code;
                } else {
                    $accommodation->state = "";
                }
                if ($accommodation->city_id) {
                    /* Get City */
                    $data_city = $accommodation->city_id;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $accommodation->city = $city_code;
                } else {
                    $accommodation->city = "";
                }
                if ($accommodation->zipcode_id) {
                    $accommodation->zipcode = $accommodation->zipcode_id;
                } else {
                    $accommodation->zipcode = "";
                }
            }
            $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
            $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
            $accommodation->roomtype = $roomtype->acc_type;
            $count_total_reviews = count($total_review);
            $sum_reviews = 0;
            $review_rate = 0;
            foreach ($total_review as $getreviwes) {
                $sum_reviews = $sum_reviews + $getreviwes->rate;
            }
            if ($count_total_reviews > 0) {
                $review_rate = $sum_reviews / $count_total_reviews;
            }
            $accommodation->count_total_reviews = $count_total_reviews;
            $accommodation->review_rate = $review_rate;
            $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
            if ($image) {
                $accommodation->image = $image->image;
            } else {
                $accommodation->image = "";
            }
        }
        return view('front/accommodation', compact('accommodations'));
    }
    public function generatePDF(Request $request)
    {
        $id = $request->id;
        $bookedcourse = Coursebooking::where('id', $id)->first();
        $school = School::where('id', $bookedcourse->school_id)->first();
        $bookedcourse->slug = $school->slug;
        $bookedcourse->schoolname = $school->name;
        $bookedcourse->email = $school->email;
        $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
        if ($schooladdress) {
            /* Get country */
            $data_country = $schooladdress->countryId;
            $country_explode = explode('|', $data_country);
            $country_code = $country_explode[1];
            $bookedcourse->country = $country_code;
            /* Get state */
            $data_state = $schooladdress->stateId;
            $state_explode = explode('|', $data_state);
            $state_code = $state_explode[1];
            $bookedcourse->state = $state_code;
            /* Get City */
            $data_city = $schooladdress->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[1];
            $bookedcourse->city = $city_code;
            /* Get Postalcode */
            $bookedcourse->zipcode = $schooladdress->zipCodeId;
        } else {
            $bookedcourse->country = "";
            $bookedcourse->state = "";
            $bookedcourse->city = "";
            $bookedcourse->zipcode = "";
        }
        // $course = Courseprice::where('courseId', $bookedcourse->course_id)->where('hours_per_week', $bookedcourse->hours_per_week)->first();
        // $coursetitle = Coursetitle::where('id', $course->courseId)->first();
        $coursetitle = Coursetitle::where('id', $bookedcourse->course_id)->first();
        $bookedcourse->course_name = $coursetitle->name;
        if ($bookedcourse->accommodation_id) {
            $accommodationtype = Accommodationadmintype::where('id', $bookedcourse->accommodation_id)->first();
            $bookedcourse->accommodation = $accommodationtype->name;
        }
        $transport = Schooltransport::where('id', $bookedcourse->transport_id)->first();
        if ($transport) {
            $bookedcourse->airport = $transport->airport_name;
        }
        $insurence = Schoolinsurance::where('id', $bookedcourse->ins_id)->first();
        if ($insurence) {
            $insurenceid = $insurence->insurence_id;
            $getinsurence = Insurance::where('id', $insurenceid)->first();
            $bookedcourse->insurance_name = $getinsurence->name;
        }
        $visa = Schoolvisa::where('id', $bookedcourse->visa_id)->first();
        if ($visa) {
            $visaid = $visa->visa_id;
            $getvisa = Visa::where('id', $visaid)->first();
            $bookedcourse->visa_name = $getvisa->name;
        }
        $customPaper = array(0, 0, 720, 900);
        $pdf = PDF::loadView('myPDF', compact('bookedcourse'))->setPaper($customPaper, 'A4');
        return $pdf->download('bookedcourse.pdf');
    }
    public function generateAccPDF(Request $request)
    {
        $id = $request->id;
        $bookedaccommodation = Accobooking::where('id', $request->id)->first();
        $accommodation = Accommodation::where('id', $bookedaccommodation->accommodationId)->first();
        $bookedaccommodation->name = $accommodation->name;
        $bookedaccommodation->email = $accommodation->email;
        /* api used to get all countries */
        $data_country = $accommodation->country_id;
        $country_explode = explode('|', $data_country);
        $country_code = $country_explode[1];
        $bookedaccommodation->country = $country_code;
        /* api used to get all states */
        $data_state = $accommodation->state_id;
        $state_explode = explode('|', $data_state);
        $state_country_code = $state_explode[0];
        $state_code = $state_explode[1];
        $bookedaccommodation->state = $state_code;
        /* api used to get all states */
        $data_city = $accommodation->city_id;
        $city_explode = explode('|', $data_city);
        $city_code = $city_explode[0];
        $bookedaccommodation->city = $city_code;
        if ($bookedaccommodation->typeId) {
            $accommodatio_type_name = Accommodationadmintype::where('id', $bookedaccommodation->typeId)->first();
            $bookedaccommodation->typename = $accommodatio_type_name->name;
        } else {
            $bookedaccommodation->typename = "";
        }
        $customPaper = array(0, 0, 720, 800);
        $pdf = PDF::loadView('accommodationpdf', compact('bookedaccommodation'))->setPaper($customPaper, 'portrait');
        return $pdf->download('bookedaccommodation.pdf');
    }
    public function insuranceList(Request $request)
    {
        $insurancelist = Insurance::all();
        return view('front/insurancelist', compact('insurancelist'));
    }
    public function visaList(Request $request)
    {
        $visalist = Visa::all();
        return view('front/visaslist', compact('visalist'));
    }
    public function insurancedetail(Request $request)
    {
        $insurancedetail = Insurance::where('id', $request->id)->first();
        $insurancelist = Insurance::all();
        return view('front/insurancedetail', compact('insurancedetail', 'insurancelist'));
    }
    public function visadetail(Request $request)
    {
        $visadetail = Visa::where('id', $request->id)->first();
        $visalist = Visa::all();
        return view('front/visadetail', compact('visadetail', 'visalist'));
    }
    public function set(Request $request)
    {
        $lan = $request->lan;
        switch ($lan) {
            case 'English':
                $lang = 'en';
                break;
            case 'Arabic':
                $lang = 'ar';
                break;
            case 'Russian':
                $lang = 'ru';
                break;
            case 'German':
                $lang = 'de';
                break;
            case 'Italy':
                $lang = 'it';
                break;
            case 'Franch':
                $lang = 'fr';
                break;
            case 'Turkish':
                $lang = 'tr';
                break;
            default:
                $lang = 'en';
        }
        session(['lang' => $lang]);
        return redirect()->back();
    }

    public function schoolSelects(Request $request)
    {
        if (!$request->ajax()) {
            return "not ajax";
        }

        $schoolId = $request->schoolId;
        $school = School::find($schoolId);
        $courses = Courseprice::where('schoolId', $schoolId)->select('courseId')->distinct()->get();
        if ($courses->isNotEmpty()) {
            foreach ($courses as $course) {
                $coursetitles = Coursetitle::where('id', $course->courseId)->get();
                foreach ($coursetitles as $coursetitle) {
                    $course->course_title = $coursetitle->name;
                    $course->course_slug = $coursetitle->slug;
                }
                $course_hours_per_week = [];
                $hours_p_ws = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->get();
                foreach ($hours_p_ws as $hours_p_w) {
                    $course_hours_per_week[] = $hours_p_w->hours_per_week;
                }
                $course->ppw1 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw1')->get()->first()->ppw1;
                $course->ppw2 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw2')->get()->first()->ppw2;
                $course->ppw3 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw3')->get()->first()->ppw3;
                $course->ppw4 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw4')->get()->first()->ppw4;
                $course->ppw5 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw5')->get()->first()->ppw5;
                $course->ppw6 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw6')->get()->first()->ppw6;
                $course->ppw7 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw7')->get()->first()->ppw7;
                $course->ppw8 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw8')->get()->first()->ppw8;
                $course->ppw9 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw9')->get()->first()->ppw9;
                $course->ppw10 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw10')->get()->first()->ppw10;
                $course->ppw11 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw11')->get()->first()->ppw11;
                $course->ppw12 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw12')->get()->first()->ppw12;
                $course->ppw13 = Courseprice::where('courseId', $course->courseId)->where('schoolId', $schoolId)->select('ppw13')->get()->first()->ppw13;
                $course->course_hours_per_week = $course_hours_per_week;
                $total_review_courses = Coursereview::where('school_id', $schoolId)->where('course_id', $course->courseId)->get();
                $count_total_reviews_courses = count($total_review_courses);
                $sum_reviews_courses = 0;
                $sum_reviews_courses1 = 0;
                $sum_reviews_courses2 = 0;
                $sum_reviews_courses3 = 0;
                $review_rate_courses = 0;
                $review_rate_courses1 = 0;
                $review_rate_courses2 = 0;
                $review_rate_courses3 = 0;
                foreach ($total_review_courses as $getreviwes_courses) {
                    $sum_reviews_courses = $sum_reviews_courses + $getreviwes_courses->rate;
                    $sum_reviews_courses1 = $sum_reviews_courses1 + $getreviwes_courses->rate1;
                    $sum_reviews_courses2 = $sum_reviews_courses2 + $getreviwes_courses->rate2;
                    $sum_reviews_courses3 = $sum_reviews_courses3 + $getreviwes_courses->rate3;
                }
                if ($count_total_reviews_courses > 0) {
                    $review_rate_courses = $sum_reviews_courses / $count_total_reviews_courses;
                    $review_rate_courses1 = $sum_reviews_courses1 / $count_total_reviews_courses;
                    $review_rate_courses2 = $sum_reviews_courses2 / $count_total_reviews_courses;
                    $review_rate_courses3 = $sum_reviews_courses3 / $count_total_reviews_courses;
                }
                $course->count_total_reviews_courses = $count_total_reviews_courses;
                $course->review_rate_courses = $review_rate_courses;
                $course->review_rate_courses1 = $review_rate_courses1;
                $course->review_rate_courses2 = $review_rate_courses2;
                $course->review_rate_courses3 = $review_rate_courses3;
                $discount = Coursediscount::where('course_id', $course->courseId)->where('school_id', $schoolId)->get()->first();
                if ($discount) {
                    $course->discount = $discount->discount;
                } else {
                    $course->discount = 0;
                }
            }
        }

        $accommodations = Schoolaccommodationprice::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodationprices.accommodation_id')->where('schoolaccommodationprices.school_id', $schoolId)->select('schoolaccommodationprices.*', 'accommodationadmintypes.name as typeName')->get();
        /* Get school Insurence */
        $insurances = Schoolinsurance::join('insurances', 'insurances.id', '=', 'schoolinsurances.insurence_id')->where('schoolinsurances.school_id', $schoolId)->select('schoolinsurances.*', 'insurances.*')->get();
        /* Get school Visa */
        $visas = Schoolvisa::join('visas', 'visas.id', '=', 'schoolvisas.visa_id')->where('schoolvisas.school_id', $schoolId)->select('schoolvisas.*', 'visas.*')->get();

        $transports = Schooltransport::where('school_id', $schoolId)->get();

        if ($accommodations->isNotEmpty()) {
            foreach ($accommodations as $accommodation) {
                $accommodation_name = Accommodation::where('id', $accommodation->accommodation_id)->first();
                if ($accommodation_name) {
                    $accommodation->slug = $accommodation_name->slug;
                }
            }
        }

        $selects = view('front/ajax-blades/courseCalculatorFields', compact('school', 'courses', 'accommodations', 'insurances', 'visas', 'transports'))->render();
        $calculations = view('front/ajax-blades/courseCalculatorCalculations')->render();
        $data = array(
            'success' => true,
            'data' => $selects,
            'school' => $school,
            'calculations' => $calculations
        );
        return response()->json(json_encode($data));
    }
    public function userProfile(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            $userinfo = Userinfo::where('userId', $id)->first();
            //var_dump($userprofile->email, $userprofile->name);die();
            return view('front.userprofilee', compact('userprofile', 'userinfo'));
        }
    }
    public function credit(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            $credits = Credit::Join('users', 'users.id', '=', 'credits.friend_id')->Where('user_id', $id)->get();
            $total = 0;
            for ($i = 0; $i < count($credits); $i++) {
                $total = $total + $credits[$i]->points;
            }
            return view('front.credit', compact('userprofile', 'credits', 'total'));
        }
    }

    public function invitefriend(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();

            do {
                //generate a random string using Laravel's str_random helper
                $token = str_random();
            } //check if the token already exists and if it does, try again
            while (Invite::where('token', $token)->first());

            //create a new invite record
            $invite = Invite::create([
                'userId' => $id,
                'email' => '',
                'token' => $token
            ]);

            return view('front.invitefriend', compact('userprofile', 'invite'));
        }
    }

    public function inbox(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();        
            $send_data = DB::table('acco_enquiry')->where('sender_id', $id)->get();          
            return view('front.myaccount.inbox')->with('send_data', $send_data);
        }
    }

    //email_receive
    public function view_receive(Request $request)
    {
        $id = $request->id;
        // $data = DB::table('emails')->where('id',$id)->first();
        $data = DB::table('acco_enquiry')->where('id', $id)->first();
        // print_r(json_encode($data));       
        return view('front.myaccount.view_receive')->with('data', $data);
    }


    public function payment(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            $payments = Payment::Join('users', 'users.id', '=', 'payments.user_id')->Where('user_id', $id)->get();
            return view('front.myaccount.payment', compact('userprofile', 'payments'));
        }
    }

    public function wishlistcourse(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            /* Get Courses */
            $topdeals = Favschool::Join('coursediscounts', 'coursediscounts.school_id', '=', 'favschools.schoolid')->where('favschools.userid', $id)->Join('schools', 'schools.id', '=', 'coursediscounts.school_id')->where('schools.status', '1')->where('schools.deactiveStatus', '0')->whereNotNull('deal')->paginate(2);
            foreach ($topdeals as $deal) {
                $discount = $deal->discount;
                $dealper = $deal->deal;
                $school = School::where('id', $deal->school_id)->first();
                $deal->status = $school->status;
                $deal->agelimit = $school->agelimit;
                $deal->no_of_student = $school->no_of_student;
                $deal->schoolId = $school->id;
                $deal->schoolSlug = $school->slug;
                $deal->schoolName = $school->name;
                $price = Courseprice::where('schoolId', $deal->school_id)->where('courseId', $deal->course_id)->first();

                $deal->favCss = "fa";
                if (Auth::check()) {
                    $userid = auth::user()->id;
                    $favschool = Favschool::where('schoolid', $deal->schoolId)->where('userid', $userid)->first();
                    if ($favschool != null)
                        $deal->favCss = "fas";
                }

                if ($price != null) {
                    if ($discount != null) {
                        $firstprice = $price->ppw1;
                        $discountnum = $firstprice * $discount / 100;
                        $pricead = $firstprice - $discountnum;
                        $deal->pricead = $pricead;
                        $dealpricenum = $pricead * $dealper / 100;
                        $dealprice = $pricead - $dealpricenum;
                        $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                    } else {
                        $deal->pricead = $price->ppw1;
                        $pricead = $deal->pricead;
                        $dealpricenum = $price->ppw1 * $dealper / 100;
                        $dealprice = $pricead - $dealpricenum;
                        $deal->dealprice = number_format(roundDown($dealprice, 2), 2, '.', '');
                    }
                    $deal->pricecourseid = $price->id;
                    $deal->hpw = $price->hours_per_week;
                }
                $coursetitle = Coursetitle::where('id', $deal->course_id)->first();
                $deal->name = $coursetitle->name;
                $deal->name_tr = $coursetitle->name_tr;
                $deal->name_ar = $coursetitle->name_ar;
                $deal->name_ru = $coursetitle->name_ru;
                $deal->name_de = $coursetitle->name_de;
                $deal->name_it = $coursetitle->name_it;
                $deal->name_fr = $coursetitle->name_fr;
                $deal->name_es = $coursetitle->name_es;
                $deal->name_se = $coursetitle->name_se;
                $deal->name_jp = $coursetitle->name_jp;
                $deal->name_fa = $coursetitle->name_fa;
                $deal->name_pr = $coursetitle->name_pr;
                $deal->slug = $coursetitle->slug;
                $schoolimage = Schoolimage::where('schoolId', $deal->school_id)->first();
                if ($schoolimage) {
                    $deal->image = $schoolimage->image;
                } else {
                    $deal->image = "";
                }
                $schooladdress = Schooladdress::where('schoolId', $deal->school_id)->first();
                if ($schooladdress) {
                    /* Get country */
                    $data_country = $schooladdress->countryId;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $deal->country = $country_code;
                    /* Get state */
                    $data_state = $schooladdress->stateId;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $deal->state = $state_code;
                    /* Get City */
                    $data_city = $schooladdress->cityId;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $deal->city = $city_code;
                } else {
                    $deal->country = "";
                    $deal->state = "";
                    $deal->city = "";
                    $deal->zipcode = "";
                }
                $total_review = Coursereview::where('school_id', $deal->school_id)->where('course_id', $deal->course_id)->get();
                $count_total_reviews = count($total_review);
                $sum_reviews = 0;
                $sum_reviews1 = 0;
                $sum_reviews2 = 0;
                $sum_reviews3 = 0;
                $sum_reviews4 = 0;
                $review_rate = 0;
                $review_rate1 = 0;
                $review_rate2 = 0;
                $review_rate3 = 0;
                $review_rate4 = 0;
                foreach ($total_review as $getreviwes) {
                    $sum_reviews = $sum_reviews + $getreviwes->rate;
                    $sum_reviews1 = $sum_reviews1 + $getreviwes->rate1;
                    $sum_reviews2 = $sum_reviews2 + $getreviwes->rate2;
                    $sum_reviews3 = $sum_reviews3 + $getreviwes->rate3;
                    $sum_reviews4 = $sum_reviews4 + $getreviwes->rate4;
                }
                if ($count_total_reviews > 0) {
                    $review_rate = $sum_reviews / $count_total_reviews;
                    $review_rate1 = $sum_reviews1 / $count_total_reviews;
                    $review_rate2 = $sum_reviews2 / $count_total_reviews;
                    $review_rate3 = $sum_reviews3 / $count_total_reviews;
                    $review_rate4 = $sum_reviews4 / $count_total_reviews;
                }
                $deal->count_total_reviews = $count_total_reviews;
                $deal->review_rate = $review_rate;
                $deal->review_rate1 = $review_rate1;
                $deal->review_rate2 = $review_rate2;
                $deal->review_rate3 = $review_rate3;
                $deal->review_rate4 = $review_rate4;
            }
            return view('front.wishlistcourse', compact('userprofile', 'topdeals'));
        }
    }

    public function wishlistacc(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            /* Get Accommodations */
            $accommodations = Favaccommodation::Join('accommodations', 'accommodations.id', '=', 'favaccommodations.accommodationid')->Where('favaccommodations.userid', $id)->Where('accommodations.status', 1)->where('accommodations.deactiveStatus', 0)->orderBy('favaccommodations.id', 'desc')->paginate(2);
            foreach ($accommodations as $accommodation) {
                if ($accommodation) {
                    // echo 'here';
                    /* Get Postalcode */
                    $accommodation->favCss = "fa";
                    if (Auth::check()) {
                        $userid = auth::user()->id;
                        $favaccommodation = Favaccommodation::where('accommodationid', $accommodation->id)->where('userid', $userid)->first();
                        if ($favaccommodation != null)
                            $accommodation->favCss = "fas";
                    }
                    if ($accommodation->country_id) {
                        $data_country = $accommodation->country_id;
                        $country_explode = explode('|', $data_country);
                        $country_code = $country_explode[1];
                        $accommodation->country = $country_code;
                    } else {
                        $accommodation->country = "";
                    }
                    /* Get state */
                    if ($accommodation->state_id) {
                        $data_state = $accommodation->state_id;
                        $state_explode = explode('|', $data_state);
                        $state_code = $state_explode[1];
                        $accommodation->state = $state_code;
                    } else {
                        $accommodation->state = "";
                    }
                    if ($accommodation->city_id) {
                        /* Get City */
                        $data_city = $accommodation->city_id;
                        $city_explode = explode('|', $data_city);
                        $city_code = $city_explode[1];
                        $accommodation->city = $city_code;
                    } else {
                        $accommodation->city = "";
                    }
                    if ($accommodation->zipcode_id) {
                        $accommodation->zipcode = $accommodation->zipcode_id;
                    } else {
                        $accommodation->zipcode = "";
                    }
                }
                // echo $accommodation->id;
                $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
                $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();

                if (!$roomtype) {
                    unset($accommodation);
                    continue;
                }
                $accommodation->roomtype = $roomtype['acc_type'];
                if ($roomtype) {
                    if (count($roomtype->toArray()) > 0) {
                        $accommodation->price = $roomtype['price'];
                    } else {
                        $accommodation->price = 0;
                    }
                }
                $count_total_reviews = count($total_review);
                $sum_reviews_fcourse = 0;
                $sum_reviews_fcourse1 = 0;
                $sum_reviews_fcourse2 = 0;
                $sum_reviews_fcourse3 = 0;
                $review_rate_fcourse = 0;
                $review_rate_fcourse1 = 0;
                $review_rate_fcourse2 = 0;
                $review_rate_fcourse3 = 0;
                foreach ($total_review as $getreviwes) {
                    $sum_reviews_fcourse = $sum_reviews_fcourse + $getreviwes->rate;
                    $sum_reviews_fcourse1 = $sum_reviews_fcourse1 + $getreviwes->rate1;
                    $sum_reviews_fcourse2 = $sum_reviews_fcourse2 + $getreviwes->rate2;
                    $sum_reviews_fcourse3 = $sum_reviews_fcourse3 + $getreviwes->rate3;
                }
                if ($count_total_reviews > 0) {
                    $review_rate_fcourse = $sum_reviews_fcourse / $count_total_reviews;
                    $review_rate_fcourse1 = $sum_reviews_fcourse1 / $count_total_reviews;
                    $review_rate_fcourse2 = $sum_reviews_fcourse2 / $count_total_reviews;
                    $review_rate_fcourse3 = $sum_reviews_fcourse3 / $count_total_reviews;
                }
                $accommodation->count_total_reviews = $count_total_reviews;
                $accommodation->review_rate_fcourse = $review_rate_fcourse;
                $accommodation->review_rate_fcourse1 = $review_rate_fcourse1;
                $accommodation->review_rate_fcourse2 = $review_rate_fcourse2;
                $accommodation->review_rate_fcourse3 = $review_rate_fcourse3;
                $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
                if ($image) {
                    $accommodation->image = $image->image;
                } else {
                    $accommodation->image = "";
                }
            }
            return view('front.wishlistacc', compact('userprofile', 'accommodations'));
        }
    }

    public function process(Request $request)
    {
        //create a new invite record
        $exist = Invite::where('token', $request->token)->first();
        if ($exist) {
            $invite = Invite::find($exist->id);
            $invite->email = $request->email;
            $invite->update();
        }

        // send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        // redirect back where we came from
        return redirect()->back();
    }

    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // create the user with the details from the invite
        // User::create(['email' => $invite->email]);

        // delete the invite so it can't be used again
        $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

        return 'Congratulations! Invite accepted!';
    }
    public function accommodetaionenquiry_send(Request $request)
    {
        $input = $request->all();
        if ($request->sel_type == NULL) {
            return redirect()->back();
          }
        if ($request->accFood == NULL){
            $request->accFood = "";
        }
        $data['sender_id'] = auth::user()->id;
        $data['accoType'] = $request->sel_type;
        $data['accFood'] = $request->accFood;
        if ($request->from) {
            $data['from']= date("Y-m-d", strtotime($request->from));
          }
        
        $data['weeks'] = $request->duration;
        $data['price'] = $request->price;
        $data['total_price'] = $request->total_price;
        $data['message'] = $request->message;
        $data['address'] = $request->address;
        $data['accommodationId'] = $request->accommodationId;
        $receiver_id =DB::table('accommodations')->select('user_id')->where('id', $request->accommodationId)->first()->user_id;
        $data['receiver_id'] =$receiver_id;

        $data['id'] = DB::table('acco_enquiry')->insertGetId($data);       
        // DB::table('emails')->insert(['sender_id' => $data['sender_id'], 'receiver_id' => $receiver_id,'title' => 'accommodation booking', 'content' => $data['message'],'accobook_id'=>$data['id']]);

        // $data['user_email'] =auth::user()->email;
        // $data['receiver_email'] =DB::table('accommodations')->select('email')->where('id',$data['accommodationId'])->first()->email;

        $accommodationbooking = new Accobooking;
        // $accommodationbooking->userId = $request->userId;
        $accommodationbooking->userId = $data['sender_id'];
        $accommodationbooking->price = $request->total_price;

        $userName = User::where('id', $data['sender_id'])->first();
        $toemails = [$userName->email, "alexeysamsonofff@gmail.com"];
        $email_data = array(
            'name'        => $userName->name,
            'subject'     => "Accommodation Booking",
            'email'       => " ivan.visionam@gmail.com",
            //  'accname'     => $accommodation->name,
            'totalPrice'  => $request->total_price,
            //  'receipt_url' => $stripe->receipt_url,
            //  'accFood'     => $request->acc_food,
            'bodyMessage' => "Payment Successful!",
            //  'acctype'     => $request->acco_type,
            //  'acctypename' => $acctypename,
            //  'order_no'    => $order_num,
            'to'          => $toemails
        );


        // Mail::send('front.email.acco_enquiry', $email_data, function ($message) use ($email_data) {
        //     $message->from($email_data['email']);
        //     $message->to($email_data['to']);
        //     $message->subject($email_data['subject']);
        // });


        $country_info = DB::table('accommodations')->select('accommodations.country_id')->where('id', $request->accommodationId)->first()->country_id;
        $country_name = explode('|', $country_info)[1];

        $accommodations = Accommodation::where('country_id', $country_info)->where('status', 1)->where('deactiveStatus', 0)->orderBy('id', 'desc')->paginate(3);

        foreach ($accommodations as $accommodation) {
            if ($accommodation) {
                // echo 'here';
                /* Get Postalcode */
                $accommodation->favCss = "fa";
                if (Auth::check()) {
                    $userid = auth::user()->id;
                    $favaccommodation = Favaccommodation::where('accommodationid', $accommodation->id)->where('userid', $userid)->first();
                    if ($favaccommodation != null)
                        $accommodation->favCss = "fas";
                }
                if ($accommodation->country_id) {
                    $data_country = $accommodation->country_id;
                    $country_explode = explode('|', $data_country);
                    $country_code = $country_explode[1];
                    $accommodation->country = $country_code;
                } else {
                    $accommodation->country = "";
                }
                /* Get state */
                if ($accommodation->state_id) {
                    $data_state = $accommodation->state_id;
                    $state_explode = explode('|', $data_state);
                    $state_code = $state_explode[1];
                    $accommodation->state = $state_code;
                } else {
                    $accommodation->state = "";
                }
                if ($accommodation->city_id) {
                    /* Get City */
                    $data_city = $accommodation->city_id;
                    $city_explode = explode('|', $data_city);
                    $city_code = $city_explode[1];
                    $accommodation->city = $city_code;
                } else {
                    $accommodation->city = "";
                }
                if ($accommodation->zipcode_id) {
                    $accommodation->zipcode = $accommodation->zipcode_id;
                } else {
                    $accommodation->zipcode = "";
                }
            }
            $total_review = Accommodationreview::where('accommodation_id', $accommodation->id)->get();
            $roomtype = Accommodationprice::where('accommodation_id', $accommodation->id)->first();

            if (!$roomtype) {
                unset($accommodation);
                continue;
            }
            $accommodation->roomtype = $roomtype['acc_type'];
            // $price = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
            if ($roomtype) {
                if (count($roomtype->toArray()) > 0) {
                    $accommodation->price = $roomtype['price'];
                } else {
                    $accommodation->price = 0;
                }
            }

            $image = Accommodationimage::where('accommodation_id', $accommodation->id)->first();
            if ($image) {
                $accommodation->image = $image->image;
            } else {
                $accommodation->image = "";
            }
        }
        return view('front.accommodation.equiry_success', compact('accommodations', 'input'))->with('success', 'You have successully sent an enquiry for:')->with('country_name', $country_name)->with('data_id', $data['id']);
    }
}
