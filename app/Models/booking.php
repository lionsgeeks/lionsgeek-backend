<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    //
    protected $fillable =[
        "name",
        "email",
        "event_id",
        "phone",
        "gender",
        "is_visited"
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
