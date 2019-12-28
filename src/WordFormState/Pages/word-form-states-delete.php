<?php

require_once '../../autoload.php';

if (isset($_GET['item'])) {
    wordFormStates()->destroy($_GET['item']);
}

redirect('./word-form-states.php');
