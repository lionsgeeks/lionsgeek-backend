<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantConfirmation extends Model
{


    protected $fillable = [
        'participant_id',
        'jungle',
        'school',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
