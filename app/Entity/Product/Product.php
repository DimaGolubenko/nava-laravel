<?php

namespace App\Entity\Product;

use App\Entity\Product\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_product_size');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_product_color');
    }

    public function images()
    {
        return $this->hasMany(image::class);
    }
}
