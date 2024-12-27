<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\UpdateGalleryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view("gallery.gallery", compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("gallery.gallery_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "title" => "required|array|min:3",
            "title.en" => "string|required",
            "title.fr" => "string|required",
            "title.ar" => "string|required",

            "description" => "required|array|min:3",
            "description.en" => "string|required",
            "description.fr" => "string|required",
            "description.ar" => "string|required",

            "couverture" => "required|file|image|mimes:jpeg,png,jpg",

            "images.*" => "file|image|mimes:jpeg,png,jpg"
        ]);

        // for more information about this function, look at Controller.php
        $fileName = $this->uploadFile($request->file('couverture'), "/gallery/");

        $gallery =  Gallery::create([
            "title" => $request->input("title"),
            "description" => $request->input("description"),
            "couverture" => $fileName
        ]);

        // ? Multiple images store
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                $fileName = $this->uploadFile($file, "/");
                // Save each image to the database
                $gallery->images()->create([
                    'path' => $fileName
                ]);
            }
        }

        return redirect("/gallery");
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view("gallery.gallery_show", compact("gallery"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        request()->validate([
            "title" => "required|array|min:3",
            "title.en" => "string|required",
            "title.fr" => "string|required",
            "title.ar" => "string|required",

            "description" => "required|array|min:3",
            "description.en" => "string|required",
            "description.fr" => "string|required",
            "description.ar" => "string|required",

            "couverture" => "nullable|file|image|mimes:jpeg,png,jpg",
        ]);

        // ? Update cover

        if ($request->hasFile("couverture")) {
            Storage::disk('public')->delete("images/gallery/" . $gallery->couverture);
            $fileName = $this->uploadFile($request->couverture, "/gallery/");
        }

        $gallery->update([
            "title" => $request->input("title"),
            "location" => $request->input("location"),
            "description" => $request->input("description"),
            "date" => $request->date,
            "price" => $request->price,
            "couverture" => $request->hasFile("couverture") ? $fileName : $gallery->couverture
        ]);



        return redirect("gallery");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Storage::disk("public")->delete("images/gallery/" . $gallery->couverture);

        if ($gallery) {
            foreach ($gallery->images as $image) {
                $image->erase();
            }
            $gallery->delete();

            return redirect("/gallery");
        }
        if (!$gallery) {
            return back();
        }
    }
}
