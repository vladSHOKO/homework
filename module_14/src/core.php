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
function validateImages(array $images, array $parameters): array
{
    checkEmpty($images);
    checkMaxCount($images, $parameters);
    checkSize($images, $parameters);
    checkType($images, $parameters);
    return correctName($images, $parameters);
}

function correctName(array $images, array $parameters): array
{
    $pattern = $parameters['namePattern'];
    foreach ($images as $key => $image) {
        $images[$key]['name'] = preg_replace($pattern, '_', $image['name']);
    }
    return $images;
}

/**
 * @throws Exception
 */
function checkType(array $images, array $parameters): void
{
    $types = array_flip($parameters['type']);
    foreach ($images as $image) {
        if (!array_key_exists($image['type'], $types)) {
            throw new Exception('Загрузите другой формат файла');
        }
    }
}

/**
 * @throws Exception
 */
function checkSize(array $images, array $parameters): void
{
    $size = $parameters['size'];
    foreach ($images as $image) {
        if ($image['size'] > $size ?? 2000000) {
            throw new Exception('Слишком большой размер файла');
        }
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

if (isset($_POST['upload'])) {
    $images = prepareImages();

    try {
        uploadImages(
            validateImages(
                $images,
                [
                    'count' => 5,
                    'size' => 2000000,
                    'type' => ['image/jpeg', 'image/jpg', 'image/png'],
                    'namePattern' => '/[^a-zA-Z0-9\._-]/'
                ]
            ),
            $_SERVER['DOCUMENT_ROOT'] . '/upload/'
        );
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


