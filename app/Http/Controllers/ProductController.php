<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->search)
        {
            $product = Product::where('slug','LIKE',"%$request->search")
                ->where('status',true)
                ->get();
            return $product;
        }

        $product = Product::where('status',true)
            ->get();
        return view('Product/index',[
            'datas' => $product
        ]);
    }

    public function details(Request $request)
    {
        //
        $product = Product::where('slug',$request->slug)
            ->where('status',true)->first();
//        @ddd($product);
        return view( 'Product/details', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Product/create');
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
        $slug = str_replace(" ", "-", $request->name);
        $picture_path = $request->file('image')->store('public/img/product');
        //@ddd(($picture_path));

        Product::create([
            'slug' => $slug,
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'picture_path' => $picture_path,
            'description' => $request->description,
            'status' => true
        ]);

        return redirect('/Product/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
