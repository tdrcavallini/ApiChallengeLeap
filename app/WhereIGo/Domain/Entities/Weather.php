<?php

namespace App\WhereIGo\Domain\Entities;

use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Illuminate\Contracts\Support\Jsonable;

class Weather implements Jsonable
{
    private $cityName;
    private $temp;
    private $min;
    private $max;
    private $location;
    private $icon;
    private $description;
    private $sunrise;
    private $sunset;
    private $pressure;
    private $humidity;
    private $date;

    public function __construct(string $cityName,
                                float $temp,
                                float $min,
                                float $max,
                                GeoLocation $location,
                                string $icon,
                                string $description,
                                string $sunrise,
                                string $sunset,
                                int $pressure,
                                int $humidity,
                                string $date
    )
    {
        $this->cityName = $cityName;
        $this->temp = $temp;
        $this->min = $min;
        $this->max = $max;
        $this->location = $location;
        $this->icon = $icon;
        $this->description = $description;
        $this->sunrise = $sunrise;
        $this->sunset = $sunset;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return float
     */
    public function getTemp(): float
    {
        return $this->temp;
    }

    /**
     * @return float
     */
    public function getMin(): float
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax(): float
    {
        return $this->max;
    }

    /**
     * @return GeoLocation
     */
    public function getLocation(): GeoLocation
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    /**
     * @return string
     */
    public function getSunset(): string
    {
        return $this->sunset;
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->pressure;
    }

    /**
     * @return int
     */
    public function getHumidity(): int
    {
        return $this->humidity;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
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
            'name' => $this->cityName,
            'temp' => $this->temp,
            'description' => $this->description,
            'min' => $this->min,
            'max' => $this->max,
            'sunrise' => $this->sunrise,
            'sunset' => $this->sunset,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'icon' => $this->icon,
            'date' => $this->date,
        ];

        return json_encode($response, $options);
    }
}