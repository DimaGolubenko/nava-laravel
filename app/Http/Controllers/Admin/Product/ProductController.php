<?php

namespace App\Http\Controllers\Admin\Product;

use App\Entity\Product\Product;
use App\Entity\Product\Size;
use App\Entity\Product\Color;
use App\Entity\Product\Image;
use App\UseCases\Products\ProductService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);
        $products->load('sizes');
        $products->load('images');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.create', compact('sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:20',
        ]);

        $files = $request->file('images');
        $data = $request->input();
        
        $this->service->storeProductImages($files);
        $imagesData = $this->service->getProductImagesData($files);
        
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->save();
        $product->sizes()->attach($data['sizes']);
        $product->colors()->attach($data['colors']);

        $product->images()->createMany($imagesData);

        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->load('sizes');
        $product->load('images');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        //$product->load('images');

        $productSizes = collect($product->sizes)->map(function ($size) {
            return $size->id;
        })->toArray();

        $productColors = collect($product->colors)->map(function ($color) {
            return $color->id;
        })->toArray();

        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.edit',
            compact('product',
                'sizes',
                'colors',
                'productSizes',
                'productColors'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('admin.products.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Товар успешно удалён.');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return view('admin.products.delete', compact('product'));
    }
}
