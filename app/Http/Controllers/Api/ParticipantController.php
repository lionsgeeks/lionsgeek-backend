<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //
    public function setPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            "id" => "required"
        ]);

        $profile = Participant::find($request->id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filePath = $file->store('images/participants', 'public');

            $oldFilePath = storage_path('app/public/images/participants/' . $profile->image);

            if ($profile->image) {
                unlink($oldFilePath);
            }

            $profile->image = basename($filePath);
            $profile->save();

            return response()->json([
                'message' => 'Photo uploaded successfully!',
                'profile' => $profile,
            ]);
        }

        return response()->json(['message' => "Error"], 400);
    }
}
