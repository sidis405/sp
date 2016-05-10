<?php

namespace App\Eagle\Generators;

use App\Eagle\Nest;

class Controllers extends Nest {

    protected $stub;
    protected $entity;
    protected $namespace;
    protected $path;

    public function makeController($entity, $namespace)
    {

        if($entity->controller){
            
                $this->stub = $this->getStub('Controller');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Http/Controllers/'.$this->entity->name.'Controller.php';
                $this->setImports();
                $this->setDependencies();
                $this->setFetchers();
                $this->setReturns();
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance(true);
                $this->writeFile(true);
                $this->bag('Created Controller for : ' .$this->entity->name);
        }
    }

     public function setImports()
    {
        $imports = [];

        if($this->entity->repository)
        {
            $imports[] = 'use __NAMESPACE__\Repositories\__MODELNAME__Repo;'. PHP_EOL;
        }else{
            $imports[] = 'use __NAMESPACE__\Models\__MODELNAME__;'. PHP_EOL;
        }

        $this->stub = $this->replaceInStub('__IMPORTS__', join('', $imports),  $this->stub);

    }

    public function setDependencies()
    {
        $inject = '';

        if($this->entity->repository)
        {
            $inject .= '__MODELNAME__Repo $__MODELINSTANCE_L___repo';
        }else{
            $inject .= '__MODELNAME__ $__MODELINSTANCE_L___repo';
        }

        $this->stub = $this->replaceInStub('__INJECT__', $inject,  $this->stub);
    }

    public function setFetchers()
    {
        $fetch_all = '';
        $fetch_one = '';

        if($this->entity->repository)
        {
            $fetch_all .= '$__MODELNAME_L__ = $__MODELINSTANCE_L___repo->getAll();';
            $fetch_one .= '$__MODELINSTANCE_L__ = $__MODELINSTANCE_L___repo->getById($id);';
        }else{
            $fetch_all .= '$__MODELNAME_L__ = __MODELNAME__::all();';
            $fetch_one .= '$__MODELINSTANCE_L__ = __MODELNAME__::find();';
        }

        $this->stub = $this->replaceInStub('__FETCHALL__', $fetch_all,  $this->stub);
        $this->stub = $this->replaceInStub('__FETCHONE__', $fetch_one,  $this->stub);
    }

    public function setReturns()
    {
        $return_all = '';
        $return_one = '';

        if($this->entity->scaffold)
        {
            $return_all .= 'return view(\'__MODELNAME_L__.index\', compact(\'__MODELNAME_L__\'));';
            $return_one .= 'return view(\'__MODELNAME_L__.show\', compact(\'__MODELINSTANCE_L__\'));';
        }else{
            $return_all .= 'return $__MODELNAME__;'. PHP_EOL;
            $return_one .= 'return $__MODELINSTANCE_L__;'. PHP_EOL;
        }

        $this->stub = $this->replaceInStub('__RETURNALL__', $return_all,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNONE__', $return_one,  $this->stub);
    }

}