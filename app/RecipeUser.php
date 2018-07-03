<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeUser extends Model
{
    //
    protected $fillable = [
        'recipe_id',
        'user_id'
    ];

}
