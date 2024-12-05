<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satisfaction extends Model
{
    protected $fillable = [
        'participant_id',
        'interest_in_joining_lionsgeek',
        'overall_availability',
        'ability_to_learn',
        'language',
        'discipline',
        'motivation_overcoming_challenges',
        'team_player',
        'soft_skills',
    ];


    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
