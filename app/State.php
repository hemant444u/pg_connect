<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    public function districts()
    {
    	return $this->hasMany('App\District');
    }

    public function buildings()
    {
    	return $this->belongsToMany('App\Building','addresses','state');
    }
}
