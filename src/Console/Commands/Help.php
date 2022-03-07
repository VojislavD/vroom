<?php

namespace Vroom\Console\Commands;

use Vroom\Console\BaseConsole;

class Help extends BaseConsole
{
    public function __construct()
    {
        $availableCommands = implode(PHP_EOL, $this->availableCommands());

        $this->log('Available Commands:');
        $this->log($availableCommands);
    }
}