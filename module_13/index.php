<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<?php
include 'templates/header.php' ?>
<body>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1>Возможности проекта —</h1>
            <p>Вести свои личные списки, например покупки в магазине, цели,
                задачи и многое другое. Делится списками с друзьями и
                просматривать списки друзей.</p>

        </td>

        <td class="right-collum-index" <?php
        if ($authtirized) { ?> hidden <?php
        } ?> >

            <div class="project-folders-menu">
                <ul class="project-folders-v">

                    <li class="project-folders-v-active"><a
                            href="/?login=yes"><?= $authtirized ? 'Выйти'
                                : 'Авторизация' ?></a></li>
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
                                       if (array_key_exists('login', $_POST)) {
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
                                include "data/authtorization.php"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Войти"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </td>
    </tr>
</table>

</body>
<?php
include 'templates/footer.php' ?>
</html>
