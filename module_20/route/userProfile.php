<?php

$user = new User('127.0.0.1', 'root', 'Faraonkill1', 'authorization');
foreach ($user->getData() as $key => $item) {
    ?> <p class="author__name"><?php
        echo $key, ': ', $item; ?></p>
    <?php
}
