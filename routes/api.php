<?php

use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\InfoSessionController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\ParticipantController ;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\BookingController;
use App\Models\InfoSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/attendence/create", [AttendenceController::class, "store"]);
Route::get("/events", [AttendenceController::class, "show"]);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/press', [BlogController::class, 'press']);
Route::post('/contact', [ContactController::class, 'store']);
Route::post('/booking/store', [BookingController::class, 'store']);

Route::post('/subscriber', [SubscriberController::class, 'store']);
Route::post('/cowork', [ContactController::class, 'cowork']);

Route::post('/infosession', [InfoSessionController::class, 'store']);
Route::post('/participate', [ContactController::class, 'participate']);
Route::get('/infosessions', [InfoSessionController::class, 'index']);
Route::get('/0cb1e4af6e3d2a705e07ac733dbf66275940f03fa243b8b5f5680b1af134b98c', [InfoSessionController::class, 'PrivateSession']);
Route::put('/validate-invitation', [InfoSessionController::class,'validateParticipant']);
Route::put('/validate-event-invitation', [EventController::class,'validateParticipant']);
Route::put('/manual-checking', [InfoSessionController::class,'manualChecking']);
Route::get('/session-data', [InfoSessionController::class,'infoData']);
Route::get('/profile-data', [InfoSessionController::class,'profileData']);
Route::post('/session-photo', [ParticipantController::class,'setPhoto']);

Route::get("/galleries",[GalleryController::class,"index"]);
Route::get('/events',[EventController::class,'index']);
Route::get('/projects',[ProjectController::class,'index']);
Route::get("events/{event}",[EventController::class,'show']);
Route::get('/upcoming', [EventController::class,'upcoming']);

Route::post('/views', [GeneralController::class, 'increment']);
Route::get('/queue', [ParticipantController::class, 'runQueue']);

Route::post('/unsubscribe', [SubscriberController::class, 'unsubscribe']);
