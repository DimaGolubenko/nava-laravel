<?php

namespace App\Entity\Product;

use App\Entity\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'product_images';
    public $fillable = ['name', 'alt', 'primary'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
