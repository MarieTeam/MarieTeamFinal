<!-- resources/views/bateaux/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des bateaux
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
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bateaux as $bateau)
                            <tr>
                                <td class="border px-4 py-2">{{ $bateau->id }}</td>
                                <td class="border px-4 py-2">{{ $bateau->nom }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('bateaux.edit', $bateau) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Éditer</a>
                                    <form action="{{ route('bateaux.destroy', $bateau->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bateau ?');">Supprimer</button>
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

    <!-- Formulaire d'édition -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-data="{ bateauId: null, bateauName: '' }">
                <div class="p-6 bg-white">
                    <h2 class="text-xl font-bold mb-4" x-show="bateauId === null">Ajouter un bateau</h2>
                    <h2 class="text-xl font-bold mb-4" x-show="bateauId !== null">Modifier le bateau</h2>
                    <form x-on:submit.prevent="bateauId === null ? createBateau() : updateBateau()">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                                Nom du bateau
                            </label>
                            <input x-model="bateauName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" required>
                        </div>
                        <button x-show="bateauId === null" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Ajouter
                        </button>
                        <button x-show="bateauId !== null" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Mettre à jour
                        </button>
                        <button x-show="bateauId !== null" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" x-on:click="bateauId = null; bateauName = '';">
                            Annuler
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function createBateau() {
            axios.post('{{ route("bateaux.store") }}', {
                'nom': document.getElementById('nom').value,
                '_token': '{{ csrf_token() }}'
            }).then(response => {
                location.reload();
            }).catch(error => {
                console.error(error);
            });
        }

        function updateBateau() {
            axios.put('{{ route("bateaux.update", "") }}/' + bateauId.value, {
                'nom': document.getElementById('nom').value,
                '_token': '{{ csrf_token() }}',
                '_method': 'PUT'
            }).then(response => {
                location.reload();
            }).catch(error => {
                console.error(error);
            });
        }
    </script>
</x-app-layout>

