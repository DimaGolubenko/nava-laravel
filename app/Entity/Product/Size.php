<?php

namespace App\Entity\Product;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'product_sizes';
    protected $visible = ['id', 'name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_size');
    }
}
