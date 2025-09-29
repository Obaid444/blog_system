<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Example:
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
          \App\Events\PostPublished::class => [
        \App\Listeners\SendPostPublishedNotification::class,
    ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }
}
