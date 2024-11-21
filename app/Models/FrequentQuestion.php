<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrequentQuestion extends Model
{


    protected $fillable = [
        'participant_id',
        'mode_of_transportation',
        'living_situation',
        'where_have_you_heard_of_lionsgeek',
        'academic_background',
        'professional_experience',
        'interest_in_joining_lionsgeek',
        'technical_skills',
        'profeciency_in_french',
        'profeciency_in_english',
        'strengths',
        'weaknesses',
        'do_you_have_a_laptop',
        'available_all_week',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
