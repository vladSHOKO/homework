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

    public function getData(int $userId): array
    {
        $request = $this->connection->prepare(
            'select name as Имя, surname as Фамилия, father_name as Отчество, email as Почта, phone_number as Телефон from users where id = :id'
        );
        $request->execute(['id' => $userId]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
