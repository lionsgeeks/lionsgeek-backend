<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeSubscriberMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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
            Mail::to($request->email)->send(new WelcomeSubscriberMail());
            return response()->json([
                "status" => 200,
                "message" => 'You subscribed succefully'
            ]);
        }
    }

    public function unsubscribe(Request $request)
    {
        // dd($request->id);
        $subscriberId = Crypt::decrypt($request->id);
        $subscriber = Subscriber::where('id', $subscriberId)->first();
        if ($subscriber) {
            $subscriber->delete();
        } else {
            return response()->json([
                'status' => 69
            ]);
        };
        return response()->json([
            'status' => 200
        ]);
    }
}
