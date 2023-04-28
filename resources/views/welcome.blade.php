<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <form method="GET"
              action="{{ route('reservations', ['selectDepart' => old('selectDepart'), 'selectArrivee' => old('selectArrivee')]) }}">
            @csrf
            <div class="flex flex-row justify-center items-center m-5">
                <div class="flex items-center border border-solid mx-3">
                    <svg width="30" height="48" viewBox="0 0 30 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-2">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M28.1251 26.3438L25.8938 30.6094H25.5563C22.1063 30.6094 20.9251 32.0813 17.4376 32.0813C13.9501 32.0813 11.0063 29.925 7.77195 29.925C4.5282 29.925 3.01883 30.6656 3.01883 30.6656C2.26332 29.3612 1.86857 27.8793 1.87508 26.3719L28.1251 26.3438ZM15.2532 16.5L16.5376 21.6H23.4095L24.0845 22.7719H21.122C21.122 22.7719 20.8782 22.7719 20.8782 22.9687C20.8782 23.1562 20.897 23.325 20.9251 23.5312C20.9532 23.7281 21.047 23.9438 21.422 24.0375L25.2938 24.8813L25.6688 25.5188H5.98133L7.7907 21.6H10.2282L12.9845 16.5H15.2532ZM18.5626 23.0625H18.0001C17.7001 23.0625 17.4657 23.25 17.4657 23.4844V24.2812C17.4657 24.45 17.597 24.6 17.7845 24.6656C17.8537 24.6901 17.9266 24.7028 18.0001 24.7031H18.5626C18.647 24.7031 18.7126 24.6937 18.7782 24.6656C18.9657 24.6 19.097 24.45 19.097 24.2906V23.4844C19.097 23.25 18.8626 23.0625 18.5626 23.0625ZM15.2813 23.0625H14.7188C14.4188 23.0625 14.1845 23.25 14.1845 23.4844V24.2812C14.1845 24.45 14.3157 24.6 14.5032 24.6656C14.5725 24.6901 14.6454 24.7028 14.7188 24.7031H15.2813C15.3657 24.7031 15.4313 24.6937 15.497 24.6656C15.6845 24.6 15.8157 24.45 15.8157 24.2906V23.4844C15.8157 23.25 15.5813 23.0625 15.2813 23.0625ZM12.0095 23.0625H11.4282C11.1376 23.0625 10.9032 23.25 10.9032 23.4844V24.2812C10.9032 24.45 11.0251 24.6 11.2126 24.6656C11.2782 24.6937 11.3438 24.7031 11.4282 24.7031H12.0095C12.0938 24.7031 12.1595 24.6937 12.2251 24.6656C12.4126 24.6 12.5438 24.45 12.5438 24.2906V23.4844C12.5438 23.325 12.4313 23.2031 12.2626 23.1281C12.1839 23.0882 12.0976 23.0658 12.0095 23.0625Z"
                              fill="#6BB2E2" />
                    </svg>
                    <select name="selectDepart" id="selectDepart" class="port form-select border-0 bg-transparent">
                        <option selected>choisissez un départ</option>
                        @foreach($ports as $port)
                            <option name="{{$port->nom}}">{{ $port->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center border border-solid mx-3">
                    <svg width="30" height="48" viewBox="0 0 30 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-2">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M28.1251 26.3438L25.8938 30.6094H25.5563C22.1063 30.6094 20.9251 32.0813 17.4376 32.0813C13.9501 32.0813 11.0063 29.925 7.77195 29.925C4.5282 29.925 3.01883 30.6656 3.01883 30.6656C2.26332 29.3612 1.86857 27.8793 1.87508 26.3719L28.1251 26.3438ZM15.2532 16.5L16.5376 21.6H23.4095L24.0845 22.7719H21.122C21.122 22.7719 20.8782 22.7719 20.8782 22.9687C20.8782 23.1562 20.897 23.325 20.9251 23.5312C20.9532 23.7281 21.047 23.9438 21.422 24.0375L25.2938 24.8813L25.6688 25.5188H5.98133L7.7907 21.6H10.2282L12.9845 16.5H15.2532ZM18.5626 23.0625H18.0001C17.7001 23.0625 17.4657 23.25 17.4657 23.4844V24.2812C17.4657 24.45 17.597 24.6 17.7845 24.6656C17.8537 24.6901 17.9266 24.7028 18.0001 24.7031H18.5626C18.647 24.7031 18.7126 24.6937 18.7782 24.6656C18.9657 24.6 19.097 24.45 19.097 24.2906V23.4844C19.097 23.25 18.8626 23.0625 18.5626 23.0625ZM15.2813 23.0625H14.7188C14.4188 23.0625 14.1845 23.25 14.1845 23.4844V24.2812C14.1845 24.45 14.3157 24.6 14.5032 24.6656C14.5725 24.6901 14.6454 24.7028 14.7188 24.7031H15.2813C15.3657 24.7031 15.4313 24.6937 15.497 24.6656C15.6845 24.6 15.8157 24.45 15.8157 24.2906V23.4844C15.8157 23.25 15.5813 23.0625 15.2813 23.0625ZM12.0095 23.0625H11.4282C11.1376 23.0625 10.9032 23.25 10.9032 23.4844V24.2812C10.9032 24.45 11.0251 24.6 11.2126 24.6656C11.2782 24.6937 11.3438 24.7031 11.4282 24.7031H12.0095C12.0938 24.7031 12.1595 24.6937 12.2251 24.6656C12.4126 24.6 12.5438 24.45 12.5438 24.2906V23.4844C12.5438 23.325 12.4313 23.2031 12.2626 23.1281C12.1839 23.0882 12.0976 23.0658 12.0095 23.0625Z"
                              fill="#6BB2E2" />
                    </svg>
                    <select name="selectArrivee" id="selectArrivee" name='selectArrivee' class="port form-select border-0 bg-transparent">
                        <option selected>choisissez une arrivée</option>
                        @foreach($ports as $port)
                            <option name="{{$port->nom}}">{{$port->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="submit" value="Voir les prix"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">
                </div>
            </div>
        </form>
    </div>
    @if (Route::has('login'))
        <div class="p-6 text-center">
            @auth
                @include('layouts.navigation')
            @else
                <a {{ route('home') }} class="px-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Accueil</a>
                <a {{ route('tarifs') }} class="px-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Tarifs</a>
                <a {{ route('horaires') }} class="px-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Horaire</a>
                <a {{ route('reservations') }} class="px-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Reserver</a>

                <a href="{{ route('login') }}"
                   class="font-semibold bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Connexion</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="font-semibold bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Inscription</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<div class="h-full"
    style="background-size: cover; background-image: url('http://baptistelonguepee.fr/images/mesh-50.png');">
    <div class="flex justify-center">
        <div class="flex rounded-3 " style="margin-top: 10vh;">
            <div class="bg-white rounded-3 flex-grow-1 w-full px-20">
                <h1 class="text-center mt-3">Les lignes maritimes du réseau :</h1>
                <div class="flex flex-row items-center justify-evenly flex-wrap pb-5">
                    @foreach($ports as $port)
                        <div>
                            <svg width="97" height="96" viewBox="0 0 97 96" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect x="0.952393" width="96" height="96" fill="url(#pattern0)"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_20_832" transform="scale(0.0025)"/>
                                    </pattern>
                                    <image id="image0_20_832" width="400" height="400"
                                           xlink:href="data:image/png;base64,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RtfjgsuqPoytW3Kbg2l17j/dCBDYgbKqXxRF8WfiV7qKlctFX8MwmU3mdz73n3YECOxIWdUhBF63+GqrYalVaAyyxDTOxxzH15z7d/3SLBcnI7iO2REgsCOxCrnc8MP65s48xk6HWmKQHMXXHNuvGL4aiACBHSqrOgwbvYub2FaB0WkeY0gx5A7jaw4T7oavBiRAgI1iZXI28SAxfDUg+0CAjcLcS+xK+2HCT0hvqwEJEOBB8fz3n1qeHT8mn8x9DEuAAI+KXWoP4pLiqXgW970wEHMgQGtxXuSkpw2RuxSqpxe67vZLgACdxY2IJxPaP/KxWS6ORnAds2IIC+isWS5O46mLUxnScsrgAAQIkCTuX3k1gW6/H0ymD8MQFrC1sqrDSq3/jvBJmvsYkAoE2FrcrPdDXO77Y3x9F88kCb//S6xUdr0U+ER4DEcFAuxMPJfk94SvdxP7iHV1KECG40ApYJdSJrNDeLwaU88wvjKEBexErD669tUSHiMmQIBd6Vp9CI+REyDA4BKqD+ExAQIE2IUu1YfwmAgBAgyqY/UhPCZEgABDa1t9CI+JESDAYOIRuW2OlBUeEyRAgMHEHlQhRH5+oPGi8JgoO9GBnSmrOlQjR/H1VHhMmwAB9iKeKXIpPKZLgACQxBwIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAEkECABJBAgASQQIAN0VRfE/epos/gWkdLgAAAAASUVORK5CYII="/>
                                </defs>
                            </svg>

                            <p class="text-center">{{ $port->nom }}</p>
                        </div>
                    @endforeach

                </div>
                <div class="flex justify-center mb-4">
                    <div class="">
                        <a  href="{{ route('tarifs') }}"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-900 border-gray-900 hover:bg-gray-900 hover:text-white bg-white hover:bg-gray-900 rounded-none"
                            style="width: 160px;">Tarifs
                        </a>
                    </div>
                    <div>
                        <a  href="{{ route('horaires') }}"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-900 border-gray-900 hover:bg-gray-900 hover:text-white bg-white hover:bg-gray-900 rounded-none"
                            style="width: 160px;">Horaires
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-evenly">
        @foreach($weatherData as $cityName => $data)
            <div class="rounded-lg border bg-white border-gray-300 mt-20 p-6 flex flex-col items-center shadow shadow-blue-500">
                <svg class="w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path d="M0 336c0 79.5 64.5 144 144 144H512c70.7 0 128-57.3 128-128c0-61.9-44-113.6-102.4-125.4c4.1-10.7 6.4-22.4 6.4-34.6c0-53-43-96-96-96c-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32C167.6 32 96 103.6 96 192c0 2.7 .1 5.4 .2 8.1C40.2 219.8 0 273.2 0 336z" />
                </svg>
                <h5 class="text-xl">{{ $cityName }}</h5>
                <p class="">{{ $data['temperatureCelsius'] }}°C°</p>
            </div>
        @endforeach
    </div>
</div>




</body>
</html>
