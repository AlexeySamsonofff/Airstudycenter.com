<?php



namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;


use App\User;
use App\Role;
use App\UserRole;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;



class GoogleController extends Controller

{



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        $user = Socialite::driver('google')->user();
          $create['name'] = $user->getName();

            $create['email'] = $user->getEmail();

            $create['google_id'] = $user->getId();

         $getgoogleuser = User::where('google_id',$create['google_id'])->orWhere('email',$create['email'])->first();
            if($getgoogleuser){
              $id = $getgoogleuser->id;
              $gid = $getgoogleuser->google_id;
              $password = $getgoogleuser->password;
              if($gid == $create['google_id']){
                Auth::loginUsingId($id);
                return redirect()->route('home');
              }else{
                //$url =  url('/');
                //return redirect($url)->with('success', ['your message,here']);
                return redirect()->back()->with('emailerror','Email is already Registered with regular signup'); 

                //dd("email already exists");
              }
            }else{
                   $user1 = User::create([
                    'name' => $create['name'],
                    'email' => $create['email'],
                    'password' => Hash::make($create['google_id']),
                    'google_id' => $create['google_id'],
                    'facebook_id' => 0,
                  ]);
                   $role= 'Student';
                   $userId = $user1->id;
                   $roleId = Role::where('name', $role)->first();
                    $userRole = UserRole::create([
                    'user_id' => $userId,
                    'role_id' => $roleId['id'],
                    ]);

                   Auth::login($user1);
                   return redirect()->route('home');
            }

    }

}