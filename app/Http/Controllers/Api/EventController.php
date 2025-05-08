<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\Event;
use Date;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->json($events);
    }

    public function upcoming()
    {
        $timeNow = now();
        $upcomingEvents = Event::where('date', ">", $timeNow)->orderBy('date')->first();
        $latestEvent = Event::latest('date')->first();
        return response()->json([
            'upcoming' => $upcomingEvents,
            'latest' => $latestEvent ? $latestEvent->toArray() : null
        ]);
    }

    public function show(Event $event)
{
    $participants=booking::where('event_id',$event->id)->get();
    return response()->json([
        'event' => $event,
        'participants' => $participants
    ]);
}
public function validateParticipant(Request $request)
{
    // dd($request->all());
    $request->validate([
        "email" => "required",
        "code" => "required",
        "id" => "integer",
        "eventId" => "integer"
    ]);

    $participant = booking::where("email", $request->email)
        // ->where("code", $request->code)
        // ->where("info_session_id" , $request->id)
        ->first();

    if ($participant) {
        if ($participant->event_id == $request->eventId) {
            if (!$participant->is_visited) {
                $participant->is_visited = true;
                $participant->save();

                return response()->json([
                    "message" => "Credentials match.",
                    "status" => 200,
                    "profile" => $participant
                ]);
            }
            return response()->json([
                "message" => "Already participated.",
                "status" => 200,
                "profile" => $participant
            ]);
            # code...
        } else {
            return response()->json([
                "message" => "Participant belong to another event",
                "status" => 200,
                "profile" => $participant
            ]);
        }
    } else {
        return response()->json([
            "message" => "No such participant.",
            "status" => 200,
        ]);
    }
}

}
