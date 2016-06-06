<?php

namespace Sp\Listeners;

use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Sp\Events\Article\ArticleWasVisited;
use Sp\Handlers\Events\ArticleWasVisitedHandler;
use Sp\Models\Article;

class ArticlesVisitListener
{

    public $viewHandler;

    function __construct(ArticleWasVisitedHandler $viewHandler) {
        $this->viewHandler = $viewHandler;
    }
    /**
     * Handle external user creation
     */
    public function onArticleView(Article $article) {

        $this->viewHandler->handle($article);
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
            ArticleWasVisited::class,
            'Sp\Listeners\ArticlesVisitListener@onArticleView'
        );

    }

}
