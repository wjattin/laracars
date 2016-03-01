<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $table = 'vehicles';

    public function dealers() {
        return $this->hasOne('App\Dealers');
    }
    public function images() {
        return $this->hasMany('App\vehicleImages');
    }
}
