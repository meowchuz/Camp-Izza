<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Get the state that owns the city.
     * 
     * @return Illuminate\Database\Eloquent\Model;
     */
    public function state() {
        return $this->belongsTo('App\State');
    }
}
