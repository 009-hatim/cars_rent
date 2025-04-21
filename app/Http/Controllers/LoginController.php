<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'MotDePasse' => 'required|string',
        ]);

        // Find user first
        $user = User::where('email', $credentials['email'])->first();

        // Manually verify with MD5
        if ($user && md5($credentials['MotDePasse']) === $user->MotDePasse) {
            Auth::login($user, $request->remember);

            $request->session()->regenerate();

            if ($user->admin) {
                return redirect()->route('admindashboard');
            }

            return redirect()->intended(route('index'));
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
