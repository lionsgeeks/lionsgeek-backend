<?php

namespace App\Http\Controllers;

use App\Mail\CustomEmailMail;
use App\Models\Contact;
use App\Models\CustomEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CustomEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customEmails = CustomEmail::all();
        return view('emails.custom-emails', compact('customEmails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required|string',
            'receiver' => 'required|string', 
            'cc' => 'nullable|string',
            'bcc' => 'nullable|string',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);
    
        CustomEmail::create([
            'sender' => $request->sender,
            'receiver' => $request->receiver,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);
    
        // Création du mailer
        $mailer = Mail::mailer($request->sender);
    
        // Préparer l'email
        $mail = $mailer->to(explode(',', $request->receiver));
    
        // Ajout des destinataires "CC"
        if (!empty($request->cc)) {
            $mail->cc(explode(',', $request->cc));
        }
    
        // Ajout des destinataires "BCC"
        if (!empty($request->bcc)) {
            $mail->bcc(explode(',', $request->bcc));
        }
    
        // Envoi de l'e-mail
        $mail->send(new CustomEmailMail($request->subject, $request->content));
    
        return back()->with('success', 'Email envoyé avec succès !');
    }
    
    


    /**
     * Display the specified resource.
     */
    public function show(CustomEmail $customEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomEmail $customEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomEmail $customEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomEmail $customEmail)
    {
        $customEmail->delete();
        return back()->with('success', 'Email Deleted!');
    }
}
