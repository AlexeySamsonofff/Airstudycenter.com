<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Accobooking;
use App\Coursebooking;
use App\Coursediscount;
use App\Coursetitle;
use App\User;
use App\Userinfo;
use App\School;
use App\Accommodation;
use App\Accommodationadmintype;
use App\Refer;
use App\Coursebooktemplate;
use App\Accbooktemplate;
use Mail;
use Auth;
use DB;


class StripePaymentController extends Controller
{
  /**
   * success response method.
   *
   * @return \Illuminate\Http\Response
   */
  public function stripe()
  {
    return view('front.courses.payment');
  }
  public function bookAccommodation(Request $request)
  {

    if (isset($request->total_price) && !empty($request->total_price)) {

      $input = $request->all();
      return view('front/accommodation/payment', compact('input'));
    } else {
      return redirect()->back();
    }
  }

  public function bookCourse(Request $request)
  {
      if(empty(auth::user()->id)){
        return view('front/login');
      } 

      if (isset($request->total_price) && !empty($request->total_price)) {
        $input = $request->all();
        return view('front/courses/payment', compact('input'));
      } else {
        return redirect()->back();
      }
  }



  /**
   * success response method.
   *
   * @return \Illuminate\Http\Response
   */
  //course payment
  public function stripePost(Request $request)
  {      
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $data['user_id'] = auth::user()->id;
    $data['amount'] = $request->total_price;
    $data['details'] = "Course Booking Payment From Air study";
    $data['start_date'] = $request->from;


    $stripe =  Stripe\Charge::create([
      "amount" => $request->total_price  * 100,
      "currency" => "gbp",
      "source" => $request->stripeToken,
      "description" => "Course Booking Payment From Air study"
    ]);
    if ($stripe) {
      $countryName = Userinfo::where('userId', $data['user_id'])->first();

      $coursebooking = new Coursebooking;
      $coursebooking->user_id = $data['user_id'];
      if ($countryName) {
        $coursebooking->country = $countryName->country;
      } else {
        $coursebooking->country = "";
      }
      $coursebooking->school_id = $request->school_id;
      $coursebooking->school_Name = $request->school_Name;
      $coursebooking->course_name = $request->course_name;
      $coursebooking->registration_fee = $request->registration_fee;
      $coursebooking->course_id = $request->course_id;
      $coursebooking->hours_per_week = $request->weeks;
      $coursebooking->all_price = $request->price;

      if ($request->course_date) {
        $date = date("Y-m-d", strtotime($request->course_date));
        $coursebooking->course_date = $date;
        $data['start_date'] =$date;
      }
      // if($request->accomodation){
      //     $coursebooking->accommodation_price = $request->accomodation;
      // }
      // if($request->acc_id){
      //     $coursebooking->accommodation_id = $request->acc_id;
      // }
      // if($request->transportid){
      //     $coursebooking->transport_id = $request->transportid;
      // }
      // if($request->ins_id){
      //     $coursebooking->ins_id = $request->ins_id;
      // }
      // if($request->visa_id){
      //     $coursebooking->visa_id = $request->visa_id;
      // }
      $coursebooking->total_course_price = $request->total_price;
      // if($request->transportprice){
      //       $coursebooking->transport_price = $request->transportprice;
      // }
      // if($request->insprice){
      //       $coursebooking->insprice = $request->insprice;
      // }
      // if($request->visaprice){
      //       $coursebooking->visaprice = $request->visaprice;
      // }
      $coursebooking->receipt_url = $stripe->receipt_url;
      $coursebooking->payment_status = $stripe->status;
      $coursebooking->card_lastdigit = $stripe->source->last4;
      $coursebooking->card_id = $stripe->source->id;
      $six_digit_random_number = mt_rand(100000, 999999);
      $order_num = $coursebooking->user_id . '' . $six_digit_random_number;
      $coursebooking->Orderid = $order_num;

      // dd($stripe->source->exp_month,$stripe->source->exp_year);
      $coursebooking->save();
      $data['ref_id'] =$coursebooking->id;
      $data['details_sub'] = $stripe->receipt_url;
     
      DB::table('payments')->insertGetId($data);
    }

    Session::flash('success', 'Thnak you. Your payment of £' . $request->total_price . ' successfully completed ');

    return view('front.courses.payment_success');
    
  }

