<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function presen()
    {
        return $this->belongsTo('App\Presen');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
