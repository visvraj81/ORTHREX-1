<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = "product_details";

    protected $fillable = [
        'product_id',
        'first',
        'last',
        'handle',
    ];

     public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
