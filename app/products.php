<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = [
     'product_name',
     'cat_id',
     'brand_id',
     'product_summary',
     'product_description',
     'product_price',
     'image',
     'slug',
     'status',
    ];

    public function categorys(){

        return $this->belongsTo('App\categorys','cat_id');
    }   

    public function brands(){

        return $this->belongsTo('App\brands','brand_id');
    } 
}
