<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

abstract class Controller
{
    public function uploadFile($file)
    {
        $size_in_mb = ($file->getSize() / 1024) / 1024;

        if ($size_in_mb < 5) {
            $quality = 70;
        } elseif ($size_in_mb < 10) {
            $quality = 50;
        } else {
            $quality = 20;
        }


        $content = file_get_contents($file);
        $fileName = hash("sha256", $content) . '.webp';
        $path = public_path('storage/images') . "/" . $fileName;
        $manager = new ImageManager(new Driver());
        $manager->read($content)->encodeByMediaType('image/jpeg', progressive: true, quality: $quality)->save($path);

        return $fileName;
    }
}
