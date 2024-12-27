<?php

namespace App\Http\Controllers;

use App\Models\Press;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presses = Press::latest()->get();
        return view("press.press" , compact("presses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("press.partials.press_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "name" => "required|array|min:3",
            "name.en" => "string|required",
            "name.fr" => "string|required",
            "name.ar" => "string|required",

            "cover" => "required|file|image|mimes:jpeg,png,jpg",
            "link" => "required",
            "logo" => "required|file|image|mimes:jpeg,png,jpg"
        ]);


        $fileName = $this->uploadFile($request->file('cover'), "/press/");
        $logoName = $this->uploadFile($request->file('logo'), "/press/");

        Press::create([
            "name" => $request->input("name"),
            "cover" => $fileName,
            "link" => $request->link,
            "logo" => $logoName,
        ]);
        return redirect(route("press.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Press $press)
    {
        //
        return view("press.partials.press_show" ,compact("press"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Press $press)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Press $press)
    {
        request()->validate([
            "name" => "required|array|min:3",
            "name.en" => "string|required",
            "name.fr" => "string|required",
            "name.ar" => "string|required",

            "cover" => "nullable",
            "link" => "required",
            "logo" => "nullable"
        ]);

        // ? Update cover

        $hasCover = $request->cover;
        if ($hasCover) {
            Storage::disk('public')->delete("images/press/" . $press->cover);
            $fileName = $this->uploadFile($request->file('cover'), "/press/");
        }

        $hasLogo = $request->logo;
        if ($hasLogo) {
            Storage::disk('public')->delete("images/press/" . $press->logo);
            $logoName = $this->uploadFile($request->file('logo'), "/press/");
        }

        $press->update([
            "name" => $request->input("name"),
            "cover" => $hasCover ? $fileName : $press->cover,
            "link" => $request->link,
            "logo" => $hasLogo ? $logoName : $press->logo,
        ]);
        return redirect(route("press.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Press $press)
    {
        //
        Storage::disk("public")->delete("images/press/" . $press->cover);
        Storage::disk("public")->delete("images/press/" . $press->logo);
        $press->delete();

        return redirect(route("press.index"));
    }
}
