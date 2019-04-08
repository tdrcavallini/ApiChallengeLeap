<?php
namespace Tests\Unit\WhereIGo\Domain\Entities;

use App\WhereIGo\Domain\Entities\Weather;
use App\WhereIGo\Domain\ValueObjects\GeoLocation;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    public function testConstructor()
    {
        $weather = new Weather("Calgary,CA", 10, 9, 18, new GeoLocation(-114.06, 51.05),"","Sunny", "8:00", "17:20", 55, 15, "Sun, 07 Apr 2019 17:59:04 -0600");

        $this->assertEquals("Calgary,CA",$weather->getCityName());
    }

}