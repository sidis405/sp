<?php

namespace Sp\Commands\Article;

use Sp\Commands\Command;

class UpdateArticleCommand extends Command
{

      public $article_id;
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
    public function __construct($article_id, $title, $description, $body, $category_id,  $file, $active = null)
    {
        $this->article_id = $article_id;
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->category_id = $category_id;
        $this->file = $file;
        $this->active = $active;
    }
}
