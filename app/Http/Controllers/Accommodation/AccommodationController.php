<?php

namespace App\Http\Controllers\Accommodation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Common;
use App\Accommodation;
use App\Accommodationimage;
use App\Accommodationfacility;
use App\Country;
use App\State;
use App\City;
use App\Zipcode;
use App\Accommodationtype;
use App\Accommodationadminfacility;
use App\Accommodationadmintype;
use App\Accomodationpropertytype;
use App\Accomodationdescription;
use App\Accommodationprice;
use App\Accommodationreview;
use App\Accobooking;
use App\User;
use App\Email;
use Auth;
use Imageresize;
use App\Favaccommodation;
use DB;

class AccommodationController extends Controller
{
    
    public function addAccommodation(){
        $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
        $countries = Country::all();
        $api = "http://battuta.medunes.net/api/country/all/?key=$battuta_key";
        $response = file_get_contents($api);
        $countries = json_decode($response);
        
        $facilities     = Accommodationadminfacility::all();
        $property_types = Accomodationpropertytype::all();
        $acco_types     = Accommodationadmintype::all();
    	return view('accommodationadmin.accommodation.addaccommodation', compact('countries','facilities','property_types','acco_types'));
    }

     public function allAccommodation(){

        $userId = Auth::user()->id;

        $accommodations = Accommodation::where('user_id',$userId)->orderBy('id','desc')->get();

        return view('accommodationadmin.Accommodation.allaccommodation',compact('accommodations'));

    }

       public function destroyAccommodation(Request $request)
    {
        $accommodation = Accommodation::find($request->id);
        if($accommodation->deactiveStatus == '0'){

            $accommodation->deactiveStatus = 1;

        }else{
          
           $accommodation->deactiveStatus = 0;
        }


            // $accommodationimage       = Accommodationimage::where('accommodation_id', $request->id)->delete();
          
            // $accommodationfacility = Accommodationfacility::where('accommodation_id', $request->id)->delete();

            // $accommodationtype = Accommodationtype::where('accommodation_id', $request->id)->delete();

            // $accommodationprice = Accommodationprice::where('accommodation_id', $request->id)->delete();

            // $accommodationreviews = Accommodationreview::where('accommodation_id', $request->id)->delete();

            // $accommodationdescription  = Accomodationdescription::where('accommodation_id', $request->id)->delete();
            
            // $favaccommodation  = Favaccommodation::where('accommodationid', $request->id)->delete();
            
            if($accommodation->save())
            {
                return 1;
            }
            else
            {
                return 0;
            }
         
    }

