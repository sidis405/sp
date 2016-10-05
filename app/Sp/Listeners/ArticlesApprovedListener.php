<?php

namespace Sp\Listeners;

use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Sp\Events\Article\ArticleWasApproved;
use Sp\Handlers\Events\ArticleWasApprovedHandler;
use Sp\Models\Article;

class ArticlesApprovedListener
{

    public $approveHandler;

    function __construct(ArticleWasApprovedHandler $approveHandler) {
        $this->approveHandler = $approveHandler;
    }
    /**
     * Handle external user creation
     */
    public function onArticleApprove(ArticleWasApproved $article) {


        $this->approveHandler->handle($article->article);
    }



    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            ArticleWasApproved::class,
            'Sp\Listeners\ArticlesApprovedListener@onArticleApprove'
        );

    }

}
