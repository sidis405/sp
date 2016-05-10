<?php

namespace Sp\Commands;

use Sp\Commands\Command;

class UpdateArticleCommand extends Command
{

    public $title;
      public $slug;
      public $description;
      public $body;
      public $featured_photo_id;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($title, $slug, $description, $body, $featured_photo_id)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->description = $description;
        $this->body = $body;
        $this->featured_photo_id = $featured_photo_id;
    }
}
