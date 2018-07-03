<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
