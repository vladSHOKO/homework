<?php

namespace Module\Twenty;

use PDO;

class Mail extends Database
{
    public function getMessageList(): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select * from messages where recipient_id = :id'
        );
        $request->execute(['id' => $_SESSION['user_id']]);
        $messageList = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $messageList[$row['id']] = $row;
        }
        return $messageList;
    }

    public function getDataOfCurrentMessage(): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select * from messages where id = ? and recipient_id = ?'
        );
        $request->execute([$_GET['id'], $_SESSION['user_id']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getDataOfSender(array $message): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select name, surname, email from users where id = ?'
        );
        $request->execute([$message['sender_id']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function updateMessageStatus(): void
    {
        $connect = parent::databaseConnect();
        $requestOfUpdateStatus = $connect->prepare(
            'update messages set readed = 1 where id = ?'
        );
        $requestOfUpdateStatus->execute([$_GET['id']]);
    }

    public function getListOfRecipients(): array
    {
        $connect = parent::databaseConnect();
        $request = $connect->prepare(
            'select id, name, surname from users order by name'
        );
        $request->execute();
        $list = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row;
        }
        return $list;
    }

    public function insertMessage(): void
    {
        $connect = parent::databaseConnect();
        if (isset($_POST['recipient'])) {
            $request = $connect->prepare(
                'insert into messages (title, text, sender_id, recipient_id, time) values (?, ?, ?, ?, ?)'
            );
            $request->execute(
                array(
                    $_POST['message_title'],
                    $_POST['message_text'],
                    $_SESSION['user_id'],
                    $_POST['recipient'],
                    date('Y-m-d H:i:s')
                )
            );
        }
    }
}
