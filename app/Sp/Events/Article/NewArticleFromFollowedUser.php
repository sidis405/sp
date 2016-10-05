<?php

namespace Sp\Events\Article;

use Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Sp\Models\Article;
use Sp\Repositories\UserNotificationsRepo;


class NewArticleFromFollowedUser extends Event implements ShouldBroadcast
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
    public function __construct($user_id, Article $article)
    {
        $this->article = $article;
        $this->user_id = $user_id;

        $url = $this->makeArticleUrl($this->article);
        $notification_id = UserNotificationsRepo::store($this->user_id, $this->makeNotificationText($url, $article) , 'article-by-followed');


        $this->data = array(
            'command'=> 'notify',
            'url' => $url,
            'type' => 'article-by-followed',
            'notification_id' => $notification_id,
            'user_name' => $this->article->user->name . ' ' . $this->article->user->surname
        );



    }

    public function makeNotificationText($url, $article)
    {
        return "<a href='{$url}' class='notification-link'> {$article->user->name} {$article->user->surname} ha pubblicato un nuovo articolo.</a>";
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
