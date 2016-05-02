<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profiles extends Model
{
    public function user() {
        return $this->hasOne('App\User','profile_id');
    }
    public function dealer() {
        return $this->hasOne('App\Dealers');
    }
}
