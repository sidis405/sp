<?php

namespace Sp\Handlers\Commands\Article;

use Sp\Commands\Article\UpdateArticleCommand;
use Sp\Models\Article;
use Sp\Models\Tags;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\ArticleRepo;
use Sp\Repositories\TagsRepo;
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
    public function __construct(ArticleRepo $repo, FileUtility $file_utility, TagsRepo $tags_repo)
    {
        $this->repo = $repo;
        $this->file_utility = $file_utility;
        $this->tags_repo = $tags_repo;
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
            $command->category_id,
            $command->ads
            );

        $article = $this->repo->save($article_object);

        // dd($command->file);

        $this->uploadImage($article, $command->file);
        $this->syncTags($article, $command->tags);

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


    protected function syncTags($article, $tags){
        // dd($tags);
        if(count($tags) > 0)
        {
            $out = [];

            foreach ($tags as $tag) {
               
                $out[] = $this->getTagId($tag);

            } 

            $article->tags()->sync($out);           
        }

    }

    protected function getTagId($tag)
    {
        $in_db = $this->tags_repo->getByTag($tag);

        if($in_db) return $in_db->id;

        $new_tag = new Tags;
        $new_tag->tag = $tag;
        $new_tag->save();

        return $new_tag->id;
    }
}
