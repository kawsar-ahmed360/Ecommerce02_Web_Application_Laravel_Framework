<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
class AdminAuthentication extends Controller
{
    
    public function AdminProfile(){

    	$data['user'] = User::find(Auth::user()->id);
    	return view('backend/admin_profile/profile',$data);
    }

    public function AdminProfileajax(){
     
     $data['user'] = User::find(Auth::user()->id);
    	return view('backend/admin_profile/profile_ajax',$data);

    }

    public function AdminProfilesave(Request $Request){

    	if ($Request->ajax()) {
    		
    		$user = User::find($Request->UsId);
    		$user->name = $Request->name;
    		$user->email = $Request->email;
    		$user->mobile = $Request->mobile;
    		$user->address = $Request->address;
    		$user->save();
    	}
    }

    public function AdminpasswordChange(Request $Request){

    	$Request->validate([
           'current_password'=>'required',
           'new_password'=>'required|same:re_type',
           
    	]);

    	if ($Request->ajax()) {
    		

    		if (Auth::attempt(['id'=>$Request->UsId,'password'=>$Request->current_password])) {
    			
    		$user = User::find($Request->UsId);
    		$user->password = Hash::make($Request->new_password);
    		$user->save();
    		}
    	}
    }


    public function AdminImageChange(Request $Request){

    	$Request->validate([
       'image'=>'required',
    	]);
         
         $user = User::find($Request->UsId);

    	if ($Request->hasFile('image')) {
    		
    		$image = $Request->file('image');

    		$full_name = time().'.'.$image->getClientOriginalExtension();

    		@unlink(public_path('backend/profile/'.$user->image));

    		Image::make($image)->resize(400,420)->save('public/backend/profile/'.$full_name);

    		$user->image = $full_name;
    		$user->save();

    	}

    	return redirect()->back();


    }

    public function UserView(){

    	$data['user'] = User::get();

    	return view('backend/user/all_view',$data);
    }

    public function UserDelete($id){

    	$user = User::find($id);

    	  @unlink(public_path('backend/profile/'.$user->image));
    	  $user->delete();
    	
    	return redirect()->back()->with('success','This item successfully Deleted');
    }
}
