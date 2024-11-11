<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
                $fileName = hash("sha256", $content) . '.' . $file->getClientOriginalExtension();
                Storage::disk("public")->put("images/" . $fileName, $content);

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
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
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
