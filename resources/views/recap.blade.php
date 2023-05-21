<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation réussie</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-xl p-6">
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-16 h-16 text-green-500 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-center mb-4">Réservation réussie !</h2>
        <p class="text-gray-600 text-center mb-8">
            Votre réservation a été enregistrée avec succès. Nous avons envoyé un email de confirmation à votre adresse email.
        </p>
        <div class="text-center">
            <a href="/" class="inline-block bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Retour à la page d'accueil</a>
        </div>
    </div>
</div>
</body>
</html>
