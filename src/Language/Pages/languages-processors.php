<?php

require_once '../../autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate code
if (empty($_POST['code'])) {
   $_SESSION['errors']['code'] = 'Code is required.';
}

// Validate label
if (empty($_POST['label'])) {
    $_SESSION['errors']['label'] = 'Label is required.';
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $language = languages()->save($_POST);

    session_write_close();
    redirect('./languages-edit.php?language=' . $language->id);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['id'])) {
    redirect('./languages-edit.php?language=' . $_POST['id']);
} else {
    redirect('./languages-edit.php');
}

