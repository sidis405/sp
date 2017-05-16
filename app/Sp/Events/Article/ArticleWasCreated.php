<?php

namespace Sp\Events\Article;

use Event;
use Sp\Models\Article;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleWasCreated extends Event implements ShouldBroadcast
{
    // use SerializesModels;


    public $article;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->data = array(
            'command'=> 'notify'
        );
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['admin_'];
    }
}
