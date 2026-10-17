<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk atau layanan.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan detail produk atau layanan.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}