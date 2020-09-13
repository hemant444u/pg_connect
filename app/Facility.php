<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function building()
    {
    	return $this->belongsTo('App\Building');
    }
}
