<?php

namespace App\Http\Controllers\Schooladmin;

use App\Accommodationadmintype;
use App\Accreditation;
use App\Common;
use App\Coursebooking;
use App\Coursediscount;
use App\Courseprice;
use App\Coursetitle;
use App\Facility;
use App\Favcourse;
use App\Http\Controllers\Controller;
use App\Insurance;
use App\Logoimage;
use App\School;
use App\Schoolaccommodationprice;
use App\Schooladdress;
use App\Schoolfacility;
use App\Schoolimage;
use App\Schoolinsurance;
use App\Schooltransport;
use App\Schooltype;
use App\Schoolvisa;
use App\User;
use App\Visa;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Imageresize;

class SchoolController extends Controller
{

    public function allSchool()
    {

        $userId = Auth::user()->id;
        $schools = School::where('userId', $userId)->orderBy('id', 'desc')->get();
        return view('schooladmin.school.allschool', compact('schools'));
    }

    public function schooltype()
    {
        $schooltypes = Schooltype::orderBy('id', 'desc')->get();
        return view('superadmin.school.schooltype', compact('schooltypes'));
    }

    public function storeSchooltype(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:schooltypes',
            ]);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        } else {
            $schooltype = new Schooltype;
            $schooltype->name = $request->name;
            if ($schooltype->save()) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function editSchooltype(Request $request)
    {
        $schooltype = Schooltype::find($request->id);
        return $schooltype;
    }

    public function editSchool(Request $request)
    {
        $school = School::find($request->id);
        $facilities = Facility::all();
        $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
        $schoolfacilities = Schoolfacility::where('school_id', $request->id)->get(['facility_id']);
        $images = Schoolimage::where('schoolId', $request->id)->get();
        $logo = Logoimage::where(['logoable_id' => $request->id, 'logoable_type' => "school"])->first();
        $schoolAddress = Schooladdress::where('schoolId', $request->id)->first();
        $coursetitles = Coursetitle::all();
        $coursesprices = Courseprice::where('schoolId', $request->id)->get();
        $courseids = [];
        $allcourseid;
        if ($coursesprices->isNotEmpty()) {

            foreach ($coursesprices as $coursesprice) {
                $courseids[] = $coursesprice->courseId;
            }
            $allcourseid = array_unique($courseids);
        }
        $Accommodationadmintype = Accommodationadmintype::all();
        $schoolaccommodationprices = Schoolaccommodationprice::where('school_id', $request->id)->get();
        foreach ($schoolaccommodationprices as $schoolprice) {

            $accommodationadmintype = Accommodationadmintype::where('id', $schoolprice->accommodation_id)->first();
            $schoolprice->acctypename = $accommodationadmintype->name;

        }
        $allaccommodationids = array();
        if ($schoolaccommodationprices->isNotEmpty()) {

            foreach ($schoolaccommodationprices as $schoolaccommodationprice) {
                $accommodationids[] = $schoolaccommodationprice->accommodation_id;
            }
            $allaccommodationids = array_unique($accommodationids);
        }
        $insaurence = Insurance::all();
        $schoolinsurance = Schoolinsurance::where('school_id', $request->id)->get();
        foreach ($schoolinsurance as $schoolins) {
            $getinsurence = Insurance::where('id', $schoolins->insurence_id)->first();
            $schoolins->insname = $getinsurence->name;
        }
        $visa = Visa::all();
        $schoolvisa = Schoolvisa::where('school_id', $request->id)->get();
        foreach ($schoolvisa as $schoolvis) {
            $getvisa = Visa::where('id', $schoolvis->visa_id)->first();
            $schoolvis->visaname = $getvisa->name;
        }
        $schooltransports = Schooltransport::where('school_id', $request->id)->get();
        if ($schoolAddress != null) {
            /* api used to get all countries */
            $data_country = $schoolAddress->countryId;
            $country_explode = explode('|', $data_country);
            $country_code = $country_explode[0];
            $api_country = "http://battuta.medunes.net/api/country/all/?key=$battuta_key";
            $country_response = file_get_contents($api_country);
            $countries = json_decode($country_response);
            /* api used to get all states */
            $data_state = $schoolAddress->stateId;
            $state_explode = explode('|', $data_state);
            $state_country_code = $state_explode[0];
            $state_code = $state_explode[1];
            $api_state = "http://battuta.medunes.net/api/region/" . $country_code . "/all/?key=$battuta_key";
            $states_response = file_get_contents($api_state);
            $states = json_decode($states_response);
            /* api used to get all states */
            $data_city = $schoolAddress->cityId;
            $city_explode = explode('|', $data_city);
            $city_code = $city_explode[0];
            $state_region = urlencode($state_code);
            $api_cities = "http://battuta.medunes.net/api/city/" . $state_country_code . "/search/?region=" . $state_region . "&key=$battuta_key";
            $cities_response = file_get_contents($api_cities);
            $cities = json_decode($cities_response);
            $zipcode_id = $schoolAddress->zipCodeId;

            $school->address = $schoolAddress->address;

            /* $school->country_id = $schoolAddress->countryId;
        $school->state_id = $schoolAddress->stateId;
        $school->city_id = $schoolAddress->cityId;
        $school->zipcode_id = $schoolAddress->zipCodeId;
        $states = State::where('id', $schoolAddress->stateId)->get();
        $cities = City::where('id', $schoolAddress->cityId)->get();
        $zipcodes = Zipcode::where('id', $schoolAddress->zipCodeId)->get();*/
        } else {
            /* $states = 0;
        $cities = 0;
        $zipcodes = 0;*/
        }
        //return $school;.
        if (empty($allcourseid)) {
            $allcourseid = 0;
        }
        $accreditations = Accreditation::all();
        return view('schooladmin.school.editschool', compact('school', 'facilities', 'schoolfacilities', 'images', 'logo', 'countries', 'country_code', 'states', 'state_code', 'cities', 'city_code', 'zipcode_id', 'coursetitles', 'allcourseid', 'Accommodationadmintype', 'schoolaccommodationprices', 'allaccommodationids', 'schooltransports', 'insaurence', 'visa', 'schoolvisa', 'schoolinsurance', 'accreditations'));
    }

    public function updateSchooltype(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:schooltypes,name,' . $request->id,
        ]);
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        } else {
            $schooltype = Schooltype::find($request->id);
            $schooltype->name = $request->name;
            if ($schooltype->save()) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function destroySchooltype(Request $request)
    {
        $schooltype = Schooltype::find($request->id);
        if ($schooltype->delete()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function storeSchool(Request $request)
    {
        $modelName = 'School';
        $school = new School;
        $school->userId = $request->userId;
        $school->name = $request->name;
        $school->email = $request->email;
        $school->description = $request->description;
        $school->no_of_student = $request->no_of_student;
        $school->agelimit = $request->agelimit;
        $school->recognised_by = $request->recognised_by;
        $school->phone = $request->phone;
        $school->weblink = $request->weblink;
        $school->video = $request->video;
        $school->registration_fee = $request->registration_fee;
        $school->accreditations = $request->accreditations ? implode(',', $request->accreditations) : "";
        $getSlug = new Common();
        $Slug = $getSlug->slug($request->name, $modelName);
        $school->slug = $Slug;

        if ($school->save()) {

            $schoolId = $school->id;

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $photo) {
                    $name = rand(1, 100);
                    $name = $name . time();
                    $imagename = $name . '.' . $photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl = $base_url . '/thumbnail_images/' . $imagename;
                    $destinationPath = public_path('/thumbnail_images');
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(840, 448);
                    $thumb_img->save($destinationPath . '/' . $imagename, 80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    Schoolimage::create([
                        'schoolId' => $schoolId,
                        'image' => $imagename,
                    ]);
                }
            }
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $name = rand(1, 100);
                $name = $name . time();
                $imagename = $name . '.' . $logo->getClientOriginalExtension();
                $base_url = \URL::to('/');
                $fullurl = $base_url . '/logo_images/' . $imagename;
                $destinationPath = public_path('/logo_images');
                // $thumb_img = Imageresize::make($photo->getRealPath())->resize(840, 448);
                // $thumb_img->save($destinationPath.'/'.$imagename,80);
                // $destinationPath = public_path('/normal_images');
                $logo->move($destinationPath, $imagename);
                $logoObj = new Logoimage();
                $logoObj->logoable_id = $schoolId;
                $logoObj->logoable_type = 'school';
                $logoObj->logo = $imagename;
                $logoObj->save();
            }

            if ($request['facilities']) {
                foreach ($request['facilities'] as $facility) {
                    if (!empty($facility)) {
                        Schoolfacility::create([
                            'school_id' => $schoolId,
                            'facility_id' => $facility,
                        ]);
                    }
                }
            }

            $address = new Schooladdress;
            $address->schoolId = $schoolId;
            $address->address = $request->address;
            $address->countryId = $request->countryId;
            $address->stateId = $request->stateId;
            $address->cityId = $request->cityId;
            $address->zipCodeId = $request->zip_code;
            $address->save();
/* Add Course Prices Starts */
            $schoolId = $school->id;
            $input = Input::all();
            if (!empty($input['course_id'])) {
                foreach ($input['course_id'] as $index => $value) {
                    $course_id = $value;
                    foreach ($input['hour_per_week-' . $course_id] as $index => $value) {
                        $courseprice = new Courseprice;
                        $courseprice->schoolId = $schoolId;
                        $courseprice->courseId = $course_id;
                        $courseprice->hours_per_week = $input['hour_per_week-' . $course_id][$index];
                        $courseprice->lesson_per_week = $input['lesson_per_week-' . $course_id][$index];
                        $courseprice->course_shift = $input['course_shift-' . $course_id][$index];
                        $courseprice->ppw1 = $input['ppw1-' . $course_id][$index];
                        $courseprice->ppw2 = $input['ppw2-' . $course_id][$index];
                        $courseprice->ppw3 = $input['ppw3-' . $course_id][$index];
                        $courseprice->ppw4 = $input['ppw4-' . $course_id][$index];
                        $courseprice->ppw5 = $input['ppw5-' . $course_id][$index];
                        $courseprice->ppw6 = $input['ppw6-' . $course_id][$index];
                        $courseprice->ppw7 = $input['ppw7-' . $course_id][$index];
                        $courseprice->ppw8 = $input['ppw8-' . $course_id][$index];
                        $courseprice->ppw9 = $input['ppw9-' . $course_id][$index];
                        $courseprice->ppw10 = $input['ppw10-' . $course_id][$index];
                        $courseprice->ppw11 = $input['ppw11-' . $course_id][$index];
                        $courseprice->ppw12 = $input['ppw12-' . $course_id][$index];
                        $courseprice->ppw13 = $input['ppw13-' . $course_id][$index];
                        /* Condition to check if any value is null */
                        if (!empty($input['hour_per_week-' . $course_id][$index])) {
                            $courseprice->save();
                        }

                    }
                    /* Add Course Discount and Deal Starts */
                    foreach ($input['discount_A-' . $course_id] as $index => $value) {
                        $coursediscount = new Coursediscount;
                        $coursediscount->school_id = $schoolId;
                        $coursediscount->course_id = $course_id;
                        $coursediscount->discount = $input['discount_A-' . $course_id][$index];
                        $coursediscount->deal = $input['discount_B-' . $course_id][$index];
                        $coursediscount->commission = $request->commission;

                        /* Condition to check if any value is null */
                        if (!empty($input['discount_A-' . $course_id][$index]) || !empty($input['discount_B-' . $course_id][$index]) || !empty($request->commission)) {
                            $coursediscount->save();
                        }

                    }
                    /* Add Course Discount and Deal Starts */
                }
            }
/* Add Course Prices Ends */
/* Add school Accomodation prices*/
            if (!empty($input['get_insurence'])) {
                foreach ($input['acco_type_id'] as $index => $value) {
                    $acco_type_id = $value;
                    foreach ($input['accprice-' . $acco_type_id] as $index => $value) {
                        $schoolaccommodationprice = new Schoolaccommodationprice;
                        $schoolaccommodationprice->school_id = $schoolId;
                        $schoolaccommodationprice->accommodation_id = $acco_type_id;
                        $schoolaccommodationprice->price = $input['accprice-' . $acco_type_id][$index];

                        if (!empty($input['accprice-' . $acco_type_id][$index])) {
                            $schoolaccommodationprice->save();
                        }

                    }

                }
            }
/* Add school Accomodation prices Ends*/
/* Add school Transport Starts*/
            foreach ($input['airport_name'] as $index => $value) {
                if ($value && $input['pp'][$index] && $input['pdp'][$index]) {
                    $schooltransport = new Schooltransport;
                    $schooltransport->school_id = $schoolId;
                    $schooltransport->airport_name = $value;
                    $schooltransport->pick_up = $input['pp'][$index];
                    $schooltransport->pick_up_and_drop = $input['pdp'][$index];
                    $schooltransport->save();
                }
            }
/* Add school Insurence prices*/
            if (!empty($input['get_insurence'])) {
                foreach ($input['ins_type_id'] as $index => $value) {
                    $ins_id = $value;
                    foreach ($input['insprice-' . $ins_id] as $index => $value) {
                        $insuranceprice = new Schoolinsurance;
                        $insuranceprice->school_id = $schoolId;
                        $insuranceprice->insurence_id = $ins_id;
                        $insuranceprice->price = $input['insprice-' . $ins_id][$index];

                        if (!empty($input['insprice-' . $ins_id][$index])) {
                            $insuranceprice->save();
                        }

                    }

                }
            }
/* Add school Insurence prices Ends*/
/* Add school Visa prices*/
            if (!empty($input['get_visa'])) {
                foreach ($input['visa_type_id'] as $index => $value) {
                    $visa_id = $value;
                    foreach ($input['visaprice-' . $visa_id] as $index => $value) {
                        $visaprice = new Schoolvisa;
                        $visaprice->school_id = $schoolId;
                        $visaprice->visa_id = $visa_id;
                        $visaprice->price = $input['visaprice-' . $visa_id][$index];

                        if (!empty($input['visaprice-' . $visa_id][$index])) {
                            $visaprice->save();
                        }

                    }

                }
            }
/* Add school Visa prices Ends*/
/* Add school Transport Ends*/
            return back()->with('success', "School successfully created ");

        } else {
            return back()->with('error', "Something Error. Please Try After Some Time");
        }
    }

    public function updateSchool(Request $request)
    {

        $school = School::find($request->id);
        $id = $request->id;
        $school->userId = $request->userId;
        $school->name = $request->name;
        $school->email = $request->email;
        $school->description = $request->description;
        $school->no_of_student = $request->no_of_student;
        $school->agelimit = $request->agelimit;
        $school->recognised_by = $request->recognised_by;
        $school->phone = $request->phone;
        $school->weblink = $request->weblink;
        $school->video = $request->video;
        $school->registration_fee = $request->registration_fee;
        $school->accreditations = $request->accreditations ? implode(',', $request->accreditations) : "";

        if ($school->save()) {

            $schoolId = $request->id;

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $photo) {
                    $name = rand(1, 100);
                    $name = $name . time();
                    $imagename = $name . '.' . $photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl = $base_url . '/thumbnail_images/' . $imagename;

                    $destinationPath = public_path('/thumbnail_images');
                    $destinationPath1 = public_path('/small_images');
                    $destinationPath2 = public_path('/medium_images');
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(840, 448);
                    $thumb_img1 = Imageresize::make($photo->getRealPath())->resize(255, 136);
                    $thumb_img2 = Imageresize::make($photo->getRealPath())->resize(350, 186);
                    $thumb_img->save($destinationPath . '/' . $imagename, 80);
                    $thumb_img1->save($destinationPath1 . '/' . $imagename, 80);
                    $thumb_img2->save($destinationPath2 . '/' . $imagename, 80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    $form = Schoolimage::create([
                        'schoolId' => $schoolId,
                        'image' => $imagename,
                    ]);
                }
            }
            if ($request->hasFile('logo')) {
                $previousLogo = Logoimage::where(['logoable_id' => $schoolId, 'logoable_type' => 'school'])->first();
                if ($previousLogo) {
                    $deleteimage = Logoimage::where(['logoable_id' => $schoolId, 'logoable_type' => 'school', 'logo' => $previousLogo->logo])->delete();
                    unlink(public_path('logo_images/' . $previousLogo->logo));
                }
                $logo = $request->file('logo');
                $name = rand(1, 100);
                $name = $name . time();
                $imagename = $name . '.' . $logo->getClientOriginalExtension();
                $base_url = \URL::to('/');
                $fullurl = $base_url . '/logo_images/' . $imagename;
                $destinationPath = public_path('/logo_images');
                $logo->move($destinationPath, $imagename);
                $logoObj = new Logoimage();
                $logoObj->logoable_id = $schoolId;
                $logoObj->logoable_type = 'school';
                $logoObj->logo = $imagename;
                $logoObj->save();
            }

            if ($request['facilities']) {
                $deleteschoolfacility = Schoolfacility::where('school_id', $schoolId)->delete();

                foreach ($request['facilities'] as $facility) {

                    if (!empty($facility)) {

                        Schoolfacility::create([
                            'school_id' => $schoolId,
                            'facility_id' => $facility,
                        ]);
                    }
                }
            }

            $schooladdress = Schooladdress::where('schoolId', $schoolId)->first();

            if ($schooladdress != null) {
                $address = Schooladdress::where('schoolId', $schoolId)->first();
                $address->schoolId = $schoolId;
                $address->address = $request->address;
                $address->zipCodeId = $request->zip_code;
                $address->countryId = $request->countryId;
                $address->stateId = $request->stateId;
                $address->cityId = $request->cityId;
                $address->save();
            } else {

                $address = new Schooladdress;
                $address->schoolId = $schoolId;
                $address->address = $request->address;
                $address->zipCodeId = $request->zip_code;
                $address->countryId = $request->countryId;
                $address->stateId = $request->stateId;
                $address->cityId = $request->cityId;
                $address->save();
            }
/* Update Course Price  Strats */
            $schoolId = $request->id;
            $input = Input::all();
            // echo '<pre>';
            // print_r($input);
            // die;

// $databasecourseids = Courseprice::where('schoolId', $schoolId)->get(['id'])->toArray();
            $coursediscount = Coursediscount::where('school_id', $schoolId)->delete();

            if (!empty($input['course_id'])) {
                foreach ($input['course_id'] as $index => $value) {
                    $course_id = $value;
                    foreach ($input['hour_per_week-' . $course_id] as $index => $value) {

                        if ($input['coursepriceid-' . $course_id][$index]) {
                            $courseprice = Courseprice::find($input['coursepriceid-' . $course_id][$index]);

                        } else {
                            $courseprice = new Courseprice;
                        }
                        $courseprice->schoolId = $schoolId;
                        $courseprice->courseId = $course_id;
                        $courseprice->hours_per_week = $input['hour_per_week-' . $course_id][$index];
                        $courseprice->lesson_per_week = $input['lesson_per_week-' . $course_id][$index];
                        $courseprice->course_shift = $input['course_shift-' . $course_id][$index];
                        $courseprice->ppw1 = $input['ppw1-' . $course_id][$index];
                        $courseprice->ppw2 = $input['ppw2-' . $course_id][$index];
                        $courseprice->ppw3 = $input['ppw3-' . $course_id][$index];
                        $courseprice->ppw4 = $input['ppw4-' . $course_id][$index];
                        $courseprice->ppw5 = $input['ppw5-' . $course_id][$index];
                        $courseprice->ppw6 = $input['ppw6-' . $course_id][$index];
                        $courseprice->ppw7 = $input['ppw7-' . $course_id][$index];
                        $courseprice->ppw8 = $input['ppw8-' . $course_id][$index];
                        $courseprice->ppw9 = $input['ppw9-' . $course_id][$index];
                        $courseprice->ppw10 = $input['ppw10-' . $course_id][$index];
                        $courseprice->ppw11 = $input['ppw11-' . $course_id][$index];
                        $courseprice->ppw12 = $input['ppw12-' . $course_id][$index];
                        $courseprice->ppw13 = $input['ppw13-' . $course_id][$index];
                        /* Condition to check if any value is null */
                        if (!empty($input['hour_per_week-' . $course_id][$index])) {
                            $courseprice->save();
                        }

                    }
                    /* Add Course Discount and Deal Starts */
                    foreach ($input['discount_A-' . $course_id] as $index => $value) {
                        $coursediscount = new Coursediscount;
                        $coursediscount->school_id = $schoolId;
                        $coursediscount->course_id = $course_id;
                        $coursediscount->discount = $input['discount_A-' . $course_id][$index];
                        $coursediscount->deal = $input['discount_B-' . $course_id][$index];
                        $coursediscount->commission = $request->commission;

                        /* Condition to check if any value is null */
                        if (!empty($input['discount_A-' . $course_id][$index]) || !empty($input['discount_B-' . $course_id][$index]) || !empty($request->commission)) {
                            $coursediscount->save();
                        }

                    }
                    /* Add Course Discount and Deal Starts */

                }
            }

/* Update Course Price  Ends  */
/* Update school Accomodation prices*/
// $schooladdress     = Schoolaccommodationprice::where('school_id', $schoolId)->delete();
            if (!empty($input['get_acco']) || !empty($input['acco_type_id'])) {
                foreach ($input['acco_type_id'] as $index => $value) {
                    $acco_type_id = $value;
                    foreach ($input['accprice-' . $acco_type_id] as $index => $value) {
                        if ($input['accopriceid-' . $acco_type_id][$index]) {
                            $schoolaccommodationprice = Schoolaccommodationprice::find($input['accopriceid-' . $acco_type_id][$index]);

                        } else {
                            $schoolaccommodationprice = new Schoolaccommodationprice;
                        }
                        $schoolaccommodationprice->school_id = $schoolId;
                        $schoolaccommodationprice->accommodation_id = $acco_type_id;
                        $schoolaccommodationprice->price = $input['accprice-' . $acco_type_id][$index];
                        $schoolaccommodationprice->description = $input['accdesc-' . $acco_type_id][$index];

                        if (!empty($input['accprice-' . $acco_type_id][$index])) {
                            $schoolaccommodationprice->save();
                        }
                    }

                }
            }
/* Update school Accomodation prices Ends*/
/* Update school Transport Starts*/
// $schooltransportdel   = Schooltransport::where('school_id', $schoolId)->delete();
            foreach ($input['airport_name'] as $index => $value) {

                if ($value && $input['pp'][$index] && $input['pdp'][$index]) {

                    if ($input['transportpriceid'][$index] != null) {
                        $schooltransport = Schooltransport::find($input['transportpriceid'][$index]);
                    } else {
                        $schooltransport = new Schooltransport;
                    }
                    $schooltransport->school_id = $schoolId;
                    $schooltransport->airport_name = $value;
                    $schooltransport->pick_up = $input['pp'][$index];
                    $schooltransport->pick_up_and_drop = $input['pdp'][$index];
                    $schooltransport->save();
                }
            }
/* Update school Transport Ends*/
/* Update school Insurence prices*/
//$schooladdress     = Schoolinsurance::where('school_id', $schoolId)->delete();
            if (!empty($input['get_insurence']) || !empty($input['ins_type_id'])) {
                foreach ($input['ins_type_id'] as $index => $value) {
                    $ins_id = $value;
                    foreach ($input['insprice-' . $ins_id] as $index => $value) {
                        if ($input['insurenceid-' . $ins_id][$index]) {
                            $insuranceprice = Schoolinsurance::find($input['insurenceid-' . $ins_id][$index]);

                        } else {
                            $insuranceprice = new Schoolinsurance;
                        }
                        $insuranceprice->school_id = $schoolId;
                        $insuranceprice->insurence_id = $ins_id;
                        $insuranceprice->price = $input['insprice-' . $ins_id][$index];

                        if (!empty($input['insprice-' . $ins_id][$index])) {
                            $insuranceprice->save();
                        }

                    }

                }
            }
/* Update school Insurence prices Ends*/
/* Update school Visa prices*/
//$schooladdress     = Schoolvisa::where('school_id', $schoolId)->delete();
            if (!empty($input['get_visa']) || !empty($input['visa_type_id'])) {
                foreach ($input['visa_type_id'] as $index => $value) {
                    $visa_id = $value;
                    foreach ($input['visaprice-' . $visa_id] as $index => $value) {
                        if ($input['visapid-' . $visa_id][$index]) {
                            $visaprice = Schoolvisa::find($input['visapid-' . $visa_id][$index]);

                        } else {
                            $visaprice = new Schoolvisa;
                        }
                        $visaprice->school_id = $schoolId;
                        $visaprice->visa_id = $visa_id;
                        $visaprice->price = $input['visaprice-' . $visa_id][$index];

                        if (!empty($input['visaprice-' . $visa_id][$index])) {
                            $visaprice->save();
                        }

                    }

                }
            }
/* Update school Visa prices Ends*/
            return back()->with('success', "School successfully updated ");

        } else {
            return back()->with('error', "Something Error. Please Try After Some Time");
        }
    }

    public function showLangSchool(Request $request)
    {

        $school_id = $request->id;

        $school = School::find($request->id);
        $airports = Schooltransport::where('school_id', $school_id)->get();

        return view('schooladmin.school.addlanguageschool', compact('school', 'school_id', 'airports'));

    }

    public function addLangSchool(Request $request)
    {

        $input = Input::all();

        $School = School::find($request->id);

        $School->name = $request->name;
        $School->name_tr = $request->name_tr;
        $School->name_ar = $request->name_ar;
        $School->name_ru = $request->name_ru;
        $School->name_de = $request->name_de;
        $School->name_it = $request->name_it;
        $School->name_fr = $request->name_fr;
        $School->name_es = $request->name_es;
        $School->name_se = $request->name_se;
        $School->name_fa = $request->name_fa;
        $School->name_jp = $request->name_jp;
        $School->name_pr = $request->name_pr;

        $School->description = $request->description;
        $School->description_tr = $request->description_tr;
        $School->description_ar = $request->description_ar;
        $School->description_ru = $request->description_ru;
        $School->description_de = $request->description_de;
        $School->description_it = $request->description_it;
        $School->description_fr = $request->description_fr;
        $School->description_es = $request->description_es;
        $School->description_se = $request->description_se;
        $School->description_jp = $request->description_jp;
        $School->description_fa = $request->description_fa;
        $School->description_pr = $request->description_pr;

        $School->recognised_by = $request->recognised_by;
        $School->recognised_by_tr = $request->recognised_by_tr;
        $School->recognised_by_ar = $request->recognised_by_ar;
        $School->recognised_by_ru = $request->recognised_by_ru;
        $School->recognised_by_de = $request->recognised_by_de;
        $School->recognised_by_it = $request->recognised_by_it;
        $School->recognised_by_fr = $request->recognised_by_fr;
        $School->recognised_by_es = $request->recognised_by_es;
        $School->recognised_by_se = $request->recognised_by_se;
        $School->recognised_by_jp = $request->recognised_by_jp;
        $School->recognised_by_fa = $request->recognised_by_fa;
        $School->recognised_by_pr = $request->recognised_by_pr;

        $schooltransportdel = Schooltransport::where('school_id', $request->id)->delete();

        foreach ($input['airport_name'] as $index => $value) {
            if ($value && $input['pp'][$index] && $input['pdp'][$index]) {
                $schooltransport = new Schooltransport;
                $schooltransport->school_id = $request->id;
                $schooltransport->airport_name = $value;
                $schooltransport->airport_name_ar = $input['airport_name_ar'][$index];
                $schooltransport->airport_name_ru = $input['airport_name_ru'][$index];
                $schooltransport->airport_name_de = $input['airport_name_de'][$index];
                $schooltransport->airport_name_fr = $input['airport_name_fr'][$index];
                $schooltransport->airport_name_it = $input['airport_name_it'][$index];
                $schooltransport->airport_name_tr = $input['airport_name_tr'][$index];
                $schooltransport->airport_name_es = $input['airport_name_es'][$index];
                $schooltransport->airport_name_se = $input['airport_name_se'][$index];
                $schooltransport->airport_name_fa = $input['airport_name_fa'][$index];
                $schooltransport->airport_name_jp = $input['airport_name_jp'][$index];
                $schooltransport->airport_name_pr = $input['airport_name_pr'][$index];
                $schooltransport->pick_up = $input['pp'][$index];
                $schooltransport->pick_up_and_drop = $input['pdp'][$index];
                $schooltransport->save();
            }
        }

        if ($School->save()) {

            return back()->with('success', "School Language Added successfully");

        }

    }

    public function destroySchool(Request $request)
    {

        $school = School::find($request->id);

        if ($school->deactiveStatus == '0') {

            $school->deactiveStatus = 1;

        } else {

            $school->deactiveStatus = 0;
        }

        // $schooladdress     = Schooladdress::where('schoolId', $request->id)->delete();
        // $Schoolimage       = Schoolimage::where('schoolId', $request->id)->delete();
        // $Schoolhistory = Schoolhistory::where('school_id', $request->id)->delete();
        // $courseprices = Courseprice::where('schoolId', $request->id)->get();
        // foreach($courseprices as $courseprice){
        //  $savedcourse = Favcourse::where('coursePid', $courseprice->id)->delete();
        //  $deletecourseprice = Courseprice::where('id', $courseprice->id)->delete();
        // }
        // $coursediscount = Coursediscount::where('school_id', $request->id)->delete();
        // $coursereview = Coursereview::where('school_id', $request->id)->delete();
        // $schoolaccommodationprice =Schoolaccommodationprice::where('school_id', $request->id)->delete();
        // $schoolfacility = Schoolfacility::where('school_id', $request->id)->delete();
        // $schooltransport = Schooltransport::where('school_id', $request->id)->delete();
        // $schoolinsurance = Schoolinsurance::where('school_id', $request->id)->delete();
        // $schoolvisa      = Schoolvisa::where('school_id', $request->id)->delete();
        // $schoolreview = Schoolreview::where('school_id', $request->id)->delete();
        // $savedschool = Favschool::where('schoolid', $request->id)->delete();

        if ($school->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteSchoolcourseprice(Request $request)
    {

        $coursepriceid = $request->coursepid;
        $schoolcourseprice = Courseprice::find($coursepriceid);
        $deletefavcourse = Favcourse::where('coursePid', $coursepriceid)->delete();
        if ($schoolcourseprice) {
            if ($schoolcourseprice->delete()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function deleteschoolaccoprice(Request $request)
    {

        $accoid = $request->accopid;
        $schoolaccoprice = Schoolaccommodationprice::find($accoid);

        if ($schoolaccoprice) {

            if ($schoolaccoprice->delete()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
    public function deleteschoolinsprice(Request $request)
    {
        $insid = $request->inspid;
        $schoolinsprice = Schoolinsurance::find($insid);

        if ($schoolinsprice) {

            if ($schoolinsprice->delete()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
    public function deleteschoolvisaprice(Request $request)
    {
        $visapid = $request->visapid;
        $schoolvisaprice = Schoolvisa::find($visapid);

        if ($schoolvisaprice) {

            if ($schoolvisaprice->delete()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function deleteschooltransportprice(Request $request)
    {

        $transportid = $request->transportpid;
        $schooltransportprice = Schooltransport::find($transportid);

        if ($schooltransportprice) {

            if ($schooltransportprice->delete()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function deleteSchoolcourse(Request $request)
    {

        $courseid = $request->course_id;
        $schoolid = $request->school_id;

        $schoolcourseprice = Courseprice::where('courseId', $courseid)->where('schoolId', $schoolid)->get();
        $deletecoursediscount = Coursediscount::where('course_id', $courseid)->where('school_id', $schoolid)->delete();

        foreach ($schoolcourseprice as $courseprice) {

            $deletefavcourse = Favcourse::where('coursePid', $courseprice->id)->delete();

            $deletecourseprice = Courseprice::where('id', $courseprice->id)->delete();

        }

        if ($schoolcourseprice) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteSchoolImages(Request $request)
    {

        $data_imageid = $request->data_imageid;
        $filename = $request->data_imgurl;
        // $basename_image = basename($filename);
        $deleteimage = Schoolimage::where('id', $data_imageid)->delete();
        unlink(public_path('normal_images/' . $filename));
        unlink(public_path('thumbnail_images/' . $filename));

        if ($deleteimage) {
            return "success";
        } else {
            return "error";
        }
    }
    public function deleteSchoolLogo(Request $request)
    {
        $data_logoid = $request->data_logoid;
        $filename = $request->data_imgurl;
        // $basename_image = basename($filename);
        $deleteimage = Logoimage::where(['id' => $data_logoid, 'logoable_type' => 'school', 'logo' => $filename])->delete();
        unlink(public_path('logo_images/' . $filename));
        //unlink(public_path('thumbnail_images/'.$filename));

        if ($deleteimage) {
            return "success";
        } else {
            return "error";
        }
    }
    public function showCourseBookings(Request $request)
    {

        $schoolId = $request->id;
        $school_name = School::where('id', $schoolId)->first();

        $coursebookings = Coursebooking::where('school_id', $schoolId)->get();
        foreach ($coursebookings as $bookings) {

            $user = User::where('id', $bookings->user_id)->first();
            $bookings->user_name = $user->name;

            $course = Courseprice::where('courseId', $bookings->course_id)->where('hours_per_week', $bookings->hours_per_week)->first();
            $coursetitle = Coursetitle::where('id', $course->courseId)->first();
            $bookings->course_name = $coursetitle->name;

            $accommodation = Schoolaccommodationprice::where('id', $bookings->accommodation_id)->first();

            if ($accommodation) {
                $accommodationtype = Accommodationadmintype::where('id', $accommodation->accommodation_id)->first();
                $bookings->accommodation = $accommodationtype->name;

            }

            $transport = Schooltransport::where('id', $bookings->transport_id)->first();

            if ($transport) {

                $bookings->airport = $transport->airport_name;

            }

        }

        return view('schooladmin.bookingdashboard', compact('school_name', 'coursebookings'));

    }
}
