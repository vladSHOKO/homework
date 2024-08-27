<?php

if (isset($_POST['deleteAll'])) {
    deleteAll($_SERVER["DOCUMENT_ROOT"] . '/upload/');
}
if (!empty($_POST['delete'])) {
    deleteSomePictures($_SERVER["DOCUMENT_ROOT"] . '/upload/');
}

?>
<div class="author__name">

    <form enctype="multipart/form-data" method="post"
          action="<?= $_SERVER['PHP_SELF'] ?>">
        <?php
        showPictures(
            $_SERVER['DOCUMENT_ROOT'] . '/upload/',
            $_SERVER['DOCUMENT_ROOT']
        );
        ?>

        <input type="checkbox" name="deleteAll" value="Удалить всё"> Удалить всё
        <br>
        <input formaction="/?page=gallery" type="submit" name="delete[]"
               value="Удалить">
    </form>
</div>