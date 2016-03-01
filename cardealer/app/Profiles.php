<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    public function login() {
        return $this->hasOne('App\Login');
    }
    public function dealer() {
        return $this->hasOne('App\Dealers');
    }
}
