<?php

namespace Vroom\Console\Commands;

use Vroom\Console\BaseConsole;
use Vroom\Database\Database;

class Migrate extends BaseConsole
{
    public function __construct()
    {
        $db = new Database();
        $db->applyMigrations();
    }
}