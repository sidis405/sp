<?php

namespace APP\Eagle\Generators;

use App\Eagle\Nest;
use App\Eagle\Generators\Presenters;
use Exception;

class Models extends Nest{

    protected $namespace;
    protected $entity;
    protected $stub;
    protected $path;

    public function makeModel($entity, $namespace)
    {
        $this->namespace = $namespace;
        $this->entity = $entity;
        $this->stub = $this->getStub('Model');
        $this->path = base_path().'/app/'.$this->namespace.'/Models/'.$this->entity->name.'.php';

        $this->setModelName($this->entity->name,  $this->stub);

        $this->setRelationships();

        $this->setNameSpace();

        $this->setImports();
        $this->setFactory();

        
        $this->writeFile(true);

        return $this->stub;

    }

    public function setRelationships()
    {
        $relations = '';
        
        foreach($this->entity->relationships as $rel)
        {
            $relations .= 'public function ' . strtolower($rel->model) . '(){' .PHP_EOL.PHP_EOL;
            $relations .= '        return $this->' . $rel->type . '(\'__NAMESPACE__\Models\\' . $rel->model. '\', \'' . $rel->key1 . '\');' . PHP_EOL.PHP_EOL;
            $relations .= '    }' . PHP_EOL.PHP_EOL.PHP_EOL;

            $this->stub = $this->replaceInStub('__RELATIONSHIPS__', $relations,  $this->stub);
        }

    }


    public function setFactory()
    {
        if($this->entity->commands){
            $factory = $this->getStub('Factory');
        }else{
            $factory = '';
        }

        $this->bag('Created factory for: ' .$this->entity->name);

        $this->stub = $this->replaceInStub('__FACTORY__', $factory,  $this->stub);
        $this->stub = $this->replaceInStub('__FIELDSLIST__', $this->makeFieldList(),  $this->stub);
        $this->stub = $this->replaceInStub('__FIELDSCOMPACT__', $this->makeFieldListCompact(),  $this->stub);
        $this->stub = $this->replaceInStub('__FIELDSLISTSINGLES__', $this->makeFieldListSingles(),  $this->stub);
    }

    public function makeFieldList()
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = $pieces[0];
        }

        return '$'.join(', $', $fields);
    }

    public function makeFieldListCompact()
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = $pieces[0];
        }

        return '\''.join("', '", $fields).'\'';
    }

    public function makeFieldListSingles($item_name = 'item')
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = '$'.$item_name .'->'. $pieces[0] . ' = $' . $pieces[0] .';';
        }

        return join($fields, PHP_EOL.'        ');
    }

    

    public function setImports()
    {
        $imports = [];
        $traits = [];
        $implements = '';
        $presenter = '';

        list($imports, $traits, $presenter) = $this->setPresenterImports($imports, $traits, $presenter);
        list($imports, $traits, $implements) = $this->setMediaImports($imports, $traits, $implements);

        $this->stub = $this->replaceInStub('__IMPORTS__', join('',$imports),  $this->stub);
        $this->stub = $this->replaceInStub('__IMPLEMENTS__', $implements,  $this->stub);
        $this->stub = $this->replaceInStub('__PRESENTER__', $presenter,  $this->stub);

        $this->stub = $this->replaceInStub('__TRAITS__', join(', ', $traits), $this->stub);


    }


    public function setPresenterImports($imports, $traits, $presenter)
    {
        if($this->entity->presentable){
            $imports[] = 'use Laracasts\Presenter\PresentableTrait;'. PHP_EOL;;

            $traits[] = 'PresentableTrait';

            $eagle_presenter = new Presenters;
            $eagle_presenter->makePresenter($this->entity, $this->namespace);

            $presenter = "protected \$presenter = '" .$this->namespace. "\Presenters\\" . $this->entity->name . "Presenter';";
        }else{
            $presenter = '';
        }

        $this->bag('Handled model presenter for: ' .$this->entity->name);

        return [$imports, $traits, $presenter];
    }

    public function setMediaImports($imports, $traits, $implements)
    {
        if($this->entity->media){
            $imports[] = 'use Spatie\MediaLibrary\HasMedia\HasMediaTrait;'. PHP_EOL;
            $imports[] = 'use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;'. PHP_EOL;

            $traits[] = 'HasMediaTrait';

            $implements = 'implements HasMedia';
        }else{
            $implements = '';
        }

        $this->bag('Handled model media for: ' .$this->entity->name);

        return [$imports, $traits, $implements];
    }

   

}

