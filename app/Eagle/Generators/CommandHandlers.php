<?php

namespace App\Eagle\Generators;
use App\Eagle\Nest;
use App\Eagle\Generators\Utils;


class CommandHandlers extends Nest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];
    protected $construct;
    protected $persister;
    protected $eventable;
    protected $tyoe;

    public function makeHandler($entity, $namespace)
    {

        if($entity->commands)
        {
            $this->setupCommandSystem();
            $this->bag('ADD : App\Providers\BusServiceProvider::class to config/app.php');

            foreach($this->types as $type){

                $this->construct = '';
                $this->construct = '';
                $this->eventable = '';
                $this->type = $type;

                $this->stub = $this->getStub('Commands/'.$this->type.'CommandHandler');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Handlers/Commands/'.$this->entity->name.'/'.$this->type.Utils::singularize($this->entity->name).'CommandHandler.php';
                $this->setImports();
                $this->setConstructor();
                $this->setEventable();
                $this->setPersister();
                $this->stub = $this->replaceInStub('__FIELDSLISFROMCOMMAND__', $this->makeFieldListSinglesFromCommand('command'),  $this->stub);
                $this->setModelName();
                $this->setModelInstance();
                $this->setNameSpace();
                $this->writeFile(true);
                $this->bag('Created ' .$this->type. ' Handler for : ' .$entity->name);


            }
        }

    }

    public function setImports()
    {
        $imports = [];

        if($this->entity->repository)
        {
            $imports[] = 'use __NAMESPACE__\Repositories\__MODELNAME__Repo;'. PHP_EOL;
        }

        if($this->entity->events)
        {
            $imports[] = "use __NAMESPACE__\Events\__MODELNAME__\__MODELINSTANCE__Was{$this->type}d;". PHP_EOL;
            $imports[] = "use Events;". PHP_EOL;
        }

        $this->stub = $this->replaceInStub('__IMPORTS__', join('', $imports),  $this->stub);

    }

    public function setConstructor()
    {
        $stub = [];

        if($this->entity->repository)
        {   
            $stub = $this->getStub('Commands/CommandHandlerConstructorWithRepo');
        } else {
            $stub = $this->getStub('Commands/CommandHandlerConstructor');
        }

        $this->stub = $this->replaceInStub('__CONSTRUCT__', $stub,  $this->stub);

    }

    public function setEventable()
    {
        $eventable = [];

        if($this->entity->events)
        {   
            $eventable = "Event::fire(new __MODELINSTANCE__Was".$this->type."d(\$__MODELINSTANCE_L__));";
        } else {
            $eventable = '';
        }

        $this->stub = $this->replaceInStub('__EVENTABLE__', $eventable,  $this->stub);

    }

    public function setPersister()
    {
        $persister = [];

        if($this->entity->repository)
        {   
            $eventable = "\$__MODELINSTANCE_L__ = \$this->repo->save(\$__MODELINSTANCE_L___object);";
        } else {
            $eventable = "\$__MODELINSTANCE_L__ = \$__MODELINSTANCE_L___object->save();";
        }

        $this->stub = $this->replaceInStub('__PERSISTING__', $eventable,  $this->stub);

    }

    public function setupCommandSystem()
    {
        $this->makeBaseCommand();
        $this->makeBusServiceProvider();
    }

    public function makeBusServiceProvider()
    {
        $this->stub = $this->getStub('Commands/BaseCommand');

        $this->path = base_path().'/app/'.$this->namespace.'/Commands/Command.php';

        $this->writeFile(true);
    }

    public function makeBaseCommand()
    {
        $this->stub = $this->getStub('Commands/BusServiceProvider');

        $this->path = base_path().'/app/Providers/BusServiceProvider.php';

        $this->setNameSpace();

        $this->writeFile(true);
    }


}