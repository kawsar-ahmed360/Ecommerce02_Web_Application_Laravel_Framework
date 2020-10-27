<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_gallerys extends Model
{
    protected $table ='product_gallerys';

    protected $fillable =[
   'product_id',
   'product_gallery',
   'status',
    ];
}
