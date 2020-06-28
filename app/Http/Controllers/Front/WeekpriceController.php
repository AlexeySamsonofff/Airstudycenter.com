<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Country;
use App\State;
use App\City;
use App\Zipcode;
use App\School;
use App\User;
use App\UserRole;
use App\Role;
use App\Facility;
use App\Schoolfacility;
use App\Schoolhistory;
use App\Schoolimage;
use App\Schooltype;
use App\Schooladdress;
use App\Accommodation;
use App\Accommodationfacility;
use App\Accommodationimage;
use App\Accommodationtype;
use App\Course;
use App\Coursetitle;
use App\Courseprice;
use App\Schoolaccommodation;
use App\Schoolaccommodationprice;
use App\Accommodationprice;
use App\Accommodationadmintype;
use App\Accommodationadminfacility;
use App\Accomodationdescription;
use App\Schoolreview;
use App\Coursereview;
use App\Accommodationreview;
use App\Schooltransport;
use App\Coursediscount;
use App\Blog;
use App\Blogcategory;
use App\Blogreview;
use App\Contact;
use Mail;
use Auth;
use Imageresize;
use App\Refer;
use App\Favschool;
use App\Favcourse;
use DB;
use App\Userinfo;
use App\Topcity;
use App\Page;
use App\Testimonial;
use App\Coursebooking;
use App\Accobooking;
use Newsletter;
use App\Favaccommodation;
use PDF;
use Carbon\Carbon;
class WeekpriceController extends Controller
{
    //
    public function getcoursepriceajax(Request $request)
    {
        $hours_per_week = $request->hours_per_week;
        $courseid       = $request->courseid;
        $schoolid       = $request->mainschool_ID;
        $coursediscount = Coursediscount::where('school_id', $schoolid)->where('course_id', $courseid)->first();
        if (empty($coursediscount)) {
            //return "empty";
            $coursesprice   = Courseprice::where('courseId', $courseid)->where('schoolId', $schoolid)->where('hours_per_week', $hours_per_week)->first();
            /* 1-4 Week Data */
            $result_1  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1, 2, '.', '');
            $result_2  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 2, 2, '.', '');
            $result_3  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 3, 2, '.', '');
            $result_4  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 4, 2, '.', '');
            /* 4-8 Week Data */
            $result_5  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 5, 2, '.', '');
            $result_6  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 6, 2, '.', '');
            $result_7  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 7, 2, '.', '');
            $result_8  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 8, 2, '.', '');
            /* 9-12 Week Data */
            $result_9  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 9, 2, '.', '');
            $result_10 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 10, 2, '.', '');
            $result_11 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 11, 2, '.', '');
            $result_12 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 12, 2, '.', '');
            /* 13-16 Week Data */
            $result_13 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 13, 2, '.', '');
            $result_14 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 14, 2, '.', '');
            $result_15 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 15, 2, '.', '');
            $result_16 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 16, 2, '.', '');
            /* 17-20 Week Data */
            $result_17 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 17, 2, '.', '');
            $result_18 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 18, 2, '.', '');
            $result_19 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 19, 2, '.', '');
            $result_20 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 20, 2, '.', '');
            /* 21-24 Week Data */
            $result_21 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 21, 2, '.', '');
            $result_22 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 22, 2, '.', '');
            $result_23 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 23, 2, '.', '');
            $result_24 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 24, 2, '.', '');
            /* 25-28 Week Data */
            $result_25 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 25, 2, '.', '');
            $result_26 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 26, 2, '.', '');
            $result_27 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 27, 2, '.', '');
            $result_28 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 28, 2, '.', '');
            /* 29-32 Week Data */
            $result_29 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 29, 2, '.', '');
            $result_30 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 30, 2, '.', '');
            $result_31 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 31, 2, '.', '');
            $result_32 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 32, 2, '.', '');
            /* 33-36 Week Data */
            $result_33 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 33, 2, '.', '');
            $result_34 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 34, 2, '.', '');
            $result_35 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 35, 2, '.', '');
            $result_36 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 36, 2, '.', '');
            /* 37-40 Week Data */
            $result_37  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 37, 2, '.', '');
            $result_38  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 38, 2, '.', '');
            $result_39  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 39, 2, '.', '');
            $result_40  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 40, 2, '.', '');
            /* 41-44 Week Data */
            $result_41  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 41, 2, '.', '');
            $result_42  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 42, 2, '.', '');
            $result_43  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 43, 2, '.', '');
            $result_44  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 44, 2, '.', '');
            /* 45-48 Week Data */
            $result_45  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 45, 2, '.', '');
            $result_46  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 46, 2, '.', '');
            $result_47  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 47, 2, '.', '');
            $result_48  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 48, 2, '.', '');
            /* 49-52 Week Data */
            $result_49  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 49, 2, '.', '');
            $result_50  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 50, 2, '.', '');
            $result_51  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 51, 2, '.', '');
            $result_52  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 52, 2, '.', '');
            $deal = 0;
        } else {
            //return "notempty";
            $discount       = $coursediscount->discount;
            $deal           = $coursediscount->deal;
            $coursesprice   = Courseprice::where('courseId', $courseid)->where('schoolId', $schoolid)->where('hours_per_week', $hours_per_week)->first();
            if (!empty($discount) && !empty($deal)) {
                //echo "both have values";
                $ppw1_discount       = $coursesprice->ppw1 - $coursesprice->ppw1 * $discount / 100;
                $ppw1_deal           = $ppw1_discount * $deal / 100;
                $ppw1                = $ppw1_discount - $ppw1_deal;
                /* 1-4 Week Data */
                $result_1             = number_format((float) $ppw1, 2, '.', '') . '@' . number_format((float) $ppw1_discount, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1, 2, '.', '');
                $result_2             = number_format((float) $ppw1 * 2, 2, '.', '') . '@' . number_format((float) $ppw1_discount * 2, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 2, 2, '.', '');
                $result_3             = number_format((float) $ppw1 * 3, 2, '.', '') . '@' . number_format((float) $ppw1_discount * 3, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 3, 2, '.', '');
                $result_4             = number_format((float) $ppw1 * 4, 2, '.', '') . '@' . number_format((float) $ppw1_discount * 4, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 4, 2, '.', '');
                /* 5-8 Week Data */
                $ppw2_discount       = $coursesprice->ppw2 - $coursesprice->ppw2 * $discount / 100;
                $ppw2_deal           = $ppw2_discount * $deal / 100;
                $ppw2                = $ppw2_discount - $ppw2_deal;
                $result_5            = number_format((float) $ppw2 * 5, 2, '.', '') . '@' . number_format((float) $ppw2_discount * 5, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 5, 2, '.', '');
                $result_6            = number_format((float) $ppw2 * 6, 2, '.', '') . '@' . number_format((float) $ppw2_discount * 6, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 6, 2, '.', '');
                $result_7            = number_format((float) $ppw2 * 7, 2, '.', '') . '@' . number_format((float) $ppw2_discount * 7, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 7, 2, '.', '');
                $result_8            = number_format((float) $ppw2 * 8, 2, '.', '') . '@' . number_format((float) $ppw2_discount * 8, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 8, 2, '.', '');
                /* 9-12 Week Data */
                $ppw3_discount       = $coursesprice->ppw3 - $coursesprice->ppw3 * $discount / 100;
                $ppw3_deal           = $ppw3_discount * $deal / 100;
                $ppw3                = $ppw3_discount - $ppw3_deal;
                $result_9             = number_format((float) $ppw3 * 9, 2, '.', '') . '@' . number_format((float) $ppw3_discount * 9, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 9, 2, '.', '');
                $result_10           = number_format((float) $ppw3 * 10, 2, '.', '') . '@' . number_format((float) $ppw3_discount * 10, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 10, 2, '.', '');
                $result_11           = number_format((float) $ppw3 * 11, 2, '.', '') . '@' . number_format((float) $ppw3_discount * 11, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 11, 2, '.', '');
                $result_12             = number_format((float) $ppw3 * 12, 2, '.', '') . '@' . number_format((float) $ppw3_discount * 12, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 12, 2, '.', '');
                /* 13-16 Week Data */
                $ppw4_discount       = $coursesprice->ppw4 - $coursesprice->ppw4 * $discount / 100;
                $ppw4_deal           = $ppw4_discount * $deal / 100;
                $ppw4                = $ppw4_discount - $ppw4_deal;
                $result_13            = number_format((float) $ppw4 * 13, 2, '.', '') . '@' . number_format((float) $ppw4_discount * 13, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 13, 2, '.', '');
                $result_14             = number_format((float) $ppw4 * 14, 2, '.', '') . '@' . number_format((float) $ppw4_discount * 14, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 14, 2, '.', '');
                $result_15             = number_format((float) $ppw4 * 15, 2, '.', '') . '@' . number_format((float) $ppw4_discount * 15, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 15, 2, '.', '');
                $result_16             = number_format((float) $ppw4 * 16, 2, '.', '') . '@' . number_format((float) $ppw4_discount * 16, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 16, 2, '.', '');
                /* 17-20 Week Data */
                $ppw5_discount       = $coursesprice->ppw5 - $coursesprice->ppw5 * $discount / 100;
                $ppw5_deal           = $ppw5_discount * $deal / 100;
                $ppw5                = $ppw5_discount - $ppw5_deal;
                $result_17           = number_format((float) $ppw5 * 17, 2, '.', '') . '@' . number_format((float) $ppw5_discount * 17, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 17, 2, '.', '');
                $result_18           = number_format((float) $ppw5 * 18, 2, '.', '') . '@' . number_format((float) $ppw5_discount * 18, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 18, 2, '.', '');
                $result_19           = number_format((float) $ppw5 * 19, 2, '.', '') . '@' . number_format((float) $ppw5_discount * 19, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 19, 2, '.', '');
                $result_20           = number_format((float) $ppw5 * 20, 2, '.', '') . '@' . number_format((float) $ppw5_discount * 20, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 20, 2, '.', '');
                /* 21-24 Week Data */
                $ppw6_discount       = $coursesprice->ppw6 - $coursesprice->ppw6 * $discount / 100;
                $ppw6_deal           = $ppw6_discount * $deal / 100;
                $ppw6                = $ppw6_discount - $ppw6_deal;
                $result_21           = number_format((float) $ppw6 * 21, 2, '.', '') . '@' . number_format((float) $ppw6_discount * 21, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 21, 2, '.', '');
                $result_22           = number_format((float) $ppw6 * 22, 2, '.', '') . '@' . number_format((float) $ppw6_discount * 22, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 22, 2, '.', '');
                $result_23           = number_format((float) $ppw6 * 23, 2, '.', '') . '@' . number_format((float) $ppw6_discount * 23, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 23, 2, '.', '');
                $result_24           = number_format((float) $ppw6 * 24, 2, '.', '') . '@' . number_format((float) $ppw6_discount * 24, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 24, 2, '.', '');
                /* 25-28 Week Data */
                $ppw7_discount       = $coursesprice->ppw7 - $coursesprice->ppw7 * $discount / 100;
                $ppw7_deal           = $ppw7_discount * $deal / 100;
                $ppw7                = $ppw7_discount - $ppw7_deal;
                $result_25           = number_format((float) $ppw7 * 25, 2, '.', '') . '@' . number_format((float) $ppw7_discount * 25, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 25, 2, '.', '');
                $result_26           = number_format((float) $ppw7 * 26, 2, '.', '') . '@' . number_format((float) $ppw7_discount * 26, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 26, 2, '.', '');
                $result_27           = number_format((float) $ppw7 * 27, 2, '.', '') . '@' . number_format((float) $ppw7_discount * 27, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 27, 2, '.', '');
                $result_28           = number_format((float) $ppw7 * 28, 2, '.', '') . '@' . number_format((float) $ppw7_discount * 28, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 28, 2, '.', '');
                /* 29-32 Week Data */
                $ppw8_discount       = $coursesprice->ppw8 - $coursesprice->ppw8 * $discount / 100;
                $ppw8_deal           = $ppw8_discount * $deal / 100;
                $ppw8                = $ppw8_discount - $ppw8_deal;
                $result_29           = number_format((float) $ppw8 * 29, 2, '.', '') . '@' . number_format((float) $ppw8_discount * 29, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 29, 2, '.', '');
                $result_30           = number_format((float) $ppw8 * 30, 2, '.', '') . '@' . number_format((float) $ppw8_discount * 30, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 30, 2, '.', '');
                $result_31           = number_format((float) $ppw8 * 31, 2, '.', '') . '@' . number_format((float) $ppw8_discount * 31, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 31, 2, '.', '');
                $result_32           = number_format((float) $ppw8 * 32, 2, '.', '') . '@' . number_format((float) $ppw8_discount * 32, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 32, 2, '.', '');
                /* 33-36 Week Data */
                $ppw9_discount       = $coursesprice->ppw9 - $coursesprice->ppw9 * $discount / 100;
                $ppw9_deal           = $ppw9_discount * $deal / 100;
                $ppw9                = $ppw9_discount - $ppw9_deal;
                $result_33           = number_format((float) $ppw9 * 33, 2, '.', '') . '@' . number_format((float) $ppw9_discount * 33, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 33, 2, '.', '');
                $result_34           = number_format((float) $ppw9 * 34, 2, '.', '') . '@' . number_format((float) $ppw9_discount * 34, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 34, 2, '.', '');
                $result_35           = number_format((float) $ppw9 * 35, 2, '.', '') . '@' . number_format((float) $ppw9_discount * 35, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 35, 2, '.', '');
                $result_36           = number_format((float) $ppw9 * 36, 2, '.', '') . '@' . number_format((float) $ppw9_discount * 36, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 36, 2, '.', '');
                /* 37-40 Week Data */
                $ppw10_discount      = $coursesprice->ppw10 - $coursesprice->ppw10 * $discount / 100;
                $ppw10_deal          = $ppw10_discount * $deal / 100;
                $ppw10               = $ppw10_discount - $ppw10_deal;
                $result_37           = number_format((float) $ppw10 * 37, 2, '.', '') . '@' . number_format((float) $ppw10_discount * 37, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 37, 2, '.', '');
                $result_38           = number_format((float) $ppw10 * 38, 2, '.', '') . '@' . number_format((float) $ppw10_discount * 38, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 38, 2, '.', '');

                $result_39           = number_format((float) $ppw10 * 39, 2, '.', '') . '@' . number_format((float) $ppw10_discount * 39, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 39, 2, '.', '');
                $result_40           = number_format((float) $ppw10 * 40, 2, '.', '') . '@' . number_format((float) $ppw10_discount * 40, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 40, 2, '.', '');
                /* 41-44 Week Data */
                $ppw11_discount      = $coursesprice->ppw11 - $coursesprice->ppw11 * $discount / 100;
                $ppw11_deal          = $ppw11_discount * $deal / 100;
                $ppw11               = $ppw11_discount - $ppw11_deal;
                $result_41           = number_format((float) $ppw11 * 41, 2, '.', '') . '@' . number_format((float) $ppw11_discount * 41, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 41, 2, '.', '');
                $result_42           = number_format((float) $ppw11 * 42, 2, '.', '') . '@' . number_format((float) $ppw11_discount * 42, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 42, 2, '.', '');
                $result_43           = number_format((float) $ppw11 * 43, 2, '.', '') . '@' . number_format((float) $ppw11_discount * 43, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 43, 2, '.', '');
                $result_44           = number_format((float) $ppw11 * 44, 2, '.', '') . '@' . number_format((float) $ppw11_discount * 44, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 44, 2, '.', '');
                /* 45-48 Week Data */
                $ppw12_discount      = $coursesprice->ppw12 - $coursesprice->ppw12 * $discount / 100;
                $ppw12_deal          = $ppw12_discount * $deal / 100;
                $ppw12               = $ppw12_discount - $ppw12_deal;
                $result_45           = number_format((float) $ppw12 * 45, 2, '.', '') . '@' . number_format((float) $ppw12_discount * 45, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 45, 2, '.', '');
                $result_46           = number_format((float) $ppw12 * 46, 2, '.', '') . '@' . number_format((float) $ppw12_discount * 46, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 46, 2, '.', '');
                $result_47           = number_format((float) $ppw12 * 47, 2, '.', '') . '@' . number_format((float) $ppw12_discount * 47, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 47, 2, '.', '');
                $result_48           = number_format((float) $ppw12 * 48, 2, '.', '') . '@' . number_format((float) $ppw12_discount * 48, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 48, 2, '.', '');
                /* 49-52 Week Data */
                $ppw13_discount      = $coursesprice->ppw13 - $coursesprice->ppw13 * $discount / 100;
                $ppw13_deal          = $ppw13_discount * $deal / 100;
                $ppw13               = $ppw13_discount - $ppw13_deal;
                $result_49           = number_format((float) $ppw13 * 49, 2, '.', '') . '@' . number_format((float) $ppw13_discount * 49 * 45, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 49, 2, '.', '');
                $result_50           = number_format((float) $ppw13 * 50, 2, '.', '') . '@' . number_format((float) $ppw13_discount * 50, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 50, 2, '.', '');
                $result_51           = number_format((float) $ppw13 * 51, 2, '.', '') . '@' . number_format((float) $ppw13_discount * 51, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 51, 2, '.', '');
                $result_52           = number_format((float) $ppw13 * 52, 2, '.', '') . '@' . number_format((float) $ppw13_discount * 52, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 52, 2, '.', '');
            } elseif (empty($discount) && empty($deal)) {
                //echo "both not have values";
                /* 1-4 Week Data */
                $result_1  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1, 2, '.', '');
                $result_2  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 2, 2, '.', '');
                $result_3  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 3, 2, '.', '');
                $result_4  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 4, 2, '.', '');
                /* 4-8 Week Data */
                $result_5  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 5, 2, '.', '');
                $result_6  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 6, 2, '.', '');
                $result_7  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 7, 2, '.', '');
                $result_8  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 8, 2, '.', '');
                /* 9-12 Week Data */
                $result_9  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 9, 2, '.', '');
                $result_10 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 10, 2, '.', '');
                $result_11 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 11, 2, '.', '');
                $result_12 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 12, 2, '.', '');
                /* 13-16 Week Data */
                $result_13 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 13, 2, '.', '');
                $result_14 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 14, 2, '.', '');
                $result_15 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 15, 2, '.', '');
                $result_16 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 16, 2, '.', '');
                /* 17-20 Week Data */
                $result_17 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 17, 2, '.', '');
                $result_18 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 18, 2, '.', '');
                $result_19 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 19, 2, '.', '');
                $result_20 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 20, 2, '.', '');
                /* 21-24 Week Data */
                $result_21 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 21, 2, '.', '');
                $result_22 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 22, 2, '.', '');
                $result_23 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 23, 2, '.', '');
                $result_24 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 24, 2, '.', '');
                /* 25-28 Week Data */
                $result_25 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 25, 2, '.', '');
                $result_26 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 26, 2, '.', '');
                $result_27 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 27, 2, '.', '');
                $result_28 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 28, 2, '.', '');
                /* 29-32 Week Data */
                $result_29 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 29, 2, '.', '');
                $result_30 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 30, 2, '.', '');
                $result_31 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 31, 2, '.', '');
                $result_32 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 32, 2, '.', '');
                /* 33-36 Week Data */
                $result_33 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 33, 2, '.', '');
                $result_34 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 34, 2, '.', '');
                $result_35 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 35, 2, '.', '');
                $result_36 = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 36, 2, '.', '');
                /* 37-40 Week Data */
                $result_37  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 37, 2, '.', '');
                $result_38  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 38, 2, '.', '');
                $result_39  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 39, 2, '.', '');
                $result_40  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 40, 2, '.', '');
                /* 41-44 Week Data */
                $result_41  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 41, 2, '.', '');
                $result_42  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 42, 2, '.', '');
                $result_43  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 43, 2, '.', '');
                $result_44  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 44, 2, '.', '');
                /* 45-48 Week Data */
                $result_45  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 45, 2, '.', '');
                $result_46  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 46, 2, '.', '');
                $result_47  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 47, 2, '.', '');
                $result_48  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 48, 2, '.', '');
                /* 49-52 Week Data */
                $result_49  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 49, 2, '.', '');
                $result_50  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 50, 2, '.', '');
                $result_51  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 51, 2, '.', '');
                $result_52  = 0.00 . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 52, 2, '.', '');
            } elseif (!empty($discount) && empty($deal)) {
                //echo "only discount have values";
                $ppw1       = $coursesprice->ppw1 - $coursesprice->ppw1 * $discount / 100;
                $ppw2       = $coursesprice->ppw2 - $coursesprice->ppw2 * $discount / 100;
                $ppw3       = $coursesprice->ppw3 - $coursesprice->ppw3 * $discount / 100;
                $ppw4       = $coursesprice->ppw4 - $coursesprice->ppw4 * $discount / 100;
                $ppw5       = $coursesprice->ppw5 - $coursesprice->ppw5 * $discount / 100;
                $ppw6       = $coursesprice->ppw6 - $coursesprice->ppw6 * $discount / 100;
                $ppw7       = $coursesprice->ppw7 - $coursesprice->ppw7 * $discount / 100;
                $ppw8       = $coursesprice->ppw8 - $coursesprice->ppw8 * $discount / 100;
                $ppw9       = $coursesprice->ppw9 - $coursesprice->ppw9 * $discount / 100;
                $ppw10      = $coursesprice->ppw10 - $coursesprice->ppw10 * $discount / 100;
                $ppw11      = $coursesprice->ppw11 - $coursesprice->ppw11 * $discount / 100;
                $ppw12      = $coursesprice->ppw12 - $coursesprice->ppw12 * $discount / 100;
                $ppw13      = $coursesprice->ppw13 - $coursesprice->ppw13 * $discount / 100;
                /* 1-4 Week Data */
                $result_1   = 0.00 . '@' . number_format((float) $ppw1, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1, 2, '.', '');
                $result_2   = 0.00 . '@' . number_format((float) $ppw1 * 2, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 2, 2, '.', '');
                $result_3   = 0.00 . '@' . number_format((float) $ppw1 * 3, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 3, 2, '.', '');
                $result_4   = 0.00 . '@' . number_format((float) $ppw1 * 4, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw1 * 4, 2, '.', '');
                /* 5-8 Week Data */
                $result_5   = 0.00 . '@' . number_format((float) $ppw2 * 5, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 5, 2, '.', '');
                $result_6   = 0.00 . '@' . number_format((float) $ppw2 * 6, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 6, 2, '.', '');
                $result_7   = 0.00 . '@' . number_format((float) $ppw2 * 7, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 7, 2, '.', '');
                $result_8   = 0.00 . '@' . number_format((float) $ppw2 * 8, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw2 * 8, 2, '.', '');
                /* 9-12 Week Data */
                $result_9   = 0.00 . '@' . number_format((float) $ppw3 * 9, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 9, 2, '.', '');
                $result_10   = 0.00 . '@' . number_format((float) $ppw3 * 10, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 10, 2, '.', '');
                $result_11   = 0.00 . '@' . number_format((float) $ppw3 * 11, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 11, 2, '.', '');
                $result_12   = 0.00 . '@' . number_format((float) $ppw3 * 12, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw3 * 12, 2, '.', '');
                /* 13-16 Week Data */
                $result_13   = 0.00 . '@' . number_format((float) $ppw4 * 13, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 13, 2, '.', '');
                $result_14   = 0.00 . '@' . number_format((float) $ppw4 * 14, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 14, 2, '.', '');
                $result_15   = 0.00 . '@' . number_format((float) $ppw4 * 15, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 15, 2, '.', '');
                $result_16   = 0.00 . '@' . number_format((float) $ppw4 * 16, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw4 * 16, 2, '.', '');
                /* 17-20 Week Data */
                $result_17   = 0.00 . '@' . number_format((float) $ppw5 * 17, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 17, 2, '.', '');
                $result_18   = 0.00 . '@' . number_format((float) $ppw5 * 18, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 18, 2, '.', '');
                $result_19   = 0.00 . '@' . number_format((float) $ppw5 * 19, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 19, 2, '.', '');
                $result_20   = 0.00 . '@' . number_format((float) $ppw5 * 20, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw5 * 20, 2, '.', '');
                /* 21-24 Week Data */
                $result_21   = 0.00 . '@' . number_format((float) $ppw6 * 21, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 21, 2, '.', '');
                $result_22   = 0.00 . '@' . number_format((float) $ppw6 * 22, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 22, 2, '.', '');
                $result_23   = 0.00 . '@' . number_format((float) $ppw6 * 23, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 23, 2, '.', '');
                $result_24   = 0.00 . '@' . number_format((float) $ppw6 * 24, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw6 * 24, 2, '.', '');
                /* 25-28 Week Data */
                $result_25   = 0.00 . '@' . number_format((float) $ppw7 * 25, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 25, 2, '.', '');
                $result_26   = 0.00 . '@' . number_format((float) $ppw7 * 26, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 26, 2, '.', '');
                $result_27   = 0.00 . '@' . number_format((float) $ppw7 * 27, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 27, 2, '.', '');
                $result_28   = 0.00 . '@' . number_format((float) $ppw7 * 28, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw7 * 28, 2, '.', '');
                /* 29-32 Week Data */
                $result_29   = 0.00 . '@' . number_format((float) $ppw8 * 29, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 29, 2, '.', '');
                $result_30   = 0.00 . '@' . number_format((float) $ppw8 * 30, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 30, 2, '.', '');
                $result_31   = 0.00 . '@' . number_format((float) $ppw8 * 31, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 31, 2, '.', '');
                $result_32   = 0.00 . '@' . number_format((float) $ppw8 * 32, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw8 * 32, 2, '.', '');
                /* 33-36 Week Data */
                $result_33   = 0.00 . '@' . number_format((float) $ppw9 * 33, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 33, 2, '.', '');
                $result_34   = 0.00 . '@' . number_format((float) $ppw9 * 34, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 34, 2, '.', '');
                $result_35   = 0.00 . '@' . number_format((float) $ppw9 * 35, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 35, 2, '.', '');
                $result_36   = 0.00 . '@' . number_format((float) $ppw9 * 36, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw9 * 36, 2, '.', '');
                /* 37-40 Week Data */
                $result_37  = 0.00 . '@' . number_format((float) $ppw10 * 37, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 37, 2, '.', '');
                $result_38  = 0.00 . '@' . number_format((float) $ppw10 * 38, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 38, 2, '.', '');
                $result_39  = 0.00 . '@' . number_format((float) $ppw10 * 39, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 39, 2, '.', '');
                $result_40  = 0.00 . '@' . number_format((float) $ppw10 * 40, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw10 * 40, 2, '.', '');
                /* 41-44 Week Data */
                $result_41  = 0.00 . '@' . number_format((float) $ppw11 * 41, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 41, 2, '.', '');
                $result_42  = 0.00 . '@' . number_format((float) $ppw11 * 42, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 42, 2, '.', '');
                $result_43  = 0.00 . '@' . number_format((float) $ppw11 * 43, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 43, 2, '.', '');
                $result_44  = 0.00 . '@' . number_format((float) $ppw11 * 44, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw11 * 44, 2, '.', '');
                /* 45-48 Week Data */
                $result_45  = 0.00 . '@' . number_format((float) $ppw12 * 45, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 45, 2, '.', '');
                $result_46  = 0.00 . '@' . number_format((float) $ppw12 * 46, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 46, 2, '.', '');
                $result_47  = 0.00 . '@' . number_format((float) $ppw12 * 47, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 47, 2, '.', '');
                $result_48  = 0.00 . '@' . number_format((float) $ppw12 * 48, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw12 * 48, 2, '.', '');
                /* 49-52 Week Data */
                $result_49  = 0.00 . '@' . number_format((float) $ppw13 * 49, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 49, 2, '.', '');
                $result_50  = 0.00 . '@' . number_format((float) $ppw13 * 50, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 50, 2, '.', '');
                $result_51  = 0.00 . '@' . number_format((float) $ppw13 * 51, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 51, 2, '.', '');
                $result_52  = 0.00 . '@' . number_format((float) $ppw13 * 52, 2, '.', '') . '@' . number_format((float) $coursesprice->ppw13 * 52, 2, '.', '');
            } else {
                $ppw1       = $coursesprice->ppw1 - $coursesprice->ppw1 * $deal / 100;
                $ppw2       = $coursesprice->ppw2 - $coursesprice->ppw2 * $deal / 100;
                $ppw3       = $coursesprice->ppw3 - $coursesprice->ppw3 * $deal / 100;
                $ppw4       = $coursesprice->ppw4 - $coursesprice->ppw4 * $deal / 100;
                $ppw5       = $coursesprice->ppw5 - $coursesprice->ppw5 * $deal / 100;
                $ppw6       = $coursesprice->ppw6 - $coursesprice->ppw6 * $deal / 100;
                $ppw7       = $coursesprice->ppw7 - $coursesprice->ppw7 * $deal / 100;
                $ppw8       = $coursesprice->ppw8 - $coursesprice->ppw8 * $deal / 100;
                $ppw9       = $coursesprice->ppw9 - $coursesprice->ppw9 * $deal / 100;
                $ppw10      = $coursesprice->ppw10 - $coursesprice->ppw10 * $deal / 100;
                $ppw11      = $coursesprice->ppw11 - $coursesprice->ppw11 * $deal / 100;
                $ppw12      = $coursesprice->ppw12 - $coursesprice->ppw12 * $deal / 100;
                $ppw13      = $coursesprice->ppw13 - $coursesprice->ppw13 * $deal / 100;
                /* 1-4 Week Data */
                $result_1    = number_format((float) $ppw1, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1, 2, '.', '');
                $result_2    = number_format((float) $ppw1 * 2, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 2, 2, '.', '');
                $result_3    = number_format((float) $ppw1 * 3, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 3, 2, '.', '');
                $result_4    = number_format((float) $ppw1 * 4, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw1 * 4, 2, '.', '');
                /* 5-8 Week Data */
                $result_5    = number_format((float) $ppw2 * 5, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 5, 2, '.', '');
                $result_6    = number_format((float) $ppw2 * 6, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 6, 2, '.', '');
                $result_7    = number_format((float) $ppw2 * 7, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 7, 2, '.', '');
                $result_8    = number_format((float) $ppw2 * 8, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw2 * 8, 2, '.', '');
                /* 9-12 Week Data */
                $result_9    = number_format((float) $ppw3 * 9, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 9, 2, '.', '');
                $result_10    = number_format((float) $ppw3 * 10, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 10, 2, '.', '');
                $result_11    = number_format((float) $ppw3 * 11, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 11, 2, '.', '');
                $result_12    = number_format((float) $ppw3 * 12, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw3 * 12, 2, '.', '');
                /* 13-16 Week Data */
                $result_13    = number_format((float) $ppw4 * 13, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 13, 2, '.', '');
                $result_14    = number_format((float) $ppw4 * 14, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 14, 2, '.', '');
                $result_15    = number_format((float) $ppw4 * 15, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 15, 2, '.', '');
                $result_16    = number_format((float) $ppw4 * 16, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw4 * 16, 2, '.', '');
                /* 17-20 Week Data */
                $result_17    = number_format((float) $ppw5 * 17, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 17, 2, '.', '');
                $result_18    = number_format((float) $ppw5 * 18, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 18, 2, '.', '');
                $result_19    = number_format((float) $ppw5 * 19, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 19, 2, '.', '');
                $result_20    = number_format((float) $ppw5 * 20, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw5 * 20, 2, '.', '');
                /* 21-24 Week Data */
                $result_21    = number_format((float) $ppw6 * 21, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 21, 2, '.', '');
                $result_22    = number_format((float) $ppw6 * 22, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 22, 2, '.', '');
                $result_23    = number_format((float) $ppw6 * 23, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 23, 2, '.', '');
                $result_24    = number_format((float) $ppw6 * 24, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw6 * 24, 2, '.', '');
                /* 25-28 Week Data */
                $result_25    = number_format((float) $ppw7 * 25, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 25, 2, '.', '');
                $result_26    = number_format((float) $ppw7 * 26, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 26, 2, '.', '');
                $result_27    = number_format((float) $ppw7 * 27, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 27, 2, '.', '');
                $result_28    = number_format((float) $ppw7 * 28, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw7 * 28, 2, '.', '');
                /* 29-32 Week Data */
                $result_29    = number_format((float) $ppw8 * 29, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 29, 2, '.', '');
                $result_30    = number_format((float) $ppw8 * 30, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 30, 2, '.', '');
                $result_31    = number_format((float) $ppw8 * 31, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 31, 2, '.', '');
                $result_32    = number_format((float) $ppw8 * 32, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw8 * 32, 2, '.', '');
                /* 33-36 Week Data */
                $result_33    = number_format((float) $ppw9 * 33, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 33, 2, '.', '');
                $result_34    = number_format((float) $ppw9 * 34, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 34, 2, '.', '');
                $result_35    = number_format((float) $ppw9 * 35, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 35, 2, '.', '');
                $result_36    = number_format((float) $ppw9 * 36, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw9 * 36, 2, '.', '');
                /* 37-40 Week Data */
                $result_37   = number_format((float) $ppw10 * 37, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 37, 2, '.', '');
                $result_38   = number_format((float) $ppw10 * 38, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 38, 2, '.', '');
                $result_39   = number_format((float) $ppw10 * 39, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 39, 2, '.', '');
                $result_40   = number_format((float) $ppw10 * 40, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw10 * 40, 2, '.', '');
                /* 41-44 Week Data */
                $result_41   = number_format((float) $ppw11 * 41, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 41, 2, '.', '');
                $result_42   = number_format((float) $ppw11 * 42, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 42, 2, '.', '');
                $result_43   = number_format((float) $ppw11 * 43, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 43, 2, '.', '');
                $result_44   = number_format((float) $ppw11 * 44, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw11 * 44, 2, '.', '');
                /* 45-48 Week Data */
                $result_45   = number_format((float) $ppw12 * 45, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 45, 2, '.', '');
                $result_46   = number_format((float) $ppw12 * 46, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 46, 2, '.', '');
                $result_47   = number_format((float) $ppw12 * 47, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 47, 2, '.', '');
                $result_48   = number_format((float) $ppw12 * 48, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw12 * 48, 2, '.', '');
                /* 49-52 Week Data */
                $result_49   = number_format((float) $ppw13 * 49, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 49, 2, '.', '');
                $result_50   = number_format((float) $ppw13 * 50, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 50, 2, '.', '');
                $result_51   = number_format((float) $ppw13 * 51, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 51, 2, '.', '');
                $result_52   = number_format((float) $ppw13 * 52, 2, '.', '') . '@' . 0.00 . '@' . number_format((float) $coursesprice->ppw13 * 52, 2, '.', '');
            }
        }
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $sppw = 'Select Price/Week';
            $week = 'Week';
        } elseif ($locale == 'tr') {
            $sppw = 'Fiyat / Hafta Seçiniz';
            $week = 'Hafta';
        } elseif ($locale == 'ar') {
            $sppw = 'حدد السعر / الأسبوع';
            $week = 'أسبوع';
        } elseif ($locale == 'ru') {
            $sppw = 'Выберите цену / неделю';
            $week = 'Неделю';
        } elseif ($locale == 'de') {
            $sppw = 'Wählen Sie Preis / Woche';
            $week = 'Woche';
        } elseif ($locale == 'it') {
            $sppw = 'Seleziona Prezzo / Settimana';
            $week = 'Settimana';
        } elseif ($locale == 'fr') {
            $sppw = 'Sélectionnez Prix / Semaine';
            $week = 'La semaine';
        } elseif ($locale == 'es') {
            $sppw = 'Seleccione precio / semana';
            $week = 'Semana';
        } elseif ($locale == 'se') {
            $sppw = 'Välj Pris / Vecka';
            $week = 'Vecka';
        } elseif ($locale == 'jp') {
            $sppw = '価格/週を選択してください';
            $week = '週間';
        } elseif ($locale == 'fa') {
            $sppw = 'انتخاب قیمت / هفته';
            $week = 'هفته';
        } elseif ($locale == 'pr') {
            $sppw = 'Selecione Preço / Semana';
            $week = "Semana";
        }
        $html = '<option value="0.00">' . $sppw . '</option>
						' . $this->makeWeekOption($result_1, '1', $week)
            . $this->makeWeekOption($result_2, '2', $week)
            . $this->makeWeekOption($result_3, '3', $week)
            . $this->makeWeekOption($result_4, '4', $week)
            . $this->makeWeekOption($result_5, '5', $week)
            . $this->makeWeekOption($result_6, '6', $week)
            . $this->makeWeekOption($result_7, '7', $week)
            . $this->makeWeekOption($result_8, '8', $week)
            . $this->makeWeekOption($result_9, '9', $week)
            . $this->makeWeekOption($result_10, '10', $week)
            . $this->makeWeekOption($result_11, '11', $week)
            . $this->makeWeekOption($result_12, '12', $week)
            . $this->makeWeekOption($result_13, '13', $week)
            . $this->makeWeekOption($result_14, '14', $week)
            . $this->makeWeekOption($result_15, '15', $week)
            . $this->makeWeekOption($result_16, '16', $week)
            . $this->makeWeekOption($result_17, '17', $week)
            . $this->makeWeekOption($result_18, '18', $week)
            . $this->makeWeekOption($result_19, '19', $week)
            . $this->makeWeekOption($result_20, '20', $week)
            . $this->makeWeekOption($result_21, '21', $week)
            . $this->makeWeekOption($result_22, '22', $week)
            . $this->makeWeekOption($result_23, '23', $week)
            . $this->makeWeekOption($result_24, '24', $week)
            . $this->makeWeekOption($result_25, '25', $week)
            . $this->makeWeekOption($result_26, '26', $week)
            . $this->makeWeekOption($result_27, '27', $week)
            . $this->makeWeekOption($result_28, '28', $week)
            . $this->makeWeekOption($result_29, '29', $week)
            . $this->makeWeekOption($result_30, '30', $week)
            . $this->makeWeekOption($result_31, '31', $week)
            . $this->makeWeekOption($result_32, '32', $week)
            . $this->makeWeekOption($result_33, '33', $week)
            . $this->makeWeekOption($result_34, '34', $week)
            . $this->makeWeekOption($result_35, '35', $week)
            . $this->makeWeekOption($result_36, '36', $week)
            . $this->makeWeekOption($result_37, '37', $week)
            . $this->makeWeekOption($result_38, '38', $week)
            . $this->makeWeekOption($result_39, '39', $week)
            . $this->makeWeekOption($result_40, '40', $week)
            . $this->makeWeekOption($result_41, '41', $week)
            . $this->makeWeekOption($result_42, '42', $week)
            . $this->makeWeekOption($result_43, '43', $week)
            . $this->makeWeekOption($result_44, '44', $week)
            . $this->makeWeekOption($result_45, '45', $week)
            . $this->makeWeekOption($result_46, '46', $week)
            . $this->makeWeekOption($result_47, '47', $week)
            . $this->makeWeekOption($result_48, '48', $week)
            . $this->makeWeekOption($result_49, '49', $week)
            . $this->makeWeekOption($result_50, '50', $week)
            . $this->makeWeekOption($result_51, '51', $week)
            . $this->makeWeekOption($result_52, '52', $week);
        /*<option value="'.$result_1.'">1 '.$week.'</option>
                    <option value="'.$result_2.'">2 '.$week.'</option>
                    <option value="'.$result_3.'">3 '.$week.'</option>
                    <option value="'.$result_4.'">4 '.$week.'</option>
                    <option value="'.$result_5.'">5 '.$week.'</option>
                    <option value="'.$result_6.'">6 '.$week.'</option>
                    <option value="'.$result_7.'">7 '.$week.'</option>
                    <option value="'.$result_8.'">8 '.$week.'</option>
                    <option value="'.$result_9.'">9 '.$week.'</option>
                    <option value="'.$result_10.'">10 '.$week.'</option>
                    <option value="'.$result_11.'">11 '.$week.'</option>
                    <option value="'.$result_12.'">12 '.$week.'</option>
                    <option value="'.$result_13.'">13 '.$week.'</option>
                    <option value="'.$result_14.'">14 '.$week.'</option>
                    <option value="'.$result_15.'">15 '.$week.'</option>
                    <option value="'.$result_16.'">16 '.$week.'</option>
                    <option value="'.$result_17.'">17 '.$week.'</option>
                    <option value="'.$result_18.'">18 '.$week.'</option>
                    <option value="'.$result_19.'">19 '.$week.'</option>
                    <option value="'.$result_20.'">20 '.$week.'</option>
                    <option value="'.$result_21.'">21 '.$week.'</option>
                    <option value="'.$result_22.'">22 '.$week.'</option>
                    <option value="'.$result_23.'">23 '.$week.'</option>
                    <option value="'.$result_24.'">24 '.$week.'</option>
                    <option value="'.$result_25.'">25 '.$week.'</option>
                    <option value="'.$result_26.'">26 '.$week.'</option>
                    <option value="'.$result_27.'">27 '.$week.'</option>
                    <option value="'.$result_28.'">28 '.$week.'</option>
                    <option value="'.$result_29.'">29 '.$week.'</option>
                    <option value="'.$result_30.'">30 '.$week.'</option>
                    <option value="'.$result_31.'">31 '.$week.'</option>
                    <option value="'.$result_32.'">32 '.$week.'</option>
                    <option value="'.$result_33.'">33 '.$week.'</option>
                    <option value="'.$result_34.'">34 '.$week.'</option>
                    <option value="'.$result_35.'">35 '.$week.'</option>
                    <option value="'.$result_36.'">36 '.$week.'</option>
                    <option value="'.$result_37.'">37 '.$week.'</option>
                    <option value="'.$result_38.'">38 '.$week.'</option>
                    <option value="'.$result_39.'">39 '.$week.'</option>
                    <option value="'.$result_40.'">40 '.$week.'</option>
                    <option value="'.$result_41.'">41 '.$week.'</option>
                    <option value="'.$result_42.'">42 '.$week.'</option>
                    <option value="'.$result_43.'">43 '.$week.'</option>
                    <option value="'.$result_44.'">44 '.$week.'</option>
                    <option value="'.$result_45.'">45 '.$week.'</option>
                    <option value="'.$result_46.'">46 '.$week.'</option>
                    <option value="'.$result_47.'">47 '.$week.'</option>
                    <option value="'.$result_48.'">48 '.$week.'</option>
                    <option value="'.$result_49.'">49 '.$week.'</option>
                    <option value="'.$result_50.'">50 '.$week.'</option>
                    <option value="'.$result_51.'">51 '.$week.'</option>
                    <option value="'.$result_52.'">52 '.$week.'</option>*/
        return json_encode(array($deal, $html));
    }
    private function makeWeekOption($price, $weekNum, $week)
    {
        $prices = explode('@', $price);
        if ($prices[2] > 0) {
            return '<option value="' . $price . '">' . $weekNum . ' ' . $week . '</option>';
        }
    }
}
