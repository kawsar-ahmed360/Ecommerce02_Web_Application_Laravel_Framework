<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
 
  public function login(Request $Request){
     
     $Request->validate([
     'name'=>'required',
     'password'=>'required',
     ]);

     $UserName = $Request->name;
     $pass = $Request->password;

     $valideData = User::where('name',$UserName)->first();
     $pass_verrify = password_verify($pass,@$valideData->password);

     if ($pass_verrify==false) {
       
       return redirect()->back()->with('message','password verify wrong');   
     }

     if($valideData->varify_email=='1') {
         
       return redirect()->back()->with('message','email not verify');   
     }

     if (Auth::Attempt(['name'=>$UserName,'password'=>$pass])) {

        return redirect()->route('login');
         
     }
     

  }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
