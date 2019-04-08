<?php
namespace App\WhereIGo\Domain\Entities;

use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Illuminate\Contracts\Support\Jsonable;

class RecommendedPlace implements Jsonable
{
    private $id;
    private $name;
    private $address;
    private $location;
    private $categories;
    private $photos;

    public function __construct(string $id, string $name, string $address, GeoLocation $location, array $categories)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->location = $location;
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return GeoLocation
     */
    public function getLocation(): GeoLocation
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function getPhotos(): array
    {
        return $this->photos;
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
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'categories' => $this->categories,
            'photos' => $this->photos,
        ];

        return json_encode($response, $options);
    }
}