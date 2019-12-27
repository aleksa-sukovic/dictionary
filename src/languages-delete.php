<?php

require_once './autoload.php';

if (isset($_GET['language'])) {
    languages()->destroy($_GET['language']);
}

redirect('./languages.php');
