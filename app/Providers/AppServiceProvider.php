<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Coworking;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $pending = Coworking::latest()->where('status', '0')->get();
        $notread = Contact::latest()->where('mark_as_read', 0)->get();
        $notifications = $pending->merge($notread)->sortByDesc('created_at');

        $notifications =  $notifications->map(function ($ele) {
            return (object) [
                "type" => $ele->message ? "contact" : "cowork",
                "name" => $ele->full_name,
                "message" => $ele->message ? $ele->message : null,
                "id" =>  $ele->id,
                "time" => $ele->created_at,
            ];
        });


        // dd($notifications);
        view()->share([
            "notifications" => $notifications

        ]);
    }
}
