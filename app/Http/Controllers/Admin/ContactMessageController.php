<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    /**
     * Menampilkan semua pesan dari pengunjung.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Menampilkan detail pesan.
     */
    public function show(ContactMessage $contactMessage)
    {
        return view(
            'admin.messages.show',
            compact('contactMessage')
        );
    }

    /**
     * Menghapus pesan.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}