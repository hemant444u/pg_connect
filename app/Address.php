<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
    public function states()
    {
    	return $this->belongsTo('App\State','state');
    }
    public function districts()
    {
    	return $this->belongsTo('App\District','district');
    }
}
