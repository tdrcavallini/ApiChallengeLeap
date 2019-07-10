<?php

namespace App\WhereIGo\Infrastructure;


use App\WhereIGo\Domain\Entities\Weather;
use App\WhereIGo\Domain\Providers\WeatherProvider;
use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use GuzzleHttp\Client;

class WeatherNetworkForecast implements WeatherProvider
{

    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }


    public function getWeatherByCity($cityName): Weather
    {

        $weather = new Weather(
            'Recife',
            10,
            15,
            24,
            new GeoLocation(1233, 344),
            '',
            'chuvendo muito',
            '1',
            '',
            1013,
            67,
            '21:33'
        );

        return $weather;

    }
}