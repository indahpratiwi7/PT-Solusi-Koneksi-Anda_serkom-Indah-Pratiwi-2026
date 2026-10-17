<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan galeri kegiatan perusahaan.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Menampilkan detail foto galeri.
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }
}