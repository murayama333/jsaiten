<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presen extends Model
{

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function fest()
    {
        return $this->belongsTo('App\Fest');
    }

    public function totalLikeCount()
    {
        return $this->likes->reduce(function($c, $l){
            return $c + $l->count;
        });
    }

    public function myLikeCount($userId)
    {
        $like =  $this->likes->filter(function($l) use($userId){
            return $l->user_id == $userId;
        })->first();

        if ($like == null) {
            return 0;
        }
        return $like->count;
    }
}
