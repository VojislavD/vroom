<?php

namespace Vroom\Console;

use Vroom\Console\Commands\Help;

class BaseConsole
{
    protected function availableCommands()
    {
        return [
            '-h',
            '--help',
            'migrate',
            'make:controller',
        ];
    }

    protected function log($message)
    {
        echo $message.PHP_EOL;
    }

    protected function checkIfCommandPassed($argv)
    {
        if (!isset($argv[1])) {
            new Help();
            exit(1);
        }
    }

    protected function getStub($name)
    {
        $stub = __DIR__."/Commands/Stubs/$name.stub";

        if (! file_exists($stub)) {
            $this->log("Error");
            exit(1);
        }

        return file_get_contents($stub);
    }
}