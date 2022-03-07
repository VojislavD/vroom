<?php

namespace Vroom\Database\Traits;

trait SQLCommands
{
    public static string $table = 'migrations';

    public static function createMigrationsTable()
    {
        return "CREATE TABLE IF NOT EXISTS " . self::$table . "(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
    }

    public static function selectMigrationFromMigrationsTable()
    {
        return "SELECT migration FROM ".self::$table;
    }

    public static function insertNewMigration($value)
    {
        return "INSERT INTO " . self::$table . " (migration) VALUE $value";
    }
}