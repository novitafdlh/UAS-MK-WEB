<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ]);
        }

        if ($user->role === 'admin') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Silakan login melalui halaman admin khusus.',
            ]);
        }

        return match ($user->role) {
            'dosen' => redirect()->intended('/dosen/dashboard'),
            'mahasiswa' => redirect()->intended('/mahasiswa/dashboard'),
            default => redirect('/'),
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
