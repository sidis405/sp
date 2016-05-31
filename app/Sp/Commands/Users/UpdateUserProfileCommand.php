<?php

namespace Sp\Commands\Users;

use Sp\Commands\Command;

class UpdateUserProfileCommand extends Command
{

      public $user_id;
      public $name;
      public $surname;
      public $username;
      public $email;
      
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($user_id, $name, $surname, $username, $email)
    {
        
      $this->user_id = $user_id;
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->email = $email;
    
    }
}
