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

    private function checkUserPassword(string $enteredPassword, array $user): bool
    {
        return password_verify(
            $enteredPassword,
            $user['password']
        );
    }

    public function validateUser($userLogin, $userPassword): array|false
    {
        $user = $this->findUsersForLogin($userLogin);
        if ($this->checkUserPassword($userPassword, $user)) {
            return $user;
        } else {
            return false;
        }
    }
}