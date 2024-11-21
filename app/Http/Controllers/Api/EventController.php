<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Date;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
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
}
