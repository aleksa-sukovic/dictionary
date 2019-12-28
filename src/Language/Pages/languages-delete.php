<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    languages()->destroy($_GET['item']);
}

redirect('./languages.php');
