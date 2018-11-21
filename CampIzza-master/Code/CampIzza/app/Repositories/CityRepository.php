<?php

namespace App\Repositories;

use App\City;

class CityRepository
{
    /**
     * Create a new CityRepository instance.
     *
     * @param  App\City $city
     * @return void
     */
    public function __construct(City $city)
    {
        $this->model = $city;
    }

    /**
     * Get City collection
     * 
     * @param integer $state
     * @return Illuminate\Support\Collection
     */
    public function getByState($state) {
        $cities = $this->model->where('state', $state)->get();
        return $cities;
    }
}
