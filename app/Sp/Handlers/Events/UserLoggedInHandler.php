<?php

namespace Sp\Handlers\Events;

use App\User;


class UserLoggedInHandler {


    public function handle(User $user, $remember)
    {

        $user->last_login = date('Y-m-d H:i:s');
        $user->ip = \Request::ip();
        $user->save();

    }
}