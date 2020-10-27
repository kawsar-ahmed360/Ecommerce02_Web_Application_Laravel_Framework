<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
class ContactManageController extends Controller
{
    
    public function ContactPage(){

    return view('fontend/single_page/contact_page');

   }

   public function ContactPageSave(Request $Request){

     $Request->validate([
       'name'=>'required',
       'email'=>'required',
       'mobile'=>'required',
       'message'=>'required',
     ]);

     $con = new contacts();
     $con->name = $Request->name;
     $con->email = $Request->email;
     $con->mobile = $Request->mobile;
     $con->message = $Request->message;
     $con->status = 1;

     $con->save();

     if ($con->save()) {
     	echo 'success';

     	$notification = array(
         'message'=>'message successfully inserted',
         'alert-type'=>'success'
     	);
     }else{
       
       echo 'error';

     	$notification = array(
         'message'=>'data not save somthis wrong chekc this file',
         'alert-type'=>'error'
     	);

     }

     return redirect()->back()->with($notification);
   }


   public function contactView(){
     
     $data['contact'] = contacts::get();

   	return view('backend/contact/all_contact_view',$data);
   }

   public function contactViewajax(){

   	$data['contact'] = contacts::get();

   	return view('backend/contact/message_view_ajax',$data);
   }

   public function MessageSeen(Request $Request){

   	if ($Request->ajax()) {
   		
   		$a = contacts::find($Request->Id);
   		$a->status=2;
   		$a->save();
   	}
   }

   public function MessageUnSeen(Request $Request){
       
       if ($Request->ajax()) {
       	
       	 $unseen = contacts::find($Request->Id);
       	 $unseen->status=1;
       	 $unseen->save();
       }

   }

   public function MessageDelete(Request $Request){
     
      if ($Request->ajax()) {
      	
      	 $de = contacts::find($Request->Id);

      	 $de->delete();



      }
      	
      



   }
}
