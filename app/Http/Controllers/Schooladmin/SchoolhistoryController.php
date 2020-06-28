<?php

namespace App\Http\Controllers\Schooladmin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Schooltype;
use App\School;
use App\Schoolimage;
use App\Schooladdress;
use App\Schoolcontactinfo;
use App\Schoolfacility;
use App\Facility;
use App\Country;
use App\State;
use App\City;
use App\Zipcode;
use Auth;
use App\Schoolhistory;

use Imageresize;

class SchoolhistoryController extends Controller
{
	    public function addSchoolHistory(){

	        $userId  = Auth::user()->id;
	    	$schools = School::where('userId', $userId)->where('status', 1)->where('deactiveStatus', 0)->get();
	    	return view('schooladmin/schoolhistory/addschoolhistory', compact('schools'));

	    }

	    public function storeSchoolHistory(Request $request){

$input = Input::all();

	    	/* Add school History Starts*/
     foreach($input['no_of_student'] as $index => $value){
              if($value && $input['no_of_student'][$index] && $input['country_id'][$index] ){
            $schoolhistory = new Schoolhistory;
            $schoolhistory->user_id       = $request->userId;
            $schoolhistory->school_id     = $request->school_id;
            $schoolhistory->no_of_student = $input['no_of_student'][$index];
            $schoolhistory->country_id    = $input['country_id'][$index];
            $schoolhistoryexist = Schoolhistory::where('school_id', $schoolhistory->school_id)->where('country_id',$schoolhistory->country_id)->first();
            if( $schoolhistoryexist == null)
             {
               $schoolhistory->save();	
             }else{
             return back()->with('error',"Schoolhistory Already  exist with this School Name and Country Name ");	
             }
        }
       } 
       return back()->with('success',"Schoolhistory successfully Added ");
/* Add school History Ends*/
	    }

		public function allSchoolHistory(){

		$userId = Auth::user()->id;
		$schools = School::where('userId', $userId)->get();
	      return view('schooladmin.schoolhistory.allschoolhistory',compact('schools'));
		   }


	    public function editSchoolHistory(Request $request){

	    	$userId        = Auth::user()->id;
            $schoolhistory = Schoolhistory::where('school_id', $request->id)->get();
            $school        = School::where('id', $request->id)->first();
	        return view('schooladmin.schoolhistory.editschoolhistory',compact('schoolhistory','school'));

		   }

		 public function updateSchoolHistory(Request $request){
       
        $input = Input::all();
        $Schoolhistorytdel   = Schoolhistory::where('school_id', $request->school_id)->delete();
        foreach($input['no_of_student'] as $index => $value){
              if($value && $input['no_of_student'][$index] && $input['country_id'][$index] ){
            $schoolhistory = new Schoolhistory;
            $schoolhistory->user_id       = $request->userId;
            $schoolhistory->school_id     = $request->school_id;
            $schoolhistory->no_of_student = $input['no_of_student'][$index];
            $schoolhistory->country_id    = $input['country_id'][$index];
            $schoolhistoryexist = Schoolhistory::where('school_id', $schoolhistory->school_id)->where('country_id',$schoolhistory->country_id)->first();
            if( $schoolhistoryexist == null)
             {
               $schoolhistory->save();	
             }else{
             return back()->with('error',"Schoolhistory Already  exist with this School Name and Country Name ");	
             }
        }
       } 
       return back()->with('success',"Schoolhistory successfully Updated ");
    
	    }


	   public function destroySchoolHistory(Request $request){

        $schoolhistory = Schoolhistory::find($request->id);

        if($schoolhistory->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }

	   }
}
