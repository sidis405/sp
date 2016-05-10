<?php

namespace App\Eagle\Generators;
use App\Eagle\Nest;
use App\Eagle\Utils;

class Routes extends Nest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;

    public function makeRoutes($entity, $namespace)
    {

        $this->entity = $entity;
        $this->namespace = $namespace;

        if($entity->routes && $this->setupFile())
        {



                
                $this->path = base_path().'/app/'.$this->namespace.'/Http/routes.php';

                $routes = file_get_contents(base_path().'/app/'.$this->namespace.'/Http/routes.php');
                $routes .= 'Route::get(\'__MODELNAME_L__\', \'__MODELNAME__Controller@index\');'.PHP_EOL; 
                $routes .= 'Route::get(\'__MODELNAME_L__/{id}\', \'__MODELNAME__Controller@show\');'.PHP_EOL.PHP_EOL; 

                if($this->entity->admin->enabled)
                {
                    $routes .= "Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function () {".PHP_EOL.PHP_EOL; 
                    $routes .= '    Route::resource(\'__MODELNAME_L__\', \'__MODELNAME__Controller\');'.PHP_EOL.PHP_EOL; 
                    $routes .= '}'.PHP_EOL; 
                }

                $this->stub = $routes;

                $this->setNamespace();
                $this->setModelName();
                $this->writeFile(true);
                $this->bag('Wrote route file for : ' .$entity->name);
                

        }

    }

    public function setupFile()
    {
        $filepath = base_path().'/app/'.$this->namespace.'/Http/routes.php';


        if(! file_exists($filepath))
        {
            $this->stub = $this->getStub('routes');
            $this->path = $filepath;
            $this->writeFile(true);
        }

        return false;

    }

}