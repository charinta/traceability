<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate([
            'username' => $request->username, // Use 'username' field for login
            'password' => $request->password,
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Cek role pengguna dan arahkan ke halaman sesuai
            if (auth()->user()->role === User::ROLE_ADMIN) {
                return redirect()->intended('/admin/dashboard');
            } elseif (auth()->user()->role === User::ROLE_USER) {
                return redirect()->intended('/user/dashboard');
            }
        }

        $request->session()->regenerate();
        Auth::attempt();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
