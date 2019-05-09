<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{
    protected $table = "weapons";

    protected $fillable = [
        'id','name', 'image', 'force_min','force_max','dexterity_min','dexterity_max','magic_min','magic_max','limitation'
    ];
}
