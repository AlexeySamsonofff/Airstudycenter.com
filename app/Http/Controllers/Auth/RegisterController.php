<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\Role;
use App\UserRole;
use App\Refer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Schooltemplate;
use App\Accommodationtemplate;
use App\Studenttemplate;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $role   = $data['role'];
         $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'facebook_id' => '0',
                'google_id' => '0',
                'password' => Hash::make($data['password']),
            ]);
          $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'roledata' => $role,
            'token' => sha1(time())
          ]);


          if ($role == 'School Admin' && (strpos($user->email, '@airstudycenter.com') !== false))
          {
            // $user->email = "airstudycenter@gmail.com";
            // \Mail::to($user->email)->send(new VerifyMail($user));
            // $user->email = "sezertunca@gmail.com";
            \Mail::to($user->email)->send(new VerifyMail($user));
            \Mail::to("airstudycenter@gmail.com")->send(new VerifyMail($user));
            \Mail::to("sezertunca@gmail.com")->send(new VerifyMail($user));
          }
          else
          {
            \Mail::to($user->email)->send(new VerifyMail($user));
          }

           if(isset($data['referid'])){
           $referid   = $data['referid'];
           $referuser = User::where('id', $referid)->first();
           $referemail = $referuser->email;

              $userRefer = Refer::create([
                'sendinguserid' => $referid,
                'newuserid' => $user->id,
            ]);

              $message = "you have been credit by your referral, when referral friend become a user of our web site";
              $data = array(
             'name' => $user->name,
             'subject'=> "Referral Friend Registration",
             'email' => $referuser->email,
             'bodyMessage' => $message,
             'to'        =>  $referemail
             );

           Mail::send('front.email.content',$data, function($message) use ($data)
            {
              $message->from($data['email']);
              $message->to($data['to']);
              $message->subject($data['subject']);
            });
           }


         return $user;

    }

public function verifyUser($token)
{
  $verifyUser = VerifyUser::where('token', $token)->first();
  if(isset($verifyUser) ){
    $user = $verifyUser->user;
    if(!$user->verified) {
      $verifyUser->user->verified = 1;
      $verifyUser->user->save();
      $status = "Your e-mail is verified. You can now login.";
      if($status){
        $superadmin_email = 'mani.smartitventures@gmail.com';
        //$role   = 'School Admin'; 
        $userId   = $user->id;
        $roledata = VerifyUser::where('user_id', $userId)->first();
        $role     = $roledata->roledata; 
        $roleId = Role::where('name', $role)->first();
        $userRole = UserRole::create([
                'user_id' => $userId,
                'role_id' => $roleId['id'],
        ]);
        /* Welcome Email For Student Registration Starts */
          if($role == 'Student' && $userRole ){
              $templatedata = Studenttemplate::where('id', 1)->first();
              $data = array(
             'name'         => $user->name,
             'subject'      => "Student Registration",
             'email'        => $superadmin_email,
             'useremail'    => $user->email,
             'title'        => $templatedata->title,
             'phone'        => $templatedata->phone,
             'address'      => $templatedata->address,
             'airemail'     => $templatedata->email,
             'description'  => $templatedata->description,
             'bodyMessage'  => url('/'),
             'to'           => array($user->email,$superadmin_email)
               );
           Mail::send('front.email.studenttemplate',$data, function($message) use ($data)
            {
              $message->from($data['email']);
              $message->to($data['to']);
              $message->subject($data['subject']);
            });

           }
        /* Welcome Email For Student Registration Ends */
        /* Welcome Email For school Registration Starts */
         if($role == 'School Admin' && $userRole ){
              $templatedata = Schooltemplate::where('id', 1)->first();

              $data = array(
             'name'         => $user->name,
             'subject'      => "School Registration",
             'email'        => $superadmin_email,
             'useremail'    => $user->email,
             'title'        => $templatedata->title,
             'phone'        => $templatedata->phone,
             'address'      => $templatedata->address,
             'airemail'     => $templatedata->email,
             'description'  => $templatedata->description,
             'bodyMessage'  => url('/school-admin'),
             'to'           => array($user->email,$superadmin_email)
               );
           Mail::send('front.email.schooltemplate',$data, function($message) use ($data)
            {
              $message->from($data['email']);
              $message->to($data['to']);
              $message->subject($data['subject']);
            });

           }
           /* Welcome Email For school Registration Ends */
           /* Welcome Email For Accommodation Registration Strats */
           if($role == 'Accommodation Admin' && $userRole ){
              $templatedata = Accommodationtemplate::where('id', 1)->first();
              $data = array(
             'name' => $user->name,
             'subject'=> "Accommodation Registration",
             'email'        => $superadmin_email,
             'useremail'    => $user->email,
             'title'        => $templatedata->title,
             'phone'        => $templatedata->phone,
             'address'      => $templatedata->address,
             'airemail'     => $templatedata->email,
             'description'  => $templatedata->description,
             'bodyMessage' => url('/accommodation-admin'),
             'to'        => array($user->email,$superadmin_email)
             );

           Mail::send('front.email.accommodationtemplate',$data, function($message) use ($data)
            {
              $message->from($data['email']);
              $message->to($data['to']);
              $message->subject($data['subject']);
            });

           }
           /* Welcome Email For Accommodation Registration Strats */
      }

    } else {
      $status = "Your e-mail is already verified. You can now login.";
    }
  } else {
    return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
  }
  return redirect('/login')->with('status', $status);
}




}
