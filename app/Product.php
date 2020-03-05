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
        'name','category_id','descripcion','contenido','unidad_medida','marca','color','ficha_tecnica','price','image','store',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
