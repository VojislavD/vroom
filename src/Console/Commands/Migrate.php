<?php

namespace Vroom\Console\Commands;

use Vroom\Console\BaseConsole;
use Vroom\Database\Database;

class Migrate extends BaseConsole
{
    public string $command = 'migrate';

    public string $description = 'Run migration';
    
    public function __construct()
    {
        $db = new Database();
        $db->applyMigrations();
    }
}