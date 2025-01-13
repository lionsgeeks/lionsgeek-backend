<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Mode;
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
                    'darkmode' => 0,  // Default value for darkmode
                    'tablemode' => 'table',  // Default value for tablemode
                ]);
            }
        }

        return response()->json(['message' => 'User-mode associations created successfully!']);
    }
}
