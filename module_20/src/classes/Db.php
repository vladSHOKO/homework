<?php

namespace Module\Twenty;

use PDO;

class Db
{
    private static string $hostname = '127.0.0.1';
    private static string $username = 'user';
    private static string $password = 'Faraonkill1';
    private static string $dbname = 'authorization';

    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$hostname, self::$dbname),
                self::$username,
                self::$password
            );
        }
        return self::$connection;
    }
}
