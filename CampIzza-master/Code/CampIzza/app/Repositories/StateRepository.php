<?php

namespace App\Repositories;

use App\State;

class StateRepository
{
    /**
     * Create a new StateRepository instance.
     *
     * @param  App\State $state
     * @return void
     */
    public function __construct(State $state)
    {
        $this->model = $state;
    }

    /**
     * Get State collection
     * 
     * @return Illuminate\Support\Collection
     */
    public function all() {
        $states = $this->model->all();
        return $states;
    }
}
