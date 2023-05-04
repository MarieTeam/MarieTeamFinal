<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('dashboard') }}">Dashboard</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Éditer un port') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <form method="POST" action="{{ route('ports.update', $port->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label for="nom" :value="__('Nom du port')" />

                            <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="$port->nom" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Mettre à jour') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
