<?php
namespace App\WhereIGo\Domain\Providers;

use App\WhereIGo\Domain\Entities\Weather;

interface WeatherProvider
{
    public function getWeatherByCity($cityName): Weather;
}