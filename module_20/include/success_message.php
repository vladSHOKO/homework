<?php

if (!empty($_POST)) {
    if ($_SESSION['auth']) {
        ?>
        <td class="right-collum-index">
            <div>Вы успешно авторизовались</div>
        </td>
        <?php
    }
}
?>
