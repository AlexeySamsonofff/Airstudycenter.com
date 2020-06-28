<?php

namespace App\Http\Controllers\Schooladmin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schoolaccommodation;
use App\Accommodationadmintype;
use App\Accommodationadminfacility;
use App\School;
use App\Schoolaccommodationprice;
use App\Schoolaccommodationfacility;
use Auth;

class SchoolaccommodationController extends Controller
{

  public function getSchoolaccommodationList(){
   
   $userId = Auth::user()->id;
   $schools = Schoolaccommodation::join('schools', 'schoolaccommodations.school_id', '=', 'schools.id')->where('schools.userId',  $userId )->select('schoolaccommodations.school_id','schools.name as schoolName')->distinct('schoolaccommodations.school_id')->get();

     return view('schooladmin.accommodation.accommodationschoollist',compact('schools'));

  }

   public function addSchoolAccommodation(){

        $userId = Auth::user()->id;
        $schools = School::where('userId',$userId)->get();
        $types = Accommodationadmintype::all();
        $facilities = Accommodationadminfacility::all();
        return view('schooladmin.accommodation.addschoolaccommodation',compact('schools', 'types', 'facilities'));
   }

   public function storeSchoolAccommodation(Request $request){

    $schoolId = $request->school_id;

    if($request['types'])
            {

             foreach($request['types'] as $type){
              if(!empty($type)){
                $saccexist = Schoolaccommodation::where('school_id',$request->school_id)->where('type_id',$type)->first();

                 if($saccexist == null){

                    Schoolaccommodation::insert([
                      
                   'school_id'=> $schoolId,
                   'type_id' => $type

                   ]);  
                }  
              } 
              else{
                return back()->with('error',"School Accommodation Type Already exist");   
              }     
             }
            } 

   	  
        if($request['facilities'])
            {

             foreach($request['facilities'] as $facility){

                if(!empty($facility)){
                   $saccexist = Schoolaccommodationfacility::where('school_id',$request->school_id)->where('facility_id',$facility)->first();
                
                    if($saccexist == null){

                    Schoolaccommodationfacility::insert([
                      
                   'school_id'=> $schoolId,
                   'facility_id' => $facility

                   ]);    
                  }  
                    else{
                return back()->with('error',"School Accommodation Facility Already exist");   
              }      
              }
            } 
         }

            return back()->with('success',"School Accommodation added successfully");   
       
    }

     public function allSchoolAccommodation(Request $request){

        $schoolname = School::where('id',$request->id )->first();
        $schoolaccommodations = Schoolaccommodation::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodations.type_id' )->where('schoolaccommodations.school_id',$request->id)->select('schoolaccommodations.*','accommodationadmintypes.name as typeName')->get();

        return view('schooladmin.accommodation.allschoolaccommodation',compact('schoolaccommodations','schoolname')
      );

    }

    public function editSchoolAccommodation(Request $request){
      
      $schoolaccommodation  = Schoolaccommodation::find($request->id);
      
       if($schoolaccommodation){
       $school  = School::where('id', $schoolaccommodation->school_id)->first();
       $type = Accommodationadmintype::where('id', $schoolaccommodation->type_id)->first();
       $schoolaccommodation->school_name =  $school->name;
       $schoolaccommodation ->type_name = $type->name;
     }
       $types = Accommodationadmintype::all();

        return view('schooladmin.accommodation.editschoolaccommodation',compact('schoolaccommodation', 'types'));

    }

     public function updateSchoolAccommodation(Request $request){

        $schoolaccommodation = Schoolaccommodation::find($request->id);
        $schoolaccommodation->school_id   = $request->school_id;
        $schoolaccommodation->type_id        = $request->type;
        $saccexist = Schoolaccommodation::where('school_id',$request->school_id)->where('type_id',$request->type)->first();

         if($saccexist == null){

        if($schoolaccommodation->save())
        {
        return back()->with('success',"Accommodation successfully created ");
        }
      }
        else
        {
            return back()->with('error',"School Accommodation Type Already exist");
        } 
    }

