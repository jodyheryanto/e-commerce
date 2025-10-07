<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $aboutCompany = AboutCompany::first();
        return view('contact', compact('aboutCompany'));
    }
}
