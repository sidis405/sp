<?php

namespace Sp\Handlers\Commands\Users;

use Sp\Commands\Users\UpdateUserProfileCommand;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\UsersRepo;
use Sp\Events\Users\UserProfileWasUpdated;
use Event;


class UpdateUserProfileCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(UsersRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateArticleCommand  $command
     * @return void
     */
    public function handle(UpdateUserProfileCommand $command)
    {
        $user_object = User::edit(
            $command->user_id,
            $command->name,
            $command->surname,
            $command->username,
            $command->email,
            $command->social_facebook,
            $command->social_google,
            $command->social_twitter,
            $command->social_website,
            $command->description
            );

        $user = $this->repo->save($user_object);

        Event::fire(new UserProfileWasUpdated($user));

        return $user;
    }
}
