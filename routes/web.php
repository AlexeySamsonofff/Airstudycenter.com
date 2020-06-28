<?php
use App\Accommodation;
use App\Accommodationadmintype;
use App\Accommodationprice;
use App\Accreditation;
use App\Courseprice;
use App\Courseshift;
use App\Coursetitle;
use App\Facility;
use App\Insurance;
use App\School;
use App\Schoolaccommodationprice;
use App\Schooladdress;
use App\Schooltransport;
use App\Visa;
use Illuminate\Http\Request;
//Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
    /* This link will add sesion of language when they click to change language*/
});
Route::get('blogdetail/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('categoryblog/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('schooldetail/{slug}/locale/{locale}', function ($locale) {
    $current_url = url()->current();
    $parts = explode("/", $current_url);
    $newlocale = end($parts);
    Session::put('locale', $newlocale);
    return redirect()->back();
});
Route::get('single/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
// Route::any('bookcourse/locale/{locale}',function($locale){
// Session::put('locale', $locale );
// return redirect()->back();
// });
Route::get('accommodationDetail/{slug}/locale/{locale}', function ($locale) {
    $current_url = url()->current();
    $parts = explode("/", $current_url);
    $newlocale = end($parts);
    Session::put('locale', $newlocale);
    return redirect()->back();
});
Route::get('singlecourse/{slug}/locale/{locale}', function ($locale) {
    $current_url = url()->current();
    $parts = explode("/", $current_url);
    $newlocale = end($parts);
    Session::put('locale', $newlocale);
    return redirect()->back();
});

Route::get('', 'Front\MainController@mainhome2')->name('mainhome');
Route::post('schoolSelects', 'Front\MainController@schoolSelects')->name('schoolSelects');
// dp new test routes start
Route::get('/newhomepage', 'Front\MainController@mainhome2')->name('newhomepage');
// dp new test routes end
Route::post('setLan', 'Front\MainController@set')->name('setLan');
Route::get('studyabout', 'Front\MainController@studyabout')->name('studyabout');
Route::get('mainallschool', 'Front\MainController@mainAllSchool')->name('mainAllSchool');
Route::get('aboutus', 'Front\MainController@aboutUs')->name('aboutus');
Route::get('faqs', 'Front\MainController@faqs')->name('faqs');
Route::get('single/{id}', 'Front\MainController@singlePage')->name('singlepage');
// Route::any('schooldetail/{slug}/{id}', 'Front\MainController@schoolDetail')->name('schooldetail');
Route::any('schooldetail/{slug}/{id}', 'Front\MainController@schoolDetail_new')->name('schooldetail');
Route::get('allCourse/', 'Front\MainController@allCourse')->name('allCourse');
Route::post('getcoursepriceajax', 'Front\WeekpriceController@getcoursepriceajax')->name('getcoursepriceajax');
Route::post('gettransportpriceajax', 'Front\MainController@gettransportpriceajax')->name('gettransportpriceajax');
Route::post('getweekajax', 'Front\MainController@getweekajax')->name('getweekajax');
Route::post('favschool', 'Front\MainController@favschool')->name('favschool');
Route::post('favcourse', 'Front\MainController@favcourse')->name('favcourse');
Route::post('favaccomodation', 'Front\MainController@favaccomodation')->name('favaccomodation');
Route::any('mainallschool', 'Front\MainController@getsearchschools')->name('allsearchschools');
Route::any('allCourse', 'Front\MainController@getSearchCourses')->name('allSearchCourses');
Route::any('blog', 'Front\MainController@getsearchblogs')->name('allsearchblogs');
Route::post('getaccomodationtypeajax', 'Front\MainController@getaccomodationtypeajax')->name('getaccomodationtypeajax');
Route::post('getaccomodationpriceajax', 'Front\MainController@getaccomodationpriceajax')->name('getaccomodationpriceajax');
Route::post('storeReview', 'Front\MainController@storeReview')->name('storeReview');
Route::get('coursedetail/{slug}/{id}/{hours}/{price}', 'Front\MainController@courseDetail')->name('coursedetail');
Route::get('singlecourse/{slug}/{id}', 'Front\MainController@singleCourse')->name('singleCourse');
Route::post('storeCourseReview', 'Front\MainController@storeCourseReview')->name('storeCourseReview');
Route::get('autoSearchSchool', 'Front\MainController@autoSearchSchool')->name('autoSearchSchool');
Route::get('autoSearchCourse', 'Front\MainController@autoSearchCourse')->name('autoSearchCourse');
// Route::post('book_check','Front\MainController@bookCourse');
Route::post('course_payment','Front\MainController@course_payment');


Route::any('allAccommodation', 'Front\MainController@allAccommodation')->name('allaccommodation');
Route::get('accommodationDetail/{slug}/{id}', 'Front\MainController@accommodationDetail_new')->name('accommodationDetail');
Route::get('accommodationDetail_new/{slug}/{id}', 'Front\MainController@accommodationDetail_new')->name('accommodationDetail_new');
Route::post('accommodetaionenquiry_send','Front\MainController@accommodetaionenquiry_send');


Route::post('storeAccommodationReview', 'Front\MainController@storeAccommodationReview')->name('storeAccommodationReview');
Route::get('contactus', 'Front\MainController@contactUs')->name('contactUs');
Route::get('blog', 'Front\MainController@blogList')->name('blogList');
Route::get('blogdetail/{id}', 'Front\MainController@blogDetail')->name('blogDetail');
Route::post('storeblogReview', 'Front\MainController@storeblogReview')->name('storeblogReview');
Route::get('categoryblog/{id}', 'Front\MainController@categoryBlog')->name('categoryBlog');
Route::post('mm', 'Front\MainController@mm')->name('mm');
// Route::any('bookcourse', 'StripePaymentController@bookCourse')->name('bookCourse');
Route::post('book_check', 'StripePaymentController@bookCourse');
Route::any('stripepostcourse', 'StripePaymentController@stripePostCourse')->name('stripePostCourse');
Route::any('subscribe', 'Front\MainController@subscribe')->name('subscribe');
    
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe_post', 'StripePaymentController@stripePost');
Route::any('bookaccommodation', 'StripePaymentController@bookAccommodation')->name('bookAccommodation');
Route::post('stripePost_Accommodation', 'StripePaymentController@stripePost_Accommodation');
// Route::any('stripe', 'StripePaymentController@stripePost')->name('stripepost');
// Route::get('paymentsuccess', function () {
// })->name('paymentsuccess');
Route::get('facebook', function () {
    return view('facebook');
});

Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook')->name('fblogin');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');
Route::post('contactusData', 'Front\MainController@contactusmail')->name('contactusData');
Route::post('callUS', 'Front\MainController@callUS')->name('callUS');
Route::get('autoSearchBlog', 'Front\MainController@autoSearchBlog')->name('autoSearchBlog');
/* insurance */
Route::get('insuranceList', 'Front\MainController@insuranceList')->name('insuranceList');
Route::get('insurancedetail/{id}', 'Front\MainController@insuranceDetail')->name('insuranceDetail');
Route::get('visaList', 'Front\MainController@visaList')->name('visaList');
Route::get('visadetail/{id}', 'Front\MainController@visaDetail')->name('visaDetail');


// Route::get('schoolregistration', function () {
//     if (Auth::check()) {
//         return redirect()->route('userProfile');
//     } else {
//         return view('front/schoolregistration');
//     }
// })->name('schoolregistration');

Route::get('schoollogin', function () {
    if (Auth::check()) {
        return redirect()->route('userProfile');
    } else {
        return view('front/schoolLogin');
    }
})->name('schoollogin');
// Route::get('accommodationregistration', function () {
//     if (Auth::check()) {
//         return redirect()->route('userProfile');
//     } else {
//         return view('front/accommodationregistration');
//     }
// })->name('accommodationregistration');
Route::get('accommodationlogin', function () {
    // if (Auth::check()) {
    //     return redirect()->route('userProfile');
    // } else {
        return view('front/accommodationLogin');
    // }
})->name('accommodationlogin');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('userprofile', 'Front\MainController@userProfile')->name('userProfile');
    Route::get('referfriend', 'Front\MainController@referFriend')->name('referFriend');
    Route::post('user-profile', 'Front\MainController@changeProfileImage')->name('changeProfileImage');
    Route::get('editUser', 'Front\MainController@editUser')->name('editUser');
    Route::post('updateUserInfo', 'Front\MainController@updateUserInfo')->name('updateUserInfo');
    Route::get('refer', 'Front\MainController@refer')->name('refer');

    Route::get('credit', 'Front\MainController@credit')->name('credit');
    Route::get('invitefriend', 'Front\MainController@invitefriend')->name('invitefriend');
    Route::get('inbox', 'Front\MainController@inbox')->name('inbox');
    Route::get('payment', 'Front\MainController@payment')->name('payment');
    Route::get('wishlistcourse', 'Front\MainController@wishlistcourse')->name('wishlistcourse');
    Route::get('wishlistacc', 'Front\MainController@wishlistacc')->name('wishlistacc');
    Route::get('inbox/view_receive/{id}', 'Front\MainController@view_receive');

});
Route::post('allCourse', 'Front\MainController@homeSearch')->name('homeSearch');
Route::get('autoSearchcity', 'Front\MainController@autoSearchCity')->name('autoSearchCity');
Route::get('autoSearchAcctitle', 'Front\MainController@autoSearchAccTitle')->name('autoSearchAccTitle');
// Route::post('allAccommodation', 'Front\MainController@accommodationSearch')->name('accommodationSearch');
Route::get('cityschool/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('cityschool/{cityId}', 'Front\MainController@citySchool')->name('citySchool');
Route::get('allcityschool', 'Front\MainController@allCitySchool')->name('allCitySchool');

Route::get('generate-pdf/{id}', 'Front\MainController@generatePDF')->name('generatepdf');
Route::get('generateacc-pdf/{id}', 'Front\MainController@generateAccPDF')->name('generateaccpdf');
Route::get('500', function () {
    abort(500);
});
Route::post('invite', 'Front\MainController@process')->name('process');
Route::get('accept/{token}', 'Front\MainController@accept')->name('accept');

// Route::any('bookcourse', 'StripePaymentController@bookCourse')->name('bookCourse');
// Route::any('stripeCourse', 'StripePaymentController@stripePostCourse')->name('stripePostCourse');
// Route::get('/', function () {
//     return view('front.front');
// });
Route::get('/home', 'HomeController@index')->name('home');
/* Auth check Starts */
Route::middleware(['auth', 'verified', 'Admin'])->group(function () {
    //////////////////School Admin's Routes//////////////////////////////////////
    Route::get('school-admin', function () {
        $userId = Auth::user()->id;
        $schools = School::where('userId', $userId)->orderBy('id', 'desc')->get();
        $countschool = count($schools);
        foreach ($schools as $school) {
            $course = Courseprice::where('schoolId', $school->id)->get();
            $accommodationprice = Schoolaccommodationprice::where('school_id', $school->id)->get();
            $schooltransport = Schooltransport::where('school_id', $school->id)->get();
            $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
            $school->courseCount = $course->count();
            $school->accommodationCount = $accommodationprice->count();
            $school->schooltransportCount = $schooltransport->count();
            $data_city = $schooladdress != null ? $schooladdress->cityId : null;
            $city_explode = explode('|', $data_city);
            $school->city = $city_explode[0];
        }
        return view('schooladmin.dashboard', compact('countschool', 'schools'));
    })->name('school-admin');
    Route::prefix('school-admin')->group(function () {
        Route::get('schooldashboard', function () {
            $userId = Auth::user()->id;
            $schools = School::where('userId', $userId)->get();
            $countschool = count($schools);
            foreach ($schools as $school) {
                $course = Courseprice::where('schoolId', $school->id)->get();
                $accommodationprice = Schoolaccommodationprice::where('school_id', $school->id)->get();
                $schooltransport = Schooltransport::where('school_id', $school->id)->get();
                $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
                $school->courseCount = $course->count();
                $school->accommodationCount = $accommodationprice->count();
                $school->schooltransportCount = $schooltransport->count();
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $school->city = $city_explode[0];
            }
            return view('schooladmin.dashboard', compact('countschool', 'schools'));
        })->name('schooldashboard');
        /* Start Add school */
        Route::get('addschool', function () {
            //$countries = Country::all();
            $facilities = Facility::all();
            $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
            $api = "http://battuta.medunes.net/api/country/all/?key=$battuta_key";
            $response = file_get_contents($api);
            $countries = json_decode($response);
            $coursetitles = Coursetitle::all();
            $shifts = Courseshift::all();
            $Accommodationadmintype = Accommodationadmintype::all();
            $insaurence = Insurance::all();
            $visa = Visa::all();
            $accreditations = Accreditation::all();
            return view('schooladmin/school/addschool', compact('countries', 'facilities', 'coursetitles', 'shifts', 'Accommodationadmintype', 'insaurence', 'visa', 'accreditations'));
        })->name('addschool');
        Route::post('storeschool', 'Schooladmin\SchoolController@storeSchool')->name('storeSchool');
        Route::get('allschool', 'Schooladmin\SchoolController@allSchool')->name('allSchool');
        Route::post('destroyschool', 'Schooladmin\SchoolController@destroySchool')->name('deleteSchool');
        Route::get('editschool/{id}', 'Schooladmin\SchoolController@editSchool')->name('editSchool');
        Route::get('showcoursebookings/{id}', 'Schooladmin\SchoolController@showCourseBookings')->name('showCourseBookings');
        Route::post('addLangSchool', 'Schooladmin\SchoolController@addLangSchool')->name('addLangSchool');
        Route::get('showLangSchool/{id}', 'Schooladmin\SchoolController@showLangSchool')->name('showLangSchool');
        Route::post('updateschool', 'Schooladmin\SchoolController@updateSchool')->name('updateSchool');
        Route::post('deleteSchoolImages', 'Schooladmin\SchoolController@deleteSchoolImages')->name('deleteSchoolImages');
        Route::post('deleteSchoolLogo', 'Schooladmin\SchoolController@deleteSchoolLogo')->name('deleteSchoolLogo');
        Route::post('deleteSchoolcourseprice', 'Schooladmin\SchoolController@deleteSchoolcourseprice')->name('deleteSchoolcourseprice');
        Route::post('deleteSchoolcourse', 'Schooladmin\SchoolController@deleteSchoolcourse')->name('deleteschoolcourse');
        Route::post('deleteschoolaccoprice', 'Schooladmin\SchoolController@deleteschoolaccoprice')->name('deleteschoolaccoprice');
        Route::post('deleteschoolinsprice', 'Schooladmin\SchoolController@deleteschoolinsprice')->name('deleteschoolinsprice');
        Route::post('deleteschoolvisaprice', 'Schooladmin\SchoolController@deleteschoolvisaprice')->name('deleteschoolvisaprice');
        Route::post('deleteschooltransportprice', 'Schooladmin\SchoolController@deleteschooltransportprice')->name('deleteschooltransportprice');
        /* Start end school */
        /* Start Add course */
        Route::get('addcourse', function () {
            $userId = Auth::user()->id;
            $schools = School::where('userId', $userId)->get();
            $coursetitles = Coursetitle::all();
            return view('schooladmin/course/addcourse', compact('schools', 'coursetitles'));
        })->name('addcourse');
        Route::post('storeCourse', 'Schooladmin\CourseController@storeCourse')->name('storeCourse');
        Route::get('allcourse/{id}', 'Schooladmin\CourseController@allCourse')->name('allcourse');
        Route::get('editcourse/{id}', 'Schooladmin\CourseController@editCourse')->name('editCourse');
        Route::post('destroycourse', 'Schooladmin\CourseController@destroyCourse')->name('destroyCourse');
        Route::post('updatecourse', 'Schooladmin\CourseController@updateCourse')->name('updateCourse');
        /* Start end course */
        /* Start course price */
        Route::post('getcourseschool', 'Schooladmin\CourseController@getCourse')->name('getcourseschool');
        Route::get('addcourseprice', 'Schooladmin\CourseController@addCoursePrice')->name('addcourseprice');
        Route::post('storecourseprice', 'Schooladmin\CourseController@storeCoursePrice')->name('storecourseprice');
        Route::get('allcourseprices/{id}', 'Schooladmin\CourseController@allCoursePrices')->name('allcourseprices');
        Route::get('editcourseprices/{id}', 'Schooladmin\CourseController@editCoursePrices')->name('editcourseprices');
        Route::post('updatecourseprices', 'Schooladmin\CourseController@updateCoursePrices')->name('updateCourseprices');
        Route::post('destroycourseprices', 'Schooladmin\CourseController@destroyCoursePrices')->name('destroycourseprices');
        /* End course price*/
        /* Course Discount */
        Route::get('addcoursediscount', 'Schooladmin\CourseController@addCourseDiscount')->name('addCourseDiscount');
        Route::post('storecoursediscount', 'Schooladmin\CourseController@storeCourseDiscount')->name('storeCourseDiscount');
        Route::get('allcoursediscount/{id}', 'Schooladmin\CourseController@allCourseDiscount')->name('allCourseDiscount');
        Route::get('editcoursediscount/{id}', 'Schooladmin\CourseController@editCourseDiscount')->name('editCourseDiscount');
        Route::post('updatecoursediscount', 'Schooladmin\CourseController@updateCourseDiscount')->name('updateCourseDiscount');
        Route::post('destroycoursediscount', 'Schooladmin\CourseController@destroyCourseDiscount')->name('destroyCourseDiscount');
        /* Start Add school history */
        Route::get('addschoolhistory', 'Schooladmin\SchoolhistoryController@addSchoolHistory')->name('addSchoolHistory');
        Route::post('storeschoolhistory', 'Schooladmin\SchoolhistoryController@storeSchoolHistory')->name('storeSchoolHistory');
        Route::get('allschoolhistory', 'Schooladmin\SchoolhistoryController@allSchoolHistory')->name('allSchoolHistory');
        Route::post('destroyschoolhistory', 'Schooladmin\SchoolhistoryController@destroySchoolHistory')->name('destroySchoolHistory');
        Route::get('editschoolhistory/{id}', 'Schooladmin\SchoolhistoryController@editSchoolHistory')->name('editSchoolHistory');
        Route::post('updateschoolhistory', 'Schooladmin\SchoolhistoryController@updateSchoolHistory')->name('updateSchoolHistory');
        /* Start end school History */
        /* Start Add school Accommodation */
        Route::get('addschoolaccommodation', 'Schooladmin\SchoolaccommodationController@addSchoolAccommodation')->name('addSchoolAccommodation');
        Route::post('storeschoolaccommodation', 'Schooladmin\SchoolaccommodationController@storeSchoolAccommodation')->name('storeSchoolAccommodation');
        Route::get('allschoolAccommodation/{id}', 'Schooladmin\SchoolaccommodationController@allschoolAccommodation')->name('allSchoolAccommodation');
        Route::post('destroyschoolaccommodation', 'Schooladmin\SchoolaccommodationController@destroySchoolAccommodation')->name('destroySchoolAccommodation');
        Route::get('editschoolaccommodation/{id}', 'Schooladmin\SchoolaccommodationController@editSchoolAccommodation')->name('editSchoolAccommodation');
        Route::post('updateschoolaccommodation', 'Schooladmin\SchoolaccommodationController@updateSchoolAccommodation')->name('updateSchoolAccommodation');
        /* Start end school Accommodation */
        /* Start end school Accommodation Price */
        Route::get('getschoolaccommodationlist', 'Schooladmin\SchoolaccommodationController@getSchoolaccommodationList')->name('getSchoolaccommodationList');
        Route::get('addschoolaccommodationprice/{id}', 'Schooladmin\SchoolaccommodationController@addSchoolAccommodationPrice')->name('addSchoolAccommodationPrice');
        Route::post('getschoolaccommodation', 'Schooladmin\SchoolaccommodationController@getSchoolAccommodation')->name('getSchoolAccommodation');
        Route::post('storeschoolaccommodationprice', 'Schooladmin\SchoolaccommodationController@storeSchoolAccommodationPrice')->name('storeSchoolAccommodationPrice');
        Route::get('allschoolaccommodationprice/{id}', 'Schooladmin\SchoolaccommodationController@allschoolAccommodationPrice')->name('allSchoolAccommodationPrice');
        Route::get('editschoolaccommodationprice/{id}', 'Schooladmin\SchoolaccommodationController@editSchoolAccommodationPrice')->name('editSchoolAccommodationPrice');
        Route::post('updateschoolaccommodationprice', 'Schooladmin\SchoolaccommodationController@updateSchoolAccommodationPrice')->name('updateSchoolAccommodationPrice');
        Route::post('destroyschoolaccommodationprice', 'Schooladmin\SchoolaccommodationController@destroySchoolAccommodationPrice')->name('destroySchoolAccommodationPrice');
        /* Start end school Accommodation Price */
        /* Start Get country/State/city/Zipcode */
        Route::post('getStatesschool', 'Superadmin\UserController@getStates')->name('getStatesschool');
        Route::post('getCitiesschool', 'Superadmin\UserController@getCities')->name('getCitiesschool');
        Route::post('getPostalCodesschool', 'Superadmin\UserController@getPostalCodes')->name('getPostalCodesschool');
        /* End Get country/State/city/Zipcode */
        //school new course //
        Route::get('addschoolcourse', function () {
            $userId = Auth::user()->id;
            $schools = School::where('userId', $userId)->get();
            return view('Schooladmin.course.addschoolcourse', compact('schools'));
        })->name('addSchoolCourse');
        Route::post('storeSchoolCourse', 'Schooladmin\CourseController@storeSchoolCourse')->name('storeSchoolCourse');
        Route::post('destroyschoolcourse', 'Schooladmin\CourseController@destroySchoolCourse')->name('destroySchoolCourse');
        // School Transport
        Route::get('addschooltransport', 'Schooladmin\SchooltransportController@addSchoolTransport')->name('addSchoolTransport');
        Route::get('allschooltransport', 'Schooladmin\SchooltransportController@allSchoolTransport')->name('allSchoolTransport');
        Route::post('storeschooltransport', 'Schooladmin\SchooltransportController@storeSchoolTransport')->name('storeSchoolTransport');
        Route::post('destroyschooltransport', 'Schooladmin\SchooltransportController@destroySchoolTransport')->name('destroySchoolTransport');
        Route::get('editschooltransport/{id}', 'Schooladmin\SchooltransportController@editSchoolTransport')->name('editSchoolTransport');
        Route::post('updateschooltransport', 'Schooladmin\SchooltransportController@updateSchoolTransport')->name('updateSchoolTransport');
    });
});
// Accommodation Admin Pannel
Route::middleware(['auth', 'verified', 'AccommodationAdmin'])->group(function () {
    Route::get('accommodation-admin', function () {
        $userId = Auth::user()->id;
        $accommodations = Accommodation::where('user_id', $userId)->orderBy('id', 'desc')->get();
        foreach ($accommodations as $accommodation) {
            $acc_type = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
            $accommodation->acc_type = $acc_type->acc_type;
        }
        return view('accommodationadmin.dashboard', compact('accommodations'));
    })->name('accommodation-admin');
    Route::prefix('accommodation-admin')->group(function () {
        Route::get('dashboard', function () {
            $userId = Auth::user()->id;
            $accommodations = Accommodation::where('user_id', $userId)->orderBy('id', 'desc')->get();
            foreach ($accommodations as $accommodation) {
                $acc_type = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
                $accommodation->acc_type = $acc_type->acc_type;
            }
            return view('accommodationadmin.dashboard', compact('accommodations'));
        })->name('accommodation-dashboard');
        //Accommodation Section
        Route::get('addaccommodation', 'Accommodation\AccommodationController@addAccommodation')->name('addAccommodation');
        Route::post('storeaccommodation', 'Accommodation\AccommodationController@storeAccommodation')->name('storeAccommodation');
        Route::get('allaccommodation', 'Accommodation\AccommodationController@allAccommodation')->name('allAccommodation');
        Route::get('editaccommodation/{id}', 'Accommodation\AccommodationController@editAccommodation')->name('editAccommodation');
        Route::get('showLangAccommodation/{id}', 'Accommodation\AccommodationController@showLangAccommodation')->name('showLangAccommodation');
        Route::post('addLangAccommodation', 'Accommodation\AccommodationController@addLangAccommodation')->name('addLangAccommodation');
        Route::get('showaccommodationbookings/{id}', 'Accommodation\AccommodationController@showaccommodationbookings')->name('showaccommodationbookings');
        Route::post('updateaccommodation', 'Accommodation\AccommodationController@updateAccommodation')->name('updateAccommodation');
        Route::post('destroyaccommodation', 'Accommodation\AccommodationController@destroyAccommodation')->name('destroyAccommodation');
        Route::post('deleteaccommodationImages', 'Accommodation\AccommodationController@deleteAccommodationImages')->name('deleteAccommodationImages');
        //Start Accommodation Price //
        Route::get('addaccommodationprice', 'Accommodation\AccommodationController@addAccommodationPrice')->name('addAccommodationPrice');
        Route::post('storeaccommodationprice', 'Accommodation\AccommodationController@storeAccommodationPrice')->name('storeAccommodationPrice');
        Route::get('allaccommodationprice/{accommodation_id}', 'Accommodation\AccommodationController@allAccommodationPrice')->name('allAccommodationPrice');
        Route::get('editaccommodationprice/{id}', 'Accommodation\AccommodationController@editAccommodationPrice')->name('editAccommodationPrice');
        Route::post('updateaccommodationprice', 'Accommodation\AccommodationController@updateAccommodationPrice')->name('updateAccommodationPrice');
        Route::post('destroyaccommodationprice', 'Accommodation\AccommodationController@destroyAccommodationPrice')->name('destroyAccommodationPrice');
        //End Accommodation price //
        Route::post('getStatesaccommodation', 'Superadmin\UserController@getStates')->name('getStatesAccommodation');
        Route::post('getCitiesaccommodation', 'Superadmin\UserController@getCities')->name('getCitiesAccommodation');
        Route::post('getPostalCodesaccommodation', 'Superadmin\UserController@getPostalCodes')->name('getPostalCodesAccommodation');

        //Accommodation inbox//
        Route::get('inbox', 'Accommodation\AccommodationController@inbox')->name('inbox');
        Route::get('view_receive/{id}', 'Accommodation\AccommodationController@view_receive');
        Route::get('active_m/{id}', 'Accommodation\AccommodationController@active_m');
        Route::get('send_message','Accommodation\AccommodationController@send_message');
    });
});
/* Auth check Ends */
// Route::get('/home', 'HomeController@index')->name('home');
