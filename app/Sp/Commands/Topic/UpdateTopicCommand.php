<?php

namespace Sp\Commands\Topic;

use Sp\Commands\Command;

class UpdateTopicCommand extends Command
{
    public $topic_id;
    public $name;
    public $description;
    public $active;
    public $ondate;

    public function __construct($topic_id, $name, $description, $active, $ondate = null)
    {
        $this->topic_id = $topic_id;
        $this->name = $name;
        $this->description = $description;
        $this->active = $active;
        $this->ondate = $ondate;
    }
}
