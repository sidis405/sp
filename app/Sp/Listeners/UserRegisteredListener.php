<?php

namespace Sp\Listeners;

use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Sp\Events\Article\ArticleWasVisited;
use Sp\Handlers\Events\UserRegisteredHandler;
use Sp\Events\Users\UserRegistered;
use App\User;

class UserRegisteredListener
{

    public $regHandler;

    function __construct(UserRegisteredHandler $regHandler) {
        $this->regHandler = $regHandler;
    }
    /**
     * Handle external user creation
     */
    public function onUserRegistered($user) {

        $this->regHandler->handle($user->user);
    }

    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            UserRegistered::class,
            'Sp\Listeners\UserRegisteredListener@onUserRegistered'
        );

    }

}
