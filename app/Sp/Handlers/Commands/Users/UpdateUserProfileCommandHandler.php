<?php

namespace Sp\Handlers\Commands\Users;

use Sp\Commands\Users\UpdateUserProfileCommand;
use App\User;
use Sp\Repositories\UsersRepo;
use Sp\Events\Users\UserProfileWasUpdated;
use Event;
use Sp\Utils\FileUtility;

class UpdateUserProfileCommandHandler
{
    public $repo;
    public $file_utility;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(UsersRepo $repo, FileUtility $file_utility)
    {
        $this->repo = $repo;
        $this->file_utility = $file_utility;
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

        $this->uploadImage($user, $command->file);


        Event::fire(new UserProfileWasUpdated($user));

        return $user;
    }

    protected function uploadImage($user, $file)
    {
        if ($file) {
            $image_path = $this->file_utility->putFile($user->id, 'image', $file);

            $user->update(['avatar' => '/media/' . $image_path]);
        }
    }
}
