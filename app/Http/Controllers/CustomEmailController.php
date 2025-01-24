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
            'sender' => 'required',
            'receiver' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        CustomEmail::create([
            'sender' => $request->sender,
            'receiver' => $request->receiver,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);


        // in case there are multiple emails
        if (str_contains($request->receiver, ',')) {
            $receivers = explode(',', $request->receiver);
            $mailer = Mail::mailer($request->sender);

            foreach ($receivers as $receiver) {
                $mailer->to($receiver)->send(new CustomEmailMail($request->subject, $request->content));
            }

            if ($request->cc) {
                $mailer->send(new CustomEmailMail($request->subject, $request->content))->cc($request->cc);
            }
            if ($request->bcc) {
                $mailer->send(new CustomEmailMail($request->subject, $request->content))->bcc($request->bcc);
            }

        } else {
            $mailer = Mail::mailer($request->sender)->to($request->receiver);

            // Add cc and bcc only if they exist
            if ($request->cc) {
                $mailer->send(new CustomEmailMail($request->subject, $request->content))->cc($request->cc);
            }
            if ($request->bcc) {
                $mailer->send(new CustomEmailMail($request->subject, $request->content))->bcc($request->bcc);
            }


            $mailer->send(new CustomEmailMail($request->subject, $request->content));
        }

        return back()->with('success', 'Email Sent Successfully!');
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
