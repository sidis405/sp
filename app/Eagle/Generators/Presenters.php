<?php

namespace App\Eagle\Generators;

use App\Eagle\Nest;

class Presenters extends Nest {

    protected $stub;
    protected $entity;
    protected $namespace;
    protected $path;

    public function makePresenter($entity, $namespace)
    {
        $this->stub = $this->getStub('Presenter');
        $this->entity = $entity;
        $this->namespace = $namespace;
        $this->path = base_path().'/app/'.$this->namespace.'/Presenters/'.$this->entity->name.'Presenter.php';
        $this->setNamespace();
        $this->setModelName();
        $this->writeFile(true);

    }

}