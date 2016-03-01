<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    public function make() {
        return $this->hasOne('App\Make');
    }
}
