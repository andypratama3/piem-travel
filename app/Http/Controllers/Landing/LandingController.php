<?php

namespace App\Http\Controllers\Landing;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        $products = Produk::with('category')->orderby('name')->take(6)->get();
        return view('landing.index', compact('products'));
    }
}
