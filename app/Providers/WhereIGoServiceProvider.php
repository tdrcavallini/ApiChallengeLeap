<?php
namespace App\Providers;

use App\WhereIGo\Domain\Providers\RecommendedPlaceProvider;
use App\WhereIGo\Domain\Providers\WeatherProvider;
use App\WhereIGo\Infrastructure\FoursquareRecommendedPlaceProvider;
use App\WhereIGo\Infrastructure\OpenWeatherMapWeatherProvider;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class WhereIGoServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton(WeatherProvider::class, function (){
            $http = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Connection' => 'Keep-Alive'
                ]
            ]);

            return new OpenWeatherMapWeatherProvider($http);
        });

        $this->app->singleton(RecommendedPlaceProvider::class, function (){
            $http = new Client([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Connection' => 'Keep-Alive'
                ]
            ]);

            return new FoursquareRecommendedPlaceProvider($http);
        });
    }


}