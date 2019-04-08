<?php
namespace App\Http\Controllers;


use App\WhereIGo\Domain\WhereIGoService;
use Illuminate\Support\Facades\Cache;

class WhereIGoController
{

    /**
     * @var WhereIGoService
     */
    private $service;

    public function __construct(WhereIGoService $service)
    {
        $this->service = $service;
    }

    public function getCityInformation($cityname)
    {

        return Cache::remember($cityname, 300, function () use ($cityname) {
            return $this->service->getCityInformation($cityname);
        });

    }

}