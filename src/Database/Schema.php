<?php

namespace Vroom\Database;

class Schema
{
    public static function create(string $table, array $columns)
    {
        $field = new Field($columns);
        $params = $field->createQuery();

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
