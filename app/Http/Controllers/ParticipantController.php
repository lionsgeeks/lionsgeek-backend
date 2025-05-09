<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use App\Exports\QuestionsExport;
use App\Mail\InterviewMail;
use App\Mail\JungleMail;
use App\Mail\SchoolMail;
use App\Models\FrequentQuestion;
use App\Models\InfoSession;
use App\Models\Note;
use App\Models\Participant;
use App\Models\ParticipantConfirmation;
use App\Models\Satisfaction;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
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
        $males = $participants->filter(function ($participant) {
            return $participant->gender == 'male';
        })->count();

        $infos = InfoSession::all();
        $confirmations = ParticipantConfirmation::all();
        return view("participants.participants", compact("participants", "infos", "males" , "confirmations"));
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
        $sessions = InfoSession::all();
        return view('participants.partials.participant_edit', compact('participant', 'sessions'));
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


        $hasImage = $request->image;
        // check if the requested image is different from the already stored image
        if ($hasImage) {
            Storage::disk('public')->delete('images/participants/' . $participant->image);
            $imageName = $this->uploadFile($request->file('image'), "/participants/");
        }


        if ($request->session && $request->session != $participant->info_session_id) {
            // dd('fuck');
            $session = InfoSession::find($request->session);
            $participant->infoSession()->associate($session);
            $participant->save();
            $participant->update([
                'info_session_id' => $request->session
            ]);
        }


        $participant->update([
            'full_name' => $request->full_name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'prefecture' => $request->prefecture,
            "image" => $hasImage ? $imageName : $participant->image,
            "current_step" => $request->step ? $request->step : $participant->current_step,
        ]);

        return redirect()->route('participants.show', $participant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        if ($participant->image) {
            $imagePath = public_path('storage/' . $participant->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $participant->delete();

        return redirect("/infosessions")->with('success', 'Participant Has Been Deleted Successfully!');
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


    public function export(Request $request)
    {
        $date = (new DateTime())->format('F_d_Y');

        // dd($request->all());
        return (new ParticipantsExport($request->term, $request->step, $request->session))->download($date . '_participants.xlsx');
    }

    public function questionsExport()
    {
        $date = (new DateTime())->format('F_d_Y');
        return Excel::download(new QuestionsExport, $date . '_questions.xlsx');
    }



    public function step(Request $request, Participant $participant)
    {
        // the action value of the submit buttons in the form
        $action = $request->input("action");
        // this is for determining either coding/media
        $formation = strtolower($participant->infoSession->formation);
        $school = $formation . "_school";

        if ($action == "daz") {
            $participant->update([
                'current_step' => 'interview_pending'
            ]);
            return back()->with('success', 'Participant in Pending Interview');
        }

        if ($participant->current_step == "interview" || $participant->current_step == "interview_pending") {
            $participant->update([
                "current_step" => $action == "next" ? "jungle" : "interview_failed",
            ]);
            return back()->with('success', $action == "next" ? "Move To Jungle" : "Participant Has Failed");
        } elseif ($participant->current_step == "jungle") {
            $participant->update([
                "current_step" => $action == "next" ? $school : "jungle" . "_failed",
            ]);
            return back()->with('success', $action == "next" ? "Move To School" : "Participant Has Failed");
        }
    }

    public function toInterview(Request $request)
    {
        $candidats = Participant::where('info_session_id', $request->infosession_id)->where('current_step', 'interview')->get();
        $info = InfoSession::where('id', $request->infosession_id)->first();
        $formationType = $info->formation;
        if ($formationType == 'Media') {
            $emailRecipient = 'Media';
        } elseif ($formationType == 'Coding') {
            $emailRecipient = 'Coding';
        }
        $divided = ceil($candidats->count() / count($request->dates));
        foreach ($request->dates as $time) {
            // dd($time);
            $group = $candidats->splice(0, $divided);
            foreach ($group as $candidat) {
                $full_name = $candidat->full_name;
                $day = $request->date;
                $timeSlot = $time;
                $course = $emailRecipient;
                Mail::mailer($emailRecipient)->to($candidat->email)->send(new InterviewMail($full_name, $day, $timeSlot, $course));
            }
        }
        return back()->with('success', 'The Invitation Has Been Sent Successfully!');
    }
    public function toJungle(Request $request)
    {
        $sessionId = $request->sessionId;
        $traning = InfoSession::where('id', $sessionId)->first()->formation;
        if ($traning == 'Media') {
            $emailRecipient = 'Media';
        } elseif ($traning == 'Coding') {
            $emailRecipient = 'Coding';
        }
        $candidats = Participant::where('current_step', 'jungle')->where('info_session_id', $request->infosession_id)->get();
        $day = $request->date;
        foreach ($candidats as $candidat) {
            Mail::mailer($emailRecipient)->to($candidat->email)->send(new JungleMail($candidat->full_name, $candidat->id, $day, $traning));
        }
        return back()->with('success', 'The Invitation Has Been Sent Successfully!');
    }
    public function toSchool(Request $request)
    {
        $candidats = Participant::where('info_session_id', $request->infosession_id)->where('current_step', 'coding_school')->orWhere('current_step', 'media_school')->get();
         // If "Send" button is clicked, validate that a date is provided
        if ($request->has('submit_with_date')) {
            $request->validate([
                'date' => 'required|date'
            ]);
        }
   	    // If "Send Without Date" button is clicked, set date to null
        $day = $request->has('submit_without_date') ? null : $request->date;
        $info = InfoSession::where('id', $request->infosession_id)->first();
        $formationType = $info->formation;
        foreach ($candidats as $key => $candidat) {
            if ($formationType == 'Media' && $candidat->current_step == "media_school") {
                $emailRecipient = 'Media';
            } elseif ($formationType == 'Coding' && $candidat->current_step == "coding_school") {
                $emailRecipient = 'Coding';
            }
            $school = $candidat->current_step == "coding_school" ? "Coding" : "Media";
            // Mail::mailer($emailRecipient)->to($candidat->email)->send(new SchoolMail($candidat->full_name, $day, $candidat->current_step));
            Mail::to($candidat->email)->send(new SchoolMail($candidat->full_name, $candidat->id, $day, $school));
        }
        return back()->with('success', 'The Invitation Has Been Sent Successfully!');
    }


    public function confirmationJungle($full_name, $id)
    {
        if ($full_name) {
            $participant = Participant::where('full_name', $full_name)->where('id', $id)->first();
            $confirmation = $participant->confirmation;
            $confirmation->update([
                'jungle' => 1
            ]);
            return redirect()->away('https://lionsgeek.ma/attendance/confirmation');
        }
    }


    public function confirmationSchool($full_name, $id)
    {
        if ($full_name) {
            $participant = Participant::where('full_name', $full_name)->where('id', $id)->first();
            $confirmation = $participant->confirmation;
            $confirmation->update([
                'school' => 1
            ]);

            return redirect()->away('https://lionsgeek.ma/attendance/confirmation');
        }
    }
}
