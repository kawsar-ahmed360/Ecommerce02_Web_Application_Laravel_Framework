<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_sizes extends Model
{
     protected $table ='product_sizes';

    protected $fillable =[
   'product_id',
   'size_id',
   'status',
    ];


    public function sizes(){

    	return $this->belongsTo('App\sizes','size_id');
    }
}
