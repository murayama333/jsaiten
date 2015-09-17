<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fest extends Model
{

    public function presens()
    {
        return $this->hasMany('App\Presen');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