    public function destroySchoolAccommodation(Request $request)
    {
        $saccommodation = Schoolaccommodation::find($request->id);
        $saprice = Schoolaccommodationprice::where('accommodation_id',$request->id)->delete();
        
           if($saccommodation->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        
    }

     public function addSchoolAccommodationPrice(Request $request){
        $schoolId = $request->id;
        $school = School::where('id', $schoolId)->first();
        $accommodations = Schoolaccommodation::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodations.type_id' )->where('schoolaccommodations.school_id',$schoolId)->select('schoolaccommodations.*','accommodationadmintypes.name as typeName')->get();
        // $types =  $types = Accommodationadmintype::all();
        return view('schooladmin.accommodation.addschoolaccommodationprice',compact('accommodations', 'school'));

   }

   // public function getSchoolAccommodation(Request $request){

   //      $sid = $request->schoolId;
   //       $schoolaccommodations = Schoolaccommodation::join('accommodationadmintypes', 'accommodationadmintypes.id', '=', 'schoolaccommodations.type_id' )->where('schoolaccommodations.school_id',$sid)->select('schoolaccommodations.*','accommodationadmintypes.name as typeName')->get();
   //       $html = '<option value="">Select Accommodation Name</option>';
   //       foreach($schoolaccommodations as $schoolaccommodation){
   //          $html.="<option value=".$schoolaccommodation->id.">".$schoolaccommodation->typeName."</option>";
   //       }
   //  return $html;
   // }

    public function storeSchoolAccommodationPrice(Request $request){

        $input = Input::all();

            foreach($input['type'] as $index => $value)
            {
            $schoolaccprice = new Schoolaccommodationprice;
            $schoolaccprice->school_id = $request->school_id;
            $schoolaccprice->accommodation_id = $value;
            $schoolaccprice->price = $input['price'][$index];
            $schoolaccpriceexist   = Schoolaccommodationprice::where('school_id', $request->school_id)->where('accommodation_id',$value)->first();
            if( $schoolaccpriceexist == null){
              if(!empty($input['price'][$index]) && !empty($value)){

              $schoolaccprice->save();
            }

            }
            else{
              return back()->with('error',"Price for this accommodation already exist");   
            }
        }

         return back()->with('success',"Accommodation Price successfully added");   
    }

    public function allSchoolAccommodationPrice(Request $request){

     $schoolaccprice = Schoolaccommodationprice::where('accommodation_id', $request->id)->first();
   
     if($schoolaccprice){
      $schoolaccommodation = Schoolaccommodation::where('id',$schoolaccprice->accommodation_id)->first();

      if($schoolaccommodation){
      $accommodatio_type_name = Accommodationadmintype::where('id', $schoolaccommodation->type_id)->first();
      $schoolaccprice->type_name = $accommodatio_type_name->name;
      }
    }
      

       return view('schooladmin.accommodation.allschoolaccommodationprice',compact('schoolaccprice'));


    }

     public function editSchoolAccommodationPrice(Request $request){
      
      $schoolaccommodationprice  = Schoolaccommodationprice::find($request->id);
      
     $school  = School::where('id', $schoolaccommodationprice->school_id)->first();
     $schoolaccommodationprice->school_name =  $school->name;
     $schoolaccommodation = Schoolaccommodation::where('id', $schoolaccommodationprice->accommodation_id)->first();
     $schoolaccommodationprice->type_id   =   $schoolaccommodation->type_id;
     $accommodation_type_name = Accommodationadmintype::where('id', $schoolaccommodation->type_id)->first();
     $schoolaccommodationprice->type_name =   $accommodation_type_name->name;
       
        return view('schooladmin.accommodation.editschoolaccommodationprice',compact('schoolaccommodationprice'));

    }

    public function updateSchoolAccommodationPrice(Request $request){

            $schoolaccprice = Schoolaccommodationprice::find($request->id);
            $schoolaccprice->school_id = $request->school_id;
            $schoolaccprice->accommodation_id = $request->type;
            $schoolaccprice->price =$request->price;
            
            if( $schoolaccprice->save()){
             return back()->with('success',"Accommodation Price successfully added "); 
            }
            else{
              return back()->with('error',"Error");   
            }
    }

    public function destroySchoolAccommodationPrice(Request $request)
    {
        $saprice = Schoolaccommodationprice::find($request->id);

           if($saprice->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        
    }
   


}
