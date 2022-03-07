<?php

namespace Vroom\Console;

use Vroom\Console\Commands\Help;
use Vroom\Console\Commands\MakeController;
use Vroom\Console\Commands\Migrate;

class Console extends BaseConsole
{
    public string $command;
    public array $argv;

    public function resolve($argv)
    {
        $this->checkIfCommandPassed($argv);

        $this->argv = $argv;
        $this->command = $argv[1];

        if (! $this->commandExists()) {
            $this->log("Command $this->command does not exists.".PHP_EOL);
            exit(1);
        }

        $this->resolveCommand();
        exit(1);
    }

    private function commandExists()
    {
        return in_array($this->command, $this->availableCommands());
    }

    public function resolveCommand()
    {
        return match($this->command) {
            '-h' => new Help(),
            '--help' => new Help(),
            'migrate' => new Migrate(),
            'make:controller' => new MakeController($this->argv),
            default => new Help()
        };
    }
}