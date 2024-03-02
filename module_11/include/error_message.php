<?php

global $authorized;

if (!empty($_POST)) {
    if (!$authorized) {
        ?>
        <div>Неверный логин или пароль</div>
        <?php
    }
}
?>
