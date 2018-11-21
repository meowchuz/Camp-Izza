<?php

namespace App\Repositories;

use App\Country;

class CountryRepository
{
    /**
     * Create a new CountryRepository instance.
     *
     * @param  App\Country $country
     * @return void
     */
    public function __construct(Country $country)
    {
        $this->model = $country;
    }

    /**
     * Get Country collection
     * 
     * @return Illuminate\Support\Collection
     */
    public function all() {
        $countries = $this->model->all();
        return $countries;
    }
}
