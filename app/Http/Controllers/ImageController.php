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
                    $fileName = $this->uploadFile($file, "/");
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
        // TODO: oussama: kayna chi l3ayba hna but i dont know yet, tal mn ba3d o nsaybha. (29/12/24)
        //!! I lied lol (13/01/2025)
        Storage::disk('public')->delete('images/gallery/' . $image->path);
        $image->delete();
        return back();
    }
}
