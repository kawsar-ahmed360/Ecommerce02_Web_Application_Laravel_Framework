<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\user;
use Auth;
class SocialiteController extends Controller
{
    
        public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $login = User::where('email',$user->getEmail())->where('github_id',$user->getId())->first();

        if ($login) {
            
             Auth::login($login);

             return redirect('/cus_email_verify');
        }else{

            $login = User::Create([
             'github_id'=>$user->getId(),
             'email'=>$user->getEmail(),
             'github_name'=>'github',
            ]);

           Auth::login($login);
           
          return redirect('/cus_email_verify');  
        }
    }
     
}
