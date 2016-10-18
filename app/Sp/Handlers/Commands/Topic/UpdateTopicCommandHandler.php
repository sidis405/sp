<?php

namespace Sp\Handlers\Commands\Topic;

use Sp\Commands\Topic\UpdateTopicCommand;
use Sp\Models\Topics;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\TopicsRepo;
use Sp\Events\Topic\TopicWasUpdated;
use Event;


class UpdateTopicCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(TopicsRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateTopicCommand  $command
     * @return void
     */
    public function handle(UpdateTopicCommand $command)
    {
        if(strlen($command->ondate) != 10){
            $date = date('Y-m-d');
        }else{
            $date = date('Y-m-d', strtotime($command->ondate));
        }
        

        $topic_object = Topics::edit(
            $command->topic_id,
            $command->name,
            $command->description,
            $command->active,
            $date
            );

        $topic = $this->repo->save($topic_object);

        Event::fire(new TopicWasUpdated($topic));

        return $topic;
    }

}
