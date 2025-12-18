<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenter la connexion
        if (Auth::attempt($data)) {
            
            
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Bienvenue Admin ' . Auth::user()->name . ' !');
            }

            return redirect()->route('dashboard')
                ->with('success', 'Bienvenue ' . Auth::user()->name . ' !');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    
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
            'role' => 'user',
        ]);

        // Connecter automatiquement l'utilisateur
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Compte créé avec succès ! Bienvenue ' . $user->name . ' !');
    }

    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')
            ->with('success', 'Vous êtes déconnecté.');
    }
}
