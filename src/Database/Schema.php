<?php

namespace Vroom\Database;

class Schema
{
    public static function create($table, $query)
    {
        $sql = "CREATE TABLE $table ($query) ENGINE=INNODB;";

        self::execute($sql);
    }

    public static function dropTable($table)
    {
        $sql = "DROP TABLE $table";

        self::execute($sql);
    }

    private static function execute($sql)
    {
        $db = new Database();
        $db->pdo->exec($sql);
    }
}