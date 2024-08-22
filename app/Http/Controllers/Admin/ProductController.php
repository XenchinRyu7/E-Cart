<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::All();
        return view(
            'admin.product.index',
            ["products" => $products],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        return view('admin.product.create', ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "image" => "default.jpg",
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::all();
        $product = Product::whereId($id)->first();
        return view(
            'admin.product.edit',
            ['product' => $product],
            ['category' => $category]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $namaFile = uniqid() . "." . $request->file("foto")->getClientOriginalExtension();

        $request->file("foto")->storeAs("image", $namaFile, "public");

        Product::find($id)->update([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "image" => "default.jpg",
        ]);
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
