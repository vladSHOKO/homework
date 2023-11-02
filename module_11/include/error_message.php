<?php

if (!empty($_POST)) {
    if (!$authtirized) {
        ?>
        <div>Неверный логин или пароль</div>
        <?php
    }
}
?>
