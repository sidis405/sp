<?php

namespace Sp\Handlers\Commands;

use Sp\Commands\CreateTestCommand;
use Sp\Models\Category;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Repositories\CategoryRepo;
use Sp\Events\Category\CategoryWasUpdated;
use Events;


class UpdateCategoryCommandHandler
{
    public $repo;

    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(CategoryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle the command.
     *
     * @param  UpdateCategoryCommand  $command
     * @return void
     */
    public function handle(CreateCategoryCommand $command)
    {
        $category_object = Category::edit(
            $command->id,
            $command->name,
        $command->slug,
        $command->description,
        $command->active
            );

        $category = $this->repo->save($category_object);

        Event::fire(new CategoryWasUpdated($category));

        return $category;
    }
}
