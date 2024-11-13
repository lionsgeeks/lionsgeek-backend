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
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



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

    //* session info sign up
    public function participate(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'birthday' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'info_session_id' => 'required'
        ]);
        $time = Carbon::now();
        $code = $request->first_name . $request->last_name . $time->format('h:i:s');
        $participant = Participant::create([
            'info_session_id' => $request->info_session_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'code' => $code
        ]);
        $data['first_name'] = $participant->first_name;
        $data['last_name'] = $participant->last_name;
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
        return response()->json([
            'message' => 'success'
        ]);
    }
}
