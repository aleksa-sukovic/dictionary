<?php

require_once '../../autoload.php';

if (empty($_GET['word']) || empty($_GET['dictionary'])) {
    exit(1);
}

dictionaries()->removeWord($_GET['word'], $_GET['dictionary']);
redirect('./dictionaries-edit.php?item=' . $_GET['dictionary']);
