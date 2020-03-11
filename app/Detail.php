<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'details';
    protected $filllable=[
      'user_id','type','nro_transaction','nro_guide','date','total','igv','process'
    ];
}
