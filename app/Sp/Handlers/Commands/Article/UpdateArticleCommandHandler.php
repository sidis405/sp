<?php

namespace Sp\Handlers\Commands\Article;

use Sp\Commands\Article\UpdateArticleCommand;
use Sp\Models\Article;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\ArticleRepo;
use Sp\Events\Article\ArticleWasUpdated;
use Event;
use Sp\Utils\FileUtility;


class UpdateArticleCommandHandler
{
    public $repo;
    public $file_utility;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(ArticleRepo $repo, FileUtility $file_utility)
    {
        $this->repo = $repo;
        $this->file_utility = $file_utility;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateArticleCommand  $command
     * @return void
     */
    public function handle(UpdateArticleCommand $command)
    {
        $article_object = Article::edit(
            $command->article_id,
            $command->title,
            $command->description,
            $command->body,
            $command->category_id
            );

        $article = $this->repo->save($article_object);

        // dd($command->file);

        $this->uploadImage($article, $command->file);

        Event::fire(new ArticleWasUpdated($article));

        return $article;
    }

    protected function uploadImage($article, $file)
        {
            if($file)
            {
                $image_path = $this->file_utility->putFile($article->id, 'image', $file);
           
                $article->update(['image_path' => $image_path]);
                
            }
        }
}
