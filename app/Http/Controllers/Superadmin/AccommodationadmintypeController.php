<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accommodationadmintype;
use App\Accommodationtype;
use App\Schoolaccommodationprice;
use App\Accomodationpropertytype;

class AccommodationadmintypeController extends Controller
{
    public function addAccommodationtype(Request $request){
       
        return view('superadmin.accommodation.addaccommodationtype');


    }

    public function storeAccommodationtype(Request $request){
        $this->validate($request,[
            'name'=>'unique:accommodationadmintypes', 
        ],
        [
            'name.unique' =>   'Name is already exist',
           
        ]);
         $accommodation = new Accommodationadmintype;
         $accommodation->name  = $request->name;
        
         if($accommodation->save()){

               return back()->with('success', 'Accommodation Type created successfully'); 
            }
            else
            {
                return "fails";
            }

    	
    }

    public function allAccommodationtype(Request $request){

        $accommodations = Accommodationadmintype::all();

        return view('superadmin.accommodation.allaccommodationtype',compact('accommodations'));

    }

    public function editAccommodationtype($id){

      
    	$accommodation = Accommodationadmintype::find($id);

        return view('superadmin.accommodation.editaccommodationtype',compact('accommodation'));

    }

    public function updateAccommodationtype(Request $request){

        $accommodation  = Accommodationadmintype::find($request->id);

         $accommodation->name  = $request->name;
        
         if($accommodation->update()){
             
               return back()->with('success', 'Accommodation Type updated successfully'); 
            }
            else
            {
                return "fails";
            }
    }

    public function destroyAccommodationtype(Request $request){

    	$accommodation = Accommodationadmintype::find($request->id);

        $accommodationtypeprice = Accommodationtype::where('type_id', $request->id)->delete();

         $schoolaccommodationtypeprice = Schoolaccommodationprice::where('type_id', $request->id)->delete();
       
        if($accommodation->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    	
    }

    public function addPropertyType(Request $request){

           return view('superadmin.accommodation.addaccommodationpropertytype');

    }

     public function allPropertyType(Request $request){

        $accommodationproperties = Accomodationpropertytype::all();

        return view('superadmin.accommodation.allaccommodationpropertytype',compact('accommodationproperties'));

    }

     public function storePropertyType(Request $request){
        $this->validate($request,[
            'name'=>'unique:accomodationpropertytypes', 
        ],
        [
            'name.unique' =>   'Name is already exist',
           
        ]);
         $accommodationproperty = new Accomodationpropertytype;
         $accommodationproperty->name  = $request->name;
        
         if($accommodationproperty->save()){

               return back()->with('success', 'Accommodation Property Type created successfully'); 
            }
            else
            {
                return "fails";
            }
        
    }

     public function editPropertyType($id){

      
        $accommodationproperty = Accomodationpropertytype::find($id);

        return view('superadmin.accommodation.editaccommodationpropertytype',compact('accommodationproperty'));

    }

     public function updatePropertyType(Request $request){

        $property  = Accomodationpropertytype::find($request->id);

         $property->name  = $request->name;
        
         if($property->update()){
             
               return back()->with('success', 'Property Type updated successfully'); 
            }
            else
            {
                return "fails";
            }
    }

    public function destroyPropertyType(Request $request){

        $property = Accomodationpropertytype::find($request->id);

        // $accommodationtypeprice = Accommodationtype::where('type_id', $request->id)->delete();

        //  $schoolaccommodationtypeprice = Schoolaccommodationprice::where('type_id', $request->id)->delete();
       
        if($property->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
    }


}
