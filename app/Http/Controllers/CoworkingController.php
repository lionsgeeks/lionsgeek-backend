<?php

namespace App\Http\Controllers;

use App\Exports\CoworkingsExport;
use App\Mail\CoworkingActionMailer;
use App\Models\Contact;
use App\Models\Coworking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CoworkingController extends Controller
{
    public function index()
    {
        $coworkings = Coworking::latest()->get();
        $pending = Coworking::where('status', '0')->get();
        $notread = Contact::latest()->get();
        $notifications = $pending->merge($notread)->sortByDesc('created_at');
        return view('coworkings.coworkings', compact('coworkings' , 'pending' , 'notifications' ));
    }

    public function show(Coworking $coworking)
    {
        return view('coworkings.partials.coworkings_show', compact('coworking'));
    }

    public function update(Request $request, Coworking $coworking) {

        // dd($coworking);
        $status = $request->action;
        if($status == 'approve'){
            $coworking->update([
                "status" => "1"
            ]);
            Mail::to($coworking->email)->send(new CoworkingActionMailer($coworking->full_name));
            session()->increment('pending_count');

        }else{
            $coworking->update([
                "status" => "2"
            ]);
        }
        return back()->with('success', $coworking->full_name ."'s request has been " . $status . " successfully.");


    }

    public function destroy(Coworking $coworking){
        $coworking->delete();

        return redirect('/coworkings')->with("success", "Request Has Been Deleted Successfully");
    }


    public function export()
    {
        return Excel::download(new CoworkingsExport, 'coworking.xlsx');
    }

}
