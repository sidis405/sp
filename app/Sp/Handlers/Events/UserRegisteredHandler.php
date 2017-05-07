<?php

namespace Sp\Handlers\Events;

use App\User;
use Sp\Utils\Mailer;


class UserRegisteredHandler {

    protected $mailer;

    function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(User $user)
    {
        // Send Email To User
        $this->mailer->sendVerificationEmailToUser($user);

    }


}