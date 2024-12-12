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
        //
        $presses = Press::all();
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

            "cover" => "required",
            "link" => "required"
        ]);
        $file = file_get_contents($request->cover);
        $fileName = hash("sha256", $file . now()) . '.'  . $request->cover->getClientOriginalName();
        Storage::disk("public")->put("images/press/" . $fileName, $file);

        Press::create([
            "name" => $request->input("name"),
            "cover" => $fileName,
            "link" => $request->link,
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
        //
        request()->validate([
            "name" => "required|array|min:3",
            "name.en" => "string|required",
            "name.fr" => "string|required",
            "name.ar" => "string|required",

            "cover" => "nullable",
            "link" => "required"
        ]);

        // ? Update cover

        $hasFile = $request->cover;

        if ($hasFile) {
            Storage::disk('public')->delete("images/press/" . $press->cover);
            $content = file_get_contents($request->cover);
            $fileName = hash("sha256", $content . now()) . '.'  . $request->cover->getClientOriginalName();
            Storage::disk("public")->put("images/press/" . $fileName, $content);
        }

        $press->update([
            "name" => $request->input("name"),
            "cover" => $hasFile ? $fileName : $press->cover,
            "link" => $request->link,
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
        $press->delete();

        return redirect(route("press.index"));
    }
}
