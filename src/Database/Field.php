<?php

namespace Vroom\Database;

class Field
{
    private array $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;

        $this->resolveColumns();
    }

    private function resolveColumns()
    {
        $query = '';

        foreach ($this->columns as $name => $values) {
            if (! $this->isValidType($values['type'])) {
                echo "Type is not valid";
                exit();
            }

            $name = $this->getName($name);
            $type = $this->getType($values['type']);
            $nullable = $this->getNullable($values);
            $autoIncrement = $this->getAutoIncrement($values);
            $primaryKey = $this->getPrimaryKey($values);
            $default = $this->getDefault($values);

            $query .= "$name$type$nullable$autoIncrement$primaryKey$default,";
        }

        $query = $this->removeLastComma($query);

        return $query;
    }

    private function isValidType($type)
    {
        return in_array($type, $this->validTypes(), true);
    }

    private function validTypes()
    {
        return [
            'integer',
            'varchar',
            'tinyint',
            'timestamp',
        ];
    }

    private function getName($name)
    {
        return strtolower($name);
    }

    private function getType($type)
    {
        return match ($type) {
            'integer' => ' INT',
            'varchar' => ' VARCHAR(255)',
            'tinyint' => ' TINYINT',
            'timestamp' => ' TIMESTAMP',
            default => $this->invalidType()
        };
    }

    private function invalidType()
    {
        echo "Invalid Type";
        exit();
    }

    private function getNullable($values)
    {
        return isset($values['nullable']) && $values['nullable']
            ? ""
            : " NOT NULL";
    }

    private function getAutoIncrement($values)
    {
        return isset($values['auto_increment']) && $values['auto_increment']
            ? " AUTO_INCREMENT"
            : "";
    }

    private function getPrimaryKey($values)
    {
        return isset($values['primary_key']) && $values['primary_key']
            ? " PRIMARY KEY"
            : "";
    }

    private function getDefault($values)
    {
        return isset($values['default']) && $values['default']
            ? $this->getDefaultValue($values['default'])
            : "";
    }

    private function getDefaultValue($value)
    {
        return match($value) {
            'current_timestamp' => ' DEFAULT CURRENT_TIMESTAMP',
            default => ''
        };
    }

    private function removeLastComma($query)
    {
        $lastChar = substr($query, -1);

        if ($lastChar === ',') {
            return substr($query, 0, -1);
        }

        return $query;
    }

    public function createQuery()
    {
        return $this->resolveColumns();
    }
}
