<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Cart::whereUserId(1)->get();
        return view(
            'customer.carts',
            ["products" => $products],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Cart::whereUserId(1)->whereProductId($request->product_id)->get();

        if (!$cart->count()) {
            Cart::create([
                'user_id' => 1,
                'product_id' => $request->product_id,
            ]);
        }

        return redirect()->route('carts.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::destroy($id);
        return redirect()->route('carts.index');
    }
}
