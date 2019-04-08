<?php

namespace App\WhereIGo\Domain\Entities;

use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;

class City implements Jsonable
{
    private $name;
    private $recommendedPlaces;
    private $weather;
    private $location;

    public function __construct(string $name, Collection $recommendedPlaces, Weather $weather, GeoLocation $geoLocation)
    {
        $this->name = $name;
        $this->recommendedPlaces = $recommendedPlaces;
        $this->weather = $weather;
        $this->location = $geoLocation;
    }

    /**
     * @return mixed
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @return mixed
     */
    public function getRecommendedPlaces()
    {
        return $this->recommendedPlaces;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return GeoLocation
     */
    public function getLocation(): GeoLocation
    {
        return $this->location;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        $response = [
            'name' => $this->name,
            'location' => [
                'lat' => $this->location->getLat(),
                'lng' => $this->location->getLng(),
            ],
            'weather' => json_decode($this->weather->toJson()),
            'recommendedPlaces' => $this->recommendedPlaces,
        ];

        return json_encode($response, $options);
    }
}