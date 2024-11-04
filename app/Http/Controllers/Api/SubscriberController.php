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
            "name" => "required",
            "email" => "required",
        ]);
        Subscriber::create([
            "name" => $request->name,
            "email" => $request->email,
        ]);
        return response()->json([
            "status" => "success",
        ]);
    }
}
