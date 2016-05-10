<?php

namespace App\Eagle\Generators;
use App\Eagle\Nest;
use App\Eagle\Generators\Utils;

class Events extends Nest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];

    public function makeEvent($entity, $namespace)
    {

        if($entity->events)
        {

            foreach($this->types as $type){

                $this->type = $type;

                $this->stub = $this->getStub('Event');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Events/'.$this->entity->name.'/'.Utils::singularize($this->entity->name).'Was'.$type.'d.php';
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->setEventType();
                $this->writeFile(true);
                $this->bag('Created ' .$type. ' Event for : ' .$entity->name);
                

            }
        }

    }

}