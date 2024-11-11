<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        "path"
    ];

    public function imagable()
    {
        return $this->morphTo();
    }

    public function erase()
    {
        Storage::disk('public')->delete('images/' . $this->path);
        $this->delete();
    }
}
