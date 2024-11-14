<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InfoSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfoSessionController extends Controller
{
    public function index()
    {
        $infos = InfoSession::where('isAvailable', true)->where('isFinish', false)->get();
        return response()->json([
            'infos' => $infos,
        ]);
    }
}
