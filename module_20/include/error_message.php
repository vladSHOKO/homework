<?php

if (isset($_POST['login'])) {
    if (!$_SESSION['auth']) {
        ?>
        <div>Неверный логин или пароль</div>
        <?php
    }
}
?>
