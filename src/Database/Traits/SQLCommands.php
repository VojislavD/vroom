<?php

namespace Vroom\Database\Traits;

trait SQLCommands
{
    public static function createMigrationsTable()
    {
        return "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
    }

    public static function selectMigrationFromMigrationsTable()
    {
        return "SELECT migration FROM migrations";
    }

    public static function insertNewMigration($value)
    {
        return "INSERT INTO migrations (migration) VALUE $value";
    }
}