<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    //
    protected $fillable = [
        "name",
        "cover",
        "link",
        "logo",
    ];
    protected $casts = [
        "name"=> 'object',
    ];
}
