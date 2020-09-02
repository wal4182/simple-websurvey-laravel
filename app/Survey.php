<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'gender', 'service_rate', 'fav_food', 'fav_drink', 'recommended', 'suggestion',
    ];
}
