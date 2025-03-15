<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cart extends Controller
{
    /**
     * Add an item to the cart.
     */
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $id     = $request->id;
        $name   = $request->name;
        $price  = $request->price;
        $image  = $request->image;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = ['name' => $name, 'price' => $price, 'image' => $image, 'quantity' => 1];
        }

        session()->put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['cart' => $cart]);
    }

    /**
     * Display the cart.
     */
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.table', compact('cart'));
    }
}
