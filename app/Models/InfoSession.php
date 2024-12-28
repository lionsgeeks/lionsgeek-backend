<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoSession extends Model
{
    protected $fillable = [
        'name',
        'formation',
        'start_date',
        'isAvailable',
        "isFull",
        'isFinish',
        'places'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
