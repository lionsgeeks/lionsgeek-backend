<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [
        'participant_id',
        'note',
        'author',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
