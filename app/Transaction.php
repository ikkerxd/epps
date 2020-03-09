<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=[
        'user_id','type','date','total','nro_transaction','nro_guide'
    ];
}
