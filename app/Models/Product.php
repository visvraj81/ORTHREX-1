<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = "products";


    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // adjust if your category model name differs
    }
    
}
