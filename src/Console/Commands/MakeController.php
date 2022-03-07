<?php

namespace Vroom\Console\Commands;

use Vroom\Console\BaseConsole;

class MakeController extends BaseConsole
{
    public string $command = 'make:controller';

    public string $description = 'Create new controller';

    public string $controllerName;

    public function __construct(array $argv)
    {
        if (! $this->issetName($argv)) {
            $this->log('Please insert name of the controller');
            exit(1);
        }

        $this->controllerName = $argv[2];

        $this->createController();

        exit(1);
    }

    private function issetName(array $argv)
    {
       return isset($argv[2]); 
    }

    private function createController()
    {
        $stub = $this->getStub('controller');
        
        $newController = $this->populateStub($stub);

        $this->createNewController($newController);
    }

    private function populateStub($stub)
    {
        return str_replace('{{ $class }}', $this->controllerName, $stub);
    }

    private function createNewController($newController)
    {
        if ($this->alreadyExists($newController)) {
            $this->log('Controller with that name already exists');
            exit(1);
        }

        $newFile = fopen(base_path().'/app/Http/Controllers/'.$this->controllerName.'.php', 'w');
        fwrite($newFile, $newController);
        fclose($newFile);

        $this->log("Created Controller App\Http\Controllers\\$this->controllerName.php");
    }

    private function alreadyExists($newController)
    {
        return file_exists(base_path()."/app/Http/Controllers/$this->controllerName.php");
    }
}