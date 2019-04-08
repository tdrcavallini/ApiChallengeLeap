<?php
namespace App\WhereIGo\Domain\ValueObjects;

use Illuminate\Contracts\Support\Jsonable;

class GeoLocation implements Jsonable
{
    /**
     * @var float
     */
    private $lat;
    /**
     * @var float
     */
    private $lng;

    public function __construct(float $lng, float $lat)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
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
            'lat' => $this->lat,
            'lng' => $this->lng
        ];

        return json_encode($response, $options);
    }
}