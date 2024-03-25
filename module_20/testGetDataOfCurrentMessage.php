<?php

class Db
{
    private static string $hostname = '127.0.0.1';
    private static string $username = 'user';
    private static string $password = 'password';
    private static string $dbname = 'authorization';

    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$hostname, self::$dbname),
                self::$username,
                self::$password
            );
        }
        return self::$connection;
    }
}

class MailRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getMessageList($userId): array
    {
        $request = $this->connection->prepare(
            'select * from messages where recipient_id = :id'
        );
        $request->execute(['id' => $userId]);
        $messageList = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $messageList[$row['id']] = $row;
        }
        return $messageList;
    }

    public function getDataOfCurrentMessage($messageId, $userId): array
    {
        $request = $this->connection->prepare(
            'select * from messages where id = ? and recipient_id = ?'
        );
        $request->execute([$messageId, $userId]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getDataOfSender(array $message): array
    {
        $request = $this->connection->prepare(
            'select name, surname, email from users where id = ?'
        );
        $request->execute([$message['sender_id']]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function updateMessageStatus(): void
    {
        $requestOfUpdateStatus = $this->connection->prepare(
            'update messages set readed = 1 where id = ?'
        );
        $requestOfUpdateStatus->execute([$_GET['id']]);
    }

    public function getListOfRecipients(): array
    {
        $request = $this->connection->prepare(
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
        if (isset($_POST['recipient'])) {
            $request = $this->connection->prepare(
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


$repo = new MailRepository(Db::getConnection());
var_dump($repo->getDataOfCurrentMessage(1, 1));