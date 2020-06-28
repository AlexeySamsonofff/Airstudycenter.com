<?php
namespace App\Http\Controllers;
use App\Accommodation;
use App\Accommodationprice;
use App\Courseprice;
use App\Role;
use App\School;
use App\Schoolaccommodationprice;
use App\Schooladdress;
use App\Schooltransport;
use App\UserRole;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $getrole = UserRole::where('user_id', $user_id)->first();
        $role = "";
        if ($getrole) {
            $role_id = $getrole->role_id;
            $role = Role::where('id', $role_id)->first();
            $role = $role->name;
        }
        if (Auth::check() && $role == 'School Admin') {
            $schools = School::where('userId', $user_id)->orderBy('id', 'desc')->get();
            $countschool = count($schools);
            foreach ($schools as $school) {
                $course = Courseprice::where('schoolId', $school->id)->get();
                $accommodationprice = Schoolaccommodationprice::where('school_id', $school->id)->get();
                $schooltransport = Schooltransport::where('school_id', $school->id)->get();
                $schooladdress = Schooladdress::where('schoolId', $school->id)->first();
                $school->courseCount = $course->count();
                $school->accommodationCount = $accommodationprice->count();
                $school->schooltransportCount = $schooltransport->count();
                $data_city = $schooladdress->cityId;
                $city_explode = explode('|', $data_city);
                $school->city = $city_explode[0];
            }
            return view('schooladmin.dashboard', compact('countschool', 'schools'));
        }
        // elseif (Auth::check() && $role == 'Super Admin') {
        //   return view('superadmin.dashboard');
        // }
        elseif (Auth::check() && $role == 'Accommodation Admin') {
            $accommodations = Accommodation::where('user_id', $user_id)->orderBy('id', 'desc')->get();
            foreach ($accommodations as $accommodation) {
                $acc_type = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
                $accommodation->acc_type = $acc_type->acc_type;
            }
            return view('accommodationadmin.dashboard', compact('accommodations'));
        } elseif (Auth::check() && $role == 'Student') {
            echo 'student account under development';
            die;
            // $accommodations = Accommodation::where('user_id', $user_id)->orderBy('id', 'desc')->get();
            // foreach ($accommodations as $accommodation) {
            //     $acc_type = Accommodationprice::where('accommodation_id', $accommodation->id)->first();
            //     $accommodation->acc_type = $acc_type->acc_type;
            // }
            // return view('accommodationadmin.dashboard', compact('accommodations'));
        } else {
            $url = url('/');
            return redirect($url);
        }
    }
}
