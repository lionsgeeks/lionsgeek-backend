<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoworkingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InfoSessionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::resource("events", EventController::class);

Route::resource("gallery",GalleryController::class);

Route::resource("images",ImageController::class);


Route::resource("blogs", BlogController::class);
Route::resource("contacts", ContactController::class);
Route::resource("coworkings", CoworkingController::class);
Route::resource('participants', ParticipantController::class);

Route::resource('infosessions', InfoSessionController::class);
Route::patch('/infosessions/available/{id}', [InfoSessionController::class, 'availabilityStatus'])->name('infosessions.isavailable');
Route::patch('/infosessions/complete/{id}', [InfoSessionController::class, 'completeStatus'])->name('infosessions.isfinish');
Route::resource('newsletter', NewsletterController::class);
Route::resource("projects" , ProjectController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
