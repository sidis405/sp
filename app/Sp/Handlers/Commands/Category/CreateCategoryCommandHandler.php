<?php

namespace Sp\Handlers\Commands\Category;

use Event;
use Illuminate\Queue\InteractsWithQueue;
use Sp\Commands\Category\CreateCategoryCommand;
use Sp\Events\Category\CategoryWasCreated;
use Sp\Models\Category;
use Sp\Repositories\CategoryRepo;


class CreateCategoryCommandHandler
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
     * @param  CreateCategoryCommand  $command
     * @return void
     */
    public function handle(CreateCategoryCommand $command)
    {
        $category_object = Category::make(
        $command->name,
        $command->description,
        $command->payoff,
        $command->active
            );

        $category = $this->repo->save($category_object);

        Event::fire(new CategoryWasCreated($category));

        return $category;

    }
}
