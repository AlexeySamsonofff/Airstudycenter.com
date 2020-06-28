<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\UserRole;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('front.login');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     // $user_id = Auth::user()->id;
    //     $getrole = UserRole::where('user_id', $user->id)->first();
    //     if ($getrole) {
    //         $role_id = $getrole->role_id;
    //         $role = Role::where('id', $role_id)->first();
    //         $role = $role->name;
    //     }
    //     if (Auth::check() && $role == 'School Admin') {
    //         return redirect('/home');
    //     } elseif (Auth::check() && $role == 'Super Admin') {
    //         return Redirect::to('https://admin.airstudycenter.com/');
    //         //return "You are Not School Admin";
    //     } elseif (Auth::check() && $role == 'Accommodation Admin') {
    //         return redirect('/home');
    //         //return "You are Not School Admin";
    //     } elseif (Auth::check() && $role == 'Student') {
    //         echo 'student account under development';
    //         die;
    //         //return redirect('/home');
    //         //return "You are Not School Admin";
    //     } else {
    //         return new Response(view('auth.login'));
    //     }
    // }
}
