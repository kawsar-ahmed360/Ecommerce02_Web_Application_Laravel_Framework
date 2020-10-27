<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_colors extends Model
{
       protected $table ='product_colors';

    protected $fillable =[
   'product_id',
   'color_id',
   'status',
    ];

    public function colors(){

    	return $this->belongsTo('App\colors','color_id');
    }
}
