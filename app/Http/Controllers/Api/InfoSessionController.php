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
        $infos = InfoSession::where('isAvailable', true)->where('isFinish', false)->where("name" , "!=" , "private session")->orderBy('start_date', "desc")->get();
        return response()->json([
            'infos' => $infos,
        ]);
    }


    public function PrivateSession()
    {
        $infos = InfoSession::where('isAvailable', true)->where('isFinish', false)->where("name" , "=" , "private session")->first();
        return response()->json([
            'infos' => $infos,
        ]);
    }
    public function manualChecking(Request $request)
    {
        $request->validate([
            "id" => "integer"
        ]);
        $participant = Participant::where("id", $request->id)->first();
        if ($participant) {
            $participant->is_visited = true;
            $participant->current_step = "interview";
            $participant->save();

            return response()->json([
                "message" => "manual visite",
                "status" => 200,
                "profile" => $participant
            ]);
        }
    }
    public function validateParticipant(Request $request)
    {
        $request->validate([
            "email" => "required",
            "code" => "required",
            "id" => "integer",
            "sessionId" => "integer"
        ]);

        $participant = Participant::where("email", $request->email)
            ->where("code", $request->code)
            // ->where("info_session_id" , $request->id)
            ->first();

        if ($participant) {
            if ($participant->info_session_id == $request->sessionId) {
                if (!$participant->is_visited) {
                    $participant->is_visited = true;
                    $participant->current_step = "interview";
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
                    "message" => "Participant belong to another session",
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

    public function infoData(Request $request)
    {
        $session = InfoSession::find($request->id);

        $participant = $session->participants()->get();
        $attended = $session->participants()->where("is_visited", 1)->orderby("updated_at", "desc")->get();
        $unattended = $session->participants()->where("is_visited", 0)->orderby("created_at", "asc")->get();

        // dd($attended);

        return response()->json([
            "session" => $session,
            "participants" => $participant,
            "attended" => $attended,
            "unattended" => $unattended,
        ]);
    }


    public function profileData(Request $request)
    {
        $profile = Participant::find($request->id);
        // dd($attended);
        return response()->json($profile);
    }
}
