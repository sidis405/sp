<?php

namespace Sp\Handlers\Commands\Topic;

use Sp\Commands\Topic\CreateTopicCommand;
use Sp\Models\Topics;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\TopicsRepo;
use Sp\Events\Topic\TopicWasCreated;
use Event;

class CreateTopicCommandHandler
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
     * @param  CreateTopicCommand  $command
     * @return void
     */
    public function handle(CreateTopicCommand $command)
    {

        if(strlen($command->ondate) != 10){
            $date = date('Y-m-d');
        }else{
            $date = date('Y-m-d', strtotime($command->ondate));
        }
        $topic_object = Topics::make(
            $command->name,
            $command->description,
            $command->active,
            $date,
            \Auth::user()->id
            );

        $topic = $this->repo->save($topic_object);

        Event::fire(new TopicWasCreated($topic));

        return $topic;

    }

}
