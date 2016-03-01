<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    public function profile() {
        return $this->hasOne('App\Profiles');
    }
}
