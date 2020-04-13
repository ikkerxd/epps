<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notavailable extends Model
{

    protected $table = 'not_availables';

    protected $fillable=[
        'transaction_id','name','quantity','state','image'
    ];
}
