<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicles;

class Dealers extends Model
{
    protected $table = 'dealers';

    public function profiles() {
        return $this->hasMany('App\Profiles');
    }
    public function vehicles() {
        return $this->hasMany('App\Vehicles');
    }
    public function user() {
        return $this->hasOne('App\User');
    }

}
