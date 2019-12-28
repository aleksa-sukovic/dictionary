<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    wordFormTypes()->destroy($_GET['item']);
}

redirect('./word-form-types.php');
