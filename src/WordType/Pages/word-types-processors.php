<?php

require_once '../../autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate label
if (empty($_POST['label'])) {
    $_SESSION['errors']['label'] = 'Label is required.';
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $language = wordTypes()->save($_POST);

    session_write_close();
    redirect('./word-types-edit.php?item=' . $language->id);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['id'])) {
    redirect('./word-types-edit.php?item=' . $_POST['id']);
} else {
    redirect('./word-types-edit.php');
}

