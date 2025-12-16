<x-layout>
    <div class="max-w-md mx-auto mt-16 px-4">
        <div class="card">
            <h1 class="text-center mb-6">✨ Inscription</h1>

            {{-- Messages d'erreur --}}
            @if($errors->any())
                <div class="alert alert-error mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Nom --}}
                <div>
                    <label for="name" class="form-label">
                        👤 Nom complet
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="form-input"
                        placeholder="Jean Dupont"
                        required
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label">
                        📧 Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        class="form-input"
                        placeholder="exemple@email.com"
                        required
                    >
                </div>

                {{-- Mot de passe --}}
                <div>
                    <label for="password" class="form-label">
                        🔒 Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        required
                    >
                    <p class="text-sm text-gray-500 mt-1">Minimum 6 caractères</p>
                </div>

                {{-- Bouton --}}
                <button type="submit" class="btn btn-primary w-full">
                    S'inscrire
                </button>
            </form>

            {{-- Lien connexion --}}
            <p class="text-center text-gray-600 mt-6">
                Déjà un compte ? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</x-layout>
