<?php

namespace Module\Twenty;

use PDO;

class Authorization extends Database
{
    public function validateUser(): void
    {
        $user = $this->findUsersForLogin();
        $this->setDataInSession($user, $this->checkUserPassword($user));
    }

    private function findUsersForLogin(): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select id, login, password from users where login = :login'
        );
        $request->execute(['login' => $_POST['login']]);
        $result = $request->fetch(PDO::FETCH_ASSOC);
        var_dump($request->fetch(PDO::FETCH_ASSOC));
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

    private function setDataInSession(array $user, bool $correctPassword): void
    {
        if (!empty($user) && $correctPassword) {
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user['id'];
        }
    }

    public function testInfo(): string
    {
        return "Test information";
    }
}
