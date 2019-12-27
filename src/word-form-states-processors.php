<?php

require_once './autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate value
if (empty($_POST['value'])) {
    $_SESSION['errors']['value'] = 'Value is required.';
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $item = wordFormStates()->save($_POST);

    session_write_close();
    redirect('../word-form-states-edit.php?item=' . $item->id);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['id'])) {
    redirect('../word-form-states-edit.php?item=' . $_POST['id']);
} else {
    redirect('../word-states-types-edit.php');
}

