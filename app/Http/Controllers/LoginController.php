<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // ========== AFFICHER LE FORMULAIRE DE CONNEXION ==========
    public function showLogin()
    {
        return view('auth.login');
    }

    // ========== TRAITER LA CONNEXION ==========
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Bienvenue Admin ' . Auth::user()->name . ' !');
            }

            return redirect()->route('dashboard')
                ->with('success', 'Bienvenue ' . Auth::user()->name . ' !');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }

    // ========== AFFICHER LE FORMULAIRE D'INSCRIPTION ==========
    public function showRegister()
    {
        return view('auth.register');
    }

    // ========== TRAITER L'INSCRIPTION ==========
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user', //par défaut, le rôle est 'user'
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', ' Compte créé avec succès ! Bienvenue ' . $user->name . ' !');
    }

    // ========== DÉCONNEXION ==========
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', ' Vous êtes déconnecté.');
    }
}
