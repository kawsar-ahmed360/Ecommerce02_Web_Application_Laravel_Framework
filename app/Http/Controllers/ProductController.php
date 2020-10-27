<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\product_gallerys;
use App\product_colors;
use App\product_sizes;
use App\categorys;
use App\colors;
use App\sizes;
use Image;
use DB;
use App\brands;
class ProductController extends Controller
{
    public function Product_Add(){
       
       $data['cat'] = categorys::where('status','2')->get();
       $data['color'] = colors::where('status','2')->get();
       $data['size'] = sizes::where('status','2')->get();
       $data['brand'] = brands::where('status','2')->get();
    	return view('backend/product/product_add',$data);
    }

    public function Product_Save(Request $Request){

    	$Request->validate([
          
          'product_name'=>'required',
          'cat_id'=>'required',
          'brand_id'=>'required',
          'product_summary'=>'required',
          'product_description'=>'required',
          'product_price'=>'required',
          'image'=>'required',
          'product_gallery'=>'required',
          'color_id'=>'required',
          'size_id'=>'required',

    	]);

    
     $slug = str_replace(' ', '-', $Request->product_name);

      $pro_slug = products::where('slug',$slug)->count();

      if ($pro_slug>0) {
      	
      	 $slug = time().'.'.$slug;

      }

     $product = new products();
     $product->product_name = $Request->product_name;
     $product->cat_id = $Request->cat_id;
     $product->brand_id = $Request->brand_id;
     $product->product_summary = $Request->product_summary;
     $product->product_description = $Request->product_description;
     $product->product_price = $Request->product_price;
     $product->status = 1;
     $product->slug = $slug;

     if ($Request->hasFile('image')) {
     	
     	$image = $Request->file('image');

     	$full_name = time().'.'.$image->getClientOriginalExtension();

     	Image::make($image)->resize(1200,870)->save('public/backend/product_image/'.$full_name);

     	$product->image = $full_name;
     }

     
     DB::transaction(function() use($Request,$product){
         
         if ($product->save()) {
         	
      

         	 if ($Request->hasFile('product_gallery')) {
         	 	
         	 	 $gellary = $Request->file('product_gallery');

         	 	  foreach ($gellary as $key=>$product_gall) {

         	 	  	   	 $product_gallery = new product_gallerys();
         	 	  	
         	 	  	$full_gellaryname =uniqid().'.'.$key.time().'.'.$product_gall->getClientOriginalExtension();
         	 	  	Image::make($product_gall)->resize(1200,870)->save('public/backend/product_gallery/'.$full_gellaryname);
         	 	  	$product_gallery->product_id = $product->id; 
         	 	  	$product_gallery->product_gallery = $full_gellaryname;
         	 	  	$product_gallery->save(); 
         	 	  }
         	 }else{

         	 	return redirect()->back()->with('message','product_gellary no save');
         	 }
            
            $color = $Request->color_id;

         	if ($color) {


                 foreach ($color as $color_value) {
         		$product_color =new product_colors(); 

                 	$product_color->product_id =$product->id; 
                 	$product_color->color_id =$color_value; 
                 	$product_color->save(); 
                 	
                 }
         	 	
         	 }else{

         	return redirect()->back()->with('message','color no save');
         	 }

         	 $size = $Request->size_id;

         	 if ($size) {
         	  	

         	  	foreach ($size as $size_value) {
         	  	$size_map =new product_sizes();
         	  		
         	  	$size_map->product_id =$product->id; 
         	  	$size_map->size_id =$size_value; 
         	  	$size_map->save();
         	  	}
         	  }else{


         	return redirect()->back()->with('message','size no save');
         	  } 

         }else{

         	return redirect()->back()->with('message','product no save');
         }
     });

     return redirect()->back()->with('success','data successfully inserted');


    }

    public function Product_View(){

    	$data['product'] = products::get();

    	return view('backend/product/view_product',$data);
    }

    public function Product_Active($id){

    	$active = products::find($id);

    	$active->status=2;
    	$active->save();

    	$product_gellary = product_gallerys::where('product_id',$active->id)->get();

    	foreach ($product_gellary as $value) {
    		
    		$value->status =2;
    		$value->save();

    	}

    	$product_color = product_colors::where('product_id',$active->id)->get();

    		foreach ($product_color as $value) {
    		
    		$value->status =2;
    		$value->save();

    	}

    	$product_size = product_sizes::where('product_id',$active->id)->get();

    		foreach ($product_size as $value) {
    		
    		$value->status =2;
    		$value->save();

    	}

        if ($active->save()) {
        
          echo "success";

          $notification = array(
           'message'=>'product success active',
           'alert-type'=>'success'
          );
      }

        return redirect()->back()->with($notification);
    }

    public function Product_Deactive($id){

    	$deactive = products::find($id);

    	$deactive->status=1;
    	$deactive->save();

    	$product_gellary = product_gallerys::where('product_id',$deactive->id)->get();
    	foreach ($product_gellary as $value) {
    	  
    	  $value->status=1;
    	  $value->save();

    	}

    	$product_color = product_colors::where('product_id',$deactive->id)->get();
    	foreach ($product_color as $value) {
    	  
    	  $value->status=1;
    	  $value->save();

    	}

    	$product_size = product_sizes::where('product_id',$deactive->id)->get();
    	foreach ($product_size as $value) {
    	  
    	  $value->status=1;
    	  $value->save();

    	}

      if ($deactive->save()) {
        
          echo "success";

          $notification = array(
           'message'=>'product success Deactive',
           'alert-type'=>'success'
          );
      }

        return redirect()->back()->with($notification); 	

    }

