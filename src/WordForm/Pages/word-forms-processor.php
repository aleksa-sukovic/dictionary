<?php

use Aleksa\Library\Exceptions\ValidationException;

require_once '../../autoload.php';

try {
    requestValidator()->validateWithThrow([
        'value'               => 'Value is required.',
        'word_translation_id' => 'Please provide word.',
        'type_id'             => 'Please specify type.',
        'state_id'            => 'Please specify state.'
    ], $_POST);

    $item = wordForms()->save($_POST);
    redirect('../../WordTranslation/Pages/word-translations-edit.php?item=' . $_POST['word_translation_id']);
} catch (ValidationException $e) {
    if (isset($_POST['id'])) {
        redirect('./word-forms-edit.php?item=' . $_POST['id']);
    }  else if (isset($_POST['translation'])) {
        redirect('./word-forms-edit.php?translation=' . $_POST['translation']);
    } else {
        redirect('./word-forms-edit.php');
    }
}
