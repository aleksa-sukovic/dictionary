<?php

require_once './autoload.php';

if (isset($_GET['item'])) {
    words()->destroy($_GET['item']);
}

redirect('./words.php');
