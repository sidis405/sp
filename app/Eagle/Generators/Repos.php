<?php

namespace App\Eagle\Generators;

use App\Eagle\Nest;


class Repos extends Nest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;

    public function makeRepo($entity, $namespace)
    {

        $this->stub = $this->getStub('Repository');
        $this->entity = $entity;

        if($this->entity->repository)
        {
            $this->bag('Created Repository for : ' .$this->entity->name);
            $this->namespace = $namespace;
            $this->path = base_path().'/app/'.$this->namespace.'/Repositories/'.$this->entity->name.'Repo.php';
            $this->setNamespace();
            $this->setRepoSave();
            $this->setModelName();
            $this->setModelInstance(true);
            $this->writeFile(true);
        }

        

    }

    public function setRepoSave()
    {
        if($this->entity->commands){
            $factory = $this->getStub('RepoSave');
        }else{
            $factory = '';
        }

        $this->bag('Handled repo  for : ' .$this->entity->name);

        $this->stub = $this->replaceInStub('__REPOSAVE__', $factory,  $this->stub);
    }

}