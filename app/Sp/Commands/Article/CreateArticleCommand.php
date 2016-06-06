<?php

namespace Sp\Commands\Article;

use Sp\Commands\Command;

class CreateArticleCommand extends Command
{

      public $title;
      public $slug;
      public $description;
      public $body;
      public $category_id;
      public $file;
      public $active;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($title, $description, $body, $category_id,  $file, $active = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->category_id = $category_id;
        $this->file = $file;
        $this->active = $active;
    }
}
