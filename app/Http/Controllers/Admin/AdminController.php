<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalArticles = Article::count();
        $totalGalleries = Gallery::count();
        $totalMessages = ContactMessage::count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalArticles',
            'totalGalleries',
            'totalMessages'
        ));
    }
}