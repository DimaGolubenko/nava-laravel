<?php

namespace App\Http\Controllers\Admin\Product;

use App\Entity\Product\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    //post method
    public function store(Request $request)
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

        return redirect()->route('admin.products.show', $product->id);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $product->load('sizes');
        $product->load('images');
        return view('admin.products.edit', compact('product'));
    }

    //put method
    public function update($id)
    {
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete', compact('product'));
    }

    //delete method
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Товар успешно удалён.');
    }

    //Temporary
    public function add(Request $request)
    {
        $files = $request->file('images');
        ImageUploader::storeProductImages($files);
    }
}
