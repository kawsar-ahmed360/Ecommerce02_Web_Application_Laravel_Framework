<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\colors;
class ColorManagement extends Controller
{
    public function Colors_View(){

    	$data['color'] = colors::get();
    	return view('backend/colors/view_color',$data);
    }

    public function Colors_Viewajax(){
        
        $data['color'] = colors::get();
    	return view('backend/colors/view_ajax',$data);

    }

    public function Colors_Save(Request $Request){

    	$Request->validate([
        'color_name'=>'required|unique:colors,color_name',
    	]);

    	if ($Request->ajax()) {
    		
    		$c = new colors();
    		$c->color_name = $Request->color_name;
    		$c->status = 1;
    		$c->save();
    	}
    }

    public function Colors_Activeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = colors::find($Request->ColId);
    		$a->status=2;
    		$a->save();
    	}
    }


     public function Colors_Deactiveajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = colors::find($Request->ColId);
    		$a->status=1;
    		$a->save();
    	}
    } 

     public function Colors_Deleteajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$a = colors::find($Request->ColId);
    		$a->delete();
    	}
    }

    public function Colors_Editeajax(Request $Request){

    	if ($Request->ajax()) {
    		
    		$e = colors::find($Request->UsId);
    		$e->color_name = $Request->color_name;
    		$e->save();
    	}
    }
}
