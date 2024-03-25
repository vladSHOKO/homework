<?php

namespace Integration;

use Module\Twenty\MailRepository;
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

    public function testGetMessageList()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO messages (id, title, text, sender_id, recipient_id, readed, time)
VALUES ("1", "test", "test", "1", "1", "0", "01/01/01");
SQL
        );
        $repository = new MailRepository($this->getConnection());
        $this->assertEquals(
            [1 => ["id" => 1, "title" => "test", "text" => "test", "sender_id" => 1, "recipient_id" => 1, "readed" => 0, "time" => "01/01/01"]],
            $repository->getMessageList(1)
        );
    }

    public function testGetDataOfCurrentMessage()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO messages (id, title, text, sender_id, recipient_id, readed, time)
VALUES ("1", "test", "test", "1", "1", "0", "01/01/01");
SQL
        );
        $repository = new MailRepository($this->getConnection());
        $this->assertEquals(
            ['id' => 1, 'title' => 'test', 'text' => 'test', 'sender_id' => 1, 'recipient_id' => 1, 'readed' => 0, 'time' => '01/01/01'],
            $repository->getDataOfCurrentMessage(1, 1)
        );
    }

    public function testGetDataOfSender()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO messages (id, title, text, sender_id, recipient_id, readed, time)
VALUES ("1", "test", "test", "1", "1", "0", "01/01/01");
INSERT INTO users (name, surname, father_name, email, phone_number, login, password) 
VALUES ("Иван", "Иванов", "Иванович", "test@mail.ru", "1234567890", "test", "test");
SQL
        );
        $repository = new MailRepository($this->getConnection());
        $this->assertEquals(
            ['name' => 'Иван', 'surname' => 'Иванов', 'email' => 'test@mail.ru'],
            $repository->getDataOfSender($repository->getDataOfCurrentMessage(1, 1))
        );

    }
}
