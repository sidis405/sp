<?php

namespace Sp\Commands\Category;

use Sp\Commands\Command;

class CreateCategoryCommand extends Command
{

        public $name;
        public $description;
        public $payoff;
        public $active;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($name, $description, $payoff, $active = 1)
    {
        $this->name = $name;
        $this->description = $description;
        $this->payoff = $payoff;
        $this->active = $active;
    }
}
