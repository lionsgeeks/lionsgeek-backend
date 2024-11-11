<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'info_session_id',
        'first_name',
        'last_name',
        'birthday',
        'email',
        'city',
        'address',
        'code',
        'phone',
        'current_step',
        'is_visited'

    ];

    public function infoSession()
    {
        return  $this->belongsTo(InfoSession::class);
    }
}
