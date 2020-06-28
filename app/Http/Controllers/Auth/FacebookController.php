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


class FacebookController extends Controller

{


    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToFacebook()

    {

        return Socialite::driver('facebook')->redirect();

    }


    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleFacebookCallback()

    {

        $user = Socialite::driver('facebook')->user();

            $create['name'] = $user->getName();

            $create['email'] = $user->getEmail();

            $create['facebook_id'] = $user->getId();

            $getfacebookuser = User::where('facebook_id',$create['facebook_id'])->orWhere('email',$create['email'])->first();
            if($getfacebookuser){
              $id = $getfacebookuser->id;
              $fid = $getfacebookuser->facebook_id;
              $password = $getfacebookuser->password;
              if($fid == $create['facebook_id']){
                Auth::loginUsingId($id);
                return redirect()->route('home');
              }else{
                return redirect()->back()->with('success','Email is already Registered with regular signup');
              }
            }else{
                   $user1 = User::create([
                    'name' => $create['name'],
                    'email' => $create['email'],
                    'password' => Hash::make($create['facebook_id']),
                    'facebook_id' => $create['facebook_id'],
                    'google_id' => 0,
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

        // try {

        //     $user = Socialite::driver('facebook')->user();

        //     $create['name'] = $user->getName();

        //     $create['email'] = $user->getEmail();

        //     $create['facebook_id'] = $user->getId();



        //     $userModel = new User;

        //     $createdUser = $userModel->addNew($create);

        //     Auth::loginUsingId($createdUser->id);


        //     return redirect()->route('home');


        // } catch (Exception $e) {


        //     //return redirect('auth/facebook');

        //     dd("there is some error");


        // }

    }

}