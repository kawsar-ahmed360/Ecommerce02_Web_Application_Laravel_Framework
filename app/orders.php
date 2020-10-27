<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
     protected $table='orders';

    protected $fillable = [
     'shipping_id',
     'user_id',
     'payment_id',
     'total_ammount',
     'discount',
     'status',
   

    ];

    public function payments(){

    	return $this->belongsTo('App\payments','payment_id');
    }

    public function order_details(){

        return $this->hasMany('App\order_details','id');
    }

    public function shippings(){

        return $this->belongsTo('App\shippings','shipping_id');
    }  


}
