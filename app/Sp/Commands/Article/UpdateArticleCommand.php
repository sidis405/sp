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
      public $tags;
      public $file;
      public $active;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($article_id, $title, $description, $body, $category_id, $tags = [], $file,  $active = null, $ads = null)
    {
        $this->article_id = $article_id;
        $this->title = $title;
        $this->description = $description;
        $this->body = $body;
        $this->category_id = $category_id;
        $this->tags = $tags;
        $this->file = $file;
        $this->active = $active;
        $this->ads = $ads;
    }
}
