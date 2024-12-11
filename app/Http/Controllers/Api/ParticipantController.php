<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //
    public function setPhoto (Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filePath = $file->store('uploads/session', 'public'); 

            return response()->json([
                'message' => 'Photo uploaded successfully!',
                'file_path' => $filePath,
            ]);
        }
        
        return response()->json(['message' => 'No file uploaded'], 400);
        // return response()->json([
        //     'message' => $request->hasFile("photo"),
        // ]);
    }
}