     public function storeAccommodation(Request $request){
      //dd($request->all());

        //     $this->validate($request,[
        //     'facility[]'=>'required', 
        //     'type[]'=>'required',
        // ],
        // [
        //     'facility.required' =>   'facility is required',
        //     'type.required' =>   'type is required',
           
        // ]);
        $modelName = 'Accommodation';
        $accommodation = new Accommodation;
        $accommodation->user_id = $request->userId;
        $accommodation->name = $request->name;
        $accommodation->email = $request->email;
        $accommodation->description = $request->description;
        $accommodation->country_id = $request->country_id;
        $accommodation->state_id = $request->state_id;
        $accommodation->city_id = $request->city_id;
        $accommodation->zipcode_id = $request->zipcode_id;
        $accommodation->address = $request->address;
        $accommodation->owner_name = $request->owner_name;
        $getSlug = new Common();
        $Slug=$getSlug->slug($request->name,$modelName);
        $accommodation->slug = $Slug;

       if($request->file('owner_image')){

        	        $photo = $request->file('owner_image');
        	        $name = rand(1,100);
                    $name = $name.time();
                    $imagename = $name.'.'.$photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl  = $base_url.'/thumbnail_images/'.$imagename;
                    $destinationPath = public_path('/thumbnail_images'); 
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(98, 100);
                    $thumb_img->save($destinationPath.'/'.$imagename,80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    $accommodation->owner_image = $imagename;
           }
        

        if($accommodation->save()){

            $accommodation_id =$accommodation->id;

        if($request->hasFile('image'))
            {
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
                    $form = Accommodationimage::create([
                    'accommodation_id' => $accommodation_id,
                    'image' => $imagename
                    ]);
                }  
            }
            /* Save Accomodation Property Type Starts */ 
            $property_typeid = $request->property_type;
             Accommodationtype::create([
                             'accommodation_id'=> $accommodation_id,
                             'type_id' => $property_typeid

                             ]);
             /* Save Accomodation Property Type Ends */ 
             /* Save Accommodation facilities Starts*/
             if($request['check_list_fac'])
            {

             foreach($request['check_list_fac'] as $facility){
                            if(!empty($facility)){
                              Accommodationfacility::create([
                             'accommodation_id'=> $accommodation_id,
                             'facility_id' => $facility

                             ]);    
                            }      
                        }
            }
            /* Save Accommodation facilities Ends*/
            /* Save Accommodation Bedroom Description*/
                  $bedroom  = $request->bedroom;
                  $kitchen  = $request->kitchen;
                  $balcony  = $request->balcony;
                  $bathroom = $request->bathroom;
                  Accomodationdescription::create([
                                         'accommodation_id'=> $accommodation_id,
                                         'bedroom' => $bedroom,
                                         'kitchen' => $kitchen,
                                         'balcony' => $balcony,
                                         'bathroom' => $bathroom
                                         ]);
            /* Save Accommodation Bedroom Description*/ 
            /* Save Accommodation price Starts*/
            $accommodation_type = $request->accommodation_type;
               if($accommodation_type == 'independent'){

                   $ind_price_only = $request->ind_price_only;
                   $ind_price_with = $request->ind_price_with;
                   echo $ind_availability = $request->ind_availability;
                   Accommodationprice::create([
                                                 'accommodation_id'=> $accommodation_id,
                                                 'acc_type'  => $accommodation_type,
                                                 'typeid'    => 0,
                                                 'price'     => $ind_price_only,
                                                 'pricewith' => $ind_price_with,
                                                 'available'=>$ind_availability
                                                 ]);

               }
               if($accommodation_type == 'shared'){
                $count = count($request->typeid);
                for($i=0;$i<$count;$i++){
                     $request->shared_availability[$i];
                  Accommodationprice::create([
                        'accommodation_id'=> $accommodation_id,
                        'acc_type'  => $accommodation_type,
                        'typeid'    => $request->typeid[$i],
                        'price'     => $request->shared_price_only[$i],
                        'pricewith' => $request->shared_price_with[$i],
                        'available' => $request->shared_availability[$i],
                        ]);
                }


               }
       /* Save Accommodation price Ends*/   
  

           

        return back()->with('success',"Accommodation successfully created ");
        
        }
        else
        {
            return back()->with('error',"Something Error. Please Try After Some Time");
        } 
    }


