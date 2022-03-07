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
            'migrate'
        ];
    }

    protected function log($message)
    {
        echo $message;
    }

    protected function checkIfCommandPassed($argv)
    {
        if (!isset($argv[1])) {
            new Help();
            exit(1);
        }
    }
}