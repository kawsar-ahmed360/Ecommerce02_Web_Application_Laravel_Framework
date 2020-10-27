<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    protected $table ='colors';

    protected $fillable =[
 'color_name',
 'status'
    ];
}
