<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Notifications\Subscriber as NotificationsSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Process\Process;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        $lastnews = Newsletter::latest()->take(4)->get();
        return view("newsletter.newsletter", compact(['subscribers', 'lastnews']));
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
        Notification::send($visitors, new NotificationsSubscriber($request->subject, $request->content));
        return back()->with('success', 'Blog sent succefully!');
    }

    // delete unvalide emails
    public function fakeUsers()
    {
        $subscribers = Subscriber::all();
        foreach ($subscribers as $key => $subscriber) {
            if (!filter_var($subscriber->email, FILTER_VALIDATE_EMAIL)) {
                $subscriber->delete();
            }
        }
        return back();
    }
}
