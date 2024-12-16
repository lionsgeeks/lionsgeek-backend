<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    protected $casts = [
        'title' => 'object',
        'description' => 'object',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
