<?php

namespace App\Http\Controllers\Auth;

use App\Events\SessionDestroyed;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Events\SessionStarted;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

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

        SessionStarted::dispatch(Auth::user(), [
            'headers' => $request->headers->all(),
            'body' => $request->all(),
            'ip' => $request->ip(),
        ]);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        Auth::guard('web')->logout();

        SessionDestroyed::dispatch($user);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
