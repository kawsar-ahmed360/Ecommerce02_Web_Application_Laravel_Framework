<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shippings extends Model
{
    protected $table='shippings';

    protected $fillable = [
     'user_id',
     'fname',
     'lname',
     'email',
     'mobile',
     'city',
     'address',
     'status',

    ];
}
