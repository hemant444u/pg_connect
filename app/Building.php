<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function rooms()
    {
    	return $this->hasMany('App\Room');
    }

    public function facility()
    {
    	return $this->hasOne('App\Facility');
    }

    public function nearbyplaces()
    {
    	return $this->hasMany('App\Nearbyplaces');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }
}
