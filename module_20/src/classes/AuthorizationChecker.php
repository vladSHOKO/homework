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

    private function findUsersForLogin($userLogin): array
    {
        $request = $this->connection->prepare(
            'select id, login, password from users where login = :login'
        );
        $request->execute(['login' => $userLogin]);
        $result = $request->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return [];
        } else {
            return $result;
        }
    }

    private function checkUserPassword(array $user): bool
    {
        return password_verify(
            $_POST['password'],
            $user['password']
        );
    }

    public function validateUser(): array
    {
        $user = $this->findUsersForLogin($_POST['login']);
        if ($this->checkUserPassword($user)) {
            return $user;
        } else {
            return [];
        }
    }
}