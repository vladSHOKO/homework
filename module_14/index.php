<?php

include "src/core.php";

DeleteAll(__DIR__ . '/upload/');
DeleteSomePictures(__DIR__ . '/upload/');
UploadImages();

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
        <span> Загрузите файл</span>
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <input type="file" name="myImage[]"
               accept="image/jpeg,image/png,image/jpg" multiple>
        <input type="checkbox" name="deleteAll" value="Удалить всё"> Удалить всё
        <br>
        <br>
        <input type="submit" name="upload" value="Загрузить">
        <input type="submit" name="delete[]" value="Удалить">

    </form>
</div>

</body>
</html>