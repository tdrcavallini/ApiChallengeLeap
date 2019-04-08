<?php

namespace Tests\Unit\WhereIGo\Infrastructure;

use App\WhereIGo\Infrastructure\OpenWeatherMapWeatherProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class OpenWeatherMapWeatherProviderTest extends TestCase
{

    public function testGetWeatherByCity()
    {

        // Create a mock
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json; charset=utf-8'],
                '{
                    "coord": {
                        "lon": -114.06,
                        "lat": 51.05
                    },
                    "weather": [
                        {
                            "id": 803,
                            "main": "Clouds",
                            "description": "broken clouds",
                            "icon": "04d"
                        }
                    ],
                    "base": "stations",
                    "main": {
                        "temp": 285.56,
                        "pressure": 999,
                        "humidity": 17,
                        "temp_min": 282.59,
                        "temp_max": 287.59
                    },
                    "visibility": 64372,
                    "wind": {
                        "speed": 10.3,
                        "deg": 280,
                        "gust": 14.9
                    },
                    "clouds": {
                        "all": 75
                    },
                    "dt": 1554585498,
                    "sys": {
                        "type": 1,
                        "id": 989,
                        "message": 0.0048,
                        "country": "CA",
                        "sunrise": 1554555651,
                        "sunset": 1554603365
                    },
                    "id": 5913490,
                    "name": "Calgary",
                    "cod": 200
                }'
            )
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $openWeather = new OpenWeatherMapWeatherProvider($client);
        $weather = $openWeather->getWeatherByCity("Calgary");

        $this->assertEquals("Calgary, CA", $weather->getCityName());
        $this->assertSame(-114.06, $weather->getLocation()->getLng());
        $this->assertSame(17, $weather->getHumidity());

    }
}