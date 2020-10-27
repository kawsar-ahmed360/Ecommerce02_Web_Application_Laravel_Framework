<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brands;
class BrandManagementController extends Controller
{
    public function Brands_View(){

    	$data['brand'] = brands::get();

    	return view('backend/brand/brand_view',$data);
    }

    public function Brands_Viewajax(){
     
     $data['brand'] = brands::get();

    	return view('backend/brand/brand_viewajax',$data);

    }

    public function Brands_Save(Request $Request){

    	$Request->validate([
        'brand_name'=>'required|unique:brands,brand_name',
    	]);

    	if ($Request->ajax()) {
    		
    		$b =new brands();
    		$b->brand_name = $Request->brand_name;
    		$b->status = 1;
    		$b->save();
    	}
    }

    public function Brands_Activeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = brands::find($Request->BrId);
    		$a->status=2;
    		$a->save();
    	}
    }  


     public function Brands_Deactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = brands::find($Request->BrId);
    		$a->status=1;
    		$a->save();
    	}
    } 

    public function Brands_Deleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = brands::find($Request->BrId);
    		$a->delete();
    	}
    }

    public function Brands_Editeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$ed = brands::find($Request->UsId);
    		$ed->brand_name = $Request->brand_name;
    		$ed->save();
    	}
    }


}
