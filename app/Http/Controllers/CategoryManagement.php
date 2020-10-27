<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorys;
use App\Http\Requests\CategoryRequest;
class CategoryManagement extends Controller
{
    
    public function Category_View(){

    	$data['cat'] = categorys::get();

    	return view('backend/category/view_category',$data);
    }

    public function Category_Viewajax(){

    	$data['cat'] = categorys::get();

    	return view('backend/category/category_viewajax',$data);
    }

    public function Category_Save(Request $Request){

    	$Request->validate([
          'category_name'=>'required|unique:categorys,category_name',
    	]);

    	if ($Request->ajax()) {
    		
    		$cat = new categorys();
    		$cat->category_name = $Request->category_name;
    		$cat->status = 1;
    		$cat->save();
    	}
    }

    public function Category_active(Request $Request){

    	if ($Request->ajax()) {
    		

    		$ac = categorys::find($Request->CatId);
    		$ac->status=2;
    		$ac->save();
    	}
    }


      public function Category_Deactive(Request $Request){

    	if ($Request->ajax()) {
    		

    		$ac = categorys::find($Request->CartId);
    		$ac->status=1;
    		$ac->save();
    	}
    }

    public function Category_Edite(CategoryRequest $Request){
          
          if ($Request->ajax()) {
          	$edite = categorys::find($Request->UsId);
          	$edite->category_name = $Request->category_name;
          	$edite->save();
          }

    }

    public function Category_Delete(Request $Request){
           
           if ($Request->ajax()) {
           	 
           	 $del = categorys::find($Request->CatId);

           	 $del->delete();

           }
    }
}
