<?php
namespace App\WhereIGo\Domain\Providers;

use Illuminate\Support\Collection;

interface RecommendedPlaceProvider
{
    public function getRecommendedPlacesByCity($cityName): Collection;
}