<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'info_session_id',
        'full_name',
        'email',
        'birthday',
        'phone',
        'city',
        'prefecture',
        'gender',
        'motivation',
        'source',
        'code',
        'current_step',
        'is_visited',

    ];

    public function infoSession()
    {
        return  $this->belongsTo(InfoSession::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function questions()
    {
        return $this->hasOne(FrequentQuestion::class);
    }

    public function satisfaction()
    {
        return $this->hasOne(Satisfaction::class);
    }
}
