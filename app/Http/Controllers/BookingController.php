<?php

namespace App\Http\Controllers;

use App\Mail\BookingMailler;
use App\Models\booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "name" => "required",
            "event_id" => "required",
            "phone" => "required",
            "gender" => "required", // you can customize accepted values
        ]);

        $booking = Booking::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "event_id" => $request->event_id,
            "is_visited" => false,
        ]);

        $jsonData = json_encode([
            "email" => $booking->email,
            "code" => $booking->event_id
        ]);

        // Generate QR code
        ob_start();
        QRCode::text($jsonData)
            ->setSize(300)
            ->setMargin(10)
            ->setErrorCorrectionLevel('H')
            ->png();
        $qrImage = ob_get_clean();

        // Convert to base64 for email attachment
        $qrBase64 = base64_encode($qrImage);

        // Fetch event details
        $event = Event::find($booking->event_id);

        // Send email with event details
        Mail::to($booking->email)->send(new BookingMailler(
            $booking->name,
            $qrBase64,
            $event->name->en,
            $event->description->en,
            $event->date
        ));

        return response()->json([
            "message" => "Booking successful",
            "qr_code" => "data:image/png;base64," . $qrBase64
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(booking $booking)
    {
        //
    }
}
