<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        request()->validate([
            "email" => "required",
        ]);

        $checkUser = Subscriber::where('email', $request->email)->first();
        if ($checkUser) {
            return response()->json([
                'status' => 69,
                'message' => 'This email already exist'
            ]);
        } else {
            Subscriber::create([
                "email" => $request->email,
            ]);
            return response()->json([
                "status" => 200,
                "message" => 'You subscribed succefully'
            ]);
        }
    }
}
