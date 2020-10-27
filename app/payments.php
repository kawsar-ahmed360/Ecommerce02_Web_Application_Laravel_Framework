<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
        protected $table='payments';

    protected $fillable = [
     'shipping_id',
     'user_id',
     'payment',
     'transaction',
     'status',
   

    ];
}
