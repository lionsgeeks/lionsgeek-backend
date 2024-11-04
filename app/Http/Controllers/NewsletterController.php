<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Notifications\Subscriber as NotificationsSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NewsletterController extends Controller
{
    public function index()
    {
        return view("newsletter.newsletter");
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);

        Newsletter::create([
            'subject' => $request->subject,
            'content' => $request->content,
        ]);
        $visitors = Subscriber::all();
        
        Notification::send($visitors, new NotificationsSubscriber($request->subject,$request->content));
        return back()->with('success', 'Blog sent succefully');
    }
}
