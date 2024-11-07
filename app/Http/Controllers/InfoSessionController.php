<?php

namespace App\Http\Controllers;

use App\Models\InfoSession;
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
        return view('info_session.info_session_show', compact('infoSession'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'formation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        InfoSession::create([
            'name' => $request->name,
            'formation' => $request->formation,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return back();
    }
    public function update(Request $request,  $id)
    {
        $infoSession = InfoSession::where('id', $id)->first();
        // dd($request);
        $request->validate([
            'name' => 'required',
            'formation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'isAvailable' => 'required',
            'isFinish' => 'required',
        ]);
        $infoSession->update([
            'name' => $request->name,
            'formation' => $request->formation,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'isAvailable' => filter_var($request->isAvailable, FILTER_VALIDATE_BOOLEAN),
            'isFinish' => filter_var($request->isFinish, FILTER_VALIDATE_BOOLEAN),
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
            'isFinish' => !$infosession->isFinish
        ]);
        return back();
    }
}
