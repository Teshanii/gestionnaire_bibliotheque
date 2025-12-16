<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Bibliothèque</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- ========== NAVIGATION ========== --}}
    <nav class="bg-white shadow-sm mb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                    📚 Ma Bibliothèque
                </a>

                {{-- Menu --}}
                <div class="flex items-center gap-6">
                    <a href="{{ route('books.index') }}" class="text-gray-700 hover:text-blue-600 transition">
                        📖 Livres
                    </a>

                    @auth
                        {{-- ✅ ADMIN : Dashboard Admin --}}
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" 
                               class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-semibold">
                                🔐 Dashboard Admin
                            </a>
                        @else
                            {{-- ✅ USER : Mon Profil --}}
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">
                                👤 Mon Profil
                            </a>
                        @endif

                        {{-- Bouton déconnexion --}}
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700 transition">
                                🚪 Déconnexion
                            </button>
                        </form>
                    @else
                        {{-- ✅ INVITÉ : Login/Register --}}
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">
                            🔐 Connexion
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            ✨ Inscription
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ========== MESSAGES FLASH ========== --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                ❌ {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- ========== CONTENU ========== --}}
    <main class="flex-grow">
        {{ $slot }}
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-gray-800 text-white mt-auto py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Ma Bibliothèque - Tous droits réservés</p>
        </div>
    </footer>

</body>
</html>
