<?php

namespace Module\Twenty;

use PDO;

class User extends Database
{
    public function getData(): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select name as Имя, surname as Фамилия, father_name as Отчество, email as Почта, phone_number as Телефон from users where id = :id'
        );
        $request->execute(['id' => $_SESSION['user_id']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
