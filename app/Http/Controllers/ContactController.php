<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Menyimpan pesan dari pengunjung.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami.');
    }
}