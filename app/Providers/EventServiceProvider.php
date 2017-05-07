<?php

namespace App\Providers;

use Sp\Listeners\UserLoginListener;
use Sp\Listeners\ArticlesVisitListener;
use Ibi\Listeners\ExternalUsersListener;
use Sp\Listeners\UserRegisteredListener;
use Sp\Listeners\ArticlesApprovedListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'Illuminate\Auth\Events\Login' => [
        //     'Sp\Listeners\LogSuccessfulLogin',
        // ],
         'auth.login' => [
            'Sp\Handlers\Events\UserLoggedInHandler',
        ],
    ];

    protected $subscribe = [
        ArticlesVisitListener::class,
        ArticlesApprovedListener::class,
        UserRegisteredListener::class,
        // UserLoginListener::class,
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
