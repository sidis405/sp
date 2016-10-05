<?php

namespace Sp\Handlers\Events;

use Sp\Events\Article\NewArticleFromFollowedUser;
use Sp\Models\Article;
use Sp\Utils\Mailer;


class ArticleWasApprovedHandler {

    protected $mailer;

    function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(Article $article)
    {
        // Send Email To User
        $this->sendEmailToAuthor($article);
        // Notify Followers 
        $this->notifyFollowersOfAuthor($article);

    }

    public function sendEmailToAuthor($article)
    {
        $this->mailer->sendMailArticleApproved($article);
    }

    public function notifyFollowersOfAuthor($article)
    {
        $user = $article->user()->get(); 


        $followers = $user[0]->followers()->get();

        if(count($followers) > 0)
        {
            foreach ($followers as $follower) {
                event(new NewArticleFromFollowedUser($follower->id, $article));
            }
        }
        
    }

}