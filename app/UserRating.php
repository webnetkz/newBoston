<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{

    protected $fillable = [
        'tv_id', 'movie_id', 'rating', 'user_id', 'review','name','email'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
