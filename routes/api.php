<?php

use App\Http\Controllers\Api\AttendenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/attendence/create",[AttendenceController::class,"store"]);
Route::get("/events",[AttendenceController::class,"show"]);