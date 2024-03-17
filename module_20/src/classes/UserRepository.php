<?php

namespace Module\Twenty;

use PDO;

class UserRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getData(): array
    {
        $request = $this->connection->prepare(
            'select name as Имя, surname as Фамилия, father_name as Отчество, email as Почта, phone_number as Телефон from users where id = :id'
        );
        $request->execute(['id' => $_SESSION['user_id']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    private function findUsersForLogin(): array
    {
        $request = $this->connection->prepare(
            'select id, login, password from users where login = :login'
        );
        $request->execute(['login' => $_POST['login']]);
        $result = $request->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        } else {
            return $result;
        }
    }

    private function setDataInSession(array $user, bool $correctPassword): void
    {
        if (!empty($user) && $correctPassword) {
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user['id'];
        }
    }

    private function checkUserPassword(array $user): bool
    {
        return password_verify(
            $_POST['password'],
            $user['password']
        );
    }

    public function validateUser(): void
    {
        $user = $this->findUsersForLogin();
        $this->setDataInSession($user, $this->checkUserPassword($user));
    }
}
