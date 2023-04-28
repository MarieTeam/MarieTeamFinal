<?php

namespace App\Http\Controllers;

use App\Models\Port;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private function getWeatherData($city)
    {
        $apiKey = env('OPEN_WEATHER_MAP_API_KEY');
        $client = new Client();
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}";
        $response = $client->get($url);
        return json_decode($response->getBody(), true);
    }


    public function getAllWeather()
    {
        $ports = Port::all();
        $selectedPorts = [];

        if(request('port1')) {
            $selectedPorts[] = request('port1');
        }
        $ports2 = Port::whereNotIn('id', $selectedPorts)->get();

        $Types = DB::select('SELECT * FROM `Type`');
        $weatherData = [];
        foreach ($ports as $city) {
            $data = $this->getWeatherData($city->nom);
            $temperatureCelsius = round($data['main']['temp'] - 273.15); // convert to Celsius
            $temperatureFahrenheit = round(($temperatureCelsius * 1.8) + 32); // convert to Fahrenheit
            $weatherData[$city->nom] = [
                'data' => $data,
                'temperatureCelsius' => $temperatureCelsius,
                'temperatureFahrenheit' => $temperatureFahrenheit
            ];
        }
        return view('welcome', compact('weatherData', 'ports', 'ports2', 'selectedPorts'))->with('Types', $Types);
    }
}
