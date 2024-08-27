<?php

namespace Module\Twenty\Tests\Integration;

use PDO;
use PHPUnit\Framework\TestCase;

class DbTestCase extends TestCase
{
    private static string $hostname = '127.0.0.1';
    private static string $username = 'user';
    private static string $password = 'password';
    private static string $dbname = 'authorization-test';

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

    protected function setUp(): void
    {
        $this->getConnection()->exec('DROP TABLE IF EXISTS users');
        $this->getConnection()->exec(
            'CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            surname VARCHAR(255) NOT NULL,
            father_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone_number VARCHAR(255) NOT NULL,
            login VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )'
        );
        $this->getConnection()->exec('DROP TABLE IF EXISTS messages');
        $this->getConnection()->exec(
            'CREATE TABLE messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            text TEXT NOT NULL,
            sender_id INT NOT NULL,
            recipient_id INT NOT NULL,
            readed TINYINT NOT NULL DEFAULT 0,
            time VARCHAR(255) NOT NULL
        )'
        );
    }
}
