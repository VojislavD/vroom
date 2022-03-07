<?php

namespace Vroom\Database;

class Blueprint
{
    private array $columns;

    public function createQuery()
    {
        return implode(", ",$this->columns);
    }

    public function foreignId($name)
    {
        $this->columns[] = "$name INT AUTO_INCREMENT PRIMARY KEY";
    }

    public function string($name)
    {
        $this->columns[] = "$name VARCHAR(255) NOT NULL";
    }

    public function tinyInt($name)
    {
        $this->columns[] = "$name TINYINT NOT NULL";
    }

    public function timestamp($name)
    {
        $this->columns[] = "$name TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
    }
}