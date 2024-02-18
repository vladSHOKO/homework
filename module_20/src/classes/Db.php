<?php

namespace Module\Twenty;

use PDO;

class Db
{
    private string $hostname = '127.0.0.1';
    private string $username = 'user';
    private string $password = 'Faraonkill1';
    private string $dbname = 'authorization';

    private ?PDO $connection = null;

    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            $this->connection = new PDO(
                "mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password
            );
        }
        return $this->connection;
    }
}
