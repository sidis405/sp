<?php

namespace Sp\Handlers\Commands\Category;

use Event;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Commands\Category\UpdateCategoryCommand;
use Sp\Events\Category\CategoryWasUpdated;
use Sp\Models\Category;
use Sp\Repositories\CategoryRepo;


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
    public function handle(UpdateCategoryCommand $command)
    {
        $category_object = Category::edit(
            $command->category_id,
            $command->name,
            $command->description,
            $command->payoff,
            $command->active
        );

        $category = $this->repo->save($category_object);

        Event::fire(new CategoryWasUpdated($category));

        return $category;
    }
}
