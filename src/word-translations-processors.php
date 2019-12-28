<?php

use Aleksa\Library\Exceptions\ItemNotFoundException;

require_once './autoload.php';

session_start();
$_SESSION['errors'] = [];

// Validate value
if (empty($_POST['value'])) {
    $_SESSION['errors']['label'] = 'Value is required.';
}

// Validate language
if (empty($_POST['language_id'])) {
    $_SESSION['errors']['language_id'] = 'Language is required.';
}

// Validate word
if (empty($_POST['word_id'])) {
    $_SESSION['errors']['word_id'] = 'Word is required.';
}

if (!empty($_POST['word_id']) && !empty($_POST['language_id'])) {
    try {
        $existing = wordTranslations()->find($_POST['word_id'], $_POST['language_id'], $_POST['id'] ?? null);

        $_SESSION['errors']['duplicate'] = "Translation of word '" . words()->findById($_POST['word_id']) . "' for language '" . languages()->findById($_POST['language_id']) . "' already exists.";
    } catch (ItemNotFoundException $e) {
        //
    }
}

// Handle no errors
if (empty($_SESSION['errors'])) {
    $item = wordTranslations()->save($_POST);

    session_write_close();
    redirect('../words-edit.php?item=' . $item->wordId);

    exit(0);
}

// Handle errors
session_write_close();

if (isset($_POST['word_id']) && isset($_POST['language_id'])) {
    redirect('../word-translations-edit.php?word=' . $_POST['word_id'] . '&language=' . $_POST['language_id']);
} else {
    redirect('../word-translations-edit.php');
}

