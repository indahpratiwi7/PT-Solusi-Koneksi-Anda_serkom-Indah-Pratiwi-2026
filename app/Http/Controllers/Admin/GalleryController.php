<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan semua galeri.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Menampilkan form tambah galeri.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Menyimpan galeri baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('gallery', 'public');
        }

        Gallery::create($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail galeri.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Menampilkan form edit galeri.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Memperbarui galeri.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {

            // Hapus foto lama
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Simpan foto baru
            $validated['image'] = $request
                ->file('image')
                ->store('gallery', 'public');
        }

        $gallery->update($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    /**
     * Menghapus galeri.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus file foto
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Hapus data dari database
        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}