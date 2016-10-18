<?php

namespace Sp\Commands\Topic;

use Sp\Commands\Command;

class CreateTopicCommand extends Command
{
    public $name;
    public $description;
    public $active;
    public $ondate;

    public function __construct($name, $description, $active, $ondate = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->active = $active;
        $this->ondate = $ondate;


    }
}
