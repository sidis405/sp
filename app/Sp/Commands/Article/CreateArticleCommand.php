<?php

namespace Sp\Commands;

use Sp\Commands\Command;

class CreateArticleCommand extends Command
{

      public $title;
      public $slug;
      public $description;
      public $body;
      public $featured_photo_id;
      public $active;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($title, $slug, $description, $body, $featured_photo_id, $active)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->description = $description;
        $this->body = $body;
        $this->featured_photo_id = $featured_photo_id;
    $this->active = $active;
    }
}
