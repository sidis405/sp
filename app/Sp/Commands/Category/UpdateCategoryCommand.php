<?php

namespace Sp\Commands;

use Sp\Commands\Command;

class UpdateCategoryCommand extends Command
{

    public $name;
      public $slug;
      public $description;
      public $active;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($name, $slug, $description, $active)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->active = $active;
    }
}
