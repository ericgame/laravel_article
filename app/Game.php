<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table="member";

    protected $fillable = [
        'name',
        'phone'
    ];
}
