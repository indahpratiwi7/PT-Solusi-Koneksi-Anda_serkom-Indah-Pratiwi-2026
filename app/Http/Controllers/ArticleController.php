<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan semua artikel.
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Menampilkan detail artikel.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}