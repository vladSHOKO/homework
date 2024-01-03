<?php

sessionStart();
updateLoginCookie();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    sessionDestroy();
}
