<?php

namespace App\Http\Controllers;

use App\Color;
use App\Language;
use App\Memory;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::with('languages')->with('colors')->with('memories')->with('sizes')->get();
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $languages = Language::all();
        $colors = Color::all();
        $sizes = Size::all();
        $memories = Memory::all();
        return view('products.create')
        ->with('languages', $languages)
        ->with('colors', $colors)
        ->with('sizes', $sizes)
        ->with('memories', $memories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);

        $product = Product::create(['name' => $request->name]);
        
        if (!empty($request->options)) {
            # code...
            if (!empty($request->language)) {
                # code...
                $language = Language::where('name', $request->language)->get();
                $product->languages()->attach($language);
            }
            if (!empty($request->color)) {
                # code...
                $colors = explode(", ", $request->color);
                $color = Color::where('name', $colors[0])->where('code', $colors[1])->get();
                $product->colors()->attach($color);
            }
            if (!empty($request->memory)) {
                # code...
                $memories = explode(", ", $request->memory);
                $memory = Memory::where('ram', $memories[0])->where('hard_drive', $memories[1])->get();
                $product->memories()->attach($memory);
            }
            if (!empty($request->size)) {
                # code...
                $size = Size::where('inches', $request->size)->get();
                $product->sizes()->attach($size);
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
