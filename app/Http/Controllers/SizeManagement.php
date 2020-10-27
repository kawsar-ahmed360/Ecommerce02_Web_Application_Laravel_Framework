<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sizes;
class SizeManagement extends Controller
{
    public function Sizes_View(){

    	$data['size'] = sizes::get();

    	return view('backend/size/size_view',$data);
    }

    public function Sizes_Viewajax(){

    	$data['size'] = sizes::get();

    	return view('backend/size/size_view_ajax',$data);
    }

    public function Sizes_Save(Request $Request){

    	$Request->validate([
            'size_name'=>'required|unique:sizes,size_name',
    	]);

    	$s = new sizes();
    	$s->size_name = $Request->size_name;
    	$s->status = 1;
    	$s->save();
    }

    public function Sizes_Activeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sizes::find($Request->SizeId);
    		$a->status=2;
    		$a->save();
    	}
    } 


    public function Sizes_Deactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sizes::find($Request->SizeId);
    		$a->status=1;
    		$a->save();
    	}
    }  


    public function Sizes_Deleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = sizes::find($Request->SizeId);
    		$a->delete();
    	}
    }

    public function Sizes_Editeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$e = sizes::find($Request->UsId);

    		$e->size_name = $Request->size_name;
    		$e->save();
    	}
    }
}
