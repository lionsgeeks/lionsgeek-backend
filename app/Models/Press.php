<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    //
    protected $fillable = [
        "name",
        "cover",
        "link"
    ];
    protected $casts = [
        "name"=> 'object',
    ];
}
