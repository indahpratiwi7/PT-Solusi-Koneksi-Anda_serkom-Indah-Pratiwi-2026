<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman edit profil perusahaan.
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Memperbarui profil perusahaan.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'description' => 'required|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        /*
         * Untuk sementara data profil belum disimpan ke database.
         * Penyimpanan profil akan kita buat pada tahap berikutnya.
         */

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}