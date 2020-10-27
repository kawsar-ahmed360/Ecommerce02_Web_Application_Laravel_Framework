<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
class FontendController extends Controller
{
    public function mainfont(){

    	$data['product'] = products::where('status','2')->get();
    	return view('fontend/main',$data);
    }

    public function catProduct(){
     
     $data['product'] = products::where('status','2')->get();
    	return view('fontend/single_page/product',$data);

    }

    public function BrandProduct(Request $Request){

    	$data['product'] = products::where('brand_id',$Request->brand_id)->where('status','2')->get();

    	return view('fontend/single_page/brand_product',$data);
    	
    }

    public function searchProduct(Request $Request){

        $data['product'] = products::where('product_name','like','%'.$Request->fname.'%')->where('status','2')->get();

    	return view('fontend/single_page/search',$data);
    }

    public function SinglePorduct($slug){

         
         $data['product_single'] = products::where('slug',$slug)->first();

    	return view('fontend/single_page/product_details',$data);
    }

  
   

   
}
