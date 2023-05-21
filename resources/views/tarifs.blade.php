<!DOCTYPE html>
<html lang="en">
<head>
    <title>MARIE TEAM</title>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css');
    body {
        background: url('https://source.unsplash.com/1600x900/?ocean,sea') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-blend-mode: darken;
        background-color: rgba(0,0,0,0.5);
    }
</style>
<body class="antialiased text-white">

<x-navbar/>
<div class="flex justify-center">
    <div class="w-full max-w-2xl mt-20">
        <div class="flex flex-wrap -mx-2 overflow-hidden">
            @foreach( $types as $type )
                <div class="my-2 px-2 w-full overflow-hidden md:w-1/2 lg:w-1/3">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $type->libelle }}</div>
                            @foreach($TarifsEte as $tarif)
                                @foreach($tarifsHiver as $tarifH)
                                    @if ($tarif->lettre_type == "A" && $tarifH->lettre_type == "A" && $tarifH->num_type == $tarif->num_type)
                                        <p class="text-gray-700 text-base">
                                            Prix indiqués aller simple:<br>
                                            <b>{{ $tarif->libelle }}</b><br>
                                        <div class="d-flex flex-row">
                                            <span class="text-blue-500">{{ $tarif->tarif }}€</span> - <span class="text-red-500">{{ $tarifH->tarif }}€</span>
                                        </div>
                                        </p>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
