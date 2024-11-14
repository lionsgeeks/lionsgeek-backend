<?php

namespace App\Http\Controllers;

use App\Mail\CodeMail;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;

class PdfController extends Controller
{
    public function index()
    {
        // Capture the QR code output
        ob_start();
        QRCode::text("Hello World")->setErrorCorrectionLevel('H')->png();
        $image = ob_get_clean();

        // Encode to base64
        $image = base64_encode($image);
        return view('mail.partials.code', compact('image'));
    }
    public function sendQrcode()
    {
        $data['email'] = 'oufkirhamza08@gmail.com';
        $data['first_name'] = 'lionel';
        $data['last_name'] = 'messi';
        $data['code'] = 'lionsgeek';
        $data['infosession'] = 'name session code';
        $data['created_at'] = "02/20/1000";
        $jsonData = json_encode([
            'email' => $data['email'],
            'code' => $data['code']
        ]);
        ob_start();
        QRCode::text($jsonData)
            ->setErrorCorrectionLevel('H')
            ->png();
        $qrImage = ob_get_clean();
        $image = base64_encode($qrImage);
        $pdf = Pdf::loadView('mail.partials.code', compact(['image', 'data']));
        $data['pdf'] = $pdf;
        Mail::to('oufkirhamza08@gmail.com')->send(new CodeMail($data, $image));
        return back();
    }
}
