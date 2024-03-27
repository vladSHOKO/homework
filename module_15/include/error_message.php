<?php

global $authorized;

if (isset($_POST['login'])) {
    if (!$authorized) {
        ?>
        <div>Неверный логин или пароль</div>
        <?php
    }
}
?>