    public function editAccommodation(Request $request)
    {
       $battuta_key = \Config::get('battutakey.BATTUTA_KEY');
        $accommodation = Accommodation::find($request->id);
        $facilities = Accommodationadminfacility::all();
        $accommodationfacilities = Accommodationfacility::where('accommodation_id', $request->id)->get();
        $accomodationdescriptions = Accomodationdescription::where('accommodation_id', $request->id)->first();

        // $types = Accommodationadmintype::all();
        // $accommodationtypes = Accommodationtype::where('accommodation_id', $request->id)->get();
        $images = Accommodationimage::where('accommodation_id', $request->id)->get();
        $property_types = Accomodationpropertytype::all();
        $getproperty_types = Accommodationtype::join('accomodationpropertytypes', 'accomodationpropertytypes.id' , '=' , 'accommodationtypes.type_id')->where('accommodationtypes.accommodation_id',$request->id)->select('accommodationtypes.*','accomodationpropertytypes.id as propertyid','accomodationpropertytypes.name as propertyname')->first();
        if($getproperty_types){
        $selected_property_type = $getproperty_types->propertyid;
    }
    else{
        $selected_property_type = "";
    }
        $acco_types     = Accommodationadmintype::all();
        $getacc_type     = Accommodationprice::where('accommodation_id', $request->id)->first();
        /*if($getacc_ind->acc_type == 'shared'){
         $getacc_shared   = Accommodationprice::where('accommodation_id', $request->id)->get();
        }*/

        /* api used to get all countries */
         $data_country     = $accommodation->country_id;
         $country_explode  = explode('|', $data_country);
         $country_code     = $country_explode[0];
         $api_country      = "http://battuta.medunes.net/api/country/all/?key=$battuta_key";
         $country_response = file_get_contents($api_country);
         $countries        = json_decode($country_response);
         /* api used to get all states */
         $data_state         = $accommodation->state_id;
         $state_explode      = explode('|', $data_state);
         $state_country_code = $state_explode[0];
         $state_code         = $state_explode[1];
         $api_state          = "http://battuta.medunes.net/api/region/".$country_code."/all/?key=$battuta_key";
         $states_response    = file_get_contents($api_state);
         $states             = json_decode($states_response);
         /* api used to get all states */
         $data_city           = $accommodation->city_id;
         $city_explode        = explode('|', $data_city);
         $city_code           = $city_explode[0];
         $state_region        = urlencode($state_code);
         $api_cities ="http://battuta.medunes.net/api/city/".$state_country_code."/search/?region=".$state_region."&key=$battuta_key";
         $cities_response    = file_get_contents($api_cities);
         $cities             = json_decode($cities_response);
         $zipcode_id         = $accommodation->zipcode_id;
         $accommodation->address =  $accommodation->address;

        /*$accommodation->country_id = $accommodation->country_id;
        $accommodation->state_id = $accommodation->state_id;
        $accommodation->city_id = $accommodation->city_id;
        $accommodation->zipcode_id = $accommodation->zipcode_id;
         $states = State::where('id', $accommodation->state_id)->get();
         $cities = City::where('id', $accommodation->city_id)->get();
         $zipcodes = Zipcode::where('id', $accommodation->zipcode_id)->get();
         $countries = Country::get();*/

       return view('accommodationadmin.accommodation.editaccommodation',compact('accommodation', 'facilities',
        'accommodationfacilities', 'images', 'countries','country_code','states','state_code','cities','city_code','zipcode_id','property_types','selected_property_type','accomodationdescriptions','acco_types','getacc_type'));
    }
    public function showLangAccommodation(Request $request){

        $accomodation_id = $request->id;
        $accommodation = Accommodation::find($request->id);
        return view('accommodationadmin.accommodation.addlanguageaccommodation',compact('accommodation','accomodation_id'));

    }
    public function addLangAccommodation(Request $request){

        $accommodation = Accommodation::find($request->id);

         $accommodation->name = $request->name;
        $accommodation->name_tr = $request->name_tr;
        $accommodation->name_ar = $request->name_ar;
        $accommodation->name_ru = $request->name_ru;
        $accommodation->name_de = $request->name_de;
        $accommodation->name_it = $request->name_it;
        $accommodation->name_fr = $request->name_fr;
        $accommodation->name_es = $request->name_es;
         $accommodation->name_se = $request->name_se;
        $accommodation->name_jp = $request->name_jp;
        $accommodation->name_fa = $request->name_fa;
        $accommodation->name_pr = $request->name_pr;

         $accommodation->description = $request->description;
        $accommodation->description_tr = $request->description_tr;
        $accommodation->description_ar = $request->description_ar;
        $accommodation->description_ru = $request->description_ru;
        $accommodation->description_de = $request->description_de;
        $accommodation->description_it = $request->description_it;
        $accommodation->description_fr = $request->description_fr;
        $accommodation->description_es = $request->description_es;
        $accommodation->description_se = $request->description_se;
        $accommodation->description_jp = $request->description_jp;
        $accommodation->description_fa = $request->description_fa;
        $accommodation->description_pr = $request->description_pr;

        $accommodation->owner_name  = $request->ownername;
        $accommodation->owner_name_tr  = $request->ownername_tr;
        $accommodation->owner_name_ar  = $request->ownername_ar;
        $accommodation->owner_name_ru  = $request->ownername_ru;
        $accommodation->owner_name_de  = $request->ownername_de;
        $accommodation->owner_name_it  = $request->ownername_it;
        $accommodation->owner_name_fr  = $request->ownername_fr;
        $accommodation->owner_name_es  = $request->ownername_es;
        $accommodation->owner_name_se  = $request->ownername_se;
        $accommodation->owner_name_jp  = $request->ownername_jp;
        $accommodation->owner_name_fa  = $request->ownername_fa;
        $accommodation->owner_name_pr  = $request->ownername_pr;
        if($accommodation->save()){
         
         return back()->with('success',"Accommodation Language Added successfully");

        }

    }

