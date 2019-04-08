<?php

namespace App\WhereIGo\Infrastructure;

use App\WhereIGo\Domain\Entities\RecommendedPlace;
use App\WhereIGo\Domain\Providers\RecommendedPlaceProvider;
use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class FoursquareRecommendedPlaceProvider implements RecommendedPlaceProvider
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * Method to get content to API Recommended Place FourSquare
     * @param $cityName
     * @return Collection
     */

    public function getRecommendedPlacesByCity($cityName): Collection
    {
        try {
            $response = $this->http->get('https://api.foursquare.com/v2/venues/explore?near=' . $cityName . '&v=' . date("YYYYmmdd", time()) . '&client_id=' . env('FOURSQUARE_CLIENT_ID') . '&client_secret=' . env('FOURSQUARE_CLIENT_SECRET'));
            $content = json_decode($response->getBody()->getContents());
            $places = collect($content->response->groups[0]->items)->map(
                function ($place) {
                    return new RecommendedPlace(
                        $place->venue->id,
                        $place->venue->name,
                        implode(" | ", $place->venue->location->formattedAddress),
                        new GeoLocation($place->venue->location->lng, $place->venue->location->lat),
                        $place->venue->categories
                    );
                }
            );

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }

        return $places;
    }
}