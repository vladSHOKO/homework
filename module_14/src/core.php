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

/**
 * @throws Exception
 */
function validateImages(array $images, array $parameters): void
{
    checkEmpty($images);
    checkMaxCount($images, $parameters);
//    checkSize();
//    checkType();
//    checkName();
}

function checkEmpty(array $images): void
{
    if ($images[0]['error'] === 4) {
        throw new Exception('Загрузите хоть что-то');
    }
}

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

if (isset($_POST['upload'])) {
    $images = prepareImages();

    try {
        validateImages($images, ['count' => 10, 'size' => 4]);
        uploadImages($images, $_SERVER['DOCUMENT_ROOT'] . '/upload/');
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}


function uploadImages(array $images, string $uploadTo): void
{
    foreach ($images as $image) {
        move_uploaded_file(
            $image['tmp_name'],
            $uploadTo . $image['name']
        );
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


