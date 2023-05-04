<!-- resources/views/ports/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('dashboard') }}">Dashboard</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des ports</h2>
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
                        @foreach ($ports as $port)
                            <tr>
                                <td class="border px-4 py-2">{{ $port->id }}</td>
                                <td class="border px-4 py-2">{{ $port->nom }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('ports.edit', $port) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Éditer</a>
                                    <form action="{{ route('ports.destroy', $port->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce port ?');">Supprimer</button>
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-data="{ portId: null, portName: '' }">
                <div class="p-6 bg-white">
                    <h2 class="text-xl font-bold mb-4" x-show="portId === null">Ajouter un port</h2>
                    <h2 class="text-xl font-bold mb-4" x-show="portId !== null">Modifier le port</h2>
                    <form x-on:submit.prevent="portId === null ? createPort() : updatePort()">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                                Nom du port
                            </label>
                            <input x-model="portName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" required>
                        </div>
                        <button x-show="portId === null" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Ajouter
                        </button>
                        <button x-show="portId !== null" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Mettre à jour
                        </button>
                        <button x-show="portId !== null" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" x-on:click="portId = null; portName = '';">
                            Annuler
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function createPort() {
            axios.post('{{ route("ports.store") }}', {
                'nom': document.getElementById('nom').value,
                '_token': '{{ csrf_token() }}',
            }).then(response => {
                location.reload();
            }).catch(error => {
                console.error(error);
            });
            console.log(document.getElementById('nom').value);
        }

        function updatePort() {
            axios.put('{{ route("ports.update", "") }}/' + portId.value, {
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
