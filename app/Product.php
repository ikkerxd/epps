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

    public function hasCategory(array $category)
    {
        foreach ($category as $category)
        {   
            if($this->category->name == $category)
            {
                return true;
            }
        }
        return false;
    }
}
