<!-- resources/views/liaisons/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des liaisons
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Code</th>
                            <th class="border px-4 py-2">Distance</th>
                            <th class="border px-4 py-2">Secteur</th>
                            <th class="border px-4 py-2">Port de départ</th>
                            <th class="border px-4 py-2">Port d'arrivée</th>
                            <th class="border px-4 py-2">Bateau</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($liaisons as $liaison)
                            <tr>
                                <td class="border px-4 py-2">{{ $liaison->id }}</td>
                                <td class="border px-4 py-2">{{ $liaison->code }}</td>
                                <td class="border px-4 py-2">{{ $liaison->distance }}</td>
                                <td class="border px-4 py-2">{{ $liaison->secteur->nom }}</td>
                                <td class="border px-4 py-2">{{ $liaison->port1->nom }}</td>
                                <td class="border px-4 py-2">{{ $liaison->port2->nom }}</td>
                                <td class="border px-4 py-2">{{ $liaison->bateau->nom }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('liaisons.edit', $liaison->code) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Éditer</a>
                                    <form action="{{ route('liaisons.destroy', $liaison->code) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette liaison ?');">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Formulaire d'ajout de liaison -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <h2 class="text-xl font-bold mb-4">Ajouter une liaison</h2>
                    <form action="{{ route('liaisons.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="distance">
                                Distance
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="distance" type="number" name="distance" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_secteur">
                                Secteur
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_secteur" name="id_secteur" required>
                                @foreach ($secteurs as $secteur)
                                    <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_port1">
                                Port de départ
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_port1" name="id_port1" required>
                                @foreach ($ports as $port)
                                    <option value="{{ $port->id }}">{{ $port->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_port2">
                                Port d'arrivée
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_port2" name="id_port2" required>
                                @foreach ($ports as $port)
                                    <option value="{{ $port->id }}">{{ $port->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="id_bateau">
                                Bateau
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_bateau" name="id_bateau" required>
                                @foreach ($bateaux as $bateau)
                                    <option value="{{ $bateau->id }}">{{ $bateau->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


