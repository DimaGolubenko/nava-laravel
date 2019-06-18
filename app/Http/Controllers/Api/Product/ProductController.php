<?php

namespace App\Http\Controllers\Api\Product;

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
        $products = Product::paginate(15);
        $products->load('images');
        return ProductResource::collection($products);
        //return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $product->load('sizes');
        return new ProductResource($product);
        //return response()->json($product);
        //return view('products.show', compact('product'));
    }

    public function create(Request $request)
    {
        $files = $request->file('images');
        ImageUploader::storeProductImages($files);

        $data = $request->input();
        
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->save();
        $product->sizes()->attach($data['sizes']);
        $product->colors()->attach($data['colors']);
        
        return new ProductResource($product);
    }

    public function add(Request $request)
    {
        $files = $request->file('images');
        ImageUploader::storeProductImages($files);
    }
}
