<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->reduce(fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        return Inertia::render('Cart/Index', [
            'cart' => array_values($cart),
            'total' => number_format($total, 2),
        ]);
    }

    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image_path' => $product->image_path,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', "{$product->name} added to cart!");
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Item removed.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart cleared.');
    }
}