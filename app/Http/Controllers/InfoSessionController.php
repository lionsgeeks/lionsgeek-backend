<?php

namespace App\Http\Controllers;

use App\Models\InfoSession;
use App\Models\Participant;
use Illuminate\Http\Request;

class InfoSessionController extends Controller
{
    public function index()
    {
        $infosessions = InfoSession::all();
        return view('info_session.info_session', compact('infosessions'));
    }
    public function show($id)
    {
        $infoSession = InfoSession::where('id', $id)->first();
        $participants = $infoSession->participants;
        $males = $participants->filter(function ($participant) {
            return $participant->gender == 'male';
        })->count();

        $babies = $participants->filter(function ($participant) {
            return $participant->age <= 20;
        })->count();

        $prime = $participants->filter(function ($participant) {
            return $participant->age >= 21 && $participant->age <= 23;
        })->count();

        $late = $participants->filter(function ($participant) {
            return $participant->age >= 24 && $participant->age <= 26;
        })->count();

        $oldies = $participants->filter(function ($participant) {
            return $participant->age >= 27;
        })->count();

        return view('info_session.info_session_show', compact('infoSession', 'participants', 'males', 'babies', 'prime', 'late', 'oldies'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'formation' => 'required',
            'start_date' => 'required',
            'places' => 'required',
        ]);
        InfoSession::create([
            'name' => strtolower($request->name),
            'formation' => $request->formation,
            'start_date' => $request->start_date,
            'places' => $request->places,
        ]);
        return back()->with('success','Session Has Been Created Successfully');
    }
    public function update(Request $request,  $id)
    {
        $infoSession = InfoSession::where('id', $id)->first();
        // dd($request);
        $request->validate([
            'name' => 'required',
            'formation' => 'required',
            'start_date' => 'required',
            'isAvailable' => 'required',
            'isFinish' => 'required',
            'places' => 'required',
        ]);
        $infoSession->update([
            'name' => $request->name,
            'formation' => $request->formation,
            'start_date' => $request->start_date,
            'isAvailable' => filter_var($request->isAvailable, FILTER_VALIDATE_BOOLEAN),
            'isFinish' => filter_var($request->isFinish, FILTER_VALIDATE_BOOLEAN),
            'places' => $request->places,
        ]);
        return back();
    }
    public function destroy($id)
    {
        $infoSession = InfoSession::where('id', $id)->first();
        $infoSession->delete();
        return redirect('infosessions');
    }
    public function availabilityStatus($id)
    {
        $infosession = InfoSession::where('id', $id)->first();
        $infosession->update([
            'isAvailable' => !$infosession->isAvailable
        ]);
        return back();
    }
    public function completeStatus($id)
    {
        $infosession = InfoSession::where('id', $id)->first();
        $infosession->update([
            'isAvailable' => $infosession->isAvailable ? false : $infosession->isAvailable,
            'isFinish' => !$infosession->isFinish
        ]);
        return back();
    }
}
