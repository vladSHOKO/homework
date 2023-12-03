<?php

function ShowPictures(string $pathToUpload, string $path): void
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

            <input type="checkbox" name="delete[]" value="<?= $imgName ?>">
            Удалить
            </figure><?php
        }
    }
}

function UploadImages(): void
{
    if (isset($_FILES['myImage']) && isset($_POST['upload'])
        && count(
            $_FILES['myImage']['name']
        ) <= 5
    ) {
        $uploadTo = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        for ($i = 0; $i < count($_FILES['myImage']['tmp_name']); $i++) {
            if ($_FILES['myImage']['error'][$i] > 0 ??
                $_POST['MAX_FILE_SIZE'] >= $_FILES['myImage']['size'][$i]
            ) {
                echo "Произошла ошибка при загрузке файла";
            } else {
                move_uploaded_file(
                    $_FILES['myImage']['tmp_name'][$i],
                    $uploadTo . $_FILES['myImage']['name'][$i]
                );
            }
        }
    }
}


function DeleteAll(string $pathToUpload): void
{
    if (isset($_POST['deleteAll'])) {
        $filesToDelete = array_diff(scandir($pathToUpload), array('.', '..'));
        foreach ($filesToDelete as $fileToDelete) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/upload/' . $fileToDelete);
        }
    }
}

function DeleteSomePictures(string $pathToUpload): void
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


