<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Country;
use App\State;
use App\City;
use App\Zipcode;
use App\Facility;
use App\Schooltype;
use App\School;
use App\Schoolimage;
use App\Schooladdress;
use App\Schoolcontactinfo;
use App\Schoolhistory;
use App\Schoolfacility;
use App\Schoolcourse;
use Imageresize;

class SchoolController extends Controller
{

    public function allSchool(){

        $schools = School::all();
        return view('superadmin.school.allschool',compact('schools'));

    }

    public function schooltype()
    {
    	$schooltypes = Schooltype::orderBy('id','desc')->get();
    	return view('superadmin.school.schooltype',compact('schooltypes'));
    }

     public function storeSchooltype(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'name'=>'required|unique:schooltypes',
        ]);
        if ($validator->fails())
        {
           return Response::json(['errors' => $validator->errors()]);
        }
        else
        {
            $schooltype = new Schooltype;
            $schooltype->name = $request->name;
            if($schooltype->save())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }    	
    }


    public function editSchooltype(Request $request)
    {
        $schooltype = Schooltype::find($request->id);
        return  $schooltype;
    }


    public function updateSchooltype(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:schooltypes,name,'.$request->id,
        ]);
        if ($validator->fails())
        {
            return Response::json(['errors' => $validator->errors()]);
        }
        else
        {
            $schooltype = Schooltype::find($request->id);
            $schooltype->name = $request->name; 
            if($schooltype->save())
            {
                return 1;
            }
            else
            {
                return 0;
            } 
        }             
    }
    
    public function destroySchooltype(Request $request)
    {
        $schooltype = Schooltype::find($request->id);
        if($schooltype->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function storeSchool(Request $request){
        $school = new School;

        $school->userId = $request->userId;
        $school->name = $request->name;
        $school->email = $request->email;
        $school->description = $request->description;
        $school->video = $request->video;

        if($school->save()){
             
            $schoolId =$school->id;


        foreach($request->file('image') as $photo)
            {
                $name = rand(1,100);
                $name = $name.time();


                $imagename = $name.'.'.$photo->getClientOriginalExtension();
                $base_url = \URL::to('/');
                $fullurl  = $base_url.'/thumbnail_images/'.$imagename;

                $destinationPath = public_path('/thumbnail_images'); 
                $thumb_img = Imageresize::make($photo->getRealPath())->resize(1140, 760);
                $thumb_img->save($destinationPath.'/'.$imagename,80);
                $destinationPath = public_path('/normal_images');
                $photo->move($destinationPath, $imagename);
                $form = Schoolimage::create([
                'schoolId' => $schoolId,
                'image' => $fullurl
                ]);
            }   

            $contactinfo = new Schoolcontactinfo;

            $contactinfo->schoolId = $schoolId;
            $contactinfo->contactInfo = $request->contactinfo;
            $contactinfo->save();    

            $address = new Schooladdress;
            $address->schoolId    = $schoolId;
            $address->address      = $request->address;
            /*$address->countryId   = $request->countryId;*/
            $country_explode        = explode('|', $request->countryId);
            $address->countryId    = $country_explode[1];
            /*$address->stateId     = $request->stateId;*/
            $state_explode          = explode('|', $request->stateId);
            $address->stateId       = $state_explode[1];
            $address->zipCodeId     = $request->zip_code;
            $address->cityId      = $request->cityId;
            $address->save();

        return back()->with('success',"You are successfully created service");
        
        }

        else
        {
            return back()->with('error',"Something Error. Please Try After Some Time");
        } 
    }

     public function destroySchool(Request $request)
    {
        $school = School::find($request->id);

        if($school){

            $schooladdress     = Schooladdress::where('schoolId', $request->id)->delete();
            $Schoolimage       = Schoolimage::where('schoolId', $request->id)->delete();
            $Schoolcontactinfo = Schoolcontactinfo::where('schoolId', $request->id)->delete();
            $Schoolhistory = Schoolhistory::where('school_id', $request->id)->delete();
            $course = Course::where('schoolId', $request->id)->delete();
            $courseprice = Courseprice::where('schoolId', $request->id)->delete();
            $schoolcourse = Schoolcourse::where('schoolId', $request->id)->delete();
            
            
            if($school->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }

        } 
    }

    public function allschoollist(Request $request){
        
        $schools = School::all();
        return view('superadmin.school.allschool',compact('schools'));

    }

    public function updateSchoolStatus(Request $request){

             $id = $request->id;
            $schoolstatus = school::find($id);
            $status = $request->value;
          
            if($status == 0){

             $schoolstatus->status = 1;

            }

            if($status == 1){
                  $schoolstatus->status = 0;
             }
            

         if($schoolstatus->update()){
            
            return "success";
        }

    }

    public function viewSchooldetail(Request $request){

        $school = School::where('id',$request->id)->first();
        $schoolimage = "";
        $schoolimage = Schoolimage::where('schoolId',$request->id)->first();
       
          $schoolAddress = Schooladdress::where('schoolId', $request->id)->first();
      
           
        if($schoolAddress != null)
        {
        
        $school->address =  $schoolAddress->address;
         $country = Country::where('id', $schoolAddress->countryId)->first();
         $state = State::where('id', $schoolAddress->stateId)->first();
         $city = City::where('id', $schoolAddress->cityId)->first();
         $zipcode = Zipcode::where('id', $schoolAddress->zipCodeId)->first();
        }

        else{
         $country = 0;
         $state = 0;
         $city = 0;
         $zipcode = 0;
        }

         $school_facilities = Schoolfacility::where('school_id', $school->id)->get();
            if($school_facilities->isNotEmpty())
                {
                    $allfacilities = [];
                 foreach($school_facilities as $facilities){
                     $getfacilities = Facility::where('id', $facilities->facility_id)->get();
                      foreach($getfacilities as $fct){
                          $allfacilities[] =  $fct->name;
                      }
                      $school->facilities = $allfacilities; 
                   }
                }else{
                     $school->facilities = 'no facility';
                }   

        return view('superadmin.school.viewschooldetail', compact('school','schoolimage','state','city','country','zipcode'));

        }

}
