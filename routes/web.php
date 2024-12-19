<?php

use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoworkingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InfoSessionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Coworking;
use App\Models\Event;
use App\Models\General;
use App\Models\InfoSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (request()->redirect == "true") {
        return redirect()->to("https://lionsgeek.ma/");
    }else {
        return view("welcome");
    }
    // return view("welcome");
});




Route::resource("events", EventController::class);

Route::resource("gallery", GalleryController::class);

Route::resource("images", ImageController::class);


Route::resource("blogs", BlogController::class);
Route::resource("contacts", ContactController::class);
Route::resource("coworkings", CoworkingController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('notes', NoteController::class)->except(['store']);
Route::post('notes/{participant}', [NoteController::class, 'store'])->name('notes.store');
Route::post('satisfaction/{participant}', [ParticipantController::class, 'updateSatisfaction'])->name('satisfaction.store');
Route::post('frequent/{participant}', [ParticipantController::class, 'frequestQuestions'])->name('frequent.store');
Route::post('participant/step/{participant}', [ParticipantController::class, 'step'])->name('participant.step');

Route::resource('infosessions', InfoSessionController::class);
Route::patch('/infosessions/available/{id}', [InfoSessionController::class, 'availabilityStatus'])->name('infosessions.isavailable');
Route::patch('/infosessions/complete/{id}', [InfoSessionController::class, 'completeStatus'])->name('infosessions.isfinish');
Route::resource('newsletter', NewsletterController::class);
Route::resource("projects", ProjectController::class);
Route::resource("booking", BookingController::class);

Route::get('/passqr', [PdfController::class, 'index'])->name('pass.qrcode');
Route::get('/sendqr', [PdfController::class, 'sendQrcode'])->name('send.qrcode');
Route::get('/dashboard', function () {
    $totalContacts = Contact::all()->count();
    $totalEvents = Event::all()->count();
    $members = User::all()->count();

    //* order sessions by the nearest date between now and one month from now
    $sessions = InfoSession::where('isAvailable', 1)
        ->whereBetween('start_date', [Carbon::now(), Carbon::now()->addMonth()])
        ->orderByRaw('ABS(julianday(start_date) - julianday(?))', [Carbon::now()])
        ->get();
    $upcomingEvents = Event::whereBetween('date', [Carbon::now(), Carbon::now()->addMonth()])
        ->orderByRaw('ABS(julianday(date) - julianday(?))', [Carbon::now()])
        ->take(4)
        ->get();
    $pendingCoworkings = Coworking::where('status', 0)->take(4)->get();
    $coworkings = Coworking::latest()->take(4)->get();
    $blogs = Blog::latest()->take(4)->get();
    $views = General::where('id', 1)->first();
    // dd($views);
    return view('dashboard', compact('totalContacts', 'totalEvents', 'members', 'sessions', 'coworkings', 'upcomingEvents', 'pendingCoworkings', 'blogs', 'views'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // excel export
    Route::post('coworkings/export/', [CoworkingController::class, 'export'])->name('coworking.export');
    Route::post('contact/export/', [ContactController::class, 'export'])->name('contact.export');
    Route::post('participant/export', [ParticipantController::class, 'export'])->name('participant.export');

    // Press
    Route::get("/press",[PressController::class,'index'])->name("press.index");
    Route::get("/press/create",[PressController::class,'create'])->name("press.create");
    Route::post("/press/store",[PressController::class,'store'])->name("press.store");
    Route::get("/press/show/{press}",[PressController::class,'show'])->name("press.show");
    Route::put("/press/update/{press}",[PressController::class,'update'])->name("press.update");
    Route::delete("/press/destroy/{press}",[PressController::class,'destroy'])->name("press.destroy");

    //addAdmin
    Route::post("/addadmin/store",[AddAdminController::class,"AddAdmin"])->name("addadmin.store");

    //delete email
    Route::delete('/email/destroy/{contact}', [ContactController::class, 'destroy'])->name('email.destroy');
    //mark email as read
    Route::put('/email/markread/{contact}', [ContactController::class, 'update'])->name('email.markread');


});
// Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

require __DIR__ . '/auth.php';
