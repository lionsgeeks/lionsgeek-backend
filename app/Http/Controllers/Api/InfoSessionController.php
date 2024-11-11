<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InfoSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfoSessionController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => "required",
    //         'last_name' => "required",
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'formation' => 'required',
    //     ]);
    //     $time = Carbon::now();
    //     $code = $request->first_name . $request->last_name . $time->format('h:i:s');
    //     // dd($code);
    //     InfoSession::create([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'formation' => $request->formation,
    //         'code' => Hash::make($code),
    //     ]);
    //     return response()->json([
    //         'response' => 'success'
    //     ]);
    // }

    public function index()
    {
        $infos = InfoSession::all();
        return response()->json([
            'infos' => $infos,
        ]);
    }
}
