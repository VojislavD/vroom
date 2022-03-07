<?php

namespace Vroom\Console\Commands;

use Vroom\Application;
use Vroom\Database\Database;

class Migrate
{
    public function __construct()
    {
        $db = new Database();
        $db->applyMigrations();
    }
}