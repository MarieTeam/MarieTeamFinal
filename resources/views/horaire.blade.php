<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Horaires - Marie Team</title>
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

<div class="container mx-auto my-8 px-4 md:px-12">
    <h1 class="font-bold text-3xl mb-8">Les horaires de MarieTeam</h1>
    @foreach($horaires as $ville => $horaire)
        <h3 class="text-xl font-bold text-white underline mb-4">{{ $ville }}</h3>
        <div class="flex flex-wrap -m-4">
            @foreach($horaire as $traversee)
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div class="flex relative">
                        <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-800 bg-white opacity-75 rounded-lg overflow-hidden text-center relative shadow-lg">
                            <h2 class="tracking-widest text-xs title-font font-medium mb-1">{{ $traversee->nom_port2 }}</h2>
                            <ul class="text-lg text-gray-900 px-3 py-3">
                                <li>Juin à Septembre : 4 allers-retours / jour</li>
                                <li>Octobre & Mai : 4 allers-retours / jour</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

</body>
</html>
