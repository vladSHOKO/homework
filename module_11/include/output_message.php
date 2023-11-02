<?php

if (!empty($_POST)) {
    if ($authtirized) {
        include "include/success_message.php";
    } else {
        include "include/error_message.php";
    }
}
