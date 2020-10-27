<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\shippings;
use App\orders;
use App\order_details;
use App\payments;
use Cart;
use DB;
use Auth;
use Mail;
class OrderController extends Controller
{

	 public function customerOrderDetails($id){

	 	  if (Auth::user()->id) {
	 	  	  
	 	  	   $data['order'] = orders::where('user_id',Auth::user()->id)->where('id',$id)->first();

	 	  }else{

	 	  	return redirect()->back();
	 	  }


	 	 return view('fontend/customer_dashbord/order_details',$data); 
	 }


	 public function customerOrderbackend(){

	 	 $data['ordeddr'] = orders::get();

	 	return view('backend/customer_order/order',$data);
	 }

	 public function customerOrderApprove($id){

	 	$approve = orders::find($id);
        
        $approve->status=2;

    

        	 $order_det = order_details::where('order_id',$approve->id)->get();
             
             foreach ($order_det as $value) {
             	
             	if ($value) {
             		 
             		 $value->status=2;
             		 $value->save();
             	}
             }

             $approve->save();

             $shipping = shippings::where('id',$approve->shipping_id)->first()->email;

          
         	
         	 $data =array(
              'email'=>$shipping,
         	 );

         	 

           
          Mail::send('backend/mail/approve_mail', $data, function ($message) use($data){
          	     $message->from('a.b123kwsar@gmail.com', 'Purnisher Ecommerace');        	 
          	     $message->to($data['email'], 'John Doe');
          	     $message->subject('Thank for order this site');
          	 
          	 
          	 });   	
          return redirect()->back(); 


	 }

	 public function customerOrderDelete($id){

	 	$order = orders::find($id);
	 	$order->delete();

	 	$details = order_details::where('order_id',$order->id)->get();
	 	foreach ($details as $value) {
	 		 
	 		 if ($value) {
	 		 	
	 		 	$value->delete();
	 		 }
	 	}

	 	$payment = payments::where('id',$order->payment_id)->delete();


	 	$shippingde = shippings::where('id',$approve->shipping_id)->first()->email;

	 	$data= array(
           'email'=>$shippingde,
	 	);

	 	mail::send('backend/mail/cancel_order',$data,function($message)use($data){
              
              $message->from('a.b123kwsar@gmail.com','Purnisher Ecommerace');
              $message->to($data['email'],'jon due');
              $message->subject('your order cancel');
	 	});

	 	$shipping = shippings::where('id',$order->shipping_id)->delete();

	 	return redirect()->back();
	 }
    

}
