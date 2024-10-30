<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function store(Request $request)
    {
        $token = $request->header('token') ;
        
        if ($token !== "yahya") {
            return response()->json("unauthorized");
        }
        request()->validate([
            "event_id" => "required",
            "name" => "required",
            "mail" => "required|email",
            "phone" => "required"
        ]);

        $attendence = Attendence::create([
            "name" => $request->name,
            "mail" => $request->mail,
            "phone" => $request->phone
        ]);

        $attendence->events()->attach($request->event_id);
        return response()->json("your reservation in created succesfully");
    }

    public function show() {

        $events = Event::all();
        return response()->json($events);
        
    }
}
