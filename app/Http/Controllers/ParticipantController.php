<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use App\Models\FrequentQuestion;
use App\Models\InfoSession;
use App\Models\Note;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();
        $infos = InfoSession::all();
        return view("participants.participants", compact("participants", "infos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        $notes = Note::where("participant_id", $participant->id)->get();
        $questions = $participant->questions;
        $satisfactions = array_slice($participant->satisfaction->getAttributes(), 2, -2);

        return view("participants.partials.participant_show", compact("participant", "notes", "questions", "satisfactions"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view('participants.partials.participant_edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'full_name' => 'required|string',
            'birthday' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'prefecture' => 'required',
        ]);

        // check if the requested image is different from the already stored image
        if ($request->image !== $participant->image) {
            Storage::disk('public')->delete('images/' . $participant->image);
            $image = $request->file('image');
            $imageName = time() . '_' .  $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
            $participant->update([
                'image' => $imageName,
            ]);
        }


        $participant->update([
            'full_name' => $request->full_name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'prefecture' => $request->prefecture,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }

    public function frequestQuestions(Request $request, Participant $participant)
    {


        $frequents = $participant->questions;
        foreach ($request->all() as $field => $value) {
            if ($field != "_token") {
                $frequents->update([
                    $field => $value ?? $frequents->$field,
                ]);
            }
        }

        return redirect()->back()->with("success", "Form submitted successfully!");
    }



    public function updateSatisfaction(Request $request, $participantId)
    {
        $participant = Participant::findOrFail($participantId);

        $satisfactionData = $request->input("satisfaction");

        foreach ($satisfactionData as $column => $checked) {
            $participant->satisfaction->{$column} = $checked == "on" ? 1 : 0;
        }

        $participant->satisfaction->save();

        return redirect()->back()->with("success", "Satisfaction data saved successfully!");
    }


    // TODO: add date to the title, here and coworking
    public function export(Request $request)
    {
        return (new ParticipantsExport($request->term, $request->step, $request->session))->download('participant.xlsx');
    }



    public function step(Request $request, Participant $participant)
    {
        // the action value of the submit buttons in the form
        $action = $request->input("action");

        if ($participant->current_step == "interview") {
            $participant->update([
                "current_step" => $action == "next" ? "coding_week" : "interview_failed",
            ]);
        } elseif ($participant->current_step == "coding_week") {
            $participant->update([
                "current_step" => $action == "next" ? "coding_school" : "coding_week_failed",
            ]);
        }

        return back();
    }
}
