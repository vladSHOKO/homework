<?php

global $authorized; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели,
                задачи и многое другое. Делится списками с друзьями и
                просматривать списки друзей.</p>

        </td>
        <td class="right-collum-index" <?php
        if ($authorized) { ?> hidden <?php
        } ?> >

            <div class="project-folders-menu">
                <ul class="project-folders-v">

                    <li class="project-folders-v-active"><a
                            href="/?login=yes">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="index-auth">
                <form action="/?login=yes" method="post">
                    <table width="100%" border="0" cellspacing="0"
                           cellpadding="0">
                        <tr>
                            <td class="iat">
                                <label for="login_id">Ваш e-mail:</label>
                                <input id="login_id" size="30" name="login"
                                       value="<?php
                                       if (isset ($_POST['login'])) {
                                           echo $_POST['login'];
                                       } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="iat">
                                <label for="password_id">Ваш пароль:</label>
                                <input id="password_id" size="30"
                                       name="password"
                                       type="password">
                                <?php
                                include "include/error_message.php";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </td>


        <?php
        include "include/success_message.php" ?>
    </tr>
</table>