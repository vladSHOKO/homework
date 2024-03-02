<?php

namespace Module\Twenty;

$user = new UserRepository(Db::getConnection());
foreach ($user->getData() as $key => $item) {
    ?> <p class="author__name"><?php
        echo $key, ': ', $item; ?></p>
    <?php
}
