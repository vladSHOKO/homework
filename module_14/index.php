<?php

include "src/core.php";

deleteAll(__DIR__ . '/upload/');
deleteSomePictures(__DIR__ . '/upload/');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Галерея</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <form enctype="multipart/form-data" method="post"
          action="<?= $_SERVER['PHP_SELF'] ?>">
        <?php
        showPictures(__DIR__ . '/upload/', __DIR__);
        ?>
        <span> Загруите файл</span>
        <input type="file" name="myImage[]"
               multiple>
        <input type="checkbox" name="deleteAll" value="Удалить всё"> Удалить всё
        <br>
        <br>
        <input type="submit" name="upload" value="Загрузить">
        <input type="submit" name="delete[]" value="Удалить">

    </form>
</div>

</body>
</html>
