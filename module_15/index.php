<?php

include __DIR__ . '/main_menu.php';
include __DIR__ . "/data/authorization.php";
global $authorized; ?>
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

$requested_page = isset($_SESSION['authorized']) ? ($_GET['page'] ?? 'home') : 'home';

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
    case "save":
        include(__DIR__ . "/route/create.php");
        include $_SERVER['DOCUMENT_ROOT'] . "/logic.php";
        break;
    default:
        include(__DIR__ . "/route/home.php");
}
var_dump($_COOKIE);
var_dump($_SESSION['authorized']);
?>

</body>
<?php
include "templates/footer.php"; ?>
</html>
