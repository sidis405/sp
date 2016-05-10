<?php

namespace App\Eagle\Generators;

use App\Eagle\Nest;

class AdminControllers extends Nest {

    protected $stub;
    protected $entity;
    protected $namespace;
    protected $path;

    public function makeController($entity, $namespace)
    {

        if($entity->controller && $entity->admin->enabled){
            
                $this->stub = $this->getStub('AdminController');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Http/Controllers/Admin/'.$this->entity->name.'Controller.php';
                $this->setImports();
                $this->setDependencies();
                $this->setFetchers();
                $this->setPersisters();
                $this->setReturns();
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->writeFile(true);
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
            $inject = '__MODELNAME__Repo $__MODELINSTANCE_L___repo';
        }else{
            $inject = '__MODELNAME__ $__MODELINSTANCE_L___repo';
        }

        $this->stub = $this->replaceInStub('__INJECT__', $inject,  $this->stub);
    }

    public function setFetchers()
    {
        $fetch_all = '';
        $fetch_one = '';

        if($this->entity->repository)
        {
            $fetch_all = '$__MODELNAME_L__ = $__MODELINSTANCE_L___repo->getAll();';
            $fetch_one = '$__MODELINSTANCE_L__ = $__MODELINSTANCE_L___repo->getById($id);';
        }else{
            $fetch_all = '$__MODELNAME_L__ = __MODELNAME__::all();';
            $fetch_one = '$__MODELINSTANCE_L__ = __MODELNAME__::find();';
        }

        $this->stub = $this->replaceInStub('__FETCHALL__', $fetch_all,  $this->stub);
        $this->stub = $this->replaceInStub('__FETCHONE__', $fetch_one,  $this->stub);
    }

    public function setReturns()
    {
        $return_all = '';
        $return_one = '';
        $return_create = '';
        $return_edit = '';
        $return_store = '';
        $return_update = '';

        if($this->entity->scaffold)
        {
            $return_all = 'return view(\'admin.__MODELNAME_L__.index\', compact(\'__MODELNAME_L__\'));';
            $return_one = 'return view(\'admin.__MODELNAME_L__.show\', compact(\'__MODELINSTANCE_L__\'));';
            $return_create = 'return view(\'admin.__MODELNAME_L__.create\');';
            $return_edit = 'return view(\'admin.__MODELNAME_L__.edit\', compact(\'__MODELINSTANCE_L__\'));';
            $return_store = 'return redirect()->to(\'/admin/__MODELNAME_L__/\' . $__MODELINSTANCE_L__->id .\'/edit\');';
            $return_update = 'return redirect()->to(\'/admin/__MODELNAME_L__/\' . $__MODELINSTANCE_L__->id .\'/edit\');';

        }else{
            $return_all = 'return $__MODELNAME__;'. PHP_EOL;
            $return_one = 'return $__MODELINSTANCE_L__;'. PHP_EOL;
            $return_create = 'return \'Show create form here\';';
            $return_edit = 'return \'Show create form here\';';
            $return_store = 'return $__MODELINSTANCE_L__;'. PHP_EOL;
            $return_update = 'return $__MODELINSTANCE_L__;'. PHP_EOL;
        }

        $this->stub = $this->replaceInStub('__RETURNALL__', $return_all,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNONE__', $return_one,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNCREATE__', $return_create,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNEDIT__', $return_edit,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNSTORE__', $return_store,  $this->stub);
        $this->stub = $this->replaceInStub('__RETURNUPDATE__', $return_update,  $this->stub);
    }

    public function setPersisters()
    {
        $persist_store = '';
        $persist_update = '';

        if($this->entity->commands)
        {
            $persist_store = '$__MODELINSTANCE_L__ = $this->dispatchFrom(\'__NAMESPACE__\Commands\__MODELNAME__\Create__MODELINSTANCE__Command\', $request);';
            $persist_update = '$__MODELINSTANCE_L__ = $this->dispatchFrom(\'__NAMESPACE__\Commands\__MODELNAME__\Create__MODELINSTANCE__Command\', $request);';


        }else{

            $persist_store = '$__MODELINSTANCE_L__ = __MODELNAME__::create($request);';
            $persist_update = '$__MODELINSTANCE_L__ = __MODELNAME__::find($id)>update($request);';

        }

        $this->stub = $this->replaceInStub('__PERSISTSTORE__', $persist_store,  $this->stub);
        $this->stub = $this->replaceInStub('__PERSISTUPDATE__', $persist_update,  $this->stub);
        
    }

}