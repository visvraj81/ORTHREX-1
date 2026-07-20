<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurgeonCornerReview extends Model
{
    protected $table = 'surgeon_corner_reviews';

    protected $fillable = [
        'product_id',
        'name',
        'location',
        'rating',
        'review_date',
        'response',
        'quality',
        'delivery',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
