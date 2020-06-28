<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accommodationadminfacility;
use App\Accommodationfacility;

class AccommodationadminfacilityController extends Controller
{

   public function addAccommodationFacility(Request $request){

        return view('superadmin.accommodation.addaccommodationfacility');
   }


   public function storeAccommodationFacility(Request $request)
    {
    
        $this->validate($request,[
            'name'=>'unique:Accommodationadminfacilities', 
        ],
        [
            'name.unique' =>   'Name is already exist',

        ]);

         $accommodationfacility = new Accommodationadminfacility;
         $accommodationfacility->name  = $request->name;
        
         if($accommodationfacility->save()){

               return back()->with('success', 'Facility created successfully'); 
            }
            else
            {
                return "fails";
            }
              
    }

    public function allAccommodationFacility(Request $request){

          $accommodationfacilities = Accommodationadminfacility::all();
         
        return view('superadmin.accommodation.allaccommodationfacility',compact('accommodationfacilities'));


    }

      public function editAccommodationFacility($id)
    {
         
        $accommodationfacility     = Accommodationadminfacility::find($id);
        return view('superadmin.accommodation.editaccommodationfacility',compact('accommodationfacility'));

    }


    public function updateAccommodationFacility(Request $request)
    {
     

         $accommodationfacility  = Accommodationadminfacility::find($request->id);

         $accommodationfacility->name  = $request->name;
        
         if($accommodationfacility->update()){
             
               return back()->with('success', ' Accommodation facility updated successfully'); 
            }
            else
            {
                return "fails";
            }

    }    

      public function destroyAccommodationFacility(Request $request)
    {
        $accommodationfacility = Accommodationadminfacility::find($request->id);
         $afacility = Accommodationfacility::where('facility_id', $request->id)->delete();
       
        if($accommodationfacility->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
