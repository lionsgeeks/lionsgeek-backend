<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        "title",
        "description",
        "couverture"
    ];

    protected $casts = [
        "title"=>'object',
        "description"=>'object',
    ];

    public function images()
    {
        return $this->morphMany(Image::class,"imagable");
    }
}
