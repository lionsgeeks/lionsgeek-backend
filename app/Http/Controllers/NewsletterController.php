<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Notifications\Subscriber as NotificationsSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Process\Process;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        $lastnews = Newsletter::latest(4);
        return view("newsletter.newsletter", compact(['subscribers', 'lastnews']));
    }
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);
        // shell_exec("php artisan sett");
        // $process = new Process(['php', 'artisan', 'sett']);
        // $process->run();

        // exec('php artisan queue:work');
        Newsletter::create([
            'subject' => $request->subject,
            'content' => $request->content,
        ]);
        $visitors = Subscriber::all();

        Notification::send($visitors, new NotificationsSubscriber($request->subject, $request->content));
        return back()->with('success', 'Blog sent succefully');
    }
}
