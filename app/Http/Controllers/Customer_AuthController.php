<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class Customer_AuthController extends Controller
{
    public function CustomerLogin(){

    	return view('fontend/customer_auth/login');
    } 

    public function CustomerRegister(){

    	return view('fontend/customer_auth/registation');
    } 


  

    public function CustomerRegisterSave(Request $Request){
      
      $Request->validate([
       'name' => ['required', 'string', 'max:255'],
       'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
       'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

     $code = rand(0000,9999);
      $user = new User();
      $user->name = $Request->name;
      $user->email = $Request->email;
      $user->password = Hash::make($Request->password);
      $user->code = $code;
      $user->save();

      $data = array(
        'email'=>$Request->email,
        'code'=>$code
       );

      Mail::send('fontend/mail/verification_code',$data,function($message) use($data){
             
             $message->from('a.b123kwsar@gmail.com','Purnihsar Pushin');
             $message->to($data['email']);
             $message->subject('Please Verify Your Email Address');
      });


      return redirect()->route('CustomerEmailVerify');



    }

      public function CustomerEmailVerify(){

    	return view('fontend/mail/verify_email');
    }

    public function CustomerVerifyEmail(Request $Request){


    	$Request->validate([
         'code'=>'required',
    	]);

    	$validate = User::where('code',$Request->code)->first();

    	if ($validate) {
    		
    		$validate->varify_email =2;
    		$validate->save();

    		return redirect()->route('CustomerLogin');
    	}else{
               

              return redirect()->back()->with('message','code not match'); 
    	}
    }
}