    public function updateAccommodation(Request $request){

        $accommodation = Accommodation::find($request->id);
        $id = $request->id;
        $accommodation->user_id = $request->userId;
        $accommodation->name = $request->name;
        $accommodation->email = $request->email;
        $accommodation->description = $request->description;
        $accommodation->country_id = $request->country_id;
        $accommodation->state_id = $request->state_id;
        $accommodation->city_id = $request->city_id;
        $accommodation->zipcode_id = $request->zipcode_id;
        $accommodation->address = $request->address;
        $accommodation->owner_name = $request->owner_name;

       if($request->file('owner_image')){

        	        $photo = $request->file('owner_image');
        	        $name = rand(1,100);
                    $name = $name.time();
                    $imagename = $name.'.'.$photo->getClientOriginalExtension();
                    $base_url = \URL::to('/');
                    $fullurl  = $base_url.'/thumbnail_images/'.$imagename;
                    $destinationPath = public_path('/thumbnail_images'); 
                    $thumb_img = Imageresize::make($photo->getRealPath())->resize(98, 100);
                    $thumb_img->save($destinationPath.'/'.$imagename,80);
                    $destinationPath = public_path('/normal_images');
                    $photo->move($destinationPath, $imagename);
                    $accommodation->owner_image = $imagename;
           }
        

        if($accommodation->save()){

            $accommodation_id = $request->id;

        if($request->hasFile('image'))
            {
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
                    $form = Accommodationimage::create([
                    'accommodation_id' => $accommodation_id,
                    'image' => $imagename
                    ]);
                }  
            }
            /* Save Accomodation Property Type Starts */
            $deleteproperty_typeid = Accommodationtype::where('accommodation_id', $request->id)->delete();  
            $property_typeid = $request->property_type;
             Accommodationtype::create([
                             'accommodation_id'=> $accommodation_id,
                             'type_id' => $property_typeid

                             ]);
             /* Save Accomodation Property Type Ends */
             /* Save Accommodation facilities Starts*/
             $deleteacco_facility = Accommodationfacility::where('accommodation_id', $request->id)->delete();
             if($request['check_list_fac'])
            {

             foreach($request['check_list_fac'] as $facility){
                            if(!empty($facility)){
                              Accommodationfacility::create([
                             'accommodation_id'=> $accommodation_id,
                             'facility_id' => $facility

                             ]);    
                            }      
                        }
            }
            /* Save Accommodation facilities Ends*/ 
            /* Save Accommodation Bedroom Description*/
            $deleteaccomodation_description = Accomodationdescription::where('accommodation_id', $request->id)->delete();
                  $bedroom  = $request->bedroom;
                  $kitchen  = $request->kitchen;
                  $balcony  = $request->balcony;
                  $bathroom = $request->bathroom;
                  Accomodationdescription::create([
                                         'accommodation_id'=> $accommodation_id,
                                         'bedroom' => $bedroom,
                                         'kitchen' => $kitchen,
                                         'balcony' => $balcony,
                                         'bathroom' => $bathroom
                                         ]);
            /* Save Accommodation Bedroom Description*/
             /* Save Accommodation price Starts*/
            $deleteaccomodation_price = Accommodationprice::where('accommodation_id', $request->id)->delete();
            $accommodation_type = $request->accommodation_type;
               if($accommodation_type == 'independent'){

                   $ind_price_only = $request->ind_price_only;
                   $ind_price_with = $request->ind_price_with;
                   echo $ind_availability = $request->ind_availability;
                   Accommodationprice::create([
                                                 'accommodation_id'=> $accommodation_id,
                                                 'acc_type'  => $accommodation_type,
                                                 'typeid'    => 0,
                                                 'price'     => $ind_price_only,
                                                 'pricewith' => $ind_price_with,
                                                 'available'=>$ind_availability
                                                 ]);

               }
               if($accommodation_type == 'shared'){
                $count = count($request->typeid);
                for($i=0;$i<$count;$i++){
                     $request->shared_availability[$i];
                  Accommodationprice::create([
                                                 'accommodation_id'=> $accommodation_id,
                                                 'acc_type'  => $accommodation_type,
                                                 'typeid'    => $request->typeid[$i],
                                                 'price'     => $request->shared_price_only[$i],
                                                 'pricewith' => $request->shared_price_with[$i],
                                                 'available' => $request->shared_availability[$i],
                                                 ]);
                }


               }
       /* Save Accommodation price Ends*/    

           
           
        return back()->with('success',"Accommodation successfully Updated ");
        
        }
        else
        {
            return back()->with('error',"Something Error. Please Try After Some Time");
        } 
    }

     public function deleteAccommodationImages(Request $request){

        $data_imageid  = $request->data_imageid;
        $filename      = $request->data_imgurl;
        // $basename_image = basename($filename);
        $deleteimage   = Accommodationimage::where('id',$data_imageid)->delete();
        unlink(public_path('normal_images/'.$filename));
        unlink(public_path('thumbnail_images/'.$filename));

        if($deleteimage)
        {
            return "success";
        }
        else
        {
            return "error";
        }
    }

    public function addAccommodationPrice(){

        $userId = Auth::user()->id;

        $accommodations = Accommodation::where('user_id',$userId)->get();

        $types = Accommodationadmintype::all();

         return view('accommodationadmin.accommodation.addaccommodationprice', compact('accommodations','types'));
    }

    public function storeAccommodationPrice(Request $request){

        $input = Input::all();
            foreach($input['type'] as $index => $value)
            {
            $accommodationprice = new Accommodationtype;
            $accommodationprice->accommodation_id = $request->accommodation_id;
            $accommodationprice->type_id = $value;
            $accommodationprice->price = $input['price'][$index];
            $accommodationexist = Accommodationtype::where('accommodation_id', $request->accommodation_id)->where('type_id',$value)->first();
            if( $accommodationexist == null){
              $accommodationprice->save();
          }
          else{
            return back()->with('error',"Accommodation type already exist");   
          }
        
        }
         return back()->with('success',"Accommodation successfully created ");   
    }


      public function allAccommodationPrice(Request $request){
        
       $accommodations = Accommodationtype::where('accommodation_id',$request->accommodation_id)->get();
       $accommodation_name = Accommodation::where('id', $request->accommodation_id)->first();
       // $accommodation->accommodation_name = $accommodation_name->name;

       foreach($accommodations as $accommodation){
          $accommodatio_type_name = Accommodationadmintype::where('id',$accommodation->type_id)->first();
          $accommodation->type_name = $accommodatio_type_name->name;
       }
     
        return view('accommodationadmin.Accommodation.allaccommodationprice',compact('accommodations','accommodation_name'));

    }


      public function destroyAccommodationPrice(Request $request)
    {
        $accommodation = Accommodationtype::find($request->id);
        
            if($accommodation->delete())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        
    }


    public function editAccommodationPrice(Request $request){

        $accommodationprice = Accommodationtype::find($request->id);
        $accommodationtypes = Accommodationadmintype::all();
        $accommodationname = Accommodation::where('id', $accommodationprice->accommodation_id)->first();

     return view('accommodationadmin.accommodation.editaccommodationprice', compact('accommodationprice','accommodationtypes',
        'accommodationname'));
    }

    public function updateAccommodationPrice(Request $request){

            $accommodationprice = Accommodationtype::find($request->id);
            $accommodationprice->accommodation_id = $request->accommodation_id;
            $accommodationprice->type_id = $request->type;
            $accommodationprice->price = $request->price;
            
         if($accommodationprice->save()){
         return back()->with('success',"Accommodation successfully updated ");
      
          }
          else{
            return back()->with('error',"Error");   
          }

        


    }
    public function showaccommodationbookings(Request $request){
   
       $accid = $request->id;
       $accommodation_name = Accommodation::where('id', $accid)->first();
       $accobookings       = Accobooking::where('accommodationId', $accid)->get();
       foreach($accobookings as $bookings){
          
          $user = User::where('id', $bookings->userId)->first();
          $bookings->username     = $user->name;
          $accommodatio_type_name = Accommodationadmintype::where('id',$bookings->typeId)->first();
          $bookings->typename     = $accommodatio_type_name->name;

       }
       //dd($accobookings);

      return view('accommodationadmin.bookingdashboard', compact('accommodation_name','accobookings'));

      }  
    public function inbox(Request $request)
    {
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile = User::where('id', $id)->first();
            // $emails = Email::Join('users as a', 'a.id', '=', 'emails.sender_id')->where('emails.sender_id', $id)->Join('users as b', 'b.id', '=', 'emails.receiver_id')->orWhere('emails.receiver_id', $id)->orderBy('send_date', 'desc')->select('emails.*','a.name as sender','b.name as receiver','a.email as sender_email','b.email as receiver_email','a.image')->paginate(6);
            // $emails =DB::table('emails')->where('receiver_id',$id)->get();
            $receive_data =DB::table('acco_enquiry')->where('receiver_id', $id)->get();
        return view('accommodationadmin.myaccount.inbox')->with('receive_data',$receive_data)->with('userprofile', $userprofile);
        }
    }
    public function view_receive(Request $request)
    {
        $id = $request->id;
        $data = DB::table('acco_enquiry')->where('id', $id)->first();
        // print_r(json_encode($data));       
        return view('accommodationadmin.myaccount.view_receive')->with('data', $data);
    }
    public function active_m(Request $request)
    {
        $id =$request->id;
        DB::table('acco_enquiry')->where('id', $id)
        ->update(['read_flag' => 1]);
        return redirect()->back();
    }
    public function send_message(Request $request)
    {
        $data['accobook_id'] =$request->acco_id;
        $data['sender_id'] =$request->sender_id;
        $data['receiver_id'] =$request->receiver_id;
        $data['title'] ="approve your booking";
        $data['content'] =$request->message;
        DB::table('emails')->insert($data);
        return ($data);
    }



}
