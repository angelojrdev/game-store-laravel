<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()
            ->withErrors(['username' => __('auth.failed')])
            ->onlyInput('username');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
