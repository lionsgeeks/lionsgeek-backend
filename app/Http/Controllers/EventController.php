<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view("event.event_index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("event.event_create");
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

            "description" => "array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",

            "location" => "required|array|min:3",
            "location.en" => "string|nullable",
            "location.fr" => "string|nullable",
            "location.ar" => "string|nullable",

            "date" => "required|date|after:now",
            "price" => "required|min:0",
            "cover" => "required",

        ]);

        // $cover = $request->file("cover");
        // $coverName = Hash::make("salam") . "_" . $cover->getClientOriginalName();
        // $cover->storeAs("public/img", $coverName);

        $content =file_get_contents($request->cover);
        $fileName = hash("sha256",$content).'.'.$request->cover->getClientOriginalName();
        Storage::disk("public")->put("images/".$fileName ,$content);

        Event::create([
            "name" => $request->input("name"),
            "location" => $request->input("location"),
            "description" => $request->input("description"),

            "date" => $request->date,
            "price" => $request->price,
            "cover" => $fileName
        ]);

        return redirect("/events");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("event.event_show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            "name" => "required|array|min:3",
            "name.en" => "string|nullable",
            "name.fr" => "string|nullable",
            "name.ar" => "string|nullable",

            "description" => "required|array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",

            "location" => "required|array|min:3",
            "location.en" => "string|nullable",
            "location.fr" => "string|nullable",
            "location.ar" => "string|nullable",

            "date" => "required|date|after:now",
            "price" => "required|numeric|min:0",
            "cover" => "required|",
        ]);

        // ? Update image

        $hasFile = $request->cover;

        if ($hasFile) {

            Storage::disk('public')->delete("images/".$event->cover);
            $content =file_get_contents($request->cover);
            $fileName = hash("sha256",$content).'.'.$request->cover->getClientOriginalName();
            Storage::disk("public")->put("images/".$fileName ,$content);   

        }


        $event->update([
            "name" => $request->input("name"),
            "location" => $request->input("location"),
            "description" => $request->input("description"),
            "date" => $request->date,
            "price" => $request->price,
            "cover" => $hasFile ? $fileName : $event->cover
        ]);

        return redirect("events");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        Storage::disk("public")->delete("images/".$event->cover);

        $event->delete();

        return redirect("events");
    }
}
