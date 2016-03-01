<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleImages extends Model
{
    protected $table = 'vehicleImages';

    public function vehicles() {
        return $this->hasMany('App\Vehicles');
    }
}
