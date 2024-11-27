<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\UpdateGalleryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view("gallery.gallery" , compact("galleries") );
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

            "couverture" => "required|file|image|mimes:jpeg,png,jpg,gif|max:2048",

            "images.*" => "file|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $coverFile = $request->couverture; 

        $content = file_get_contents($coverFile);
        $fileName = hash("sha256", $content) . '.' . $coverFile->getClientOriginalName();
        Storage::disk("public")->put("images/" . $fileName, $content);

        $gallery =  Gallery::create([
            "title" => $request->input("title"),
            "description" => $request->input("description"),
            "couverture" => $fileName
        ]);

        // ? Multiple images store

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $content = file_get_contents($file) . Carbon::now() ;
                $fileName = hash("sha256", $content) . '.' . $file->getClientOriginalExtension();
                Storage::disk("public")->put("images/" . $fileName, $content);

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
        return view("gallery.gallery_show" , compact("gallery"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Gallery $gallery)
    {
        // dd("j");
        request()->validate([
            "title" => "required|array|min:3",
            "title.en" => "string|required",
            "title.fr" => "string|required",
            "title.ar" => "string|required",
            
            "description" => "required|array|min:3",
            "description.en" => "string|required",
            "description.fr" => "string|required",
            "description.ar" => "string|required",
            
            "couverture" => "nullable|file|image|mimes:jpeg,png,jpg,gif",
        ]);

        // dd($request->hasFile("couverture"));

        // ? Update cover

        

        // dd(Storage::disk('public')->exists("images/" . $gallery->couverture));

        if ($request->hasFile("couverture")) {
            Storage::disk('public')->delete("images/" . $gallery->couverture);
            $content = file_get_contents($request->couverture);
            $fileName = hash("sha256", $content) . '.' . $request->couverture->getClientOriginalName();
            Storage::disk("public")->put("images/" . $fileName, $content);
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
