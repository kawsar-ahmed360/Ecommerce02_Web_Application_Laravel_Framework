<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Cart;
class CartController extends Controller
{
    

      public function addCART(Request $Request){

    	$Request->validate([
          'color_id'=>'required',
          'size_id'=>'required',
    	]);

    	$product = products::where('id',$Request->product_id)->first();

        
        Cart::add(['id' => $product->id, 'name' => $product->product_name, 'qty' => $Request->qty, 'price' => $product->product_price, 'weight' => 550, 'options' => ['color_id' => $Request->color_id,'size_id'=>$Request->size_id,'image'=>$product->image]]);

        return redirect()->route('ShoppingCart')->with('success','card successfully added');

    }

    public function ShoppingCart(){

    	return view('fontend/single_page/shopping_cart');
    }

    public function ShoppingCartRemove($rowId){

    	Cart::remove($rowId);

    	return redirect()->back();
    }

    public function ShoppingCartUpdate(Request $Request){


    	Cart::update($Request->rowId,$Request->qty);

    	return redirect()->back();
    }

    public function CheckOutPage(){

    	return view('fontend/single_page/checkout');
    }
}
