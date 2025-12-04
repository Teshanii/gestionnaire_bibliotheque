<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-2xl mx-auto px-4 py-8 w-full">
        
        <a href="/" class="italic text-slate-500 hover:text-slate-700">
            ← Retour à la bibliothèque
        </a>

        <h1 class="mt-4 mb-6">Ajouter un nouveau livre </h1>

        <form action="/books" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Titre du livre
                </label>
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Ex : Le Petit Prince"
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Auteur
                </label>
                <input 
                    type="text" 
                    name="author" 
                    placeholder="Ex : Antoine de Saint-Exupéry"
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea 
                    name="description" 
                    rows="4"
                    placeholder="Décrivez brièvement le livre..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                ></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Année de publication
                    </label>
                    <input 
                        type="number" 
                        name="year" 
                        placeholder="Ex : 1943"
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ISBN
                    </label>
                    <input 
                        type="text" 
                        name="isbn" 
                        placeholder="Ex : 978-2070408504"
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-primary flex-1">
                    Créer le livre
                </button>
                <a href="/" class="btn btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</body>
</html>
