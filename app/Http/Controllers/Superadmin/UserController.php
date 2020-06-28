<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\State;
use App\Country;
use App\City;
use App\Zipcode;
use App\Role;
use App\UserRole;


class UserController extends Controller
{

     public function storeUser(Request $request)
    {
    
        $this->validate($request,[
            'email'=>'unique:users', 
        ],
        [
            'email.unique' =>   'Email is already exist',
           
        ]);
         $user = new User;
         $user->name  = $request->name;
         $user->email   = $request->email;
         $user->password    = bcrypt($request->password);
         if($user->save()){

             $userid =$user->id;
             $userrole = new UserRole;
             $userrole->user_id       = $userid;
             $userrole->role_id       = $request->role;
             $userrole->save();

               return back()->with('success', 'User created successfully'); 
            }
            else
            {
                return "fails";
            }
              
    }
       public function edituser($id)
    {
         
        $user         = User::find($id);
        $user_id      = $user->id;
        $getrole      = UserRole::where('user_id', $user_id)->first();
        if($getrole){
                 $role_id = $getrole->role_id;
                 $role = Role::where('id', $role_id)->first();
                 $user->roleid   = $role->id;
                 $user->rolename = $role->name;
        }
        $allroles       = Role::get();
        return view('superadmin.user.edituser',compact('user','allroles'));

    }
    public function updateuser(Request $request)
    {
        //

         $user  = User::find($request->id);
         $user->name  = $request->name;
         $user->email   = $request->email;
         $user->password    = bcrypt($request->password);
         if($user->update()){
              $userrole =  UserRole::where('user_id',$request->id)->get()->first();
              $userrole->role_id  = $request->role;
              $userrole->update();

               return back()->with('success', 'User created successfully'); 
            }
            else
            {
                return "fails";
            }

    }    

       public function getStates(Request $request)
    {
        $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
            $country_value = $request->countryId;
            $result_explode = explode('|', $country_value);
            $country_code   = $result_explode[0];
            $api  =  "http://battuta.medunes.net/api/region/".$country_code."/all/?key=$battuta_key";
            $response = file_get_contents($api);
            $states    = json_decode($response);
            $html = '<option value="">Select County</option>';
             foreach($states as $state){
             $html.='<option value="'.$state->country."|".$state->region.'">'.$state->region.'</option>';
            }
            return $html;

        /* $cid = $request->countryId;
         $states = State::where('country_id',$cid)->get();
         $html = '<option value="">Select State</option>';
         foreach($states as $state){
            $html.="<option value=".$state->id.">".$state->name."</option>";
            
         }
    return $html; */
    }
    public function getCities(Request $request)
    {
           $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
        $state_value = $request->stateId;
        $result_explode = explode('|', $state_value);
        $state_country  = $result_explode[0];
        $state_region  = urlencode($result_explode[1]);
        $api ="http://battuta.medunes.net/api/city/".$state_country."/search/?region=".$state_region."&key=$battuta_key";
        
        $response = file_get_contents($api);
        $cities    = json_decode($response);
        $html = '<option value="">Select City Name</option>';
         foreach($cities as $city){
            $html.='<option value="'.urlencode($city->city)."|".$city->city.'">'.$city->city.'</option>'; 
         }
        return $html;
        //dd("sdcsd");

        /* $sid = $request->stateId;
         $cities = City::where('state_id',$sid)->get();
         $html = '<option value="">Select City Name</option>';
         
         foreach($cities as $city){
            $html.="<option value=".$city->id.">".$city->name."</option>"; 
         }
    return $html;*/
    }

    public function getPostalCodes(Request $request)
    {
         $cityId = $request->cityId;
         $postalCodes = Zipcode::where('city_id',$cityId)->get();
         
         $html = '<option value="">Select Postal Code</option>';
         
         foreach($postalCodes as $postalCode){
            $html.="<option value=".$postalCode->id.">".$postalCode->zipcode."</option>"; 
         }
    return $html;
    }



    public function allUser(Request $request){

          $users = User::all();
          foreach($users as $user){
 
             $user_id = $user->id;
             $getrole = UserRole::where('user_id', $user_id)->first();
             if($getrole){
                 $role_id = $getrole->role_id;
                 $role = Role::where('id', $role_id)->first();
                 $user->rolename = $role->name;
             }
             

          }
        return view('superadmin.user.alluser',compact('users'));


    }

    public function destroyUser(Request $request)
    {
        $user = User::find($request->id);
        $userRole = UserRole::where('user_id', $request->id)->delete();
        if($user->delete())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }





}
