<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Not_available extends Model
{
    protected $fillable=[
        'transaction_id','name','quantity','state'
    ];
}
