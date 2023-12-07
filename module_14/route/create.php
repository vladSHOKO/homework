<?php

?>
<div class="author__name">

    <form enctype="multipart/form-data" method="post"
          action="<?= $_SERVER['PHP_SELF'] ?>">
        <span> Загрузите файл</span>
        <input type="file" name="myImage[]"
               multiple>
        <br>
        <input formaction="/?page=save" type="submit" name="upload" value="Загрузить">
    </form>
</div>
