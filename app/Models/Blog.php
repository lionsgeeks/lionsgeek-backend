<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    protected $casts = [
        'title' => 'object',
        'description' => 'object',
    ];
}
