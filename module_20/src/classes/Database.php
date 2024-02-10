<?php

namespace Module\Twenty;

use PDO;

class Database
{
    public $hostname;
    public $username;
    public $password;
    public $dbname;

    public function __construct($hostname, $username, $password, $dbname)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function databaseConnect(): object
    {
        return new PDO(
            "mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8",
            $this->username,
            $this->password
        );
    }
}