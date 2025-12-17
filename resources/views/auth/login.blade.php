<x-layout>
    <div class="max-w-md mx-auto mt-16 px-4">
        <div class="card">
            <h1 class="text-center mb-6">Connexion</h1>

            {{-- Messages d'erreur --}}
            @if($errors->any())
                <div class="alert alert-error">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Message de succès (après inscription) --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label">
                        Email
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
                        Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        required
                    >
                </div>

                {{-- Se souvenir de moi --}}
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    >
                    <label for="remember" class="ml-2 text-gray-700">
                        Se souvenir de moi
                    </label>
                </div>

                {{-- Bouton --}}
                <button type="submit" class="btn btn-primary w-full">
                    Se connecter
                </button>
            </form>

            {{-- Lien inscription --}}
            <p class="text-center text-gray-600 mt-6">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                    S'inscrire
                </a>
            </p>
        </div>
    </div>
</x-layout>