  public function stripePost_Accommodation(Request $request)
  {
    // dd($request->all());
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $data['user_id'] = auth::user()->id;
    $data['amount'] = $request->total_price;
    $data['details'] = "Accommodation Booking Payment From Air study";
    $data['end_date'] = $request->from;
    $stripe =Stripe\Charge::create([
      "amount" => $request->total_price * 100,
      "currency" => "gbp",
      "source" => $request->stripeToken,
      "description" => "Accommodation Booking Payment From Air study"
    ]);
    if($stripe) {
      $accommodationbooking = new Accobooking;
      $accommodationbooking->userId =  $data['user_id'];
      $accommodationbooking->price = $request->total_price;
      $accommodationbooking->accommodationId = $request->accommodationId;
      $accommodationbooking->accoType = $request->accoType;
      // $accommodationbooking->typeId = $request->acc_typedata;
      $accommodationbooking->accFood = $request->accFood;
      $accommodationbooking->receipt_url = $stripe->receipt_url;
      $accommodationbooking->paymentStatus = $stripe->status;
      $accommodationbooking->card_lastdigit = $stripe->source->last4;
      $accommodationbooking->card_id = $stripe->source->id;
      $six_digit_random_number = mt_rand(100000, 999999);
      $order_num = $accommodationbooking->userId . '' . $six_digit_random_number;
      $accommodationbooking->Orderid = $order_num;

      $accommodationbooking->save();
      $data['details_sub'] = $stripe->receipt_url;

      $data['ref_id'] = $accommodationbooking->id;
      DB::table('payments')->insertGetId($data);
    }

    Session::flash('success', 'Your payment of £' . $request->total_price . ' successfully completed.. 
         Remaining balance of £' . $request->total_price . ' will be paid upon arrival ');

    return view('front.accommodation.payment_success');
  }

  // public function stripePostxxxx(Request $request)
  // {
  //   Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  //   $input = $request->all();
  //   $userName = User::where('id', $request->userId)->first();
  //   $accommodation = Accommodation::where('id', $request->acco_Id)->first();
  //   $acctype = Accommodationadmintype::where('id', $request->acc_typedata)->first();
  //   $acctypename = "";

  //   if ($acctype) {
  //     $acctypename = $acctype->name;
  //   }
  //   $accuser = User::where('id', $accommodation->user_id)->first();
  //   $price = floatval($request->totalprice);

  //   $stripe =    Stripe\Charge::create([
  //     "amount" => $price * 100,
  //     "currency" => "gbp",
  //     "source" => $request->stripeToken,
  //     "description" => "Accommodation Booking Payment From Air study"
  //   ]);

  //   if ($stripe) {

  //     $accommodationbooking = new Accobooking;
  //     $accommodationbooking->userId = $request->userId;
  //     $accommodationbooking->price = $request->totalprice;
  //     $accommodationbooking->accommodationId = $request->acco_Id;
  //     $accommodationbooking->accoType = $request->acco_type;
  //     $accommodationbooking->typeId = $request->acc_typedata;
  //     $accommodationbooking->accFood = $request->acc_food;
  //     $accommodationbooking->receipt_url = $stripe->receipt_url;
  //     $accommodationbooking->paymentStatus = $stripe->status;
  //     $accommodationbooking->card_lastdigit = $stripe->source->last4;
  //     $accommodationbooking->card_id = $stripe->source->id;
  //     $six_digit_random_number = mt_rand(100000, 999999);
  //     $order_num = $accommodationbooking->userId . '' . $six_digit_random_number;
  //     $accommodationbooking->Orderid = $order_num;

  //     if ($accommodationbooking->save()) {

  //       $toemails = [$userName->email, "mani.smartitventures@gmail.com"];

  //       $data = array(
  //         'name'        => $userName->name,
  //         'subject'     => "Accommodation Booking",
  //         'email'       => "sameer.smartitventures@gmail.com",
  //         'accname'     => $accommodation->name,
  //         'totalPrice'  => $request->totalprice,
  //         'receipt_url' => $stripe->receipt_url,
  //         'accFood'     => $request->acc_food,
  //         'bodyMessage' => "Payment Successful!",
  //         'acctype'     => $request->acco_type,
  //         'acctypename' => $acctypename,
  //         'order_no'    => $order_num,
  //         'to'          => $toemails
  //       );


  //       Mail::send('front.email.paymentmail', $data, function ($message) use ($data) {
  //         $message->from($data['email']);
  //         $message->to($data['to']);
  //         $message->subject($data['subject']);
  //       });
  //       return view('front/paymentsuccessacco', compact('accommodationbooking'));
  //     }
  //   }
  // }




  // public function stripePostCourse(Request $request)
  // {

  //   Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

  //   $userName   = User::where('id', $request->userId)->first();
  //   $school     = School::where('id', $request->schoolId)->first();
  //   $schooluser = User::where('id', $school->userId)->first();
  //   $course     = Coursetitle::where('id', $request->courseId)->first();

  //   //$allprice = explode('@', $request->price);
  //   $allprice = $request->price;
  //   $result = explode('@', $allprice);
  //   if ($result[0] != 0 && $result[1] != 0) {
  //     //echo "both have values";
  //     $courseprice   = $result[1];
  //     $discountprice = $result[0];
  //     $decimal_saved = $result[1] - $result[0];
  //     $saved         = number_format((float) $decimal_saved, 2, '.', '');
  //   } elseif ($result[0] == 0 && $result[1] == 0) {
  //     //echo "both have no values";
  //     $courseprice = $result[2];
  //     $discountprice = 0;
  //     $saved         = 0;
  //   } else if ($result[0] == 0 && $result[1] != 0) {
  //     //echo "discount have values";
  //     $courseprice = $result[1];
  //     $discountprice = 0;
  //     $saved         = 0;
  //   } else {
  //     //echo "deal have values";
  //     $courseprice = $result[0];
  //     $discountprice = 0;
  //     $saved         = 0;
  //   }
  //   $dealprice = $result[0];
  //   //$discountprice = $allprice[1];
  //   //$courseprice = $allprice[2];

  //   $cdp = "0";

  //   if ($dealprice > 0) {

  //     $coursediscount = Coursediscount::where('course_id', $request->courseId)->where('school_id', $request->schoolId)->first();
  //     $cde = explode('.', $coursediscount->deal);
  //     $cdp = $cde['0'];
  //   }

  //   if ($request->transportprice) {
  //     $transport = $request->transportprice;
  //   } else {
  //     $transport = 0;
  //   }

  //   if ($request->accomodation) {
  //     $accommo = $request->accomodation;
  //   } else {
  //     $accommo = 0;
  //   }
  //   if ($request->insprice) {
  //     $insprice = $request->insprice;
  //   } else {
  //     $insprice = 0;
  //   }
  //   if ($request->visaprice) {
  //     $visaprice = $request->visaprice;
  //   } else {
  //     $visaprice = 0;
  //   }

  //   $stripe =    Stripe\Charge::create([
  //     "amount" => $request->total_course_price * 100,
  //     "currency" => "gbp",
  //     "source" => $request->stripeToken,
  //     "description" => "Course Booking Payment From Air study"
  //   ]);

  //   if ($stripe) {

  //     $countryName = Userinfo::where('userId', $request->userId)->first();

  //     $coursebooking = new Coursebooking;
  //     $coursebooking->user_id = $request->userId;
  //     if ($countryName) {

  //       $coursebooking->country = $countryName->country;
  //     } else {
  //       $coursebooking->country = "";
  //     }
  //     $coursebooking->school_id = $request->schoolId;
  //     $coursebooking->school_Name = $request->school_Name;
  //     $coursebooking->course_name = $request->course_name;
  //     $coursebooking->registration_fee = $request->registration_fee;
  //     $coursebooking->course_id = $request->courseId;
  //     $coursebooking->hours_per_week = $request->hoursperweek;
  //     $coursebooking->all_price = $request->price;

  //     if ($request->course_date) {
  //       $date = date("Y-m-d", strtotime($request->course_date));
  //       $coursebooking->course_date = $date;
  //     }
  //     if ($request->accomodation) {
  //       $coursebooking->accommodation_price = $request->accomodation;
  //     }
  //     if ($request->acc_id) {
  //       $coursebooking->accommodation_id = $request->acc_id;
  //     }
  //     if ($request->transportid) {
  //       $coursebooking->transport_id = $request->transportid;
  //     }
  //     if ($request->ins_id) {
  //       $coursebooking->ins_id = $request->ins_id;
  //     }
  //     if ($request->visa_id) {
  //       $coursebooking->visa_id = $request->visa_id;
  //     }
  //     $coursebooking->total_course_price = $request->total_course_price;
  //     if ($request->transportprice) {
  //       $coursebooking->transport_price = $request->transportprice;
  //     }
  //     if ($request->insprice) {
  //       $coursebooking->insprice = $request->insprice;
  //     }
  //     if ($request->visaprice) {
  //       $coursebooking->visaprice = $request->visaprice;
  //     }
  //     $coursebooking->receipt_url = $stripe->receipt_url;
  //     $coursebooking->payment_status = $stripe->status;
  //     $coursebooking->card_lastdigit = $stripe->source->last4;
  //     $coursebooking->card_id = $stripe->source->id;
  //     $six_digit_random_number = mt_rand(100000, 999999);
  //     $order_num = $coursebooking->user_id . '' . $six_digit_random_number;
  //     $coursebooking->Orderid = $order_num;

  //     if ($coursebooking->save()) {

  //       $toemails = [$userName->email, "mani.smartitventures@gmail.com"];

  //       $data = array(
  //         'name'             => $userName->name,
  //         'subject'          => "Course Booking",
  //         'email'            => "sameer.smartitventures@gmail.com",
  //         'hpw'              => $request->hoursperweek,
  //         'schoolname'       => $school->name,
  //         'coursename'       => $course->name,
  //         'dealprice'        => $dealprice,
  //         'discountprice'    => $discountprice,
  //         'courseprice'      => $courseprice,
  //         'accommodation'    => $accommo,
  //         'transport'        => $transport,
  //         'totalPrice'       => $request->total_course_price,
  //         'no_of_week'       => $request->no_of_week,
  //         'receipt_url'      => $stripe->receipt_url,
  //         'bodyMessage'      => "Payment Successful!",
  //         'registration_fee' => $request->registration_fee,
  //         'cdp'              => $cdp,
  //         'order_no'         => $order_num,
  //         'transport_way'    => $request->transport_way,
  //         'airport_name'     => $request->airport_name,
  //         'acctype_name'     => $request->acctype_name,
  //         'insurance_name'   => $request->insurance_name,
  //         'insurance_price'  => $insprice,
  //         'visa_name'        => $request->visa_name,
  //         'visa_price'       => $visaprice,
  //         'saved'            => $saved,
  //         'to'               => $toemails
  //       );


  //       Mail::send('front.email.coursepaymentmail', $data, function ($message) use ($data) {
  //         $message->from($data['email']);
  //         $message->to($data['to']);
  //         $message->subject($data['subject']);
  //       });
  //       /* Delete Refrel of this user */
  //       $creditoption = $request->creditOptin;
  //       if ($creditoption == 1) {
  //         $deleterefrel = Refer::where('sendinguserid', $request->userId)->delete();
  //       }

  //       //return redirect('mainallschool')->with('success', 'Payment successful!');
  //       return view('front/paymentsuccesscourse', compact('coursebooking'));
  //     }
  //   }
  // }
}
