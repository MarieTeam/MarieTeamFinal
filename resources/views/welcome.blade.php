<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Maritime Reservation</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
        select {
            color: black;
            text-align-last:center;
        }
        option {
            color: black;
            background-color: white;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-white">

<x-navbar/>


<div class="container mx-auto my-10">
    <form method="GET" action="{{ route('reservations', ['selectDepart' => old('selectDepart'), 'selectArrivee' => old('selectArrivee')]) }}" class="mb-8">
        @csrf
        <div class="flex flex-row justify-between items-center bg-white bg-opacity-50 p-4 rounded">
            <div class="flex items-center bg-white bg-opacity-25 p-2 rounded">
                <i class="material-icons mr-2">departure_board</i>
                <select name="selectDepart" id="selectDepart" class="port form-select border-0 bg-transparent text-gray-600">
                    <option selected>Choisir un port de depart</option>
                    @foreach($ports as $port)
                        <option name="{{$port->nom}}" value="{{$port->nom}}">{{ $port->nom }}</option>
                    @endforeach
                </select>
            </div>
            <i class="material-icons mx-4">arrow_forward</i>
            <div class="flex items-center bg-white bg-opacity-25 p-2 rounded">
                <i class="material-icons mr-2">departure_board</i>
                <select name="selectArrivee" id="selectArrivee" name='selectArrivee' class="port form-select border-0 bg-transparent text-gray-600">
                    <option selected>Choisir un port d'arriver</option>
                    @foreach($ports2 as $port)
                        <option name="{{$port->nom}}" value="{{$port->nom}}">{{ $port->nom }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Voir les prix" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>

    <h2 class="font-bold text-3xl mb-4">Les ports</h2>
    <div class="grid grid-cols-3 gap-4 mb-8">
        @foreach($ports as $port)
            <div class="bg-blue-500 bg-opacity-50 p-4 rounded flex items-center space-x-4">
                <i class="material-icons text-5xl">directions_boat</i>
                <div>
                    <h3 class="font-semibold text-2xl">{{ $port->nom }}</h3>
                    <p class="text-sm">Explore the ports</p>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="font-bold text-3xl mb-4">Météo des ports</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach($weatherData as $cityName => $data)
            <div class="bg-blue-500 bg-opacity-50 p-4 rounded flex items-center space-x-4">
                <i class="material-icons text-5xl">thermostat</i>
                <div>
                    <h3 class="font-semibold text-2xl">{{ $cityName }}</h3>
                    <p class="text-lg">{{ $data['temperatureCelsius'] }}°C</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
<script>
    document.getElementById("selectDepart").addEventListener('change', function() {
        var selectedPort = this.value;
        var selectArrivee = document.getElementById("selectArrivee");
        for (let i = 0; i < selectArrivee.length; i++) {
            if (selectArrivee.options[i].value === selectedPort) {
                selectArrivee.options[i].style.display = "none";
            } else {
                selectArrivee.options[i].style.display = "block";
            }
        }
    });
</script>

</html>
