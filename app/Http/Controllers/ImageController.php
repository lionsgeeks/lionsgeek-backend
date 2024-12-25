<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate([
            'id' => 'required|integer',
            'type' => 'required|in:gallery',
            'images.*' => 'required|mimes:png,jpg',
        ]);



        $ressource = null;

        switch ($request->type) {
            case 'gallery':
                $ressource = Gallery::find($request->id);
                break;
        }

        if ($ressource) {
            $images = $request->file('images');
            if ($images) {
                foreach ($images as $file) {
                $content = file_get_contents($file) . Carbon::now() ;
                $fileName = hash("sha256", $content) . '.webp';
                $path = public_path('storage/images') . "/" . $fileName;

                $size_in_mb = ($file->getSize() / 1024) / 1024;
                if ($size_in_mb < 5) {
                    $quality = 70;
                } elseif ($size_in_mb < 10) {
                    $quality = 50;
                } else {
                    $quality = 20;
                }
                $manager = new ImageManager(new Driver());
                $manager->read($content)->encodeByMediaType('image/jpeg', progressive: true, quality: $quality)->save($path);

                // Save each image to the database
                $ressource->images()->create([
                    'path' => $fileName
                ]);
            }
            }
        }

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        Storage::disk('public')->delete('images/' . $image->path);
        $image->delete();
        return back();
    }
}
