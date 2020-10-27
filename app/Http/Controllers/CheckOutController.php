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
class CheckOutController extends Controller
{
   public function CheckOutSave(Request $Request){

   	
     
     $Request->validate([
            
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'address'=>'required',
            'payment'=>'required',
     ]);

     $shipping =new shippings();
     $shipping->user_id =Auth::user()->id; 
     $shipping->fname =$Request->fname; 
     $shipping->lname =$Request->lname; 
     $shipping->email =$Request->email; 
     $shipping->mobile =$Request->mobile; 
     $shipping->city =$Request->city; 
     $shipping->address =$Request->address; 
     
     
          
          if ($shipping->save()) {
          	
          	  $payment =new payments();
          	  $payment->shipping_id = $shipping->id;
          	  $payment->user_id = Auth::user()->id;
          	  $payment->payment = $Request->payment;
          	  $payment->transaction = $Request->transaction;
          	  $payment->save();


          	  $order =new orders();
          	  $order->shipping_id = $shipping->id; 
          	  $order->user_id = Auth::user()->id; 
          	  $order->payment_id = $payment->id; 
          	  $order->total_ammount = $Request->total; 
          	  $order->discount = 0;
          	  $order->save();


          	 $order_detail = Cart::content();  

          	 foreach ($order_detail as $cart) {
          	 	
          	 	$order_de = new order_details();
          	 	$order_de->shipping_id =$shipping->id;
          	 	$order_de->user_id =Auth::user()->id;
          	 	$order_de->payment_id =$payment->id;
          	 	$order_de->order_id =$order->id;
          	 	$order_de->product_id =$cart->id;
          	 	$order_de->size_id =$cart->options->size_id;
          	 	$order_de->color_id =$cart->options->color_id;
          	 	$order_de->subtotal =$cart->subtotal;
          	 	$order_de->save();
          	 	
          	 }

 Cart::destroy();


       $data = array(
        'email'=>$Request->email,
       );

       Mail::send('fontend/mail/order_add', $data, function ($message) use($data){
          	     $message->from('a.b123kwsar@gmail.com', 'Purnisher Ecommerace');        	 
          	     $message->to($data['email'], 'John Doe');
          	     $message->subject('Thank for order this site');
          	 
          	 
          	 });   	 


\Stripe\Stripe::setApiKey("sk_test_51HDTxYKJDCubtdTWLP8s1GrgMNFtTfosmBbfz1i6bYUzK76YSk1Q0EqPOzUqbMNN9lwTtpwU0xrdJdCApFDvksfY00qs06w84g");

\Stripe\Charge::create([
  'amount' => 1000,
  'currency' => 'usd',
   'source'=>$Request->stripeToken,
]);

          }






     return redirect()->back()->with('success','successfully done'); 


   }


   public function customerOrder(){

   	   if (@Auth::user()->id) {

   	   	$data['order'] = DB::table('orders')
   	   	                 ->join('shippings','orders.shipping_id','shippings.id')
   	   	                 ->select('orders.*','shippings.*')
   	   	                 ->where('orders.user_id',Auth::user()->id)->get();


   	   }else{

   	   	return redirect()->back();
   	   }

   	  return view('fontend/customer_dashbord/order',$data);
   }
}
