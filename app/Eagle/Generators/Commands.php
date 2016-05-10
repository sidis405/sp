<?php

namespace App\Eagle\Generators;

use App\Eagle\Nest;
use App\Eagle\Generators\Utils;

class Commands extends Nest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];

    public function makeCommand($entity, $namespace)
    {

        if($entity->commands)
        {

            foreach($this->types as $type){

                $this->stub = $this->getStub('Commands/'.$type.'Command');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Commands/'.$this->entity->name.'/'.$type.Utils::singularize($this->entity->name).'Command.php';
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->stub = $this->replaceInStub('__FIELDSLIST__', $this->makeFieldList(),  $this->stub);
                $this->stub = $this->replaceInStub('__FIELDSLISTSINGLES__', $this->makeFieldListSingles('this'),  $this->stub);
                $this->stub = $this->replaceInStub('__FIELDSLISTPARAMS__', $this->makeFieldListParams('public'),  $this->stub);
                $this->writeFile(true);
                $this->bag('Created ' .$type. ' Command for : ' .$entity->name);
                

            }
        }

    }

}