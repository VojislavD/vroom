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

        return $this;
    }

    public function string($name)
    {
        $this->columns[] = "$name VARCHAR(255) NOT NULL";

        return $this;
    }

    public function tinyInt($name)
    {
        $this->columns[] = "$name TINYINT NOT NULL";

        return $this;
    }

    public function timestamp($name)
    {
        $this->columns[] = "$name TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";

        return $this;
    }

    public function timestamps()
    {
        $this->columns[] = "created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->columns[] = "updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";

        return $this;
    }

    public function nullable()
    {
        $column = end($this->columns);

        $column = str_replace('NOT NULL', '', $column);

        $elements = count($this->columns);

        $this->columns[$elements - 1] = $column;

        return $this;
    }
}