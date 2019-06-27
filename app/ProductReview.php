<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable=[
      'name',
        'headline',
        'product_id',
      'rating',
      'description',
      'approved'

    ];

public function product()
{
    return $this->belongsTo(Product::class);
}
}
