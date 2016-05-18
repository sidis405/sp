<?php

namespace Sp\Handlers\Commands\Article;

use Sp\Commands\CreateArticleCommand;
use Sp\Models\Article;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\ArticleRepo;
use Sp\Events\Article\ArticleWasCreated;
use Events;


class CreateArticleCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(ArticleRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  CreateArticleCommand  $command
     * @return void
     */
    public function handle(CreateArticleCommand $command)
    {
        $article_object = Article::make(
            $command->title,
        $command->slug,
        $command->description,
        $command->body,
        $command->featured_photo_id,
        $command->active
            );

        $article = $this->repo->save($article_object);

        Event::fire(new ArticleWasCreated($article));

        return $article;

    }
}
