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
      public $social_facebook;
      public $social_google;
      public $social_twitter;
      public $social_website;
      public $description;
      
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($user_id, $name, $surname, $username, $email, $social_facebook, $social_google, $social_twitter, $social_website, $description)
    {
        
      $this->user_id = $user_id;
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->email = $email;
    
      $this->social_facebook = $social_facebook;
      $this->social_google = $social_google;
      $this->social_twitter = $social_twitter;
      $this->social_website = $social_website;
      $this->description = $description;
    }
}
