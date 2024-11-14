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
        Subscriber::create([
            "email" => $request->email,
        ]);
        return response()->json([
            "status" => "success",
        ]);
    }
}
