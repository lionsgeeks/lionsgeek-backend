<?php

namespace App\Http\Controllers;

use App\Exports\CoworkingsExport;
use App\Mail\CoworkingActionMailer;
use App\Models\Coworking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CoworkingController extends Controller
{
    public function index()
    {
        $coworkings = Coworking::latest()->get();
        return view('coworkings.coworkings', compact('coworkings'));
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
        }else{
            $coworking->update([
                "status" => "2"
            ]);
        }
        return back()->with('success', $coworking->full_name ."'s request has been " . $status . " successfully.");


    }

    public function destroy(Coworking $coworking){
        $coworking->delete();

        return redirect('/coworkings');
    }


    public function export()
    {
        return Excel::download(new CoworkingsExport, 'coworking.xlsx');
    }
}
