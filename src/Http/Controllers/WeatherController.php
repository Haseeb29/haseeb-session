<?php

namespace Haseeb\Session\Http\Controllers;

use App\Http\Controllers\Controller;
use Haseeb\Session\Models\Forecast;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather()
    {

        Forecast::create([]);
        return view("session::weather");
    }

    public function getForecast(Request $request)
    {
        $lat = explode('_', $request->city)[0];
        $lng = explode('_', $request->city)[1];
        $app_id = config('weather.app_id');
        $app_code = config('weather.app_code');
        $url = "https://weather.api.here.com/weather/1.0/report.json?product=forecast_hourly&latitude=${lat}&longitude=${lng}&oneobservation=true&language=en-US&app_id=${app_id}&app_code=${app_code}";
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        if ($res->getStatusCode() == 200) {
            $j = $res->getBody();
            $obj = json_decode($j);
            $forecast = $obj->hourlyForecasts->forecastLocation;
        }
        return view('session::weather', ["forecast" => $forecast]);
    }

}
