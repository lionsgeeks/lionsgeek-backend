<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Mode;
use App\Models\Participant;
use App\Models\ParticipantConfirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function tableview(Request $request)
    {
        $user = Auth::user();
        $mode = $user->mode;
        $mode->update([
            'tablemode' => $request->view
        ]);

        return back();
    }


    public function createUserModeAssociations()
    {
        // Get all users
        $users = User::all();

        // Loop through each user
        foreach ($users as $user) {
            // Check if the user already has an associated mode
            if (!$user->mode) {
                // Create a new mode association with default values
                Mode::create([
                    'user_id' => $user->id,
                ]);
            }
        }

        return response()->json(['message' => 'User-mode associations created successfully!']);
    }

    // basically the same as the above function
    public function participantConfirmationAssociations()
    {
        $participants = Participant::all();
        foreach ($participants as $participant) {
            if (!$participant->confirmation) {
                ParticipantConfirmation::create([
                    'participant_id' => $participant->id,
                ]);
            }
        }

        return response()->json(['message' => 'Participant Confirmation associations created Successfully!']);
    }


    public function darkmode()
    {
        $user = Auth::user();
        $user->mode->update([
            'darkmode' => !$user->mode->darkmode,
        ]);

        return back();
    }
}
