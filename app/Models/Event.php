<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        "name",
        "location",
        "description",
        "date",
        "price",
        "cover"
    ] ;

    protected $casts = [
        'name' => 'object',
        'description' => 'object',
        'location' => 'object',
    ];
    public function attendances()
    {
        return $this->belongsToMany(Attendence::class,'reservations');
    }
}
