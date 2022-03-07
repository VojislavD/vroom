<?php

namespace Vroom\Database;

use PDOException;

class Database
{
    private \PDO $pdo;
    private string|null $host;
    private string|null $port;
    private string|null $database;
    private string|null $username;
    private string|null $password;

    public function __construct()
    {
        $this->getCredentials();
        $this->connect();
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

    private function connect()
    {
        try {
            $this->pdo = new \PDO("mysql:host=$this->host;port=$this->port;dbname=$this->database", $this->username, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}