<?php

namespace Haseeb\Session;

class Weather
{
    public function test($lat , $lng)
    {

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
        return $forecast;
    }
}
