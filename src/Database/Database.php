<?php

namespace Vroom\Database;

use PDOException;
use Vroom\Application;
use Vroom\Database\Traits\SQLCommands;

class Database
{
    use SQLCommands;

    private \PDO $pdo;
    private string|null $host;
    private string|null $port;
    private string|null $database;
    private string|null $username;
    private string|null $password;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->getCredentials();

        try {
            $this->pdo = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->username, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    private function getCredentials()
    {
        $mysql = config('database.connections.mysql');

        $this->host = $mysql['host'];
        $this->port = $mysql['port'];
        $this->database = $mysql['database'];
        $this->username = $mysql['username'];
        $this->password = $mysql['password'];
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(base_path().'./database/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            if ($this->notFile($migration)) {
                continue;
            }

            require_once base_path().'/database/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $instance->up();
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        }
    }

    private function createMigrationsTable()
    {
        $this->pdo->exec(SQLCommands::createMigrationsTable());
    }

    private function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare(SQLCommands::selectMigrationFromMigrationsTable());
		$statement->execute();

		return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    private function notFile($migration)
    {
        if($migration === '.' || $migration === '..') {
            return true;
        }

        return false;
    }

    private function saveMigrations(array $migrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));
        
        $statement = $this->pdo->prepare(SQLCommands::insertNewMigration($str));

        $statement->execute();
    }

    public function run($sql)
    {
        $this->pdo->exec($sql);
    }
}