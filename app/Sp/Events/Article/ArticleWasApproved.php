<?php

namespace Sp\Events\Article;

use Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Sp\Models\Article;
use Sp\Repositories\UserNotificationsRepo;


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

        $url = $this->makeArticleUrl($this->article);
        $notification_id = UserNotificationsRepo::store($article->user_id, $this->makeNotificationText($url, $article) , 'article-approved');


        $this->data = array(
            'command'=> 'notify',
            'url' => $url,
            'type' => 'article-approved',
            'notification_id' => $notification_id
        );



    }

    public function makeNotificationText($url, $article)
    {
        return "<a href='{$url}' class='notification-link'>Il tuo articolo {$article->title} è stato approvato</a>";
    }

    public function makeArticleUrl($article)
    {
        return "/categorie/" . $article->category->slug . "/articolo/" . $article->id . "/" . $article->slug;
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
