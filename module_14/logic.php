<?php

if (isset($_POST['upload'])) {
    $images = prepareImages();

    try {
        validateImages(
            $images,
            [
                'count' => 5,
                'size' => 2000000,
                'type' => ['image/jpeg', 'image/jpg', 'image/png']
            ]
        );
        saveImages(
            correctName($images, '/[^ \w\-\.]/'),
            $_SERVER['DOCUMENT_ROOT'] . '/upload/'
        );
    } catch (Exception $exception) {
        ?>
        <div class="author__name">
            <?=
            $exception->getMessage();
            ?>
        </div>
        <?php
    }
}