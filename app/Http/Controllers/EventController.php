<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("event.event");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "name"=>"required",
            "date"=>"required",
            "location"=>"required",
            "description"=>"required",
            "price"=>"required",
            "cover"=>"required",
        ]);
        $cover = $request->file("cover");
        $coverName = time() . "_" . $cover->getClientOriginalName();
        $cover->storeAs("public/img", $coverName);

        Event::create([
            "name"=>$request->name,
            "date"=>$request->date,
            "location"=>$request->location,
            "description"=>$request->description,
            "price"=>$request->description,
            "cover"=>$coverName
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
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
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
