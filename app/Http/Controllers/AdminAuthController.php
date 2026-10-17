<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     */
    public function showLogin()
    {
        return view('auth.admin-login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $loginCredentials = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'is_admin' => true,
        ];

        if (Auth::attempt(
            $loginCredentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password admin salah.',
            ])
            ->withInput($request->only('email', 'remember'));
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('status', 'Anda berhasil logout dari akun admin.');
    }
}