<?php

namespace Integration;

use Module\Twenty\Tests\Integration\DbTestCase;
use Module\Twenty\UserRepository;

class DbTest extends DbTestCase
{
    public function testConnection()
    {
        $this->assertNotNull($this->getConnection());
    }

    public function testGetUserFromDb()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO users (name, surname, father_name, email, phone_number, login, password) 
VALUES ("Иван", "Иванов", "Иванович", "test@mail.ru", "1234567890", "test", "test");
SQL
        );
        $repository = new UserRepository($this->getConnection());
        $this->assertEquals(
            ['Имя' => 'Иван', 'Фамилия' => 'Иванов', 'Отчество' => 'Иванович', 'Почта' => 'test@mail.ru', 'Телефон' => '1234567890'],
            $repository->getData(1)
        );
    }


}
