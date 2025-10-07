<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        return view('cart', compact('carts'));
    }

    public function addToCart(Request $request, $productId)
    {
        $quantity = $request->quantity;
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();
        if (!empty($cart)) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
        
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function removeFromCart($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }
}
