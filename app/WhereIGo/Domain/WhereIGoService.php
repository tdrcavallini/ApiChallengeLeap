<?php

namespace App\WhereIGo\Domain;

use App\WhereIGo\Domain\Entities\City;
use App\WhereIGo\Domain\Providers\RecommendedPlaceProvider;
use App\WhereIGo\Domain\Providers\WeatherProvider;

class WhereIGoService
{

    /**
     * @var RecommendedPlaceProvider
     */
    private $recommendedPlaceProvider;
    /**
     * @var WeatherProvider
     */
    private $weatherProvider;

    public function __construct(RecommendedPlaceProvider $recommendedPlaceProvider, WeatherProvider $weatherProvider)
    {
        $this->recommendedPlaceProvider = $recommendedPlaceProvider;
        $this->weatherProvider = $weatherProvider;
    }

    public function getCityInformation($cityName): City
    {
        $weather = $this->weatherProvider->getWeatherByCity($cityName);
        $recommendedPlaces = $this->recommendedPlaceProvider->getRecommendedPlacesByCity($weather->getCityName());

        return new City($weather->getCityName(), $recommendedPlaces, $weather, $weather->getLocation());
    }
}