    public function Product_Delete($id){

    	$delete = products::find($id);


    	DB::transaction(function() use($id,$delete){

    		if ($delete) {
         unlink(public_path('backend/product_image/'.$delete->image));

          $delete->delete();
    		
    	}


         $product_gellary = product_gallerys::where('product_id',$delete->id)->get();

         if ($product_gellary) {
         	
         	foreach ($product_gellary as $value) {
         		
         		unlink(public_path('backend/product_gallery/'.$value->product_gallery));
         		$value->delete();
         	}
         }


           $product_color = product_colors::where('product_id',$delete->id)->get();

         if ($product_color) {
         	
         	foreach ($product_color as $value) {
         	
         		$value->delete();
         	}
         }


           $product_size = product_sizes::where('product_id',$delete->id)->get();

         if ($product_size) {
         	
         	foreach ($product_size as $value) {
         	
         		$value->delete();
         	}
         }

    	});

    	
          
          return redirect()->back()->with('success','all relative product deleted');

    }

    public function Product_Edite($id){

    	 $data['cat'] = categorys::where('status','2')->get();
       $data['color'] = colors::where('status','2')->get();
       $data['size'] = sizes::where('status','2')->get();
       $data['brand'] = brands::where('status','2')->get();

    	$data['edite'] = products::find($id);
    	$data['product_color'] = product_colors::select('color_id')->where('product_id',$data['edite']->id)->get()->toArray();
    	$data['product_size'] = product_sizes::select('size_id')->where('product_id',$data['edite']->id)->get()->toArray();
    	$data['product_galle'] = product_gallerys::where('product_id',$data['edite']->id)->get();

    	return view('backend/product/edite',$data);
    }

  public function Product_Update(Request $Request){

      
      $product = products::find($Request->id);

      $product->product_name = $Request->product_name;
     $product->cat_id = $Request->cat_id;
     $product->brand_id = $Request->brand_id;
     $product->product_summary = $Request->product_summary;
     $product->product_description = $Request->product_description;
     $product->product_price = $Request->product_price;

      if ($Request->hasFile('image')) {
      	
      	$image = $Request->file('image');

      	$full_name = time().'.'.$image->getClientOriginalExtension();

  
      		
         unlink(public_path('backend/product_image/'.$product->image));
      	
       

         Image::make($image)->resize(1200,870)->save('public/backend/product_image/'.$full_name);
         $product->image = $full_name;

      }

      DB::transaction(function() use($Request,$product){
      	if ($product->save()) {
      		
      		 if ($Request->hasFile('product_gallery')) {
      		 	
      		 	 $gellary = product_gallerys::where('product_id',$product->id)->get();

      		 	 foreach ($gellary as $value) {
      		 	 	
      		 	 	 unlink(public_path('backend/product_gallery/'.$value->product_gallery));
      		 	 	 $value->delete();
      		 	 }
      		 }

      		 if ($Request->hasFile('product_gallery')) {
      		 	
      		 	  $image_gellary = $Request->file('product_gallery');

      		 	  foreach ($image_gellary as $key=>$gallery) {
      		 	  	
      		 	  	 $upload_gellary = new product_gallerys();

      		 	  	  $full_gella_name = uniqid().$key.time().'.'.$gallery->getClientOriginalExtension();

      		 	  	  Image::make($gallery)->resize(1200,870)->save('public/backend/product_gallery/'.$full_gella_name);

      		 	  	  $upload_gellary->product_id = $product->id;
      		 	  	  $upload_gellary->product_gallery = $full_gella_name;
      		 	  	  $upload_gellary->save();
      		 	  }
      		 }

//.................color delete..........
      		 $color = $Request->color_id;

      		 if ($color) {
      		 	  
      		 	   $deletecolor = product_colors::where('product_id',$product->id)->get();

      		 	   foreach ($deletecolor as $value) {
      		 	   	 $value->delete();
      		 	   }
      		 }

//......................End color delete..........

//................color insert.................      		 
      		 $color = $Request->color_id;

      		 if ($color) {
      		 	
      		 	foreach ($color as $colorvalue) {
      		 		
      		 		$col = new product_colors();
      		 		$col->product_id = $product->id;
      		 		$col->color_id = $colorvalue;
      		 		$col->save();
      		 	}
      		 }
//.......................End color insert......


//.......................Delete size......
      		 $size = $Request->size_id;

      		 if ($size) {
      		 	
      		 	$sizedelete = product_sizes::where('product_id',$product->id)->get();
      		 	foreach ($sizedelete as $value) {
      		 		$value->delete();
      		 	}
      		 }
//.......................Delete size END......


//.......................size insert......

      		 $size = $Request->size_id;
      		 if ($size) {
      		 	
      		 	foreach ($size as $sizevalue) {
      		 	   $sizeinser = new product_sizes();
      		 	   $sizeinser->product_id = $product->id;
      		 	   $sizeinser->size_id =$sizevalue;
      		 	   $sizeinser->save(); 	
      		 	}
      		 }
//.......................End size insert......



      	}
      });


    return redirect()->route('Product_View')->with('success','successfully update');  

  }


  public function Product_Single_view($id){
   
    $data['product'] = products::find($id);

  

    return view('backend/product/single_view',$data);

  }
}
