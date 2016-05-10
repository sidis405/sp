<?php

namespace Sp\Commands;

use Sp\Commands\Command;

class CreateCategoryCommand extends Command
{

        public $name;
        public $description;
        public $active;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($name, $description, $active)
    {
        $this->name = $name;
        $this->description = $description;
        $this->active = $active;
    }
}
