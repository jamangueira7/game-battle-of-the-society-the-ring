<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personage extends Model
{
    //
    protected $table = "personages";

    protected $fillable = [
        'id','name', 'type', 'image','force','dexterity','magic','hero'
    ];
}
