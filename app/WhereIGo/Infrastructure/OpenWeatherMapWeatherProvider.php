<?php

namespace App\WhereIGo\Infrastructure;


use App\WhereIGo\Domain\Entities\Weather;
use App\WhereIGo\Domain\Providers\WeatherProvider;
use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Exception;
use GuzzleHttp\Client;

class OpenWeatherMapWeatherProvider implements WeatherProvider
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * Method to call API Open Weather by Name of City
     *
     * @param $cityName
     * @return Weather
     */
    public function getWeatherByCity($cityName): Weather
    {

        try {
            $response = $this->http->get('https://api.openweathermap.org/data/2.5/weather?APPID=' . env('WEATHER_KEY') . '&units=metric&q=' . $cityName);
            $content = json_decode($response->getBody()->getContents());

            $name = $content->name . ", " . $content->sys->country;
            $temp = floor($content->main->temp);
            $temp_min = floor($content->main->temp_min);
            $temp_max = floor($content->main->temp_max);
            $location = new GeoLocation($content->coord->lon, $content->coord->lat);
            $icon = "https://openweathermap.org/img/w/" . $content->weather[0]->icon . ".png";
            $description = ucfirst($content->weather[0]->description);
            $sunrise = date("H:i",$content->sys->sunrise);
            $sunset = date("H:i",$content->sys->sunset);
            $pressure = $content->main->pressure;
            $humidity = $content->main->humidity;
            $date = date("r",$content->dt);

            $weather = new Weather(
                $name,
                $temp,
                $temp_min,
                $temp_max,
                new GeoLocation($location->getLng(), $location->getLat()),
                $icon,
                $description,
                $sunrise,
                $sunset,
                $pressure,
                $humidity,
                $date
            );

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }

        return $weather;
    }
}