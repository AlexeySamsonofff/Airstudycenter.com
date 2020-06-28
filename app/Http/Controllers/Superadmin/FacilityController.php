<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facility;

class FacilityController extends Controller
{
    public function storeFacility(Request $request)
    {
    
        $this->validate($request,[
            'name'=>'unique:facilities', 
        ],
        [
            'name.unique' =>   'Name is already exist',
           
        ]);
         $facility = new Facility;
         $facility->name  = $request->name;
        
         if($facility->save()){

               return back()->with('success', 'Facility created successfully'); 
            }
            else
            {
                return "fails";
            }
              
    }

    public function allFacility(Request $request){

          $facilities = Facility::all();
         
        return view('superadmin.facility.allfacility',compact('facilities'));


    }

      public function editfacility($id)
    {
         
        $facility     = Facility::find($id);
        return view('superadmin.facility.editfacility',compact('facility'));

    }


    public function updatefacility(Request $request)
    {
     

         $facility  = Facility::find($request->id);

         $facility->name  = $request->name;
        
         if($facility->update()){
             
               return back()->with('success', 'facility updated successfully'); 
            }
            else
            {
                return "fails";
            }

    }    

      public function destroyfacility(Request $request)
    {
        $facility = Facility::find($request->id);
       
        if($facility->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

}
