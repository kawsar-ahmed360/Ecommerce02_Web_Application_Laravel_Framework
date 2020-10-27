<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table ='brands';

    protected $fillable = [
        'brand_name',
        'status',
    ];
}
