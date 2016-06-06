<?php

namespace Sp\Handlers\Commands\Article;

use Sp\Commands\Article\CreateArticleCommand;
use Sp\Models\Article;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\ArticleRepo;
use Sp\Events\Article\ArticleWasCreated;
use Event;
use Sp\Utils\FileUtility;

class CreateArticleCommandHandler
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
     * @param  CreateArticleCommand  $command
     * @return void
     */
    public function handle(CreateArticleCommand $command)
    {
        $article_object = Article::make(
            $command->title,
            $command->description,
            $command->body,
            $command->category_id
            );

        $article = $this->repo->save($article_object);

        $this->uploadImage($article, $command->file);

        Event::fire(new ArticleWasCreated($article));

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
