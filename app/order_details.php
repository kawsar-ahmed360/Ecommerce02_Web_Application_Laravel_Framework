<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
     protected $table='order_details';

    protected $fillable = [
     'shipping_id',
     'user_id',
     'payment_id',
     'order_id',
     'product_id',
     'size_id',
     'color_id',
     'subtotal',
     'status',
   

    ];

    public function shippings(){
      
      return $this->belongsTo('App\shippings','shipping_id');
           
    } 

     public function orders(){
      
      return $this->belongsTo('App\orders','order_id');
           
    }  

    

    public function products(){
      
      return $this->belongsTo('App\products','product_id');
           
    } 

     public function sizes(){
      
      return $this->belongsTo('App\sizes','size_id');
           
    }

     public function colors(){
      
      return $this->belongsTo('App\colors','color_id');
           
    }
}
