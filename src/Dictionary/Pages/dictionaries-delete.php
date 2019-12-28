<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    dictionaries()->destroy($_GET['item']);
}

redirect('./dictionaries.php');
