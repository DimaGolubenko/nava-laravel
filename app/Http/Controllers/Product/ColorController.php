<?php

namespace App\Http\Controllers\Product;

use App\Entity\Product\Color;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Show product sizes list.
     *
     * @return View
     */
    public function index()
    {
        $sizes = Color::all();
        return response()->json($sizes);
    }

    public function show($id)
    {
        $color = Color::find($id);
        return response()->json($color);
    }

    public function store()
    {
        $size = new Color();
        $size->name = 'цвет';
        $size->slug = 'color';

        $size->save();
        return redirect()->route('colors.index');
    }
}