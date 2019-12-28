<?php

require_once '../../autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate name
if (empty($_POST['name'])) {
    $_SESSION['errors']['label'] = 'Name is required.';
}

// Validate language id
if (empty($_POST['language_id'])) {
    $_SESSION['errors']['language_id'] = 'Language is required.';
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $item = dictionaries()->save($_POST);

    session_write_close();
    redirect('./dictionaries-edit.php?item=' . $item->id);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['id'])) {
    redirect('./dictionaries-edit.php?item=' . $_POST['id']);
} else {
    redirect('./dictionaries-edit.php');
}

