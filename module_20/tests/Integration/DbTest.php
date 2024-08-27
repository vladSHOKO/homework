<?php

namespace Integration;

use Module\Twenty\AuthorizationChecker;
use Module\Twenty\MailRepository;
use Module\Twenty\Tests\Integration\DbTestCase;
use Module\Twenty\UserRepository;
use ReflectionMethod;

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

    public function testUpdateMessageStatus()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO messages (id, title, text, sender_id, recipient_id, readed, time)
VALUES ("1", "test", "test", "1", "1", "0", "01/01/01");
SQL
        );
        $repository = new MailRepository($this->getConnection());
        $repository->updateMessageStatus(1);
        $this->assertEquals(
            ['id' => 1, 'title' => 'test', 'text' => 'test', 'sender_id' => 1, 'recipient_id' => 1, 'readed' => 1, 'time' => '01/01/01'],
            $repository->getDataOfCurrentMessage(1, 1)
        );
    }

    public function testGetListOfRecipients()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO users (name, surname, father_name, email, phone_number, login, password) 
VALUES ("Иван", "Иванов", "Иванович", "test@mail.ru", "1234567890", "test", "test");
SQL
        );
        $list = new MailRepository($this->getConnection());
        $this->assertEquals(
            [0 => ['id' => 1, 'name' => 'Иван', 'surname' => 'Иванов']],
            $list->getListOfRecipients()
        );
    }

    public function testInsertMessage()
    {
        $message = new MailRepository($this->getConnection());
        $message->insertMessage('test', 'test', 1, 1);
        $currentMessage = $message->getDataOfCurrentMessage(1, 1);
        unset($currentMessage['readed'], $currentMessage['time']);
        $this->assertEquals(
            ['id' => 1, 'title' => 'test', 'text' => 'test', 'sender_id' => 1, 'recipient_id' => 1],
            $currentMessage
        );
    }

    private function runInaccesibleMethod($object, string $methodname, array $args = [])
    {
        $method = new ReflectionMethod($object, $methodname);
        $method->setAccessible(true);
        $result = $method->invokeArgs($object, $args);
        $method->setAccessible(false);

        return $result;
    }

    public function testFindUserForLogin()
    {
        $this->getConnection()->exec(
            <<<SQL
INSERT INTO users (name, surname, father_name, email, phone_number, login, password) 
VALUES ("Иван", "Иванов", "Иванович", "test@mail.ru", "1234567890", "test", "test");
SQL
        );
        $user = new AuthorizationChecker($this->getConnection());
        $this->assertEquals(
            ['id' => 1, 'login' => 'test', 'password' => 'test'],
            $this->runInaccesibleMethod($user, 'findUsersForLogin', ['test'])
        );
    }

    public function testCheckUserPassword()
    {
        $currentUser = new AuthorizationChecker($this->getConnection());
        $this->assertTrue($this->runInaccesibleMethod($currentUser, 'checkUserPassword', ['test', ['password' => password_hash('test', PASSWORD_DEFAULT)]]));
    }

    public function testValidateUser()
    {
        $passwordHash = password_hash('test', PASSWORD_DEFAULT);
        $request = $this->getConnection()->prepare(
            <<<SQL
INSERT INTO users (name, surname, father_name, email, phone_number, login, password) 
VALUES (?, ?, ?, ?, ?, ?, ?);
SQL
        );
        $request->execute(["Иван", "Иванов", "Иванович", "test@mail.ru", "1234567890", "test", $passwordHash]);
        $user = new AuthorizationChecker($this->getConnection());
        $this->assertEquals(
            ['id' => 1, 'login' => 'test', 'password' => $passwordHash],
            $user->validateUser('test', 'test')
        );
    }
}
