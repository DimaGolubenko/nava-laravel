<?php

namespace App\Entity\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'product_colors';
    protected $visible = ['id', 'name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_color');
    }
}
