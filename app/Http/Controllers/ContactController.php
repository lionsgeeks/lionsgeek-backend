<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use App\Models\Contact;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        $unreadMessages = Contact::where('mark_as_read', 0)->count();
        return view('contacts.contacts', compact('contacts', 'unreadMessages'));
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
        return back();
    }
    public function export()
    {
        $date = (new DateTime())->format('F_d_Y');
        return Excel::download(new ContactsExport, $date . '_contacts.xlsx');
    }
}
