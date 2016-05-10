<?php

namespace App\Eagle;

use App\Eagle\Nest;
use Exception;
use Symfony\Component\Yaml\Yaml;


class Eagle extends Nest{

    protected $application_filename = 'application.yml';
    public $config;
    public $namespace;

    public function __construct()
    {
        \Session::flush();
        $this->config = $this->getConfig();
        $this->namespace = $this->config->application;
        $this->models = new Generators\Models;
        $this->repos = new Generators\Repos;
        $this->commands = new Generators\Commands;
        $this->handlers = new Generators\CommandHandlers;
        $this->events = new Generators\Events;
        $this->controllers = new Generators\Controllers;
        $this->admin_controllers = new Generators\AdminControllers;
        $this->routes = new Generators\Routes;
    }

    public function getConfig()
    {
        $application_file = base_path().'/' . $this->application_filename;

        $config = @file_get_contents($application_file) ;

        if( ! $config){

            throw new Exception('cannot find ' .base_path() .'/application.yml');

        }

        $data = json_decode(json_encode(Yaml::parse($config)));

        return $data;
    }

    public function build()
    {
        if($this->config->processed) return 'Application has already been built. Set processed:true to re-build again.';


       $this->handleAppDir();
       $this->installDependencies();
       $this->handleEntities();

       $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

       $this->bag('Wrote ' . \Session::get('fileCount') .' files in ' . $time . ' seconds.');

       return \Session::get('current_stream');;
    }

    public function handleAppDir()
    {
        $this->bag('Namespace of app has been set to: ' . $this->namespace);
        $this->bag('Will create dir app/' . $this->config->application);
        $this->bag('Add to composer.json "'.$this->namespace.'\\\":"'.$this->config->psr4.'"');

    }

    public function installDependencies()
    {
        $deps = [];
        foreach($this->config->dependencies as $dep){
            if($dep->enabled){
                $deps[] = $dep->repo;
            }
        }

        $this->bag('will run "composer require ' .join(' ', $deps).'"');

    }

    function handleEntities()
    {

        foreach($this->config->entities as $entity)
        {
            if( $entity->processed )
            {
                $this->bag('Entity "'.$entity->name.'" has alredy been processed. Skipping.');
            }else{
                $this->processEntity($entity);
            }
        }

    }

    public function processEntity($entity)
    {
        $this->bag('Processing entity "' . $entity->name . '"');
        $this->models->makeModel($entity, $this->namespace);
        $this->repos->makeRepo($entity, $this->namespace);
        $this->commands->makeCommand($entity, $this->namespace);
        $this->handlers->makeHandler($entity, $this->namespace);
        $this->events->makeEvent($entity, $this->namespace);
        $this->controllers->makeController($entity, $this->namespace);
        $this->admin_controllers->makeController($entity, $this->namespace);
        $this->routes->makeRoutes($entity, $this->namespace);

    }



    
    
    // public function makeScaffold($entity)
    // {
        
    // }
    // 
    // // public function makeAdminScaffold($entity)
    // {
        
    // }
    // 
}

