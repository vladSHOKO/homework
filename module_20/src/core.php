<?php

function showPictures(string $pathToUpload, string $path): void
{
    if (!empty(array_diff(scandir($pathToUpload), array('.', '..')))) {
        $imgNames = array_diff(scandir($pathToUpload), array('.', '..'));

        foreach ($imgNames as $imgName) {
            ?>
            <figure class="photo">
            <img src="upload/<?= $imgName ?>">
            <figcaption><?= date(
                    "d.m.y",
                    filectime($path . '/upload/' . $imgName)
                ) ?></figcaption>

            <input type="checkbox" name="delete[]" value="<?= $imgName ?>">Удалить
            </figure><?php
        }
    }
}

/**
 * @throws Exception
 */
function validateImages(array $images, array $parameters): void
{
    checkEmpty($images);
    checkMaxCount($images, $parameters);
    foreach ($images as $image) {
        checkSize($image, $parameters);
        checkType($image, $parameters);
    }
}

function correctName(array $images, string $pattern): array
{
    foreach ($images as $key => $image) {
        $images[$key]['name'] = preg_replace($pattern, '_', $image['name']);
    }
    return $images;
}

/**
 * @throws Exception
 */
function checkType(array $image, array $parameters): void
{
    $types = array_flip($parameters['type']);
    if (!array_key_exists($image['type'], $types)) {
        throw new Exception('Загрузите другой формат файла');
    }
}

/**
 * @throws Exception
 */
function checkSize(array $image, array $parameters): void
{
    $size = $parameters['size'];
    if ($image['size'] > $size ?? 2000000) {
        throw new Exception('Слишком большой размер файла');
    }
}

/**
 * @throws Exception
 */
function checkEmpty(array $images): void
{
    if ($images[0]['error'] === 4) {
        throw new Exception('Загрузите хоть что-то');
    }
}

/**
 * @throws Exception
 */
function checkMaxCount(array $images, array $parameters): void
{
    $count = $parameters['count'] ?? 5;
    if (count($images) > $count) {
        throw new Exception('Можно загрузить не более 5 файлов');
    }
}

function prepareImages(): array
{
    $prepared = [];
    $keys = array_keys($_FILES['myImage']);
    foreach ($keys as $key) {
        foreach ($_FILES['myImage'][$key] as $number => $data) {
            $prepared[$number][$key] = $data;
        }
    }
    return $prepared;
}

function saveImages(array $images, string $uploadTo): void
{
    foreach ($images as $image) {
        move_uploaded_file(
            $image['tmp_name'],
            $uploadTo . $image['name']
        );
    }
}


function deleteAll(string $pathToUpload): void
{
    if (isset($_POST['deleteAll'])) {
        $filesToDelete = array_diff(scandir($pathToUpload), array('.', '..'));
        foreach ($filesToDelete as $fileToDelete) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $fileToDelete);
        }
    }
}

function deleteSomePictures(string $pathToUpload): void
{
    $files = array_diff(scandir($pathToUpload), array('.', '..'));
    if (isset($_POST['delete'])) {
        foreach ($files as $file) {
            foreach ($_POST['delete'] as $deleteFile) {
                if ($file == $deleteFile) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $file);
                }
            }
        }
    }
}

function arraySort(
    array $array,
    string $key = 'sort',
    int $sort = SORT_ASC
): array {
    for ($i = 0; $i < count($array); $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($sort == SORT_DESC) {
                $sortingType = $array[$j][$key] > $array[$i][$key];
            } else {
                $sortingType = $array[$j][$key] < $array[$i][$key];
            }
            if ($sortingType) {
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
            }
        }
    }
    return $array;
}

function cutString(string $line, int $length, string $appends): string
{
    if (iconv_strlen($line, 'utf-8') <= $length) {
        return $line;
    } else {
        $line = iconv_substr($line, 0, $length) . $appends;
        return $line;
    }
}

function pageTitle(array $menu): void
{
    foreach ($menu as $value) {
        if (isset($_GET['page'])
            && substr($value['path'], 7) == $_GET['page']
        ) {
            ?><h1 class="title"> <?= $value['title'] ?></h1> <?php
        }
    }
}

function showMenu(array $menu, int $fontSize): void
{
    foreach ($menu as $value) {
        if (isset($_GET['page'])
            && substr($value['path'], 7) == $_GET['page']
        ) {
            $underline = 'class="underline"';
        } else {
            $underline = null;
        }
        $template = '<li><a href="%s"><span %s>%s</span></a></li>';
        printf(
            $template,
            $value['path'],
            $underline,
            cutString($value['title'], 12, '...')
        );
    }
}

function sessionStart(): void
{
    session_save_path($_SERVER['DOCUMENT_ROOT'] . '/sessions');
    session_start();
}

function sessionDestroy(): void
{
    session_unset();
    session_destroy();
    unset($_COOKIE['PHPSESSID']);
}

function updateLoginCookie(): void
{
    if (isset($_POST['login'])) {
        setcookie('login', $_POST['login'], time() + 60 * 60 * 24 * 30, '/');
    }
}

class Database
{
    public $hostname;
    public $username;
    public $password;
    public $dbname;

    public function __construct($hostname, $username, $password, $dbname)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function databaseConnect(): object
    {
        return new PDO(
            "mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8",
            $this->username,
            $this->password
        );
    }
}

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
}

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
