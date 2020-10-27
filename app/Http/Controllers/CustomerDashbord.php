<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use Illuminate\Support\Facades\Hash;
class CustomerDashbord extends Controller
{
    public function Customer_Dashbord(){

    	return view('fontend/customer_dashbord/dashbord');
    }


    public function CustomerEdite(Request $Request){

    	if ($Request->ajax()) {
    		
    		$user = User::find($Request->UsId);
    		$user->name = $Request->name;
    		$user->email = $Request->email;
    		$user->mobile = $Request->mobile;
    		$user->address = $Request->address;
    		$user->save();
    	}

      
    }

    public function passwordChange(Request $Request){

    	$Request->validate([
          'current_password'=>'required',
          'new_password'=>'required|string|same:re_password',
    	]);

    	if ($Request->ajax()) {
    		
    		if (Auth::attempt(['id'=>$Request->UsId,'password'=>$Request->current_password])) {
    			
    			$user = User::find($Request->UsId);
    			$user->password = Hash::make($Request->new_password);
    			$user->save();
    		}
    	}

  
    }

    public function UpdateImage(Request $Request){
            

           $user = User::find($Request->UsId);

    	if ($Request->hasFile('image')) {
    	    $image = $Request->file('image');
    	    $full_name = time().'.'.$image->getClientOriginalExtension();
            @unlink(public_path('fontend/profile/'.$user->image));
            Image::make($image)->resize(400,430)->save('public/fontend/profile/'.$full_name);
            $user->image = $full_name;
            $user->save();
    	}else{
    		return redirect()->back()->with('message','image not found');
    	}

    	  return redirect()->back();	
    }

    public function CustomerviewAjax(){
     
     return view('fontend/customer_dashbord/dashbord_view_ajax');

    }
}
