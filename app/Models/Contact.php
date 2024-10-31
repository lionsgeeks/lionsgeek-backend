<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'message',
    ];
}
