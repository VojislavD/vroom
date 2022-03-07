<?php

namespace Vroom\Database;

class Schema
{
    public static function create(string $table, $callable)
    {
        $blueprint = new Blueprint();
        $callable($blueprint);

        $params = $blueprint->createQuery();

        $sql = "CREATE TABLE $table ($params) ENGINE=INNODB;";

        self::execute($sql);
    }

    public static function dropTable(string $table)
    {
        $sql = "DROP TABLE $table";

        self::execute($sql);
    }

    private static function execute(string $sql)
    {
        $db = new Database();
        $db->pdo->exec($sql);
    }
}
