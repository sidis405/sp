<?php

namespace Sp\Handlers\Commands;

use Sp\Commands\CreateTestCommand;
use Sp\Models\Article;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\ArticleRepo;
use Sp\Events\Article\ArticleWasUpdated;
use Events;


class UpdateArticleCommandHandler
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
     * @param  UpdateArticleCommand  $command
     * @return void
     */
    public function handle(CreateArticleCommand $command)
    {
        $article_object = Article::edit(
            $command->id,
            $command->title,
        $command->slug,
        $command->description,
        $command->body,
        $command->featured_photo_id,
        $command->active
            );

        $article = $this->repo->save($article_object);

        Event::fire(new ArticleWasUpdated($article));

        return $article;
    }
}
