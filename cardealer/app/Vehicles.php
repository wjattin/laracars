<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dealers;

class Vehicles extends Model
{
    protected $table = 'vehicles';

    public function dealer() {
        return $this->belongsTo('App\Dealers', 'dealers_id');
    }
    public function images() {
        return $this->hasMany('App\vehicleImages');
    }
}
