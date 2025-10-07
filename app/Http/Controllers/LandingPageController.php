<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $products = Product::all();
        return view('landing-page', compact('banners', 'products'));
    }
}
