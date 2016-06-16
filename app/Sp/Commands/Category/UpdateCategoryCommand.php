<?php

namespace Sp\Commands\Category;

use Sp\Commands\Command;

class UpdateCategoryCommand extends Command
{

    public $category_id;
    public $name;
    public $description;
    public $payoff;
    public $active;

    /**
     * Update a command instance.
     *
     * @return void
     */
    public function __construct($category_id, $name,  $payoff, $description, $active = 1)
    {
        $this->category_id = $category_id;
        $this->name = $name;
        $this->description = $description;
        $this->payoff = $payoff;
        $this->active = $active;
    }
}
