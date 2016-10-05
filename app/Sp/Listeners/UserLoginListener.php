<?php

namespace Sp\Listeners;

use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Sp\Handlers\Events\UserLoggedInHandler;


class UserLoginListener
{

    public $loginHandler;

    function __construct(UserLoggedInHandler $loginHandler) {
        $this->loginHandler = $loginHandler;
    }
    /**
     * Handle external user creation
     */
    public function onUserLogin(User $user) {
        
        $this->loginHandler->handle($user);
    }



    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen (
            'Illuminate\Auth\Events\Login',
            'Sp\Listeners\UserLoginListener@onUserLogin'
        );


    }

}
