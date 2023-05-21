<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div>
    <nav class="container mx-auto my-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold text-3xl"><i class="material-icons text-blue-500">directions_boat</i> Maritime</a>

        <div class="space-x-4 text-white font-semibold">
            <a href="{{ route('home') }}" class="hover:text-blue-500">Accueil</a>
            <a href="{{ route('tarifs') }}" class="hover:text-blue-500">Tarifs</a>
            <a href="{{ route('horaires') }}" class="hover:text-blue-500">Horaires</a>
            <a href="{{ route('reservations') }}" class="hover:text-blue-500">Reservations</a>
            <a href="{{ route('login') }}" class="hover:text-blue-500">Connexion</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hover:text-blue-500">Inscription</a>
            @endif
        </div>
    </nav>
</div>
