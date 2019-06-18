<?php

namespace App\Http\Controllers\Product;

use App\Entity\Product\Size;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Show product sizes list.
     *
     * @return View
     */
    public function index()
    {
        $sizes = Size::all();
        return response()->json($sizes);
    }

    public function show($id)
    {
        $size = Size::find($id);
        return response()->json($size);
    }

    public function store()
    {
        $size = new Size();
        $size->name = '42';
        $size->slug = '42';

        $size->save();
        return redirect()->route('sizes.index');
    }
}