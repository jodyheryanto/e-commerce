<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('product-detail', compact('product', 'products'));
    }
}
