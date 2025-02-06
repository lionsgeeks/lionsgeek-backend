<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use App\Models\Contact;
use App\Models\CustomEmail;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $customEmails = CustomEmail::all();
    //     $contacts = Contact::all();
    //     $connect = $customEmails->merge($contacts)->sortByDesc('created_at');
    //     dd($connect);
    //     $unreadMessages = Contact::where('mark_as_read', 0)->count();
    //     return view('contacts.contacts', compact('contacts', 'unreadMessages', 'customEmails',"connect"));
    // }
    public function index()
    {
        // Fetch and normalize CustomEmail data
        $customEmails = CustomEmail::all()->map(function ($customEmail) {
            return [
                'id' => $customEmail->id,
                'full_name' => $customEmail->sender,
                'email' => $customEmail->receiver,
                'cc' => $customEmail->cc,
                'bcc' => $customEmail->bcc,
                'message' => $customEmail->content,
                'created_at' => $customEmail->created_at,
                'source' => 'customEmails',
            ];
        });

        // Fetch and normalize Contact data
        $contacts = Contact::all()->map(function ($contact) {
            return [
                'id' => $contact->id,
                'full_name' => $contact->full_name,
                'email' => $contact->email,
                'message' => $contact->message,
                'created_at' => $contact->created_at,
                'mark_as_read' => $contact->mark_as_read,
                'source' => 'contacts',
            ];
        });

        $connect = collect([]);
        if (count($contacts) > 0 && count($customEmails) > 0) {
            // Merge and sort data by created_at
            $connect = $customEmails->merge($contacts);
            // dd($connect);
        } elseif (count($contacts) > 0) {
            $connect = $contacts;
        } elseif (count($customEmails) > 0) {
            $connect = $customEmails;
        }

        $unreadMessages = Contact::where('mark_as_read', 0)->count();

        return view('contacts.contacts', compact('connect', 'unreadMessages','contacts','customEmails'));
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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update(['mark_as_read' => !$contact->mark_as_read]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with("success","The Mail Has Been Deleted Successfully");
    }
    public function export()
    {
        $date = (new DateTime())->format('F_d_Y');
        return Excel::download(new ContactsExport, $date . '_contacts.xlsx');
    }
}
