<?php

require_once '../../autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate value
if (empty($_POST['value'])) {
    $_SESSION['errors']['label'] = 'Value is required.';
}

if (empty($_POST['type_id'])) {
    $_SESSION['errors']['type_id'] = 'Word type is required';
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $language = words()->save($_POST);

    session_write_close();
    redirect('../words-edit.php?item=' . $language->id);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['id'])) {
    redirect('../words-edit.php?item=' . $_POST['id']);
} else {
    redirect('../words-edit.php');
}

