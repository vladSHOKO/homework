<?php

namespace Module\Twenty;

require_once __DIR__ . "/vendor/autoload.php";

include __DIR__ . "/src/core.php";
include __DIR__ . "/logic/session_logic.php";
include __DIR__ . '/main_menu.php';
include __DIR__ . "/data/authorization.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<?php

include "./templates/header.php"; ?>

<body>

<?php

global $menu;
pageTitle($menu);

$requested_page = isset($_SESSION['auth']) ? $_GET['page'] ?? 'home' : 'home';

switch ($requested_page) {
    case "about":
        include(__DIR__ . "/route/about.php");
        break;
    case "catalog":
        include(__DIR__ . "/route/catalog.php");
        break;
    case "contacts":
        include(__DIR__ . "/route/contacts.php");
        break;
    case "courses":
        include(__DIR__ . "/route/courses.php");
        break;
    case "news":
        include(__DIR__ . "/route/news.php");
        break;
    case "gallery":
        include(__DIR__ . "/route/gallery.php");
        break;
    case "posts":
        include(__DIR__ . "/route/posts.php");
        break;
    case "save":
        include(__DIR__ . "/route/create.php");
        include(__DIR__ . "/logic/gallery_logic.php");
        break;
    case "add":
        include(__DIR__ . "/route/message_add.php");
        break;
    case "detail":
        include(__DIR__ . "/route/message_detail.php");
        break;
    case "userProfile":
        include(__DIR__ . "/route/userProfile.php");
        break;
    default:
        include(__DIR__ . "/route/home.php");
}

?>

</body>
<?php
include "templates/footer.php"; ?>
</html>
