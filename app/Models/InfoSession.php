<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoSession extends Model
{
    protected $fillable = [
        'name',
        'formation',
        'start_date',
        'end_date',
        'isAvailable',
        'isFinish',
    ];
}
