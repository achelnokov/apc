<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthRequest $request) {
        $creds = $request->only(['email', 'password']);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return Inertia::render('Dashboard');
        }

        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); 
    }
}
