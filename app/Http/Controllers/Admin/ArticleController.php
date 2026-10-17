<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Menampilkan semua artikel.
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Menampilkan form tambah artikel.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Menyimpan artikel baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail artikel.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Menampilkan form edit artikel.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Memperbarui artikel.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Menghapus artikel.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}