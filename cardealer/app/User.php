<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profiles;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profiles');
    }
    public function dealer() {
        return $this->hasOne('App\Dealers');
    }
}
