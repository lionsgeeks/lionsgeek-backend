<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Coworking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'first' => 'required|string',
            'last' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        // Create the contact message in the database
        Contact::create([
            'full_name' => $request->first . ' ' . $request->last,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Return a successful response
        return response()->json([
            'message' => 'success',
        ]);

        // return $request->phone;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cowork(Request $request)
    {
        if ($request->file('cv')) {
            $cv = $request->file('cv')->store('uploads', 'public');
        }
        if ($request->file('presentation')) {
            $presentation = $request->file('presentation')->store('uploads', 'public');
        }

        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        Coworking::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'formation' => $request->formation,
            'cv' => $cv ?? null,
            'proj_name' => $request->proj_name,
            'proj_description' => $request->proj_desc,
            'domain' => $request->domain,
            'plan' => $request->proj_plan,
            'presentation' => $presentation ?? null,
            'prev_proj' => $request->prev_proj,
            'reasons' => $request->reasons,
            'needs' => $request->needs
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
