<?php

namespace Sp\Events\Article;

use Event;
use Sp\Models\Article;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleWasApproved extends Event implements ShouldBroadcast
{
    // use SerializesModels;

    public $article;
    public $user_id;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->user_id = $this->article['user_id'];

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
        return ['user_' . $this->user_id];
    }
}
