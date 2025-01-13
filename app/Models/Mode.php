<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{


    protected $fillable = [
        'user_id',
        'darkmode',
        'tablemode'
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
