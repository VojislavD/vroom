<?php

namespace Vroom\Console;

use Vroom\Console\Commands\Migrate;

class Console
{
    public string $command;

    public function resolve($argv)
    {
        $this->command = $argv[1];

        if (! $this->commandExists()) {
            $this->log("Command $this->command does not exists.".PHP_EOL);
            exit();
        }

        $this->resolveCommand();

    }

    private function commandExists()
    {
        return in_array($this->command, $this->availableCommands());
    }

    private function availableCommands()
    {
        return [
            'migrate'
        ];
    }

    public function resolveCommand()
    {
        return match($this->command) {
            'migrate' => new Migrate(),
            default => $this->log('Command could not be found.')
        };
    }

    public function log($message)
    {
        echo $message;
    }
}