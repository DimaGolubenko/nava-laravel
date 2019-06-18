<?php

namespace App\Http\Controllers\Product;

use App\Entity\Product\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\ImageUploader;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);
        $products->load('sizes');
        $products->load('images');
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $product->load('sizes');
        $product->load('images');
        return view('products.show', compact('product'));
    }
}