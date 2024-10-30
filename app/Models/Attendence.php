<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendence extends Model
{
    protected $fillable = [
        "name",
        "mail",
        "phone"
    ];


    public function events() : BelongsToMany
    {
        return $this->belongsToMany(Event::class,'reservations');
    }
}
