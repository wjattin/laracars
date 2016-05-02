<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profiles;
use App\Dealers;
class Login extends Model
{
    protected $table = 'login';

    public function profile() {
        return $this->hasOne('App\Profiles');
    }
    public function dealer() {
        return $this->hasOne('App\Dealers');
    }
}
