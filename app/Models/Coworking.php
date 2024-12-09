<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coworking extends Model
{


    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'birthday',
        'formation',
        'cv',
        'proj_name',
        'proj_description',
        'domain',
        'plan',
        'presentation',
        'prev_proj',
        'reasons',
        'needs',
        'gender',
        'status'
    ];
}
