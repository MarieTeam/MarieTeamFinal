<!-- resources/views/liaisons/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('dashboard') }}">Dashboard</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Éditer une liaison') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <form method="POST" action="{{ route('liaisons.update', $liaison->code) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label for="code" :value="__('Code de la liaison')" />

                            <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="$liaison->code" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="distance" :value="__('Distance de la liaison (en miles)')" />

                            <x-input id="distance" class="block mt-1 w-full" type="number" name="distance" :value="$liaison->distance" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="id_secteur" :value="__('Secteur')" />

                            <select id="id_secteur" class="block mt-1 w-full" name="id_secteur" required>
                                @foreach ($secteurs as $secteur)
                                    <option value="{{ $secteur->id }}" @if ($secteur->id === $liaison->id_secteur) selected @endif>{{ $secteur->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="id_port1" :value="__('Port de départ')" />

                            <select id="id_port1" class="block mt-1 w-full" name="id_port1" required>
                                @foreach ($ports as $port)
                                    <option value="{{ $port->id }}" @if ($port->id === $liaison->id_port1) selected @endif>{{ $port->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="id_port2" :value="__('Port d\'arrivée')" />

                            <select id="id_port2" class="block mt-1 w-full" name="id_port2" required>
                                @foreach ($ports as $port)
                                    <option value="{{ $port->id }}" @if ($port->id === $liaison->id_port2) selected @endif>{{ $port->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="id_bateau" :value="__('Bateau')" />

                            <select id="id_bateau" class="block mt-1 w-full" name="id_bateau" required>
                                @foreach ($bateaux as $bateau)
                                    <option value="{{ $bateau->id }}" @if ($bateau->id === $liaison->id_bateau) selected @endif>{{ $bate

