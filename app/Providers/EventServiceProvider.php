<?php

namespace App\Providers;

use App\Events\ArticleWasCreate;
use App\Events\PodcastProcessed;
use App\Listeners\SendPodcastNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PodcastProcessed::class => [
            SendPodcastNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(function (ArticleWasCreate $event) {
            $emailSubject = $event->payload;
            Mail::send('templates.email', [], function ($message) use ($emailSubject) {
                $message->to('hello@example.com')->subject($emailSubject);
            });
        });
    
        Event::listen(function (ArticleWasCreate $event) {
            Log::error($event->payload);
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
