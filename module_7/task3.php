<?php

require "app/core.php";

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="tailwind.min.css" rel="stylesheet">
    <title>Модуль 07 - Задание 3</title>
</head>
<body class="bg-gray-400 font-sans leading-normal tracking-normal">

<?php
include "templates/navigation.php";

?>

<div class="container shadow-lg mx-auto bg-white mt-24 md:mt-14 h-screen p-10">

    <div class="grid grid-cols-3 gap-8">
        <?php
        // Разместите здесь решение задачи
        include "app/array_of_data.php";
        foreach ($data as $value) {
            include "templates/task_3_card.php";
        }

        ?>
    </div>

</div>
</body>
</html>
