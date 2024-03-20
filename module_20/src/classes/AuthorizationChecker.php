<?php

namespace Module\Twenty;

use PDO;

class AuthorizationChecker
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

}