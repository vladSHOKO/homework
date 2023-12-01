<?php

global $authorized;

if (!empty($_POST)) {
    if ($authorized) {
        ?>
        <td class="right-collum-index">
            <div>Вы успешно авторизовались</div>
        </td>
        <?php
    }
}
?>
