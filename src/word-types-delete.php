<?php

require_once './autoload.php';

if (isset($_GET['item'])) {
    wordTypes()->destroy($_GET['item']);
}

redirect('./word-types.php');
