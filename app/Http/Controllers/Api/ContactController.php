<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Coworking;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;
use App\Mail\CodeMail;
use App\Models\FrequentQuestion;
use App\Models\InfoSession;
use App\Models\Satisfaction;
use Carbon\Carbon;
use DateTime;



class ContactController extends Controller
{
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
    }


    // mafia li ysayeb controller 3la 9bel function wa7da so jm3thum hna - oussama
    //* coworking
    public function cowork(Request $request)
    {
        if ($request->file('cv')) {
            $cv = $request->file('cv')->store('uploads', 'public');
        }
        if ($request->file('presentation')) {
            $presentation = $request->file('presentation')->store('uploads', 'public');
        }

        // to be finished later
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
            'needs' => $request->needs,
            'gender' => $request->gender,
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    //* session info sign up
    public function participate(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|string|email',
            'birthday' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'prefecture' => 'required|string',
            'info_session_id' => 'required',
            'gender' => 'required|string',
            'motivation' => 'required|string',
            'source' => 'required|string',
        ]);

        $parts = Participant::where('info_session_id', $request->info_session_id)->count();
        $infosession = InfoSession::where('id', $request->info_session_id)->first();
        if ($parts + 1 > $infosession->places) { 
            return response()->json([
                'status' => 96,
            ]);
        }

        $checkUser = Participant::where('info_session_id', $request->info_session_id)
            ->where('email', $request->email)->first();
        if ($checkUser) {
            return response()->json([
                "status" => 69,
                "message" => 'This email already exist'
            ]);
        }

        $time = Carbon::now();
        $code = $request->first_name . $request->last_name . $time->format('h:i:s');
        $birthObj = new DateTime($request->birthday);
        $currentDay = new DateTime();
        $age = $birthObj->diff($currentDay)->y;

        // create the participant
        $participant = Participant::create([
            'info_session_id' => $request->info_session_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'age' => $age,
            'phone' => $request->phone,
            'city' => $request->city,
            'prefecture' => $request->prefecture,
            'gender' => $request->gender,
            'source' => $request->source,
            'motivation' => $request->motivation,
            'code' => $code
        ]);

        // one to one relationships
        $questions = FrequentQuestion::create([
            'participant_id' => $participant->id,
        ]);
        $satisfaction = Satisfaction::create([
            'participant_id' => $participant->id,
        ]);

        $data['full_name'] = $participant->full_name;
        $data['email'] = $participant->email;
        $data['code'] = $participant->code;
        $data['infosession'] = $participant->infoSession->name;
        $data['formation'] = $participant->infoSession->formation;
        $data['time'] = $participant->infoSession->start_date;
        $data['created_at'] = $participant->created_at;

        $jsonData = json_encode([
            'email' => $data['email'],
            'code' => $data['code']
        ]);

        ob_start();
        QRCode::text($jsonData)
            ->setErrorCorrectionLevel('H')
            ->png();

        $qrImage = ob_get_clean();
        $image = base64_encode($qrImage);
        $pdf = Pdf::loadView('mail.partials.code', compact(['image', 'data']));
        $data['pdf'] = $pdf;

        Mail::to($participant->email)->send(new CodeMail($data, $image));

        if ($parts + 1 == $infosession->places) {
            $infosession->update([
                'isFull'=>true
            ]);
        }
        return response()->json([
            'message' => 'success',
            'parts'=> $parts,
            'places' => $infosession->places
        ]);
    }
}
