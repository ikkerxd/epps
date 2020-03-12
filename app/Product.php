<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    //

    //protected $fillable=['']
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'category_id','name','descripcion','content','image','price','metric','brand','color','datasheet','stock','sotck_min','state',       
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
