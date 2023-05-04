<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panneau d\'administration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-14">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h2 class="text-xl font-bold mb-4">Ports</h2>
                            <a href="{{ route('ports.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir tous les ports</a>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h2 class="text-xl font-bold mb-4">Bateaux</h2>
                            <a href="{{ route('bateaux.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir tous les ports</a>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h2 class="text-xl font-bold mb-4">Liaison</h2>
                            <a href="{{ route('liaisons.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir toutes les liaisons</a>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="text-2xl font-semibold mb-6">Statistiques des réservations</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Nombre total de réservations</h2>
                    <p class="text-3xl font-semibold mt-2">{{ $totalReservations }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Réservations par mois</h2>
                    <div class="mt-2">
                        @foreach($reservationsPerMonth as $month => $count)
                            <p class="text-sm">{{ $month }}: {{ $count }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Pourcentage des réservations mensuelles</h2>
                    <div class="mt-2">
                        @foreach($percentagePerMonth as $month => $percentage)
                            <p class="text-sm">{{ $month }}: {{ $percentage }}%</p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-scroll relative max-h-screen">
                <table class="table-auto w-full whitespace-nowrap">
                    <thead>
                    <tr class="text-left text-gray-700 bg-gray-100">
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Num</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Adresse</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Code Postal</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Ville</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Numero Traversée</th>
                        <th class="px-6 py-3 font-semibold text-sm uppercase tracking-wider">Date de création</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($reservations as $reservation)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : '' }}">
                            <td class="px-6 py-4 text-sm">{{ $reservation->num }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->nom }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->adresse }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->codePostal }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->ville }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->num_traversee }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reservation->formatted_created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
