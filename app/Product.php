<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable=['id', 'name', 'description', 'size','price', 'image','category_id'];


    public  function category()
    {
        return $this->belongsTo('App\Category');


    }

    public function reviews()
    {

        return $this->hasMany(ProductReview::class);
    }
}
