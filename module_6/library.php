<?php

$library = [
    'authors' => [
        'john_makkormik@example.com' => [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
            'birthYear' => 1972,
        ],
        'martin_robert@example.com' => [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
            'birthYear' => 1952,
        ],
        'martin_fauler@example.com' => [
            'name' => 'Мартин Фаулер',
            'email' => 'martin_fauler@example.com',
            'birthYear' => 1963,
        ],
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
            'year' => 2013,
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Шаблоны корпоративных приложений',
            'author' => 'martin_fauler@example.com',
            'year' => 2002,
        ],
    ],
];

$title = 'Библиотека программиста';
$countOfAuthors = count($library['authors']);
$red = (bool) rand(0, 1);

if ($red) {
    $red = "red";
}
else {
    $red = " ";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" , href="HomeworkStyle.css" , type="text/css"
</head>
<body class="main">
<h1 class="<?=$red?>"><?= $title ?></h1>
<div>Авторов на портале: <?= $countOfAuthors ?></div>

<p class="grey">Книга <b><?=$library['books'][0]['title']?></b>, ее написал <?=$library['authors']['john_makkormik@example.com']['name']?> <?=$library['authors']['john_makkormik@example.com']['birthYear']?> (<a href="#"><?=$library['books'][0]['author']?></a>)</p>
<p>Книга <b><?=$library['books'][1]['title']?></b>, ее написал <?=$library['authors']['martin_robert@example.com']['name']?> <?=$library['authors']['martin_robert@example.com']['birthYear']?> (<a href="#"><?=$library['books'][1]['author']?></a>)</p>
<p class="grey">Книга <b><?=$library['books'][2]['title']?></b>, ее написал <?=$library['authors']['martin_robert@example.com']['name']?> <?=$library['authors']['martin_robert@example.com']['birthYear']?> (<a href="#"><?=$library['books'][2]['author']?></a>)</p>
<p>Книга <b><?=$library['books'][3]['title']?></b>, ее написал <?=$library['authors']['martin_fauler@example.com']['name']?> <?=$library['authors']['martin_fauler@example.com']['birthYear']?> (<a href="#"><?=$library['books'][3]['author']?></a>)</p>

</body>
</html>
