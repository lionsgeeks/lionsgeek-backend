<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InfoSession;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfoSessionController extends Controller
{
    public function index()
    {
        $infos = InfoSession::where('isAvailable', true)->where('isFinish', false)->get();
        return response()->json([
            'infos' => $infos,
        ]);
    }

    public function validateParticipant(Request $request)
    {
        $request->validate([
            "email" => "required",
            "code" => "required"
        ]);

        $participant = Participant::where("email", $request->email)
            ->where("code", $request->code)
            ->first();

        if ($participant) {
            if (!$participant->is_visited) {
                $participant->is_visited = true;
                $participant->save();

                return response()->json([
                    "message" => "Credentials match.",
                    "status" => 200,
                ]);
            }

            return response()->json([
                "message" => "Already participated.",
                "status" => 200,
            ]);
        } else {
            return response()->json([
                "message" => "No such participant.",
                "status" => 200,
            ]);
        }
    }
}
